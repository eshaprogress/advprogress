<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Serializers\CustomArraySerializer;
use App\Transformers\ProjectTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;

class ProjectController extends Controller
{

    public function getCategories()
    {
        $categories = Category::all()->map(function($category)
        {
            return ['id'=>$category->id,'category'=>$category->category];
        })->toArray();
        return response()->json(['categories'=>$categories]);
    }

    public function getProjectsByCategoryId($categoryId)
    {
        $category = Category::whereId($categoryId)->with('projects')->first();
        $projects = $category->toArray()['projects'];
        return response()->json(['projects'=>$projects]);
    }

    public function getFeaturedProjects()
    {
        $project = Project::isFeatured()->get();
        return response()->json(['projects'=>$project]);
    }

    public function getProject($projectId)
    {
        $project = Project::whereId($projectId)->first();

        $transformer = new ProjectTransformer();
        $transformedData = new Item($project, $transformer, 'project');
        $manager = new Manager();
        $manager->setSerializer(new CustomArraySerializer());
        $data = $manager->createData($transformedData)->toArray();
        return response()->json($data);
    }
}
