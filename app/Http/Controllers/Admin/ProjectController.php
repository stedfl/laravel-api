<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['project_name'])) {
            $search_project = $_GET['project_name'];
            $projects = Project::where('name', 'like',"%$search_project%")->orderBy('id', 'desc')->paginate(10);
        } else {
            $projects = Project::orderBy('id', 'desc')->paginate(10);
        }

        $direction = 'desc';
        return view('admin.projects.index', compact('projects', 'direction'));
    }

    public function orderby($column, $direction) {
        $direction = $direction === 'desc' ? 'asc' : 'desc';
        $projects = Project::orderby($column, $direction)->paginate(10);

        return view('admin.projects.index', compact('projects', 'direction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $project_form = $request->all();
        $project_form['slug'] = Project::generateSlug($project_form['name']);
        if(array_key_exists('cover_image', $project_form)) {
            $project_form['image_original_name'] = $request->file('cover_image')->getClientOriginalName();
            $project_form['cover_image'] = Storage::put('uploads', $project_form['cover_image']);
        }
        $new_project = new Project();
        $new_project->fill($project_form);
        $new_project->save();

        return redirect()->route('admin.projects.show', $new_project);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $project = Project::find($project->id);

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $project_form = $request->all();
        if ($project_form['name'] != $project['name']) {
            $project_form['slug'] = Project::generateSlug($project_form['name']);
        } else {
            $project_form['slug'] = $project['slug'];
        }

        if(array_key_exists('cover_image', $project_form)) {
            if($project['cover_image']) {
                Storage::disk('public')->delete($project['cover_image']);
            }
            $project_form['image_original_name'] = $request->file('cover_image')->getClientOriginalName();
            $project_form['cover_image'] = Storage::put('uploads', $project_form['cover_image']);
        }

        $project->update($project_form);

        return redirect()->route('admin.projects.show', $project)->with('message', 'Progetto modificato correttamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if($project->cover_image) {
            Storage::disk('public')->delete($project->cover_image);
        }
         $project->delete();

        return redirect()->route('admin.projects.index')->with('is_deleted', "Il progetto <strong class=\"text-uppercase\"> $project->name </strong> è stato eliminato correttamente!");
    }
}
