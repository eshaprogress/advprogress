<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexesToUuids extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function(Blueprint $t){
            $t->index('uuid', 'p_uuid_idx');
        });

        Schema::table('categories', function(Blueprint $t){
            $t->index('uuid', 'c_uuid_idx');
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
            $t->dropIndex('p_uuid_idx');
        });

        Schema::table('categories', function(Blueprint $t)
        {
            $t->dropIndex('c_uuid_idx');
        });
    }
}
