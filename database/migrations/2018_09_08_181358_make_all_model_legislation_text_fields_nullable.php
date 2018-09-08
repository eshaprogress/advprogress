<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeAllModelLegislationTextFieldsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('model_legislation', function(Blueprint $t)
        {
            // have to do it this way, model_legislation uses a enum, and because of this,
            // laravel using dbal fails, only work around is to manually modify this field via SQL directly.
            // read: https://github.com/laravel/framework/issues/1186#issuecomment-96634565
            DB::statement('ALTER TABLE model_legislation MODIFY title varchar(255)');
            DB::statement('ALTER TABLE model_legislation MODIFY text_body longtext');
            DB::statement('ALTER TABLE model_legislation MODIFY summary_text longtext');
            DB::statement('ALTER TABLE model_legislation MODIFY short_project_blurb varchar(255)');
            DB::statement('ALTER TABLE model_legislation MODIFY preamble text');
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
    }
}
