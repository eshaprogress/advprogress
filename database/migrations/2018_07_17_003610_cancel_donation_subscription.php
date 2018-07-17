<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CancelDonationSubscription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("cancel_donation_subscription", function(Blueprint $t){
            $t->string('email', 120);
            $t->string('zip_code', strlen('00000-0000'));
            $t->uuid('code');
            $t->boolean('used');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cancel_donation_subscription');
    }
}
