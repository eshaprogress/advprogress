<?php

namespace App\Transformers;

use App\Models\Category;
use League\Fractal;

class CategoryTransformer extends Fractal\TransformerAbstract
{
    public function transform(Category $category)
    {
        return [
            'id'=>$category->id,
            'category'=>$category->category
        ];
    }

}