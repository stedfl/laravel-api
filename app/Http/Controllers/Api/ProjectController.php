<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::with(['type', 'technologies'])->paginate(4);
        $technologies = Technology::all();
        $types = Type::all();
        return response()->json(compact('projects', 'technologies', 'types'));
    }

    public function show($slug) {
        $project = Project::where('slug', $slug)->with(['type', 'technologies'])->first();
        if($project->cover_image) {
            $project->cover_image = url('storage/' . $project->cover_image);
        } else {
            $project->cover_image = url('storage/uploads/placeholder-image.jpg');
        }

        return response()->json(compact('project'));
    }

    public function search() {
        $search = $_GET['search'];
        $projects = Project::where('name', 'like', "%$search%")->with(['type', 'technologies'])->get();
        return response()->json(compact('projects'));
    }
}
