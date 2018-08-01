<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProposedLegislation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposed_legislation', function(Blueprint $t){
            $t->increments('id');
            $t->integer('mleg_id');
            $t->longText('title_of_model_legislation');
            $t->longText('text_of_model_legislation');
            $t->string('state', 255);
            $t->string('type', 500);
            $t->string('display_file_name', 250);
            $t->longText('purpose');
            $t->longText('preamble');

            $t->index('state');
            $t->index('type');
            $t->index('display_file_name');
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
