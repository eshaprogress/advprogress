<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class Project extends Controller
{
    public function getCategories()
    {
        $categories = Category::all()->map(function($category)
        {
            return ['id'=>$category->id,'category'=>$category->category];
        })->toArray();
        return response()->json(['category'=>$categories]);
    }

    public function getProjectsByCategory($categoryId)
    {
        $categories = Category::all()->map(function($category)
        {
            return ['id'=>$category->id,'category'=>$category->category];
        })->toArray();
        return response()->json(['category'=>$categories]);
    }
}
