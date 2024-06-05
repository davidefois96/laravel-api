<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;

class PageController extends Controller
{
    public function index()
    {
        $projects=Project::with('type','technologies')->paginate(10);
        return response()->json($projects);
    }
    public function getTechnologies()
    {
        $technologies=Technology::all();
        return response()->json($technologies);
    }
    public function getTypes()
    {
        $types=Type::all();
        return response()->json($types);
    }
    public function getProjectBySlug($slug)
    {
        $project=Project::with('type','technologies')->where('slug',$slug)->first();
        if ($project) {
            $success=true;
            if ($project->image) {
                $project->image=asset('http://127.0.0.1:8000/storage/'.$project->image);
            }else {
                $project->image=asset('http://127.0.0.1:8000/storage/uploads/placeholder.png');
                $project->image_original_name='no image';

            }
        } else {
            $success=false;
        }

        return response()->json(compact('success','project'));

    }

}

