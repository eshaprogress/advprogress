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
            $this->call(purge_database::class);
            $this->call(add_states_and_categories::class);
            $this->call(generate_junk_projects_states::class);
        }
    }
}
