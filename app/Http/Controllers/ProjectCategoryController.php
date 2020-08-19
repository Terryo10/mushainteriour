<?php

namespace App\Http\Controllers;

use App\projectCategory;
use Illuminate\Http\Request;
use App\projects;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectcat= projectCategory::all();
        return view('admin.projectcategory.index')
        ->with('projectcat', $projectcat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projectcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new projectCategory();
        $category->name = $request->input('name');
        $category->save();

        return redirect('/projects_cat')->with('success','category saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\projectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projects = projects::where('project_category_id','=',$id)->get();
        return view('projectcat')->with('projects',$projects);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\projectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(projectCategory $projectCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\projectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projectCategory $projectCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\projectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(projectCategory $projectCategory)
    {
        //
    }
}
