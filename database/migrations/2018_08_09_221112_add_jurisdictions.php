<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJurisdictions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurisdictions', function(Blueprint $t)
        {
            $t->increments('id');
            $t->integer('state_id')->unsigned()->nullable();
            $t->enum('type',[
                'townships',
                'city',
                'county',
                'state',
                'federal'
            ]);
            $t->mediumText('name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurisdictions');
    }
}
