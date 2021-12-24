<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\LoginCompanyRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class AuthenticatedSessionController extends Controller
{
    // * CONSTRUCTOR
    public function __construct() {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:company')->except('logout');
    }
    /**
     * Display the login view.
     *
     * @return \Inertia\Response
     */
    public function create() {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }
    
    /**
     * Display the login view for a company.
     * @return \Inertia\Response
     */
    public function createCompany() {
        return Inertia::render('Auth/LoginCompany', [
            'canResetPassword' => Route::has('company.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request) {
        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     *  @return POST-LOGIN_FOR_A_COMPANY
     */
    public function storeCompany(Request $request) { 
        $this->validate($request, [
            'company_name' => 'required',
            'password' => 'required',
        ]);
        
        if (Auth::guard('company')->attempt(['company_name' => $request->company_name, 'password' => $request->password]) ) {
            $request->session()->regenerate();
            return redirect(route('index'));
        }
        return back()->withInput($request->only('company_name', 'remember'));
        // $request->session()->regenerate();
        // return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
