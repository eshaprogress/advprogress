<?php

namespace App\Transformers;

use App\Models\ModelLegislation;
use League\Fractal;

class ModelLegislationTransformer extends Fractal\TransformerAbstract
{
    public function transform(ModelLegislation $modelLegislation)
    {
        $tmp = [
            't'     =>$modelLegislation->title,
            's_p_b' =>$modelLegislation->short_project_blurb,

            // all intended as html fields
            'pre'   =>$modelLegislation->preamble,
            's_t'   =>$modelLegislation->summary_text,
            't_b'   =>$modelLegislation->text_body
        ];

        $field = [];
        if($modelLegislation->enable_permalink_slug)
            $field['id'] = $modelLegislation->permalink_slug;
        else
            $field['id'] = $modelLegislation->uuid;

        return $field + $tmp;
    }
}