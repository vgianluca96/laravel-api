<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderByDesc('id')->paginate(4);
        return response()->json([
            'status' => 'success',
            'author' => 'gianluca',
            'result' => $projects
        ]);
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->first();
        if ($project) {
            return response()->json([
                'status' => 'success',
                'author' => 'gianluca',
                'result' => $project
            ]);
        } else {
            return response()->json([
                'status' => 'failure',
                'author' => 'gianluca',
                'result' => 'Oops! This project does not exist'
            ]);
        }
    }

    public function latest()
    {
        $projects = Project::orderByDesc('id')->take(3)->get();
        dd($projects);
        return response()->json([
            'status' => 'success',
            'author' => 'gianluca',
            'result' => $projects
        ]);
    }
}
