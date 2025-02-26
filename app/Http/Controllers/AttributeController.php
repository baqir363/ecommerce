<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $limit = 10;
        $attributes = Attribute::paginate($limit);
        return view('attribute.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|min:3',
        ]);

        $Attribute = Attribute::create($validated);
        return redirect()->route('attribute.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attribute $Attribute)
    {
        //
    }

    public function values(Attribute $attribute)
    {
        return view('attribute.values', compact('attribute'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attribute $Attribute)
    {
        //
        return view('attribute.edit',compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attribute $Attribute)
    {
        //
        $validated = $request->validate([
            'name' => 'required|min:3',
        ]);

        $Attribute->name = $request->name;
        $Attribute->save();
        return redirect()->route('attribute.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attribute $Attribute)
    {
        //
        $Attribute->delete();
        return redirect()->route('attribute.index');
    }
}
