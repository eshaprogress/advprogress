<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrentLegislation extends Model
{
    /**
     *
     * table specific parameters
     *
     **/

    protected $table = 'current_legislation';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'title_of_model_legislation',
        'category',
        'text_of_model_legislation',
        'summary'
    ];
}
