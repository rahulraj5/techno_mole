<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
class Termscontroller extends Controller
{	
    public function termscondition(Request $request)
    {
        $title = "Add Terms and Conditions";
		$admin_email=Session::get('bamaAdmin');
		$admin= DB::table('admin')
				->where('admin_email',$admin_email)
				->first();
		$logo = DB::table('tbl_web_setting')
				->where('set_id', '1')
                ->first();
        
        $terms = DB::table('termspage')
                ->first();
     // echo "<pre>";print_r($terms);die;
        return view('admin.termscondition.termsadd', compact('title','terms','admin','logo'));    
    }
	
    public function termsconditionupdate(Request $request)
    {
        $title = "Update Terms and Conditions";
        $id = $request->terms_id;		
        $title = $request->title;
        $desc = $request->description;
       
        $this->validate(
            $request,
                [
                    'title'=>'required',
                    'description'=>'required',
                ],
                [
                    'title.required'=>'Title Required',
                    'description.required'=>'Description Required',
                ]
        );
        
    	 $insert = DB::table('termspage')
    	            ->where('terms_id',$id)
                    ->update([
							'title'=>$title,
							'description'=>$desc,
                        ]);
               
        if ($insert){     
			return redirect()->back()->withSuccess('Terms & Condition Updated Successfully');
        }else{
          return redirect()->back()->withErrors('Something Wents Wrong');  
        }
    }
	
	public function privecy_policy(Request $request)
    {
        $title = "Privecy policy";
		$admin_email=Session::get('bamaAdmin');
		$admin= DB::table('admin')
				->where('admin_email',$admin_email)
				->first();
		$logo = DB::table('tbl_web_setting')
				->where('set_id', '1')
                ->first();
        
        $policy = DB::table('privecypage')
                ->first();
        return view('admin.privecy_policy.privecy_policy', compact('title','policy','admin','logo'));    
    }
	
    public function privecy_policyupdate(Request $request)
    {
        $title = "Privecy policy";
        $id = $request->policy_id;		
        $title = $request->title;
        $desc = $request->description;
       
        $this->validate(
            $request,
                [
                    'title'=>'required',
                    'description'=>'required',
                ],
                [
                    'title.required'=>'Title Required',
                    'description.required'=>'Description Required',
                ]
        );
        
    	 $insert = DB::table('privecypage')
    	            ->where('about_id',$id)
                    ->update([
							'title'=>$title,
							'description'=>$desc,
                        ]);
               
        if ($insert){     
			return redirect()->back()->withSuccess('Privecy & Policy Updated Successfully');
        }else{
          return redirect()->back()->withErrors('Something Wents Wrong');  
        }
    }
}