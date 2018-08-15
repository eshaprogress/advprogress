<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImgUrlsToProjects extends Migration
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
            $t->string('img_card')->nullable();
            $t->string('img_banner')->nullable();
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
            $t->dropColumn('img_card');
            $t->dropColumn('img_banner');
        });
    }
}
