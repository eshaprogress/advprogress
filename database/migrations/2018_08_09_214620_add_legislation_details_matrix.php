<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLegislationDetailsMatrix extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legislation_details_matrix', function(Blueprint $t){
            $t->increments('id');
            $t->integer('project_id')->unsigned();
            $t->integer('state_id')->unsigned()->nullable();
            $t->integer('jurisdiction_id')->unsigned()->nullable();
            $t->boolean('because_constitutional_amendment')->default(0);
            $t->boolean('because_statute')->default(0);
            $t->boolean('because_case_law')->default(0);
            $t->boolean('because_executive_order')->default(0);
            $t->enum('source_of_law', [
                'statute',
                'constitutional_amendment',
                'executive_order',
                'case_law'
            ]);
            $t->text('citation_source');

            $t->index(['project_id','state_id','jurisdiction_id'],'ldm_pid_sid_jid_idx');
            $t->index('project_id','ldm_pid_idx');
            $t->index('state_id','ldm_sid_idx');
            $t->index('jurisdiction_id','ldm_jid_idx');
            $t->index('because_constitutional_amendment','ldm_bca_idx');
            $t->index('because_statute','ldm_bs_idx');
            $t->index('because_case_law','ldm_bcl_idx');
            $t->index('because_executive_order','ldm_beo_idx');
            $t->index('source_of_law','ldm_sol_idx');
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
        Schema::dropIfExists('legislation_details_matrix');
    }
}
