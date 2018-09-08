<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use TestUUIDPermaLinkSlug;

    protected $table = 'projects';
    protected $primaryKey = 'id';

    protected $fillable = [
        'uuid',
        'title',
        'shore_directory_blurb',
        'short_summary',
        'long_description',
        'permalink_slug',
        'enable_permalink_slug',
        'resources',
        'is_featured',
        'img_card',
        'img_banner'
    ];

    public function scopeIsFeatured($query)
    {
        return $query->where('is_featured', '=', 1);
    }

    public function category()
    {
        return $this->belongsToMany(Category::class, 'projects_to_categories');
    }

    public function matrix()
    {
        return $this->hasMany(LegislationDetailMatrix::class);
    }
}