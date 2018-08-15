<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsFeaturedToProjects extends Migration
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
            $t->boolean('is_featured')->default(0);
            $t->index('is_featured', 'projects_is_featured_index');
        });
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
            $t->dropIndex('projects_is_featured_index');
        });

        Schema::table('projects', function(Blueprint $t)
        {
            $t->dropColumn('is_featured');
        });
    }
}
