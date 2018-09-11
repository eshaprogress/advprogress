<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\LegislationDetailMatrix;
use App\Models\Project;
use App\Models\ProjectToCategory;
use App\Models\State;
use Illuminate\Console\Command;
use LucidFrame\Console\ConsoleTable;

class ManageDirectory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'manage:directory-projects';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manage Directories';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public static function truncate($string, $length)
    {
        if (strlen($string) > $length) {
            $string = substr($string, 0, $length) . '...';
        }

        return $string;
    }

    public function lookupState()
    {
        while(true)
        {
            $stateLookup = $this->ask('Type in 2 letter state abbreviation: ');
            $state = State::whereAbbreviation(strtoupper($stateLookup))->first();
            if($state)
            {
                return $state->id;
            }
        }

        return -1;
    }

    public function addStateToProject($projectId)
    {
        while(true) {

            $addState = $this->ask('Add State Data[Y/n]?', 'y');
            $addState = strtolower($addState);
            if($addState === 'n')
                return;

            $stateId = null;
            $stateId = $this->lookupState();

            $legislation_details_matrix_fields = [
                'because_constitutional_amendment' => 'Const Amendment',
                'because_statute' => 'Statue',
                'because_case_law' => 'Case Law',
                'because_executive_order' => 'Exec Order',
                'citation_source' => 'Citation Source',
                'source_of_law' => 'Source of Law',
            ];
            $legislation_details_matrix_enum = [
                'statute',
                'constitutional_amendment',
                'executive_order',
                'case_law'
            ];
            $legislation_details_matrix_data = [];
            foreach ($legislation_details_matrix_fields as $field => $desc) {
                if (preg_match('/^because/', $field)) {
                    $value = $this->ask("(bool) use: y/n or 1/0 [{$desc}]: ");
                    if (in_array($value, ['y', 'n']))
                        $legislation_details_matrix_data[$field] = $value === 'y';
                    elseif (in_array($value, ['1', '0']))
                        $legislation_details_matrix_data[$field] = $value >= '1';

                    continue;
                }

                if ($field === 'source_of_law') {
                    $legislation_details_matrix_data[$field] = $this->choice("[{$desc}]", $legislation_details_matrix_enum);
                    continue;
                }

                $legislation_details_matrix_data[$field] = $this->ask("[{$desc}]: ");
            }

            $legislation_details_matrix = new LegislationDetailMatrix([
                    'state_id' => $stateId,
                    'project_id' => $projectId,
                ] + $legislation_details_matrix_data);
            $legislation_details_matrix->save();

            $this->displayProjectStates($projectId);
        }
    }

    public function displayProjectStates($projectId)
    {
        $project = Project::whereId($projectId)->firstOrFail();
        $states = array_column(State::all()->toArray(),'abbreviation', 'id');
//                print_r($states);exit;
        $jurisdiction_matrix_headers = [
            'ID',
            'State',
            'Jurisdiction',
            'Const Amendment',
            'Statue',
            'Case Law',
            'Exec Order',
            'Source of law',
            'Citation source'
        ];
        $jurisdiction_matrix = $project->matrix()->get([
            'id',
            'state_id',
            'jurisdiction_id',
            'because_constitutional_amendment',
            'because_statute',
            'because_case_law',
            'because_executive_order',
            'source_of_law',
            'citation_source'
        ])->map(function(LegislationDetailMatrix $pt) use($states)
        {
            $return_keys = [
                'id',
                'state',
                'jurisdiction',
                'because_constitutional_amendment',
                'because_statute',
                'because_case_law',
                'because_executive_order',
                'source_of_law',
                'citation_source'
            ];

            // map these specific values
            $map = [];
            $matrix_pt = $pt->toArray();
            foreach($return_keys as $key)
            {
                if(!isset($matrix_pt[$key]))
                {
                    $map[$key] = '';
                    continue;
                }

                $map[$key] = $matrix_pt[$key];
            }

            $bool_values = [
                'because_constitutional_amendment',
                'because_statute',
                'because_case_law',
                'because_executive_order',
            ];
            foreach($bool_values as $v)
                $map[$v] = ($matrix_pt[$v] > 0)?'YES':'---';

            if(!empty($matrix_pt['state_id']))
                $map['state'] = $states[$matrix_pt['state_id']];

            return $map;
        });
        $this->line('Project: Matrix');
        $this->table($jurisdiction_matrix_headers, $jurisdiction_matrix);
    }

    public function addProject()
    {

        $categories = Category::all()->toArray();
        $categories = array_column($categories, 'category', 'id');
        $categories = ['back'=>'Exit'] + $categories;
        $categoryId = $this->choice('Assign to category: ', $categories);

        if($categoryId === 'back')
            return;

        $fields = [
            'title'=>'Title',
            'permalink_slug'=>'Project Slug',
            'enable_permalink_slug'=>'Enable Project Slug',
            'short_directory_blurb'=>'Short Directory blurb',
            'short_summary'=> 'Short Summary',
            'long_description'=> 'Long Description',
            'is_featured'=>'Is Project Featured',
            'img_card' => 'Image for Directory Listing',
            'img_banner' => 'Image for Project Page Details',
            'resources'=>'Resources enter double pipe delimited urls ie: http://url||http://url||http://url',
        ];

        $data = [];
        foreach($fields as $field=>$title)
        {
            if($field == 'resources')
            {
                $resources = $this->ask($title);
                if(!empty($resources))
                {
                    $resources = explode('||', $resources);
                    $resources = ['links'=>array_map(function($v){
                        return ['url'=>$v];
                    }, $resources)];
                    $data[$field] = json_encode($resources);
                }else{
                    $resources = ['links'=>[]];
                    $data[$field] = json_encode($resources);
                }
                continue;
            }

            if(in_array($field, [
                'is_featured',
                'enable_permalink_slug']))
            {
                $value = $this->ask("(bool) use: y/n or 1/0 [{$title}]");
                $value = (string)$value;
                if(strlen($value))
                {
                    if (in_array($value, ['y', 'n']))
                        $data[$field] = $value === 'y'?1:0;
                    elseif (in_array($value, ['1', '0']))
                        $data[$field] = $value >= '1'?1:0;
                }
                continue;
            }

            $data[$field] = $this->ask("[field: {$title}]: ");
        }

        $project = new  Project($data);
        $project->save();

        $projectToCategory = new ProjectToCategory();
        $projectToCategory->project_id = $project->id;
        $projectToCategory->category_id = $categoryId;
        $projectToCategory->save();

        $this->addStateToProject($project->id);
    }

    public function editProject($projectId)
    {
        $project = Project::whereId($projectId)->firstOrFail();
        $project_data = $project->toArray();

        $fields = [
            'title'=>'Title',
            'permalink_slug'=>'Project Slug',
            'enable_permalink_slug'=>'Enable Project Slug',
            'short_directory_blurb'=>'Short Directory blurb',
            'short_summary'=> 'Short Summary',
            'long_description'=> 'Long Description',
            'resources'=>'Resources enter double pipe delimited urls ie: http://url||http://url||http://url',
            'is_featured'=>'Is Project Featured',
            'img_card' => 'Image for Directory Listing',
            'img_banner' => 'Image for Project Page Details'
        ];

        $data = [];
        foreach($fields as $field=>$title)
        {
            if($field == 'resources')
            {
                $resources = $this->ask($title);
                if(!empty($resources))
                {
                    $resources = explode('||', $resources);
                    $resources = ['links'=>array_map(function($v){
                        return ['url'=>$v];
                    }, $resources)];
                    $data[$field] = json_encode($resources);
                }
                continue;
            }

            if(in_array($field, ['is_featured', 'enable_permalink_slug']))
            {
                $because = $project_data[$field]?'YES':'NO';
                $value = $this->ask("(bool) use: y/n or 1/0 [{$title}] -> {$because}");
                $value = (string)$value;
                if(strlen($value))
                {
                    if (in_array($value, ['y', 'n']))
                        $data[$field] = $value === 'y'?1:0;
                    elseif (in_array($value, ['1', '0']))
                        $data[$field] = $value >= '1'?1:0;
                }
                continue;
            }

            $set = $this->ask("{$title} -> {$project_data[$field]}");
            if(strlen($set))
            {
                $data[$field] = $set;
            }
        }

        if(empty($data))
        {
            $this->line('No changes made');
            return;
        }

        $this->line('Project Updated');
        $project->update($data);
    }

    public function editProjectState($projectId, $stateStr, $delete = false)
    {
        $stateStr = strtoupper($stateStr);
        $state = State::whereAbbreviation($stateStr)->firstOrFail();
        $legislation_details_matrix = LegislationDetailMatrix::whereProjectId($projectId)->whereStateId($state->id)->firstOrFail();
        if($delete === true)
        {
            $this->line("Removed State: {$stateStr}");
            $legislation_details_matrix->forceDelete();
            return;
        }

        $current_data = $legislation_details_matrix->toArray();
        $legislation_details_matrix_fields = [
            'because_constitutional_amendment' => 'Const Amendment',
            'because_statute' => 'Statue',
            'because_case_law' => 'Case Law',
            'because_executive_order' => 'Exec Order',
            'citation_source' => 'Citation Source',
            'source_of_law' => 'Source of Law',
        ];
        $legislation_details_matrix_enum = [
            'statute',
            'constitutional_amendment',
            'executive_order',
            'case_law'
        ];
        $data = [];
        foreach ($legislation_details_matrix_fields as $field => $desc)
        {
            if (preg_match('/^because/', $field))
            {
                $because = $current_data[$field]?'YES':'NO';
                $value = $this->ask("(bool) use: y/n or 1/0 [{$desc}]: {$because}");
                $value = (string)$value;
                if(strlen($value))
                {
                    if (in_array($value, ['y', 'n']))
                        $data[$field] = $value === 'y'?1:0;
                    elseif (in_array($value, ['1', '0']))
                        $data[$field] = $value >= '1'?1:0;
                }
                continue;
            }

            if ($field === 'source_of_law')
            {
                $defaultIdx = array_search($current_data['source_of_law'], $legislation_details_matrix_enum);
                $set = $this->choice(
                    "{$desc} -> {$current_data['source_of_law']}",
                    $legislation_details_matrix_enum, $defaultIdx
                );
                if(!empty($set))
                {
                    $data[$field] = $set;
                }
                continue;
            }

            $set = $this->ask("{$desc} -> {$current_data[$field]}");
            if(strlen($set))
                $data[$field] = $set;
        }

        if(empty($data))
        {
            $this->line('No changes made');
            return;
        }

        $this->line('Project Updated');
        $legislation_details_matrix->update($data);

        $this->displayProject($projectId);
    }

    public function displayProjectEdit($projectId = null)
    {
        if($projectId === null)
        {
            $projects = array_reduce(Project::all()->toArray(), function($collector, $val)
            {
                $collector["{$val['id']}"] = "{$val['title']}";
                return $collector;
            },[]);
            $projects = [
                'back'=>'Leave Menu'
            ] + $projects;

            do {
                $projectId = $this->choice('Please select a project', $projects);

                if($projectId === 'back') {
                    return;
                }
                $this->displayProjectInfoById($projectId);
                $this->displayProjectEdit($projectId);
            } while(true);
        }

        $choice = null;
        $rendered = false;
        do {

            switch($choice)
            {
                case 'edit:project':
                    $this->displayProject($projectId);
                    break;

                case 'add:state':
                case 'edit:state':
                case 'delete:state':
                    $this->displayProjectStates($projectId);
                    break;
            }

            $iCanDo = [
                'add:state'     =>'Add State to existing project',
                'edit:project'  =>'Edit Project Info',
                'edit:state'    =>'Edit State to existing project',
                'delete:state'  =>'Delete State to existing project',
            ];
            $iCanDo = ['back'=>'Exit'] + $iCanDo;
            $choice = $this->choice('What would you like to do?', $iCanDo);
            switch($choice)
            {
                case 'edit:project':
                    if(!$rendered)
                        $this->displayProject($projectId);

                    $this->editProject($projectId);
                    break;

                case 'add:state':
                    if(!$rendered)
                        $this->displayProjectStates($projectId);

                    $this->addStateToProject($projectId);
                    break;

                case 'delete:state':
                    $state = $this->ask('Input 2 letter state for this project');
                    $this->editProjectState($projectId, $state, true);
                    break;

                case 'edit:state':
                    if(!$rendered)
                        $this->displayProjectStates($projectId);

                    $state = $this->ask('Input 2 letter state for this project');
                    $this->editProjectState($projectId, $state);
                    break;

            }
            $rendered = true;

        } while($choice !== 'back');
    }

    public function addCategory()
    {
        $this->line('Add Category Here');
    }

    public static function testStr($str, $type)
    {
        $test = preg_match('/^\d+\:'.$type.'$/', $str);
        if(!$test)
            return -1;

        [$id, $_] = explode(':', $str);

        return $id;
    }

    public function editCategory($categoryId)
    {
        $this->line("Edit:{$categoryId} Category Here");
    }

    public function displayProjectCategories($projectId)
    {
        $project = Project::whereId($projectId)->firstOrFail();
        $categories = $project->category()->get()->toArray();
        $categories = array_map(function($val){
            return ['id'=>$val['id'],'category'=>$val['category']];
        }, $categories);

        $this->line('Project: Categories');
        $this->table(['ID','Name'], $categories);
    }

    public function displayProject($projectId)
    {
        $project = Project::whereId($projectId)->firstOrFail();

        $truncate = function($str)
        {
            return self::truncate($str, 100);
        };
        $this->line('Project: Details');
        $table = new ConsoleTable();
        $table->addHeader('Field')->addHeader('Value');
        $table->addRow()->addColumn('id')->addColumn($project->id);
        $table->addRow()->addColumn('Project Featured')->addColumn(($project->is_featured?'YES':'NO'));
        $table->addRow()->addColumn('Slug Enabled')->addColumn(($project->enable_permalink_slug?'YES':'NO'));
        $table->addRow()->addColumn('Title')->addColumn($truncate($project->title));
        $table->addRow()->addColumn('Short Directory Blurb')->addColumn($truncate($project->short_directory_blurb));
        $table->addRow()->addColumn('Short Summary')->addColumn($truncate($project->short_summary));
        $table->addRow()->addColumn('Long Description')->addColumn($truncate($project->long_description));
        $table->addRow()->addColumn('Slug')->addColumn($project->permalink_slug);
        $table->addRow()->addColumn('Card Image URL')->addColumn(($project->img_card));
        $table->addRow()->addColumn('Banner Image URL')->addColumn(($project->img_banner));
        $resources = json_decode($project->resources, true);
        $links = array_map(function($val)
        {
            return $val['url'];
        }, $resources['links']);
        foreach($links as $i=>$link)
        {
            $table->addRow()->addColumn("Link.".($i+1))->addColumn($link);
        }
        $table->display();
    }

    public function displayProjectInfoById($projectId)
    {
        $this->displayProject($projectId);
        $this->displayProjectStates($projectId);
    }

    public function displayProjectLookupByCategoryId($categoryId)
    {
        $projects = Category::whereId($categoryId)->firstOrFail()->projects()->get()->toArray();
        $projects = array_reduce($projects, function($collector, $val)
        {
            $collector["{$val['id']}:read"] = "Read: {$val['title']}";
            $collector["{$val['id']}:change"] = "Change: {$val['title']}";
            return $collector;
        },[]);
        $projects = [
            'add'=>'Add Project',
            'back'=>'Leave Menu'
        ] + $projects;

        do {
            $project_option = $this->choice('Please select a project', $projects);
            $testReadId = self::testStr($project_option, 'read');
            $testChangeId = self::testStr($project_option, 'change');

            if($testReadId !== -1)
            {
                $this->displayProjectInfoById($testReadId);
            }

            if($testChangeId !== -1)
            {
                $this->displayProjectInfoById($testChangeId);
                $this->displayProjectEdit($testChangeId);
            }

            if($project_option === 'add')
            {
               $this->addProject();
            }
        } while($project_option !== 'back');

    }

    public function displayListDirectories()
    {
        $categories = Category::all()->toArray();
        $categories = array_reduce($categories, function($collector, $val)
        {
            $collector["{$val['id']}:read"] = "Read: {$val['category']}";
            $collector["{$val['id']}:change"] = "Change: {$val['category']}";
            return $collector;
        },[]);
        $categories = [
            'add'=>'Add categories',
            'back'=>'Leave Menu',
        ] + $categories;

        do {
            $category_option = $this->choice('Please select a category', $categories);

            $testReadId = self::testStr($category_option, 'read');
            $testChangeId = self::testStr($category_option, 'change');
            if($testReadId !== -1)
            {
                $this->displayProjectLookupByCategoryId($testReadId);
            }

            if($testChangeId !== -1)
            {
                $this->displayProjectLookupByCategoryId($testChangeId);
                $this->editCategory($testChangeId);
            }

            if($category_option === 'add')
            {
                $this->addCategory();
            }
        } while($category_option !== 'back');

    }

    const MENU_LIST_PROJECTS_BY_CATEGORY = 'List Projects by category';
    const MENU_ADD_NEW_DIRECTORY_CATEGORY = 'Add new directory category';
    const MENU_ADD_NEW_PROJECT = 'Add New Projects';
    const MENU_EDIT_PROJECT = 'Edit Projects';

    const MENU_LIST_PROJECTS_BY_CATEGORY_IDX = '0';
    const MENU_EDIT_PROJECT_IDX = '1';
    const MENU_ADD_NEW_PROJECT_IDX = '2';
    const MENU_ADD_NEW_DIRECTORY_CATEGORY_IDX = '3';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        do {
            $iCanDo = [
                self::MENU_LIST_PROJECTS_BY_CATEGORY_IDX  =>self::MENU_LIST_PROJECTS_BY_CATEGORY,
                self::MENU_EDIT_PROJECT_IDX               =>self::MENU_EDIT_PROJECT,
                self::MENU_ADD_NEW_PROJECT_IDX            =>self::MENU_ADD_NEW_PROJECT,
                self::MENU_ADD_NEW_DIRECTORY_CATEGORY_IDX =>self::MENU_ADD_NEW_DIRECTORY_CATEGORY,
            ];
            $iCanDo = ['back'=>'Exit'] + $iCanDo;

            $choice = $this->choice('What would you like to do?', $iCanDo, '1');

            switch($choice)
            {
                case self::MENU_LIST_PROJECTS_BY_CATEGORY_IDX:
                    $this->displayListDirectories();
                    break;

                case self::MENU_ADD_NEW_DIRECTORY_CATEGORY_IDX:
                    $this->addCategory();
                    break;

                case self::MENU_ADD_NEW_PROJECT_IDX:
                    $this->addProject();
                    break;

                case self::MENU_EDIT_PROJECT_IDX:
                    $this->displayProjectEdit();
                    break;
            }
        } while($choice !== 'back');
    }
}
