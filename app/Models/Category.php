<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use TestUUIDPermaLinkSlug;

    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['category','uuid'];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'projects_to_categories');
    }
}
