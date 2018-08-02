<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReferentialLegislationKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proposed_legislation', function(Blueprint $t)
        {
//            $t->renameColumn('current_legislation_id', 'mleg_id');
            $t->renameColumn('mleg_id', 'current_legislation_id');
        });

        Schema::table('proposed_legislation', function(Blueprint $t)
        {
            $t->integer('current_legislation_id')->unsigned()->change();
        });

        Schema::table('proposed_legislation', function(Blueprint $t)
        {
            $t->foreign('current_legislation_id')->references('id')->on('current_legislation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proposed_legislation', function(Blueprint $t){
            $t->renameColumn('current_legislation_id', 'mleg_id');
        });
    }
}
