<?php

namespace App\Http\Controllers;

use App\projects;
use App\projectCategory;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = projects::all();
        return view('projectcat')->with('projects',$projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = projectCategory::all();
        return view('admin.projects.create')
        ->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $this->validate($request, [
            'name' => 'required',
            'image' => 'image|nullable|max:1999',
        ]);

        //Handle Images Uploads
        if ($request->hasFile('image')) {
            //Get filename with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Getting file extension
            $extension = $request->file('image')->getCLientOriginalExtension();
            //Stored name
            $fileNameToStore = $filename . '_' . time() . '_.' . $extension;
            //Uploading Thumbnail

            //model->
            $request->file('image')->storeAs('public/project_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $category = new projects();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->project_category_id = $request->input('category_id');
        $category->imagePath = $fileNameToStore;
        $category->save();
        return redirect('/projects')->with('success', 'Project Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(projects $projects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(projects $projects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projects $projects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(projects $projects)
    {
        //
    }
}
