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
            'model_legislative_summary_text'=>'Summary',
            'model_legislative_text_body'=>'Body',
            'resources'=>'Resources enter double pipe delimited urls ie: http://url||http://url||http://url'
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
            $data[$field] = $this->ask("[field: {$title}]: ");
        }

        $project = new  Project($data);
        $project->save();

        $projectToCategory = new ProjectToCategory();
        $projectToCategory->project_id = $project->id;
        $projectToCategory->category_id = $categoryId;
        $projectToCategory->save();

        $addState = $this->ask('Add State Data[Y/n]?','y');
        $addState = strtolower($addState);
        if($addState === 'y')
        {
            $states = array_column(State::all()->toArray(),'abbreviation', 'id');
            $stateId = $this->choice('Select State', $states);
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
            foreach($legislation_details_matrix_fields as $field=>$desc)
            {
                if(preg_match('/^because/', $field))
                {
                    $value = $this->ask("(bool) use: y/n or 1/0 [{$desc}]: ");
                    if(in_array($value, ['y','n']))
                        $legislation_details_matrix_data[$field] = $value === 'y';
                    elseif(in_array($value,['1','0']))
                        $legislation_details_matrix_data[$field] = $value === '1';

                    continue;
                }

                if($field === 'source_of_law')
                {
                    $legislation_details_matrix_data[$field] = $this->choice("[{$desc}]", $legislation_details_matrix_enum);
                    continue;
                }

                $legislation_details_matrix_data[$field] = $this->ask("[{$desc}]: ");
            }

            $legislation_details_matrix = new LegislationDetailMatrix([
                'state_id'      => $stateId,
                'project_id'    => $project->id,
            ] + $legislation_details_matrix_data);
            $legislation_details_matrix->save();
        }
    }

    public function editProject($projectId)
    {
        $this->line("Edit:{$projectId} Project Here");
    }

    public function addCategory()
    {
        $this->line('Add Category Here');
    }

    public function editCategory($categoryId)
    {
        $this->line("Edit:{$categoryId} Category Here");
    }

    public function displayProjectInfoById($projectId)
    {
        $project = Project::whereId($projectId)->firstOrFail();
        $states = array_column(State::all()->toArray(),'abbreviation', 'id');
        $categories = $project->category()->get()->toArray();
        $categories = array_map(function($val){
            return ['id'=>$val['id'],'category'=>$val['category']];
        }, $categories);

        $this->line('Project: Categories');
        $this->table(['ID','Name'], $categories);

        $truncate = function($str)
        {
            return self::truncate($str, 100);
        };
        $this->line('Project: Details');
        $table = new ConsoleTable();
        $table->addHeader('Field')->addHeader('Value');
        $table->addRow()->addColumn('id')->addColumn($project->id);
        $table->addRow()->addColumn('Title')->addColumn($truncate($project->title));
        $table->addRow()->addColumn('Summary Text')->addColumn($truncate($project->model_legislative_summary_text));
        $table->addRow()->addColumn('Body Text')->addColumn($truncate($project->model_legislative_text_body));
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

    public function displayProjectLookupByCategoryId($categoryId)
    {
        $projects = Category::whereId($categoryId)->firstOrFail()->projects()->get()->toArray();
        $projects = array_reduce($projects, function($collector, $val)
        {
            $collector["{$val['id']}:read"] = "Read: {$val['title']}";
            $collector["{$val['id']}:change"] = "Change: {$val['title']}";
            return $collector;
        },[]);
        $projects = ['add'=>'Add Project'] + ['back'=>'Leave Menu'] + $projects;

        do {
            $project_option = $this->choice('Please select a project', $projects);
            if(preg_match('/^\d+\:read/', $project_option))
            {
                [$id, $_] = explode(':', $project_option);
                $this->displayProjectInfoById($id);
            }

            if(preg_match('/^\d+\:change/', $project_option))
            {
                [$id, $_] = explode(':', $project_option);
                $this->displayProjectInfoById($id);
                $this->editProject($id);
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
        $categories = ['add'=>'Add categories'] + ['back'=>'Leave Menu'] + ['edit:#'=>'Edit Category Data'] + $categories;

        do {
            $category_option = $this->choice('Please select a category', $categories);

            if(preg_match('/^\d+\:read/', $category_option))
            {
                [$id, $_] = explode(':', $category_option);
                $this->displayProjectLookupByCategoryId($category_option);
            }

            if(preg_match('/^\d+\:change/', $category_option))
            {
                [$id, $_] = explode(':', $category_option);
                $this->displayProjectLookupByCategoryId($category_option);
                $this->editCategory($id);
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

    const MENU_LIST_PROJECTS_BY_CATEGORY_IDX = '0';
    const MENU_ADD_NEW_DIRECTORY_CATEGORY_IDX = '1';
    const MENU_ADD_NEW_PROJECT_IDX = '2';

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
                self::MENU_ADD_NEW_DIRECTORY_CATEGORY_IDX =>self::MENU_ADD_NEW_DIRECTORY_CATEGORY,
                self::MENU_ADD_NEW_PROJECT_IDX            =>self::MENU_ADD_NEW_PROJECT,
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
            }
        } while($choice !== 'back');
    }
}
