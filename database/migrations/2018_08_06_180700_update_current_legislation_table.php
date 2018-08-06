<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCurrentLegislationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('current_legislation', function(Blueprint $t)
        {
            $t->dropForeign('existing_legislations_city_foreign');
        });

        Schema::table('current_legislation', function(Blueprint $t)
        {
            $t->dropColumn('city');
            $t->json('jurisdiction');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
