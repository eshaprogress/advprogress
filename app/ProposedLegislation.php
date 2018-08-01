<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposedLegislation extends Model
{
    protected $table = 'proposed_legislation';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
