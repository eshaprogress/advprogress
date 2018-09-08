<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeAllProjectTextFieldsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function(Blueprint $t)
        {
            $t->string('title')->nullable()->change();
//            $t->text('long_description')->nullable()->change();
//            $t->text('short_summary')->nullable()->change();
            $t->string('short_directory_blurb')->nullable()->change();
        });

//        Schema::table('model_legislation', function(Blueprint $t)
//        {
//            $t->string('title')->nullable()->change();
//            $t->longText('text_body')->nullable()->change();
//            $t->longText('summary_text')->nullable()->change();
//            $t->string('short_project_blurb')->nullable()->change();
//        });
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
