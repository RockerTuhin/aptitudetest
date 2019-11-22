<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:company');
    }

    public function create_job()
    {
    	return view('company.create_job');
    }

    public function post_job(Request $request)
    {
    	$job = new Job;
    	$job->company_id = $request->company_id;
    	$job->job_title = $request->job_title;
    	$job->job_description = $request->job_description;
    	$job->salary = $request->salary;
    	$job->location = $request->location;
    	$job->country = $request->country;

    	$job->save();

    	return redirect()->route('company_home')->with('status','Job Posted Successfully');
    }
}
