<?php

namespace App\Http\Controllers;

use App\Applied_candidate;
use App\User;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allJobs = DB::table('jobs')
                   ->join('companys','jobs.company_id','companys.id')
                   ->select('companys.first_name','companys.last_name','companys.business_name','jobs.*')
                   ->paginate(5);

        return view('home')->with('allJobs',$allJobs);
    }

    public function view_job($job_id)
    {
        $viewJob = DB::table('jobs')
                   ->join('companys','jobs.company_id','companys.id')
                   ->select('companys.first_name','companys.last_name','companys.business_name','jobs.*')
                   ->where('jobs.id',$job_id)
                   ->first();

        return view('view_job')->with('viewJob',$viewJob);
    }

    public function apply_job(Request $request)
    {
        $user = User::find($request->user_id);

        if($user->resume)
        {
            $applied_candidate = new Applied_candidate;

            $applied_candidate->user_id = $request->user_id;
            $applied_candidate->job_id = $request->job_id;

            $applied_candidate->save();

            return redirect()->route('home')->with('apply_status','You Applied Successfully');
        }
        else{
            return redirect()->route('edit_profile')->with('apply_status','Please upload CV/Resume before apply!');
        }
    }

}
