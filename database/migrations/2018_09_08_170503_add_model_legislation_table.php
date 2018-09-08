<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddModelLegislationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_legislation', function(Blueprint $t)
        {
            $t->increments('id');
            $t->integer('project_id')->unsigned();
            $t->uuid('uuid');
            $t->string('title');
            $t->longText('text_body');
            $t->longText('summary_text');
            $t->string('short_project_blurb');
            $t->string('permalink_slug')->nullable();
            $t->boolean('enable_permalink_slug')->default(0);
            $t->enum('type', [
                'statute',
                'constitutional_amendment',
                'executive_order'
            ]);
            $t->index('project_id','ml_project_id_idx');
            $t->index('type','ml_type_idx');
            $t->index('permalink_slug','ml_permalink_slug_idx');
            $t->index('enable_permalink_slug','ml_enable_permalink_slug_idx');
            $t->foreign('project_id')->references('id')->on('projects');
            $t->timestamps();
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
