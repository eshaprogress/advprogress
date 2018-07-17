<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CancelDonationSubscription extends Model
{
    protected $table = 'cancel_donation_subscription';
    protected $primaryKey = 'id';

    protected $fillable = ['email','zip_code'];

}
