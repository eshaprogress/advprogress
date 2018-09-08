<?php

namespace App\Transformers;

use App\Models\Project;
use League\Fractal;

class ProjectTransformer extends Fractal\TransformerAbstract
{
    protected $availableIncludes = ['matrix','category','model_legislation'];
    protected $defaultIncludes = [
        'category',
        'matrix',
        'model_legislation'
    ];

    public function transform(Project $project)
    {
        $tmp = [
            't'       =>$project->title,
            's_d_b'   =>$project->short_directory_blurb,


            // all intended as html fields

            's_s'     =>$project->short_summary,
            'l_d'     =>$project->long_description,


            'r'       =>json_decode($project->resources, true),
            'is_f'    =>$project->is_featured,
            'img_c'   =>$project->img_card,
            'img_bn'  =>$project->img_banner
        ];

        $field = [];
        if($project->enable_permalink_slug)
            $field['id'] = $project->permalink_slug;
        else
            $field['id'] = $project->uuid;

        return $field + $tmp;
    }

    public function includeMatrix(Project $project)
    {
        $matrix = $project->matrix()->get();
        return $this->collection($matrix, new LegislationDetailsMatrixTransformer());
    }

    public function includeModelLegislation(Project $project)
    {
        $model_legislation = $project->model_legislation()->get();
        return $this->collection($model_legislation, new ModelLegislationTransformer());
    }

    public function includeCategory(Project $project)
    {
        $category = $project->category()->first();
        return $this->item($category, new CategoryTransformer());
    }
}