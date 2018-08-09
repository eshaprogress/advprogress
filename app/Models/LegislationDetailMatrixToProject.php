<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegislationDetailMatrixToProject extends Model
{
    protected $table = 'legislation_details_matrix_to_projects';
    protected $primaryKey = 'id';

    protected $fillable = [
        'project_id',
        'legislation_details_matrix_id'
    ];
}
