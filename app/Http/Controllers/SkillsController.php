<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Str;



class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * @return Authenticated 
    */
    public function profileSkills() {
        $user = Auth::user();
        $developer = Auth::user()->developer;
        $skills = Skill::where('developer_id', $developer->id)->get();
        $totalSkills = $skills->count();
        return Inertia::render('Skills/Index', [
            'user' => $user,
            'developer' => $developer,
            'skills' => $skills,
            'totalSkills' => $totalSkills
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $user = Auth::user();
        if ($user == null || $request->name == null) {
            return redirect(route('profile.skills'));    
        }
        Skill::create([
            'id' => Str::uuid(),
            'developer_id' => $user->developer_id,
            'name' => $request->name,
            'description' => $request->description
        ]);
        return redirect(route('profile.skills'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $skill = Skill::find($id);
        $skill->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect(route('profile.skills'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $skill = Skill::find($id);
        $skill->delete();
        return redirect(route('profile.skills'));
        //
    }
}
