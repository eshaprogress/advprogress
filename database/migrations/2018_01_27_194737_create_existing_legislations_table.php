<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExistingLegislationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('existing_legislations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_of_existing_legislation');
            $table->string('citation', 128)->unique();
            $table->longtext('text_of_existing_legislation');
            $table->mediumtext('summary_of_existing_legislation');
            $table->integer('category')->unsigned();
            $table->integer('city')->unsigned();
            $table->integer('state')->unsigned();
            $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('city')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('state')->references('id')->on('states')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('existing_legislations');
    }
}
