<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Session;

class Storecontroller extends Controller
{
    public function storeclist(Request $request)
    {
         $title = "Store";
         $admin_email=Session::get('bamaAdmin');
    	 $admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
    	  $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
        
			$city = DB::table('store')
                ->paginate(10);
        // echo "<pre>";print_r($city);die;
        return view('admin.store.storeclist', compact('title','city','admin','logo'));    
        
        
    }
    public function block(Request $request)
    {
        $user_id = $request->id;
        // echo $user_id;die;
         $users = DB::table('store')
                ->where('store_id',$user_id)
                ->update(['status'=>0]);
		if($users){   
			return redirect()->back()->withSuccess('Vendor Disabled Successfully');
		}
		else{
		  return redirect()->back()->withErrors('Something Wents Wrong');   
		}
    }
    
	public function unblock(Request $request)
    {
        
        $user_id = $request->id;
         $users = DB::table('store')
                ->where('store_id',$user_id)
                ->update(['status'=>1]);
                
		if($users){   
			return redirect()->back()->withSuccess('Vendor ENABLED Successfully');
		}
		else{
		  return redirect()->back()->withErrors('Something Wents Wrong');   
		}
    }
    public function store(Request $request)
    {
        $title = "Store";
         $admin_email=Session::get('bamaAdmin');
    	 $admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
    	  $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
        
        $city = DB::table('city')
                ->get();
        return view('admin.store.storeadd', compact('title','city','admin','logo'));    
        
        
    }
    public function storeadd(Request $request)
    {
        // echo "<pre>";print_r($_POST);die;
        $title = "Store";
        $store_name = $request->store_name;
        $arstore_name = $request->arstore_name;
        $emp_name = $request->emp_name;
        $aremp_name = $request->aremp_name;
        $number = $request->number;
        $city = $request->city;
        $email = $request->email;
        $range = $request->range;
        $password = $request->password;
        $address = $request->address;
        $araddress = $request->araddress;
        $share =$request->share;
        $discount = str_replace("%",'', $share);
        $addres = str_replace(" ", "+", $address);
        $address1 = str_replace("-", "+", $addres);
        // $checkmap = DB::table('map_API')
        //           ->first();
                  
        $chkstorphon = DB::table('store')
                      ->where('phone_number', $number)
                      ->first(); 
         $chkstoremail = DB::table('store')
                      ->where('email', $email)
                      ->first();              
        
         if($chkstorphon && $chkstoremail){
             return redirect()->back()->withErrors('This Phone Number and Email Are Already Registered With Another Store');
        } 

        if($chkstorphon){
             return redirect()->back()->withErrors('This Phone Number is Already Registered With Another Store');
        } 
        if($chkstoremail){
             return redirect()->back()->withErrors('This Email is Already Registered With Another Store');
        } 
                  
        // $response = json_decode(file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=".$address1."&key=".$checkmap->map_api_key));
        
        //  $lat = $response->results[0]->geometry->location->lat;
        //  $lng = $response->results[0]->geometry->location->lng;
        
        $this->validate(
            $request,
                [
                    
                    'store_name'=>'required',
                    'arstore_name'=>'required',
                    'emp_name'=>'required',
                    'aremp_name'=>'required',
                    'number'=>'required',
                    'range'=>'required',
                    'address'=>'required',
                    'araddress'=>'required',
                    'email'=>'required',
                    'password'=>'required',
                ],
                [
                    
                    'store_name.required'=>'Store English Name Required',
                    'arstore_name.required'=>'Store Arabic Name Required',
                    'emp_name.required'=>'Employee English Name Required',
                    'aremp_name.required'=>'Employee Arabic Name Required',
                    'number.required'=>'Phone Number Required',
                    'range.required'=>'Enter delivery range',
                    'address.required'=>'Enter English store address',
                    'araddress.required'=>'Enter Arabic store address',
                    'email.required'=>'E-mail Address Required',
                    'password.required'=>'Password Required',

                ]
        );
        
    	$insert = DB::table('store')
                    ->insertgetid([
                            'store_name'    =>$store_name,
                            'ar_storename'  =>$arstore_name,
                            'employee_name' =>$emp_name,
                            'ar_employee_name'=>$aremp_name,
                            'phone_number'  =>$number,
                            'city'          =>$city,
                            'email'         =>$email,
                            'del_range'     => $range,
                            'password'      =>$password,
                            'address'       =>$address,
                            'ar_address'    =>$araddress,
                            // 'lat'           =>$lat,
                            // 'lng'           =>$lng,
                            'admin_share'   =>$share,
                    ]);
						
		$insert = DB::table('users')
                    ->insert([
                            'name'      =>$emp_name,
                            'ar_name'   =>$emp_name,
                            'email'     =>$email,
                            'password'  =>bcrypt($password),
                            'phone_no'  =>$number,
                            'user_type' =>1,
					]);
                        
      if($insert){
        return redirect()->back()->withSuccess('Added Successfully');
      }else{
         return redirect()->back()->withErrors('Something Wents Wrong'); 
      }

    }
    
    public function storedit(Request $request)
    {
         $title = "Edit Store";
         $admin_email=Session::get('bamaAdmin');
    	 $admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
    	  $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
        
        $store_id = $request->store_id;
        
        $city = DB::table('city')
                    ->get();
                    
              
    //   $map1 = DB::table('map_API')
    //          ->first();
    //      $map = $map1->map_api_key;   
        $store = DB::table('store')
                ->where('store_id',$store_id)
                ->first();
                
        return view('admin.store.storeedit', compact('title','city','store','admin','logo'));    
          
    }
    
    public function storeupdate(Request $request)
    {
        $title = "Update store";
        $store_id = $request->store_id;
        $share =$request->share;
        $store_name = $request->store_name;
        $arstore_name = $request->arstore_name;
        $emp_name = $request->emp_name;
        $aremp_name = $request->aremp_name;
        $number = $request->number;
        $city = $request->city;
        $range = $request->range;
        $email = $request->email;
        $password = $request->password;
        $address = $request->address;
        $araddress = $request->araddress;
        $addres = str_replace(" ", "+", $address);
        $address1 = str_replace("-", "+", $addres);
        //  $checkmap = DB::table('map_API')
        //           ->first();

         $chkstorphon = DB::table('store')
                      ->where('phone_number', $number)
                      ->where('store_id', '!=', $store_id)
                      ->first(); 
         $chkstoremail = DB::table('store')
                      ->where('email', $email)
                      ->where('store_id', '!=', $store_id)
                      ->first();              
        
         
         if($chkstorphon && $chkstoremail){
             return redirect()->back()->withErrors('This Phone Number and Email Are Already Registered With Another Store');
        } 

        if($chkstorphon){
             return redirect()->back()->withErrors('This Phone Number is Already Registered With Another Store');
        } 
        if($chkstoremail){
             return redirect()->back()->withErrors('This Email is Already Registered With Another Store');
        } 
        
        // $response = json_decode(file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=".$address1."&key=".$checkmap->map_api_key));
        
        //  $lat = $response->results[0]->geometry->location->lat;
        //  $lng = $response->results[0]->geometry->location->lng;
        
        $this->validate(
            $request,
                [
                    
                    'store_name'=>'required',
                    'emp_name'=>'required',
                    'number'=>'required',
                    'email'=>'required',
                    'password'=>'required',
                    'range'=>'required',
                    'address'=>'required'
                ],
                [
                    
                    'store_name.required'=>'Store Name Required',
                    'emp_name.required'=>'Employee Name Required',
                    'number.required'=>'Phone Number Required',
                    'range.required'=>'Enter delivery range',
                    'address.required'=>'Enter store address',
                    'email.required'=>'E-mail Address Required',
                    'password.required'=>'Password Required',

                ]
        );
        
    	 $insert = DB::table('store')
                	            ->where('store_id',$store_id)
                                ->update([
                                        'store_name'=>$store_name,
                                        'employee_name'=>$emp_name,
                                        'phone_number'=>$number,
                                        'city'=>$city,
                                        'admin_share'=>$share,
                                        'email'=>$email,
                                        'del_range'=>$range,
                                        'password'=>$password,
                                        'address'=>$address,
                                    ]);
        $insert = DB::table('users')
                	            ->where('email',$email)
                                ->update([
                                        'name'      =>$emp_name,
                                        'ar_name'   =>$emp_name,
                                        'email'     =>$email,
                                        'password'  =>bcrypt($password),
                                        'phone_no'  =>$number,
                                        'user_type' =>1,
                                ]);
                        
     
     return redirect()->back()->withSuccess('Updated Successfully');
    }
    
    public function storedelete(Request $request)
    {
                    $store_id=$request->store_id;
            
                	$delete=DB::table('store')->where('store_id',$store_id)->delete();
                    if($delete)
                    {
                    DB::table('store_products')->where('store_id',$store_id)->delete();
                    return redirect()->back()->withSuccess('Deleted Successfully');
            
                    }
                    else
                    {
                       return redirect()->back()->withErrors('Something Wents Wrong'); 
                    }
    }
}