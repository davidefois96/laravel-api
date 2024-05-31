<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;
use App\Functions\Helper;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies=Technology::all();

        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exist=Technology::where('name',$request->name)->first();

        if ($exist) {
           return redirect()->route('admin.technologies.index')->with('error', 'tecnologia già esistente');
        } else {
            $new_technology= new Technology();
            $new_technology->name=$request->name;
            $new_technology->slug=Helper::generateSlug($new_technology->name, new Technology());
            $new_technology->save();

            return redirect()->route('admin.technologies.index')->with('success', 'tecnologia creata con successo');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {

        $valData= $request->validate([
            'name' => 'required|min:1|max:20'

        ],[
            'name.required' => 'il campo name è obbligatorio',
            'name.min' => 'il campo name deve contenere almeno un carattere',
            'name.max' => 'il campo name non può contenere più di 20 caratteri',


        ]);

        $exist=Technology::where('name',$request->name)->first();

        if ($exist) {
           return redirect()->route('admin.technologies.index')->with('error', 'tecnologia già esistente');
        } else {

            $valData['slug']=Helper::generateSlug($request->name, new Technology());
            $technology->update($valData);

            return redirect()->route('admin.technologies.index')->with('success', 'tecnologia modificata con successo');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return redirect()->route('admin.technologies.index')->with('success', 'tecnologia eliminata con successo');
    }
}
