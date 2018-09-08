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

    private static $_parsedown = null;

    public function __construct()
    {
        if(self::$_parsedown === null)
            self::$_parsedown = new \Parsedown();
    }

    public function transform(Project $project)
    {
        $tmp = [
            't'       =>$project->title,
            's_d_b'   =>self::$_parsedown->text($project->short_directory_blurb),
            'p_s_s'   =>self::$_parsedown->text($project->short_summary),
            'p_l_d'   =>self::$_parsedown->text($project->long_description),
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

    public function includeCategory(Project $project)
    {
        $category = $project->category()->first();
        return $this->item($category, new CategoryTransformer());
    }
}