<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Functions\Helper;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();

        return view('admin.types.index', compact('types'));
    }

    public function typeProjects()
    {
        $types= Type::all();


        return view('admin.types.typeProjects',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exist = Type::where('name', $request->name)->first();

        if ($exist) {
            return redirect()->route('admin.types.index')->with('error', 'Tipo già esistente');
        } else {
            $new_type = new Type();
            $new_type->name = $request->name;
            $new_type->slug = Helper::generateSlug($new_type->name, new Type());
            $new_type->save();

            return redirect()->route('admin.types.index')->with('success', 'Tipo creato con successo');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $valData = $request->validate([
            'name' => 'required|min:1|max:20'
        ], [
            'name.required' => 'Il campo name è obbligatorio',
            'name.min' => 'Il campo name deve contenere almeno un carattere',
            'name.max' => 'Il campo name non può contenere più di 20 caratteri',
        ]);

        $exist = Type::where('name', $request->name)->first();

        if ($exist) {
            return redirect()->route('admin.types.index')->with('error', 'Tipo già esistente');
        } else {
            $valData['slug'] = Helper::generateSlug($request->name, new Type());
            $type->update($valData);

            return redirect()->route('admin.types.index')->with('success', 'Tipo modificato con successo');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('admin.types.index')->with('success', 'Tipo eliminato con successo');
    }
}
