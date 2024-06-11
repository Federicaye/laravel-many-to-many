<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Technology;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!empty($request->query('search-cat'))) {
            $category = $request->query('search-cat');
            $projects = Project::where('category_id', $category)->get();
        } else {
            $projects = Project::all();
        }

      $technologies = Technology::all();
      $categories = Category::all();
    
        return view('admin.projects.index', compact('projects', 'categories', 'technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('categories', 'technologies'));

       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->validated();
        $form_data['slug'] = Project::generateSlug($form_data['name']);
       
        if ($request->hasFile('img')) {
         
            $path = Storage::put('img', $request->img);
            
            $form_data['img'] = $path;
           
        }

        $newProject = Project::create($form_data);
        if ($request->has('technologies')){
            $newProject->technologies()->attach($request->technologies);
        }
        
        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $categories = Category::all();
        return view('admin.projects.create', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $form_data= $request->all();
        if ($project->name !== $form_data['name']) {
            $form_data['slug'] = Project::generateSlug($form_data['name']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->img) {
            Storage::delete($project->img);
        }
        $project->delete();
        return redirect()->route('admin.project.index')->with('message', $project->name . ' è stato eliminato');
    }
}
