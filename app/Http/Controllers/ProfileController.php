<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editProfile()
    {
    	return view('edit_profile');
    }

    public function updateProfile(Request $request)
    {
    	
    	$data = array();

    	if($request->hasfile('pro_pic'))
    	{
    		$image = $request->file('pro_pic');
    		$image_name = str_random(5);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name.'.'.$ext;
    		$upload_path = 'image/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image->move($upload_path,$image_full_name);

    		if($success)
    		{
    			$user = User::find(Auth::id());
    			$path = $user->pro_pic;
    			if($path)
    			{
    				unlink($path);
    			}
    			$data['pro_pic'] = $image_url;
    		}
    	}
    	if($request->hasfile('resume'))
    	{
    		$resume = $request->file('resume');
    		$resume_name = str_random(5);
    		$extension = strtolower($resume->getClientOriginalExtension());
    		$resume_full_name = $resume_name.'.'.$extension;
    		$load_path = 'image/';
    		$resume_url = $load_path.$resume_full_name;
    		$succed = $resume->move($load_path,$resume_full_name);

    		if($succed)
    		{
    			$hel = User::find(Auth::id());
    			$res_path = $hel->resume;
    			if($res_path)
    			{
    				unlink($res_path);
    			}
    			$data['resume'] = $resume_url;
    		}
    	}
    	if($request->skills)
    	{
    		$data['skills'] = $request->skills;
    	}

		DB::table('users')->where('id',Auth::id())->update($data);

    	return redirect()->back();

    }
}
