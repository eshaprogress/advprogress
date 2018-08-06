<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposedLegislation extends Model
{
    protected $table = 'proposed_legislation';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title_of_model_legislation',
        'text_of_model_legislation',
        'state',
        'type',
        'display_file_name',
        'purpose',
        'preamble'
    ];

    public $timestamps = false;
}
