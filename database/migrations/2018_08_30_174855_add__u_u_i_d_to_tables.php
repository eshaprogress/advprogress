<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUUIDToTables extends Migration
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
            $t->uuid('uuid');
            $t->string('short_directory_blurb');
            $t->string('permalink_slug')->nullable();
            $t->boolean('enable_permalink_slug')->default(0);
        });

        Schema::table('categories', function(Blueprint $t)
        {
            $t->uuid('uuid');
            $t->boolean('permalink_slug')->default(0);
            $t->boolean('enable_permalink_slug')->nullable();
        });

        \DB::unprepared(\DB::raw("
            UPDATE projects SET uuid = (SELECT uuid());
        "));

        \DB::unprepared(\DB::raw("
            UPDATE categories SET uuid = (SELECT uuid());
        "));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function(Blueprint $t)
        {
            $t->dropColumn('uuid');
            $t->dropColumn('short_directory_blurb');
            $t->dropColumn('enable_permalink_slug');
            $t->dropColumn('permalink_slug');
        });

        Schema::table('categories', function(Blueprint $t)
        {
            $t->dropColumn('uuid');
            $t->dropColumn('enable_permalink_slug');
            $t->dropColumn('permalink_slug');
        });
    }
}
