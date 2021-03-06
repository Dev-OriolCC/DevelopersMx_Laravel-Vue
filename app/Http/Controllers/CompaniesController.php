<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Developer;
use App\Models\Job;
use App\Models\TypeDeveloper;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;

class CompaniesController extends Controller
{
    public function companyDashboard() {
        //dd('This is the Companies Dashboard');
        $company = Auth::user();
        $jobs = $company->jobs();
        if ($jobs->count() > 0) {
            $roles = Job::where('company_id', $company->id)->pluck('type_id')->toArray();
            $developers = Developer::whereIn('type_id', $roles)->get();
        } else {
            $developers = Developer::all();
        }
        return Inertia::render('Companies/Company', [
            'company' => $company,
            'developers' => $developers->load(['user', 'type_developer'])
        ]);
    }

    public function companyProfile() {
        $company = Auth::user();
        
        return Inertia::render('Companies/Profile', [
            'company' => $company
        ]);
    }

    public function jobsDashboard() {
        $company = Auth::user();
        $companyID = $company->id;
        $jobs = Job::where('company_id', $companyID)->get();

        return Inertia::render('Jobs/CompanyJobs', [
            'company' => $company,
            'jobs' => $jobs->load('type_developer'),
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

    public function jobEdit($id) {
        $job = Job::find($id);
        $levels = ['Trainee', 'Junior', 'Semi Senior', 'Senior'];
        return Inertia::render('Jobs/Edit', [
            'company' => Auth::user(),
            'roles' => TypeDeveloper::all(),
            'levels' => $levels,
            'job' => $job->load('type_developer'),
        ]);
    }

    public function jobUpdate(Request $request, $id) {
        $job = Job::find($id);
        $jobData = $request->only(['type_id', 'title', 'description', 'location', 'level', 'schedule',
            'benefit_flexible', 'benefit_dress', 'benefit_medical', 'benefit_vacation'
        ]);
        try {
            $job->update($jobData);
        } catch (\Throwable $th) {
            dd($th);
        }
        return redirect(route('companies.jobs'));
    }

    public function jobDelete($id) {
        $job = Job::find($id);
        $job->delete();

        return redirect(route('companies.jobs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Inertia::render('Companies/Index', [
            'user' => Auth::user(),
            'companies' => Company::all(),
            // 
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
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
    public function edit($id) {
        $company = Auth::user();
        return Inertia::render('Companies/Edit', [
            'company' => $company,
        ]);
    }

    public function companyUpdate(Request $request, $id) {
        $company = Company::find($id);
        $companyData = $request->only(['name', 'description', 'social_email', 'social_linkedin', 'location']);
        if ($request->hasFile('company_image')) {
            Storage::delete('public/'.$company->company_image);
            $companyData['company_image'] = $request->file('company_image')
                ->store('images/profiles', 'company_image');
        }
        $company->update($companyData);
        return redirect(route('company.profile'));
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
