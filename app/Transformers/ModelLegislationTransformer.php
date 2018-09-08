<?php

namespace App\Transformers;

use App\Models\ModelLegislation;
use League\Fractal;

class ModelLegislationTransformer extends Fractal\TransformerAbstract
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

    public function transform(ModelLegislation $project)
    {
        $tmp = [
            't'        =>$project->title,
            's_d_b'    =>$project->short_project_blurb,
            'preamble' =>$project->preamble,
            's_t'      =>self::$_parsedown->text($project->summary_text),
            't_b'      =>self::$_parsedown->text($project->text_body),
            'r'        =>json_decode($project->resources, true),
            'is_f'     =>$project->is_featured,
            'img_c'    =>$project->img_card,
            'img_bn'   =>$project->img_banner
        ];

        $field = [];
        if($project->enable_permalink_slug)
            $field['id'] = $project->permalink_slug;
        else
            $field['id'] = $project->uuid;

        return $field + $tmp;
    }
}