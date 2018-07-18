<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelLegislation extends Model
{
    /**
     *
     * table specific parameters
     *
     **/

    protected $table = 'model_legislations';
    protected $primaryKey = 'mleg_id';
    public $timestamps = false;
    protected $fillable = [
        'title_of_model_legislation',
        'category',
        'text_of_model_legislation',
        'summary'
    ];
}
