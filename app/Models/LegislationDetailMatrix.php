<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegislationDetailMatrix extends Model
{
    protected $table = 'legislation_detail_matrix';
    protected $primaryKey = 'id';
    protected $fillable = [
        'project_id',
        'state_id',
        'jurisdiction_id',
        'because_constitutional_amendment',
        'because_statue',
        'because_case_law',
        'because_executive_order',
        'source_of_law',
        'citation_source'
    ];
}
