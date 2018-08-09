<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForiegnKeyRelationsToLegislationDetailsMatrix extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('legislation_details_matrix', function(Blueprint $t){
            $t->foreign('project_id','ldm_pid_foreign_idx')->references('id')->on('projects');
            $t->foreign('state_id','ldm_sid_foreign_idx')->references('id')->on('states');
            $t->foreign('jurisdiction_id','ldm_jid_foreign_idx')->references('id')->on('jurisdictions');
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
        Schema::table('legislation_details_matrix', function(Blueprint $t){
            $t->dropForeign('ldm_pid_foreign_idx');
            $t->dropForeign('ldm_sid_foreign_idx');
            $t->dropForeign('ldm_jid_foreign_idx');
        });
    }
}
