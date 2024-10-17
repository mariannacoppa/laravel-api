<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::with('type', 'technologies')->paginate(6);
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show($slug){
        // lo slug identifica la pagina del frontoffice per i motori di ricerca. Non esistono due progetti con lo stesso titolo né con lo stesso slug
        // first() restituisce il primo elemento di un array, in questo caso il titolo. Get restituisce un array di array associtivi
        $project = Project::with('type', 'technologies')->where('slug', $slug)->first();

        if($project){
            return response()->json([
                'success' => true,
                'results' => $project
            ]);
        }

        return response()->json([
            'success' => false
        ]);
    }
}
