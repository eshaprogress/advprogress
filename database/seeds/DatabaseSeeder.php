<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
'Civil Rights',
'Economic Justice',
'Expanding Democracy',
'Environment'
     */
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(config('app.env') !== 'production')
        {
            DB::statement("SET foreign_key_checks=0");
            \App\Models\LegislationDetailMatrixToProject::truncate();
            \App\Models\LegislationDetailMatrix::truncate();
            \App\Models\ProjectToCategory::truncate();
            \App\Models\Project::truncate();
            \App\Models\Category::truncate();
            \App\Models\Jurisdiction::truncate();
            \App\Models\State::truncate();
            DB::statement("SET foreign_key_checks=1");
        }

        $this->call(add_states_and_categories::class);
        $this->call(generate_junk_projects_states::class);
    }
}
