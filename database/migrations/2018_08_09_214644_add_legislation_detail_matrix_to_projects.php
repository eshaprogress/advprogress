<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLegislationDetailMatrixToProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legislation_details_matrix_to_projects', function(Blueprint $t){
            $t->increments('id');
            $t->integer('project_id')->unsigned();
            $t->integer('legislation_details_matrix_id')->unsigned();
            $t->foreign('project_id','ldm2p_pid_foreign_idx')->references('id')->on('projects');
            $t->foreign('legislation_details_matrix_id', 'ldm2p_ldmid_foreign_idx')->references('id')->on('legislation_details_matrix');
            $t->index(['project_id','legislation_details_matrix_id'], 'ldm2p_pid_ldmid_idx');
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
        Schema::dropIfExists('legislation_details_matrix_to_projects');
    }
}
