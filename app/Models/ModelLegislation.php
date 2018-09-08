<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelLegislation extends Model
{
    use TestUUIDPermaLinkSlug;

    protected $table = 'model_legislation';
    protected $primaryKey = 'id';

    protected $fillable = [
        'project_id',
        'uuid',
        'title',
        'text_body',
        'preamble',
        'summary_text',
        'shore_project_blurb',
        'permalink_slug',
        'enable_permalink_slug',
        'resources',
        'is_featured',
        'img_card',
        'img_banner'
    ];
}
