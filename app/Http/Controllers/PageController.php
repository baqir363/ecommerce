<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $limit = 10;
        $pages = Page::paginate($limit);
        return view('page.index', compact('limit', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            "name" => "required",
            "slug" => "required",
            "content" => "required",
        ]);

        $page = Page::create($validated);
        return redirect(route('page.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        //
    }
}
