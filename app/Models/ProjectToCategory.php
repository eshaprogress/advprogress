<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectToCategory extends Model
{
    protected $table = 'projects_to_categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'project_id',
        'category_id',
    ];
}
