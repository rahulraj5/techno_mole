<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session;

class Profile extends Controller
{
    //
    public function get_user($id)
    {
      $user =  DB::table('users')->where('id',$id)->get();
      $address =  DB::table('address')->where('user_id', $id)->get();

     return view('front.myprofile',['user' => $user, 'address' => $address]);

    }

    public function edit_user(Request $req)
   {
      
    $validated = $req->validate([
        'fname' => 'required||max:255',  
        'lname' => 'required||max:255' ,
        'email' =>'required||email', 
         'mobile' => 'required|digits:10||numeric',
        'dob' => 'required' 
         ],['fname.required' => 'First_name is required',
            'lname.required' => 'Last_name is required',
            'email.required' => 'Email_id is required',
            'email.email' => 'Incorrect Format',
            'mobile.required' => 'Mobile_Number is required',
            'dob.required' => 'Date_Of_Birth is required']);

            $txt1 = $req->fname;
            $txt2 = $req->lname;
            $name = $txt1 . $txt2;   
            
        DB::table('users') 
       ->where('id', $req->uid) 
      ->update(array('name' => $name,'fname' => $req->fname, 'lname' => $req->lname, 'email' => $req->email, 'phone_no' => $req->mobile,
        'gender' => $req->gender, 'dob' => $req->dob)); 
    

     session()->flash('edituser', 'Data Edited Successfully'); 

     $user =  DB::table('users')->where('id',$req->uid)->get();
     $address =  DB::table('address')->where('user_id', $req->uid)->get();
     return view('front.myprofile',['user' => $user, 'address' => $address]);

    }
    //for add address
    public function add_address(Request $req)
    {

        DB::table('address')->where('user_id',$req->aid)
        ->update(array('select_status' => 0)); 

        $validated = $req->validate([
            'name' => 'required||max:255',  
            'phone' => 'required||max:255' ,
            'city' =>'required', 
            'alane' =>'required',  
            'pincode' => 'required'            
             ],['name.required' => 'Receiver name is required',
                'phone.required' => 'Mobile no is required',
                'city.required' => 'City is required',
                'alane.required' => 'Address is required',
                'pincode.required' => 'Pincode is required'
               ]);

        DB::table('address')->insert(
            ['user_id' => $req->aid,
            'receiver_name' => $req->name,
            'receiver_phone' => $req->phone,
            'city' => $req->city,
            'address_lane' => $req->alane,
            'pincode' => $req->pincode,
              ]);
            
          $address =  DB::table('address')->where('user_id', $req->aid)->get();
          $user =  DB::table('users')->where('id',$req->aid)->get();
         return view('front.myprofile',['user' => $user, 'address' => $address]);
        
        }
        public function dlt_address($id,$uid)
        {
            DB::table('address')->where('address_id', $id)->delete();
            $address =  DB::table('address')->where('user_id', $uid)->get();
            $user =  DB::table('users')->where('id',$uid)->get();

           return view('front.myprofile',['user' => $user, 'address' => $address]);

        }
        //for upate address status
        public function off_status($id,$uid)
        {
            DB::table('address') 
            ->where('address_id', $id) 
           ->update(array('select_status' => 0)); 
           $address =  DB::table('address')->where('user_id', $uid)->get();
           $user =  DB::table('users')->where('id',$uid)->get();

          return view('front.myprofile',['user' => $user, 'address' => $address]);
        }
        public function on_status($id,$uid)
        {
            DB::table('address') 
            ->where('address_id', $id) 
           ->update(array('select_status' => 1)); 

           //
          DB::table('address')
           ->where('user_id',$uid)
           ->where('address_id', '<>',$id)
           ->update(array('select_status' => 0)); 

           $address =  DB::table('address')->where('user_id', $uid)->get();
           $user =  DB::table('users')->where('id',$uid)->get();

          return view('front.myprofile',['user' => $user, 'address' => $address]);
        }
        //status change for ajax
        public function status(Request $req)
        {
            $uid = $req->user_id;
            $status = $req->status;
            $add_id = $req->add_id;
            if($status == 0)
            {

                DB::table('address') 
                ->where('address_id', $add_id) 
               ->update(array('select_status' => $status)); 

               return response()->json([ 
                'data' => "disabled",
            ]);
             

            }else{
                DB::table('address') 
                ->where('address_id', $add_id) 
               ->update(array('select_status' => $status)); 
               //
               DB::table('address')
           ->where('user_id',$uid)
           ->where('address_id', '<>',$add_id)
           ->update(array('select_status' => 0)); 

           return response()->json([ 
            'data' => "enabled",
        ]);

            }

          
           

        }

        //change password
        public function change_password(Request $req)
        {
            $validated = $req->validate([
                'oldpassword' =>'required||max:8||min:6||',
                'newpassword' =>'required||max:8||min:6||',
                'confirmpassword' => 'required_with:newpassword|same:newpassword|min:6|max:8'
                  ],['oldpassword.required' => 'Current password is required',
                    'newpassword.required' => 'New password is required',
                    'confirmpassword.required' => 'Confirmpassword is required']);
           
           
           $users =  DB::table('users') 
           ->select('password')
           ->where('id', $req->user_id)->get();
          
           $user =  DB::table('users')->where('id',$req->user_id)->get();
           $address =  DB::table('address')->where('user_id', $req->user_id)->get();
           // if(($user[0]->password)==$req->password)
           if(Hash::check($req->oldpassword, $users[0]->password))
            {
                
                        DB::table('users') 
                        ->where('id', $req->user_id)
                        ->update(array('password' => Hash::make($req->newpassword))); 

                        // echo "updated";
                        Session::flush();
                        // session()->flash('editpassword', 'Password Updated Successfully'); 
                       return redirect('/login');                        
    
            } else{
                session()->flash('wrongpassword', 'Old password is not valid'); 
                return view('front.myprofile',['user' => $user, 'address' => $address]); 
            }
           
        }
}
