<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Models\Project;

class TechnologiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technology.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.technology.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTechnologyRequest $request)
    {
        $val_data = $request->validated();
        $tech_slug = Project::generateSlug($val_data['name  ']);
        $val_data['slug'] = $tech_slug;
        $newTechnology = Technology::create($val_data);
        return to_route('technology.index')->with('message', "$newTechnology->name added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Technology  $Technology
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $Technology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Technology  $Technology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $Technology)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Technology  $Technology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $Technology)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technology  $Technology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $Technology)
    {
        //
    }
}
