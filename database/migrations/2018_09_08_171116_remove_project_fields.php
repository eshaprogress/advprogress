<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveProjectFields extends Migration
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
            $t->dropColumn('model_legislative_title');
            $t->dropColumn('model_legislative_text_body');
            $t->dropColumn('model_legislative_summary_text');
            $t->renameColumn('project_short_summary', 'short_summary');
            $t->renameColumn('project_long_description', 'long_description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
