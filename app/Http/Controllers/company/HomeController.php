<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:company');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $applied_candidates = DB::table('applied_candidates')
                              ->join('users','applied_candidates.user_id','users.id')
                              ->join('jobs','applied_candidates.job_id','jobs.id')
                              ->where('jobs.company_id',Auth::user()->id)
                              ->paginate(5);

        return view('company.home')->with('appliedCandidates',$applied_candidates);
    }

    public function view_applicant($user_id)
    {
        $view_applicant = DB::table('users')
                          ->where('id',$user_id)
                          ->first();

        return view('company.view_applicant')->with('viewApplicant',$view_applicant);
    }
}
