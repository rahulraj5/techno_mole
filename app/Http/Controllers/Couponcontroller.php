<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class Couponcontroller extends Controller
{
    public function couponlist(Request $request)
    {
         $title = "Coupon List";
         $admin_email=Session::get('bamaAdmin');
    	 $admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
    	  $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
        $coupon = DB::table('coupon')
                ->paginate(10);
        return view('admin.coupon.couponlist',compact("title","coupon",'admin','logo'));
    }
    public function block(Request $request)
    {
        $user_id = $request->id;
        // echo $user_id;die;
         $users = DB::table('coupon')
                ->where('coupon_id',$user_id)
                ->update(['status'=>0]);
		if($users){   
			return redirect()->back()->withSuccess('Coupon Disabled Successfully');
		}
		else{
		  return redirect()->back()->withErrors('Something Wents Wrong');   
		}
    }
    
	public function unblock(Request $request)
    {
        
        $user_id = $request->id;
         $users = DB::table('coupon')
                ->where('coupon_id',$user_id)
                ->update(['status'=>1]);
                
		if($users){   
			return redirect()->back()->withSuccess('Coupon Enabled Successfully');
		}
		else{
		  return redirect()->back()->withErrors('Something Wents Wrong');   
		}
    }
     public function coupon(Request $request)
    {
         $title = "Coupon Add";
         $admin_email=Session::get('bamaAdmin');
    	 $admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
    	  $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
       
        $coupon= DB::table('coupon')
                ->get();
         return view('admin.coupon.couponadd',compact("title","coupon",'admin','logo'));
    }
    
    
    public function addcoupon(Request $request)
    {
        $encoupon_name = $request->encoupon_name;
        $arcoupon_name = $request->arcoupon_name;
        $coupon_code = $request->coupon_code;
        $encoupon_desc = $request->encoupon_desc;
        $arcoupon_desc = $request->arcoupon_desc;
        $valid_to = $request->valid_to;
        $valid_from = $request->valid_from;
        $cart_value = $request->cart_value;
        $coupon_type = $request->coupon_type;
        $coupon_discount =$request->coupon_discount;
        $restriction = $request->restriction;
        $discount = str_replace("%",'', $coupon_discount);
		$date=date('d-m-Y');
        
      $this->validate(
            $request,
                [
                    
                    'encoupon_name'=>'required',
                    'arcoupon_name'=>'required',
                    'coupon_code'=>'required',
                    'encoupon_desc'=>'required',
                    'arcoupon_desc'=>'required',
                    'valid_to'=>'required',
                    'valid_from'=>'required',
                    'cart_value'=>'required',
                    'restriction'=>'required',
                    'coupon_image'=>'required'
                ],
                [
                    
                    'encoupon_name.required'=>'Coupon English Name Required',
                    'arcoupon_name.required'=>'Coupon Arabic Name Required',
                    'coupon_code.required'=>'Coupon Code Required',
                    'encoupon_desc.required'=>'Coupon English Description Required',
                    'arcoupon_desc.required'=>'Coupon Arabic Description Required',
                    'valid_to.required'=>'Date Required',
                    'valid_from.required'=>'Date Required',
                    'cart_value.required'=>'Cart value Required',
                    'restriction.required'=>'Enter Uses Restiction limit',
                    'coupon_image.required'=>'Coupon Image is Required'

                ]
        );
		 if($request->hasFile('coupon_image')){
			$coupon_image = $request->coupon_image;
            $fileName = $coupon_image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $coupon_image->move('images/coupon/'.$date.'/', $fileName);
            $coupon_image = 'images/coupon/'.$date.'/'.$fileName;
        }
        else{
            $coupon_image = 'N/A';
        }

        $insert = DB::table('coupon')
                  ->insert([
                                'coupon_name'        =>  $encoupon_name,
                                'ar_couponname'      =>  $arcoupon_name,
                                'coupon_description' =>  $encoupon_desc,
                                'ar_coupondescription'=>  $arcoupon_desc,
                                'coupon_code'        =>  $coupon_code,
                                'start_date'         =>  $valid_from,
                                'end_date'           =>  $valid_to,
                                'type'               =>  $coupon_type,
                                'uses_restriction'   =>  $restriction,
                                'coupon_img'         =>  $coupon_image,
                                'amount'             =>  $discount,
                                'cart_value'         =>  $cart_value
                       ]);
     
     return redirect()->back()->withSuccess('Added Successfully');

    }
    
    public function editcoupon(Request $request)
    {
    	 $title = "Coupon Edit";
         $admin_email=Session::get('bamaAdmin');
    	 $admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
    	  $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
         $coupon_id=$request->coupon_id;
    	 $coupon= DB::table('coupon')
    	 		  ->where('coupon_id',$coupon_id)
    	 		  ->first();
    	 return view('admin.coupon.couponedit',compact("coupon","coupon_id","title",'admin','logo'));


    }
    public function updatecoupon(Request $request)
    {
	// echo "<pre>"; print_r($_POST);die;	
        $coupon_id = $request->coupon_id;
        $coupon_name = $request->coupon_name;
        $arcoupon_name = $request->arcoupon_name;
        $coupon_code = $request->coupon_code;
        $coupon_type = $request->coupon_type;
        $coupon_desc = $request->coupon_desc;
        $arcoupon_desc = $request->arcoupon_desc;
        $valid_to = $request->valid_to;
        $valid_from = $request->valid_from;
        $cart_value = $request->cart_value;
        $restriction = $request->restriction;
        
      $this->validate(
            $request,
                [
                    
                    'coupon_name'=>'required',
                    'arcoupon_name'=>'required',
                    'coupon_code'=>'required',
                    'coupon_desc'=>'required',
                    'arcoupon_desc'=>'required',
                    'valid_to'=>'required',
                    'valid_from'=>'required',
                    'cart_value'=>'required',
                    'restriction'=>'required'
                ],
                [
                    
                    'coupon_name.required'=>'Coupon English Name Required',
                    'arcoupon_name.required'=>'Coupon Arabic Name Required',
                    'coupon_code.required'=>'Coupon Code Required',
                    'coupon_desc.required'=>'Coupon English Description Required',
                    'arcoupon_desc.required'=>'Coupon Arabic Description Required',
                    'valid_to.required'=>'Date Required',
                    'valid_from.required'=>'Date Required',
                    'cart_value.required'=>'Cart value Required',
                    'restriction.required'=>'Enter Uses Restiction limit'

                ]
        );
		if($request->hasFile('coupon_image')){
			$coupon_image = $request->coupon_image;
            $fileName = $coupon_image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $coupon_image->move('images/coupon/'.$date.'/', $fileName);
            $coupon_image = 'images/coupon/'.$date.'/'.$fileName;
        }
        else{
            $coupon_image = $request->old_coupon_image;
        }
		$update_data = [
							'coupon_name'       =>  $coupon_name,
							'ar_couponname'       =>  $arcoupon_name,
							'coupon_description'=>  $coupon_desc,
							'ar_coupondescription'=>  $arcoupon_desc,
							'coupon_code'       =>  $coupon_code,
							'start_date'        =>  $valid_from,
							'type'              =>  $coupon_type,
							'end_date'          =>  $valid_to,
							'cart_value'        =>  $cart_value,
							'coupon_img'        =>  $coupon_image,
							'uses_restriction'  =>  $restriction
						];
		// echo "<pre>";print_r($update_data);die;
        $update = DB::table('coupon')->where('coupon_id', $coupon_id)->update($update_data);
        if($update){
            return redirect()->back()->withSuccess('Updated Successfully');
        }
        else{
            return redirect()->back()->withErrors("something wents wrong.");
        }
    }
  public function deletecoupon(Request $request)
    {
        
        
        $coupon_id=$request->coupon_id;

        $getfile=DB::table('coupon')
                ->where('coupon_id',$coupon_id)
                ->first();


    	$delete=DB::table('coupon')->where('coupon_id',$request->coupon_id)->delete();
        if($delete)
        {
         return redirect()->back()->withSuccess('Deleted Successfully');
            }
   
        else
        {
           return redirect()->back()->withErrors('Unsuccessfull Delete'); 
        }

    }
	
    
}
