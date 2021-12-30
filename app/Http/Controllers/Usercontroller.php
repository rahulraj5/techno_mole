<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Hash;
use Session;

class Usercontroller extends Controller
{
    public function list(Request $request)
    {
        $title = "App User List";
         $admin_email=Session::get('bamaAdmin');
    	 $admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
    	  $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
           $users = DB::table('user')
                   ->orderBy('reg_date','desc')
                    ->paginate(20);
        
    	return view('admin.user.user_list', compact('title',"admin", "logo","users"));
    }
    
	public function block(Request $request)
    {
        $user_id = $request->id;
        // echo $user_id;die;
         $users = DB::table('user')
                ->where('user_id',$user_id)
                ->update(['block'=>1]);
		if($users){   
			return redirect()->back()->withSuccess('User Blocked Successfully');
		}
		else{
		  return redirect()->back()->withErrors('Something Wents Wrong');   
		}
    }
    
	public function unblock(Request $request)
    {
        
        $user_id = $request->id;
         $users = DB::table('user')
                ->where('user_id',$user_id)
                ->update(['block'=>2]);
                
		if($users){   
			return redirect()->back()->withSuccess('User Unblocked Successfully');
		}
		else{
		  return redirect()->back()->withErrors('Something Wents Wrong');   
		}
    }
	
	public function profileview(Request $request)
    {
		$title = "Update Profile";
		$user = Auth::guard()->user();
        $user_id = $user->id;
		$users = DB::table('users')
                ->where('id',$user_id)
                ->first();
                
		return view('admin.user.update_profile', compact('title',"users"));
    }
	
	public function profileupdate(Request $request)
    {
		$title = "Update Profile";
		$user_id = $request->user_id;
		$user_name = $request->en_name;
		$ar_name = $request->ar_name;
		$user_mail = $request->email;
		$user_pass = Hash::make($request->password);
		$user_phone = $request->phone;
		$user_gender = $request->gender;

		
		if($request->hasFile('pro_image')){
            $pro_image = $request->pro_image;
            $fileName1 = $pro_image->getClientOriginalName();
            $fileName1 = str_replace(" ", "-", $fileName1);
            $pro_image->move('images/profile/', $fileName1);
            $pro_image = 'images/profile/'.$fileName1;
        }
        else{
            $pro_image = $request->old_pro_image;
        }
		
		if($request->hasFile('logo_image')){
            $logo = $request->logo_image;
            $fileName2 = $logo->getClientOriginalName();
            $fileName2 = str_replace(" ", "-", $fileName2);
            $logo->move('images/logo/', $fileName2);
            $logo = 'images/logo/'.$fileName2;
        }
        else{
            $logo = $request->old_logo_image;
        }
	 
		if($request->hasFile('fev_image')){
            $fev_image = $request->fev_image;
            $fileName3 = $fev_image->getClientOriginalName();
            $fileName3 = str_replace(" ", "-", $fileName3);
            $fev_image->move('images/profile/', $fileName3);
            $fev_image = 'images/profile/'.$fileName3;
        }else{
            $fev_image = $request->old_fev_image;
        }
		
		$users = DB::table('users')
                ->where('id',$user_id)
                ->update([
                            'name'      =>  $user_name,
                            'ar_name'   =>  $ar_name,
                            'email'     =>  $user_mail,
                            'password'  =>  $user_pass,
                            'phone_no'  =>  $user_phone,
                            'gender'    =>  $user_gender,
                            'image'     =>  $pro_image,
                            'logo'      =>  $logo,
                            'fev_icon'  =>  $fev_image
                        ]);
                
		if($users){
            return redirect()->back()->withSuccess('Profile Updated Successfully');
        }
        else{
            return redirect()->back()->withErrors("Something Wents Wrong");
        }
    }
}