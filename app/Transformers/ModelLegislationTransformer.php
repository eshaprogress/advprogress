<?php

namespace App\Transformers;

use App\Models\ModelLegislation;
use League\Fractal;

class ModelLegislationTransformer extends Fractal\TransformerAbstract
{
    private static $_parsedown = null;

    public function __construct()
    {
        if(self::$_parsedown === null)
            self::$_parsedown = new \Parsedown();
    }

    public function transform(ModelLegislation $modelLegislation)
    {
        $tmp = [
            't'     =>$modelLegislation->title,
            's_p_b' =>$modelLegislation->short_project_blurb,
            'pre'   =>self::$_parsedown->text($modelLegislation->preamble),
            's_t'   =>self::$_parsedown->text($modelLegislation->summary_text),
            't_b'   =>self::$_parsedown->text($modelLegislation->text_body)
        ];

        $field = [];
        if($modelLegislation->enable_permalink_slug)
            $field['id'] = $modelLegislation->permalink_slug;
        else
            $field['id'] = $modelLegislation->uuid;

        return $field + $tmp;
    }
}