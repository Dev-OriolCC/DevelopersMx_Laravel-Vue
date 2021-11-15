<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Skill;
use App\Models\TypeDeveloper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class DevelopersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * * Returns all developers
     * * Not Authenticated
     */
    public function index()
    {
        return Inertia::render('Developers/Index', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }

    public function profileDeveloper() {
        $user = Auth::user();
        $developer = Auth::user()->developer;
        $type_developer = '';
        if ($developer->type_id != null) {
            $type_developer = TypeDeveloper::find($developer->type_id);
        }
        return Inertia::render('Dashboard', [
            'user' => $user,
            'developer' => $developer,
            'type_developer' => $type_developer,
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return Inertia::render('Developers/Developer');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::find($id);
        $developer = Developer::find($user->developer_id);
        $developer_skills = Skill::where('developer_id', $developer->id)->get();
        $type_developer = TypeDeveloper::find($developer->type_id);
        // dd($developer_skills);
        $developerTypes = TypeDeveloper::all();

        return Inertia::render('Developers/Edit', [
            'User' => $user,
            'Developer' => $developer,
            'Developer_Skills' => $developer_skills,
            'Type_Developer' => $type_developer,
            'DeveloperTypes' => $developerTypes,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $user = User::find($id);
        $developer = Developer::find($user->developer_id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        $developer->update([
            'location' => $request->location,
            'experience' => $request->experience,
            'type_id' => $request->type_id,
            'social_github' => $request->social_github,
            'social_twitter' => $request->social_twitter,
            // 'social_email' => $request->social_email,
            'bio' => $request->bio,
            'description' => $request->description,
        ]);

        return redirect(route('dashboard'));
        
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
