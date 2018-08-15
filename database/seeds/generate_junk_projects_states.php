<?php

use Illuminate\Database\Seeder;
use App\Models\State;
use App\Models\LegislationDetailMatrix;
use App\Models\Project;
use App\Models\Category;
use App\Models\ProjectToCategory;

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
        foreach($categories as $category)
        {
            foreach(range(1, 3) as $_)
            {
                $project = new  Project([
                    'title'=>$faker->sentence(6),
                    'model_legislative_text_body'=>$faker->text(4000),
                    'model_legislative_summary_text'=>$faker->text(1000),
                    'resources'=>json_encode([
                        'links'=>[
                            ['url'=>$faker->url],
                            ['url'=>$faker->url]
                        ]
                    ])
                ]);
                $project->save();

                if($_ == 1)
                {
                    $project->is_featured = 1;
                    $project->update();
                }

                $projectToCategory = new ProjectToCategory();
                $projectToCategory->project_id = $project->id;
                $projectToCategory->category_id = $category->id;
                $projectToCategory->save();

                $legislation_details_matrix_enum = [
                    'statute',
                    'constitutional_amendment',
                    'executive_order',
                    'case_law'
                ];
                State::chunk(100, function ($states) use ($faker, $project, $legislation_details_matrix_enum)
                {
                    /**
                     * @var $states State[]
                     */
                    foreach ($states as $state)
                    {
                        $legislation_details_matrix = new LegislationDetailMatrix([
                            'state_id' => $state->id,
                            'project_id' => $project->id,
                            'because_constitutional_amendment' => $faker->boolean?1:0,
                            'because_statute' => $faker->boolean?1:0,
                            'because_case_law' => $faker->boolean?1:0,
                            'because_executive_order' => $faker->boolean?1:0,
                            'citation_source' => "{$faker->sentence(6)}"
                        ]);
                        $legislation_details_matrix->save();
                        $legislation_details_matrix->source_of_law = $legislation_details_matrix_enum[rand(0, 3)];
                        $legislation_details_matrix->update();
                    }
                });
            }
        }

    }
}
