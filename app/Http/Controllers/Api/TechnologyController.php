<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return response()->json([
            'status' => 'success',
            'author' => 'gianluca',
            'result' => $technologies
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $technology = Technology::with('projects')->where('slug', $slug)->get();
        if ($technology) {
            return response()->json([
                'status' => 'success',
                'author' => 'gianluca',
                'result' => $technology
            ]);
        } else {
            return response()->json([
                'status' => 'failure',
                'author' => 'gianluca',
                'result' => 'Oops! This project does not exist'
            ]);
        }
    }
}
