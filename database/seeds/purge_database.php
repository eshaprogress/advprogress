<?php

use Illuminate\Database\Seeder;

class purge_database extends Seeder
{
    /**
     * Run the database seeds.
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
    }
}
