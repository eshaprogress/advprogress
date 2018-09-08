<?php

use Illuminate\Database\Seeder;
use App\Models\State;
use App\Models\LegislationDetailMatrix;
use App\Models\Project;
use App\Models\Category;
use App\Models\ProjectToCategory;
use App\Models\ModelLegislation;

class generate_junk_projects_states extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $categories = Category::all();
        $legislation_details_matrix_enum = [
            'statute',
            'constitutional_amendment',
            'executive_order',
            'case_law'
        ];
        $model_legislation_enum = [
            'statute',
            'constitutional_amendment',
            'executive_order',
        ];

        foreach($categories as $category)
        {
            foreach(range(1, 3) as $_p_icr)
            {
                $project = new  Project([
                    'title'=>"Project {$_p_icr} Cat: {$category->category} ",
                    'short_directory_blurb'=>$faker->text(200),
                    'short_summary'=>$faker->text(500),
                    'long_description'=>$faker->text(4000),
                    'resources'=>json_encode([
                        'links'=>[
                            ['url'=>$faker->url],
                            ['url'=>$faker->url]
                        ]
                    ])
                ]);
                $project->save();

                if($_p_icr == 1)
                {
                    $project->is_featured = 1;
                    $project->update();
                }

                $projectToCategory = new ProjectToCategory();
                $projectToCategory->project_id = $project->id;
                $projectToCategory->category_id = $category->id;
                $projectToCategory->save();

                State::chunk(10, function ($states) use ($faker, $project, $legislation_details_matrix_enum)
                {
                    /**
                     * @var $states State[]
                     */
                    foreach ($states as $state)
                    {
                        $legislation_details_matrix = new LegislationDetailMatrix([
                            'state_id'                         => $state->id,
                            'project_id'                       => $project->id,
                            'because_constitutional_amendment' => $faker->boolean?1:0,
                            'because_statute'                  => $faker->boolean?1:0,
                            'because_case_law'                 => $faker->boolean?1:0,
                            'because_executive_order'          => $faker->boolean?1:0,
                            'citation_source'                  => "{$faker->sentence(6)}",
                            'source_of_law'                    => $legislation_details_matrix_enum[rand(0, 3)]
                        ]);
                        $legislation_details_matrix->save();
                    }
                });

                foreach(range(1, 3) as $_ml_icr)
                {
                    $model_legislation = new  ModelLegislation([
                        'project_id'          =>$project->id,
                        'title'               =>"Model Legislation {$_ml_icr} Project: {$project->title} ",
                        'short_project_blurb' =>$faker->text(200),
                        'preamble'            =>$faker->text(200),
                        'summary_text'        =>$faker->text(500),
                        'text_body'           =>$faker->text(4000),
                        'type'                =>$model_legislation_enum[rand(0, 2)]
                    ]);
                    $model_legislation->save();
                }
            }
        }

    }
}
