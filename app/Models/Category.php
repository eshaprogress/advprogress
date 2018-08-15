<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['category'];

    public function projects() {
        return $this->belongsToMany(Project::class, 'projects_to_categories', 'category_id', 'project_id');
    }
}
