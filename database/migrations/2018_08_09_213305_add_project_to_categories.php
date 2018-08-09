<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectToCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_to_categories', function(Blueprint $t){
            $t->increments('id');
            $t->integer('project_id')->unsigned();
            $t->integer('category_id')->unsigned();
            $t->foreign('project_id')->references('id')->on('projects');
            $t->foreign('category_id')->references('id')->on('categories');
            $t->index(['project_id','category_id']);
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
        Schema::dropIfExists('projects_to_categories');
    }
}
