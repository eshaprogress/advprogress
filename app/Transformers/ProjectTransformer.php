<?php

namespace App\Transformers;

use App\Models\Project;
use League\Fractal;

class ProjectTransformer extends Fractal\TransformerAbstract
{
    protected $availableIncludes = ['matrix','category'];
    protected $defaultIncludes = [
        'category',
        'matrix',
    ];

    public function transform(Project $project)
    {
        return [
            'id'=>$project->id,
            't'=>$project->title,
            'm_l_s_t'=>$project->model_legislative_summary_text,
            'm_l_t_b'=>$project->model_legislative_text_body,
            'r'=>json_decode($project->resources, true),
            'is_f'=>$project->is_featured,
            'img_c'=>$project->img_card,
            'img_bn'=>$project->img_banner
        ];
    }

    public function includeMatrix(Project $project)
    {
        $matrix = $project->matrix()->get();
        return $this->collection($matrix, new LegislationDetailsMatrixTransformer());
    }

    public function includeCategory(Project $project)
    {
        $category = $project->category()->first();
        return $this->item($category, new CategoryTransformer());
    }
}