<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Konekt\Enum\Eloquent\CastsEnums;

class LegislationDetailMatrix extends Model
{
    use CastsEnums;

    protected $table = 'legislation_details_matrix';
    protected $primaryKey = 'id';

    protected $fillable = [
        'project_id',
        'state_id',
        'jurisdiction_id',
        'because_constitutional_amendment',
        'because_statute',
        'because_case_law',
        'because_executive_order',
        'source_of_law',
        'citation_source'
    ];

    protected $enums = [
        'source_of_law' => SourceOfLawEnum::class
    ];
}
