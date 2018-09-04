<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugIndexes extends Migration
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
            $t->index('permalink_slug', 'p_permalink_slug_idx');
            $t->index('enable_permalink_slug', 'p_enable_permalink_slug_idx');
        });

        Schema::table('categories', function(Blueprint $t)
        {
            $t->index('permalink_slug', 'c_permalink_slug_idx');
            $t->index('enable_permalink_slug', 'c_enable_permalink_slug_idx');
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
            $t->dropIndex('p_permalink_slug_idx');
            $t->dropIndex('p_enable_permalink_slug_idx');
        });

        Schema::table('categories', function(Blueprint $t)
        {
            $t->dropIndex('c_permalink_slug_idx');
            $t->dropIndex('c_enable_permalink_slug_idx');
        });
    }
}
