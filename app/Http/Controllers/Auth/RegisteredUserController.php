<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Developer;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Illuminate\Support\Str;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return Inertia::render('Auth/Register');
    }

    public function createCompany() {
        return Inertia::render('Auth/RegisterCompany');
    }


    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $developer = Developer::create([
            'id' => Str::uuid(),
        ]);
        // dd($developer);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'developer_id' => $developer->id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // return redirect(route('developers.edit', $user->id));
        return redirect(RouteServiceProvider::HOME);
    }

    public function storeCompany(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'company_name' => 'required|string|max:255|unique:companies',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $company = Company::create([
            'id' => Str::uuid(),
            'name' => $request->name,
            'company_name' => $request->company_name,
            'password' => Hash::make($request->password),
        ]);
        
        event(new Registered($company));
        return redirect(route('login.company'));

    }

}
