<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Konekt\Enum\Eloquent\CastsEnums;

class ModelLegislation extends Model
{
    use TestUUIDPermaLinkSlug;

    use CastsEnums;

    protected $table = 'model_legislation';
    protected $primaryKey = 'id';

    protected $fillable = [
        'project_id',
        'uuid',
        'title',
        'type',
        'text_body',
        'preamble',
        'summary_text',
        'shore_project_blurb',
        'permalink_slug',
        'enable_permalink_slug'
    ];

    protected $enums = [
        'type' => SourceOfLawEnum::class
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
