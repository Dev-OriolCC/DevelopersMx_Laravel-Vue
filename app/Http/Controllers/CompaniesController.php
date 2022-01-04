<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\TypeDeveloper;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class CompaniesController extends Controller
{
    public function companyDashboard() {
        //dd('This is the Companies Dashboard');
        $company = Auth::user();
        return Inertia::render('Companies/Company', [
            'company' => $company
        ]);
    }

    public function jobsDashboard() {
        $company = Auth::user();
        $companyID = $company->id;
        $jobs = Job::where('company_id', $companyID)->get();

        return Inertia::render('Jobs/CompanyJobs', [
            'company' => $company,
            'jobs' => $jobs
        ]);
    }

    public function jobCreate() {
        $levels = ['Trainee', 'Junior', 'Semi Senior', 'Senior'];
        return Inertia::render('Jobs/Edit', [
            'company' => Auth::user(),
            'roles' => TypeDeveloper::all(),
            'levels' => $levels
        ]);
    }

    public function jobStore(Request $request) { 
        $company_id = Auth::user()->id;
        try {
            Job::create([
                'id' => Str::uuid(),
                'company_id' => $company_id,
                'type_id' => $request->type_id,
                
                'title' => $request->title,
                'description' => $request->description,
                'location' => $request->location,
                'level' => $request->level,
                'schedule' => $request->schedule,
                'benefit_flexible' => $request->benefit_flexible,
                'benefit_dress' => $request->benefit_dress,
                'benefit_medical' => $request->benefit_medical,
                'benefit_vacation' => $request->benefit_vacation,
            ]);
        } catch (\Throwable $th) {
            // Error Message
            dd($th);
        }
        return redirect(route('companies.jobs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Inertia::render('Companies/Index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
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
        return Inertia::render('Companies/Company');
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
    public function update(Request $request, $id)
    {
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
