<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;




class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Inertia::render('Projects/Index');
    }

    /**
     * @return Athenticated
     */
    public function profileProjects() {
        $projects = Auth::user()->developer->projects->all();
        $totalProjects = count($projects);
        return Inertia::render('Projects/ProfileProjects', [
            'projects' => $projects,
            'totalProjects' => $totalProjects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $developer = Auth::user()->developer;
        // dd($developer);
        // ! VIEW Probably going to change to CREATE
        return Inertia::render('Projects/Edit', [
            'developer' => $developer
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $user = Auth::user();
        $project_image = '';
        if ($request->hasFile('project_image')){
            $project_image = $request->file('project_image')->store('images', 'public');
        }
        Project::create([
            'id' => Str::uuid(),
            'developer_id' => $user->developer_id,
            'title' => $request->title,
            // ! HERE END
            'description' => $request->description,
            'demo_link' => $request->demo_link,
            'repo_link' => $request->repo_link,
            'project_image' => $project_image,
        ]);
        return redirect(route('profile.projects'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return Inertia::render('Projects/Project');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $project = Project::find($id);
        // dd($project);
        return Inertia::render('Projects/Edit', [
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $user = Auth::user();
        // dd($request->project_image);
        $project = Project::find($id);
        $dataProject = $request->only(['title', 'description', 'demo_link', 'repo_link']);
        if ($request->hasFile('project_image')) {
            Storage::delete('public/'.$project->project_image);
            $dataProject['project_image'] = $request->file('project_image')->store('images', 'public');
        }

        $project->update($dataProject);
        return redirect(route('profile.projects'));
    }

    // ? CORRECT ONE [METHOD MUST BE POST]
    public function updateProject(Request $request, $id) {
        $project = Project::find($id);
        // dd($request);
        $dataProject = $request->only(['title', 'description', 'demo_link', 'repo_link']);
        if ($request->hasFile('project_image')) {
            Storage::delete('public/'.$project->project_image);
            $dataProject['project_image'] = $request->file('project_image')->store('images', 'public');
        }

        $project->update($dataProject);
        return redirect(route('profile.projects'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $project = Project::find($id);
        if ($project->project_image != null) {
            Storage::delete('public/'.$project->project_image);
        }
        $project->delete();
        return redirect(route('profile.projects'));
    }
}
