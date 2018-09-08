<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ModelLegislation;
use App\Models\Project;
use App\Serializers\CustomArraySerializer;
use App\Transformers\CategoryTransformer;
use App\Transformers\ModelLegislationTransformer;
use App\Transformers\ProjectTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class ProjectController extends Controller
{

    public function getCategories()
    {
        $categories = Category::all();

        $transformer = new CategoryTransformer();
        $transformedData = new Collection($categories, $transformer, 'categories');

        $manager = new Manager();
        $manager->setSerializer(new CustomArraySerializer());
        $data = $manager->createData($transformedData)->toArray();

        return response()->json($data);
    }

    public function getProjectsByCategoryId($categoryId)
    {
        $category = Category::locateId($categoryId)->first();

        $transformer = new ProjectTransformer();
        $transformer->setDefaultIncludes([]);
        $transformedData = new Collection($category->projects()->get(), $transformer, 'projects');
        $manager = new Manager();
        $manager->setSerializer(new CustomArraySerializer());
        $data = $manager->createData($transformedData)->toArray();
        return response()->json($data);
    }

    public function getFeaturedProjects()
    {
        $projects = Project::isFeatured()->get();
        $transformer = new ProjectTransformer();
        $transformer->setDefaultIncludes([]);
        $transformedData = new Collection($projects, $transformer, 'projects');
        $manager = new Manager();
        $manager->setSerializer(new CustomArraySerializer());
        $data = $manager->createData($transformedData)->toArray();
        return response()->json($data);
    }

    public function getProject($projectId)
    {
        $project = Project::locateId($projectId)->first();
        $transformer = new ProjectTransformer();
        $transformedData = new Item($project, $transformer, 'project');
        $manager = new Manager();
        $manager->setSerializer(new CustomArraySerializer());
        $data = $manager->createData($transformedData)->toArray();
        return response()->json($data);
    }
}
