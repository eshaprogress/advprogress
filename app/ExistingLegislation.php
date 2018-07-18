<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExistingLegislation extends Model
{
    /**
     *
     * table specific parameters
     *
     **/

    protected $table = 'existing_legislations';
    protected $fillable = [
        'title_of_existing_legislation',
        'citation',
        'text_of_existing_legislation',
        'summary_of_existing_legislation',
        'category',
        'city',
        'state'
    ];
}
