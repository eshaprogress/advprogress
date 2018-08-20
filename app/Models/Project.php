<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'model_legislative_text_body',
        'model_legislative_summary_text',
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
