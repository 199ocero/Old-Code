<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProjectCategory;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\Redirect;
use App\Http\Resources\ProjectCategoryResource;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $project = ProjectResource::collection(Project::latest()->get());
        return Inertia::render('Project/Index',compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = CategoryResource::collection(Category::latest()->get());
        return Inertia::render('Project/Create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>['required','min:3'],
            'description'=>['required','min:3'],
            'instruction'=>['required','min:3'],
            'url'=>['required','min:3'],
            'category'=>['required'],
        ]);
        $project = Project::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'instruction'=>$request->instruction,
            'url'=>$request->url,
        ]);
        $category = $request->category;
        foreach ($category as $key => $data) {
            ProjectCategory::create([
                'category_id'=> $data['id'],
                'project_id'=> $project->id,
            ]);
        }
        return Redirect::route('projects.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        
        $categoryId = ProjectCategory::where('project_id',$project->id)->get();
        $projectCategory = CategoryResource::collection(Category::latest()->findMany($categoryId->pluck('category_id')->toArray()));
        $category = CategoryResource::collection(Category::latest()->get());
        return Inertia::render('Project/Edit',[
            'project'=>$project,
            'projectCategory'=>$projectCategory,
            'category' =>$category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title'=>['required','min:3'],
            'description'=>['required','min:3'],
            'instruction'=>['required','min:3'],
            'url'=>['required','min:3'],
            'category'=>['required'],
        ]);
        $project->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'instruction'=>$request->instruction,
            'url'=>$request->url,
        ]);
        

        $category = $request->category;
        if($category){
            ProjectCategory::where('project_id',$project->id)->delete();
            foreach ($category as $key => $data) {
            ProjectCategory::create([
                'category_id'=> $data['id'],
                'project_id'=> $project->id,
            ]);
        }
        }
        

        return Redirect::route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        
        $project->delete();
        return Redirect::back();
    }
}
