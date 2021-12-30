<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class Bannercontroller extends Controller
{
    public function primarylist(Request $request)
    {
        $title = "Primary Banner List";
         $admin_email=Session::get('bamaAdmin');
    	 $admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
    	  $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
        
        $banner = DB::table('banner')
                ->get();
                
        return view('admin.banner.primary.primarylist', compact('title','banner','admin','logo'));    
        
        
    }
    public function block(Request $request)
    {
        $user_id = $request->id;
        // echo $user_id;die;
         $users = DB::table('banner')
                ->where('banner_id',$user_id)
                ->update(['status'=>0]);
		if($users){   
			return redirect()->back()->withSuccess('Banner Disabled Successfully');
		}
		else{
		  return redirect()->back()->withErrors('Something Wents Wrong');   
		}
    }
    
	public function unblock(Request $request)
    {
        
        $user_id = $request->id;
         $users = DB::table('banner')
                ->where('banner_id',$user_id)
                ->update(['status'=>1]);
                
		if($users){   
			return redirect()->back()->withSuccess('Banner ENABLED Successfully');
		}
		else{
		  return redirect()->back()->withErrors('Something Wents Wrong');   
		}
    }
    public function addprimarybanner(Request $request)
    {
        $title = "Primary Banner Add";
         $admin_email=Session::get('bamaAdmin');
    	 $admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
    	  $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
        
        $banner = DB::table('banner')
                ->get();
                
        return view('admin.banner.primary.addprimarybanner', compact('title','banner','admin','logo'));    
    }
	
    public function bannerprimaryadd(Request $request)
    {
        $title = "Primary Banner Add";
        
        $banner = $request->banner;
        $image = $request->image;
        
        $this->validate(
            $request,
                [
                    
                    'banner'=>'required',
                    'image'=>'required|mimes:jpeg,png,jpg|max:2048',
                ],
                [
                    
                    'banner.required'=>'Banner Name Required',
                    'image.required'=>'Image Required',

                ]
        );
        
         if($request->hasFile('image')){
            $image = $request->image;
            $fileName = date('dmyhisa').'-'.$image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $image->move('images/banner/', $fileName);
            $image = 'images/banner/'.$fileName;
        }
        else{
            $image = 'N/A';
        }
    	 $insert = DB::table('banner')
                    ->insert([
                        'banner_name'=>$banner,
                        'banner_image'=>$image
                        ]);
     if($insert){
         return redirect()->back()->withSuccess('Added Successfully');
     }else{
         return redirect()->back()->withErrors('Something Went Wrong');
     }

    }
    
    public function bannerprimayedit(Request $request)
    {
         $title = "Primary Banner Edit";
         $admin_email=Session::get('bamaAdmin');
    	 $admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
    	  $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
        $banner_id = $request->banner_id;
        
        $banner = DB::table('banner')
                ->where('banner_id',$banner_id)
                ->first();
                
        return view('admin.banner.primary.bannerprimayedit', compact('title','banner','admin','logo'));    
    }
    
    public function bannerprimaryupdate(Request $request)
    {
        $title = "Primary Banner Edit";
        $banner_id = $request->banner_id;
        $banner = $request->banner;
		$old_reward_image=$request->old_image;
        
        $this->validate(
            $request,
                [
                    
                    'banner'=>'required',
                ],
                [
                    
                    'banner.required'=>'Banner Name Required',

                ]
        );
        
        $getBanner = DB::table('banner')
                        ->where('banner_id', $banner_id)
                        ->first();

        $image = $getBanner->banner_image;
        

        if($request->hasFile('image')){
            if(file_exists($image)){
                unlink($image);
            }
            $new_image = $request->image;
            $fileName = date('dmyhisa').'-'.$new_image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $new_image->move('images/banner/', $fileName);
            $new_image = 'images/banner/'.$fileName;
        }
        else{
            $new_image = $getBanner->banner_image;
        }

        
    	 $insert = DB::table('banner')
    	            ->where('banner_id',$banner_id)
                    ->update([
                        'banner_name'=>$banner,
                        'banner_image'=>$new_image,
                        ]);
     
   if($insert){
         return redirect()->back()->withSuccess('Updated Successfully');
     }else{
         return redirect()->back()->withErrors('Something Went Wrong');
     }

    }
    
    public function bannerprimarydelete(Request $request)
    {
        $banner_id = $request->id;
    	$delete=DB::table('banner')->where('banner_id',$banner_id)->delete();
		
        if($delete){
             return redirect()->back()->withSuccess('Deleted Successfully');
         }else{
             return redirect()->back()->withErrors('Something Went Wrong');
         }
    }
	
	public function secondarylist(Request $request)
    {
        $title = "Secondary Banner List";
         $admin_email=Session::get('bamaAdmin');
    	 $admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
    	  $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
        
        $banner = DB::table('secondary_banner')
                ->get();
                
        return view('admin.banner.secondary.secondarylist', compact('title','banner','admin','logo'));    
    }
	
	public function addsecondarybanner(Request $request)
    {
        $title = "Secondary Banner Add";
         $admin_email=Session::get('bamaAdmin');
    	 $admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
    	  $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
        
        $banner = DB::table('secondary_banner')
                ->get();
                
        return view('admin.banner.secondary.addsecondarybanner', compact('title','banner','admin','logo'));    
    }
	
    public function bannersecondaryadd(Request $request)
    {
        $title = "Secondary Banner Add";
        
        $banner = $request->banner;
        $image = $request->image;
        
        $this->validate(
            $request,
                [
                    
                    'banner'=>'required',
                    'image'=>'required|mimes:jpeg,png,jpg|max:2048',
                ],
                [
                    
                    'banner.required'=>'Banner Name Required',
                    'image.required'=>'Image Required',

                ]
        );
        
         if($request->hasFile('image')){
            $image = $request->image;
            $fileName = date('dmyhisa').'-'.$image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $image->move('images/banner/', $fileName);
            $image = 'images/banner/'.$fileName;
        }
        else{
            $image = 'N/A';
        }
    	 $insert = DB::table('secondary_banner')
                    ->insert([
                        'banner_name'=>$banner,
                        'banner_image'=>$image
                        ]);
		if($insert){
			return redirect()->back()->withSuccess('Added Successfully');
		}else{
			return redirect()->back()->withErrors('Something Went Wrong');
		}
    }
    
	public function bannersecondaryedit(Request $request)
    {
         $title = "Primary Banner Edit";
         $admin_email=Session::get('bamaAdmin');
    	 $admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
    	  $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
        $banner_id = $request->banner_id;
        
        $banner = DB::table('secondary_banner')
                ->where('sec_banner_id',$banner_id)
                ->first();
                
        return view('admin.banner.secondary.bannersecondaryedit', compact('title','banner','admin','logo'));    
    }
    
    public function bannersecondaryupdate(Request $request)
    {
        $title = "Primary Banner Edit";
        $banner_id = $request->banner_id;
        $banner = $request->banner;
		$old_reward_image=$request->old_image;
        
        $this->validate(
            $request,
                [
                    'banner'=>'required',
                ],
                [
                    'banner.required'=>'Banner Name Required',
                ]
        );
        
        $getBanner = DB::table('secondary_banner')
                        ->where('sec_banner_id', $banner_id)
                        ->first();

        $image = $getBanner->banner_image;
        

        if($request->hasFile('image')){
            if(file_exists($image)){
                unlink($image);
            }
            $new_image = $request->image;
            $fileName = date('dmyhisa').'-'.$new_image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $new_image->move('images/banner/', $fileName);
            $new_image = 'images/banner/'.$fileName;
        }
        else{
            $new_image = $getBanner->banner_image;
        }

        
    	 $insert = DB::table('secondary_banner')
    	            ->where('sec_banner_id',$banner_id)
                    ->update([
                        'banner_name'=>$banner,
                        'banner_image'=>$new_image,
                        ]);
     
		if($insert){
			return redirect()->back()->withSuccess('Updated Successfully');
		}else{
			return redirect()->back()->withErrors('Something Went Wrong');
		}

    }
    
    public function bannersecondarydelete(Request $request)
    {
        $banner_id = $request->id;
    	$delete=DB::table('secondary_banner')->where('sec_banner_id',$banner_id)->delete();
		
        if($delete){
             return redirect()->back()->withSuccess('Deleted Successfully');
         }else{
             return redirect()->back()->withErrors('Something Went Wrong');
         }
    }
}