<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrentLegislation extends Model
{
    protected $table = 'current_legislation';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title_of_existing_legislation',
        'citation',
        'text_of_existing_legislation',
        'summary_of_existing_legislation',
        'category',
        'jurisdiction',
        'state',
    ];
    public $timestamps = false;
}
