<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;


class DashboardController extends Controller
{
   public function index(){

    $projects_number=Project::count();
    $last_project=Project::orderByDesc('id')->first();

    return view('admin.home',compact('projects_number','last_project'));
   }
}
