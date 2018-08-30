<?php

namespace App\Transformers;

use App\Models\Category;
use League\Fractal;

class CategoryTransformer extends Fractal\TransformerAbstract
{
    public function transform(Category $category)
    {
        $tmp = [
            'id'=>$category->uuid,
            'category'=>$category->category
        ];

        $field = [];
        if($category->enable_permalink_slug)
            $field['id'] = $category->permalink_slug;
        else
            $field['id'] = $category->uuid;

        return $field + $tmp;

    }

}