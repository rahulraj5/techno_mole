<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
// use HasApiTokens;
use DB;
use Carbon\Carbon;
use App\User;

class UserController extends Controller
{
    //  public function __construct()
    //     {
    //         $this->middleware('auth.basic'); 
    //     }
     public function testing(Request $request)
    {
        return "testing";
    }
    
    public function signUp(Request $request)
    {

        $this->validate(
            $request, 
            [
                'user_name' => 'required',
                'user_email' => 'required|email',
                'user_phone' => 'required',
                'user_password' => 'required',
                'user_gender' => 'required',
                'user_dob' => 'required',
                'user_child_name' => 'required',
                'user_device_id' => 'required',
                'user_device_type' => 'required'
            ],
            [
                'user_name.required' => 'Name is required',
                'user_email.required' => 'email is required',
                'user_phone.required' => 'Mobile Number is required',
                'user_password.required' => 'password is required',
                'user_gender.required' => 'Gender is required',
                'user_dob.required' => 'Date Of Birth is required',
                'user_child_name.required' => 'Child Name is required',
                'user_device_id.required' => 'Device ID is required',
                'user_device_type.required' => 'Device Type is required',
            ]
        );

    	$user_name = $request->user_name;
    	$user_email = $request->user_email;
    	$user_phone = $request->user_phone;
    	$user_image = $request->user_image;
    	$user_password = $request->user_password;
    	$device_id = $request->user_device_id;
        $dob = $request->user_dob;
        $child_name = $request->user_child_name;
        $gender = $request->user_gender;
        $device_type = $request->user_device_type;
        $created_at = Carbon::now();
        $updated_at = Carbon::now();
        // $date=date('d-m-Y');
    	$checkUser = DB::table('user')
    					->where('user_phone', $user_phone)
    					->first();
	
        if($checkUser){
    		$message = array('status'=>'400', 'message'=>'Phone Number Already Registered');
            return $message;
    	}
    	else{

            $checkUserMail = DB::table('user')
                        ->where('user_email', $user_email)
                        ->first();
    	   if($checkUserMail){
                $message = array('status'=>'400', 'message'=>'Email Already Registered');
                return $message;
            }

            else{

           if($request->user_image){
            $user_image = $request->user_image;
            $user_image = str_replace('data:image/png;base64,', '', $user_image);
            $fileName = str_replace(" ", "-", $user_image);
            $fileName = date('dmyHis').'user_image'.'.'.'png';
            $fileName = str_replace(" ", "-", $fileName);
            \File::put(public_path(). '/images/user/' . $fileName, base64_decode($user_image));
            $user_image = 'images/user/'.$fileName;
             }
            else{
                $user_image = '';
            }

                $chars = "0123456789";
                $otpval = "";
                for ($i = 0; $i < 4; $i++){
                    $otpval .= $chars[mt_rand(0, strlen($chars)-1)];
                }
                
        
    		$insertUser = DB::table('user')
    						->insertGetId([
    							'user_name'=>$user_name,
                                'user_email'=>$user_email,
                                'user_phone'=>$user_phone,
                                'user_image'=>$user_image,
                                'user_password'=>$user_password,
                                'device_id'=>$device_id,
                                'reg_date'=>$created_at,
                                'child_name'=>$child_name,
                                'gender'=>$gender,
                                'dob'=>$dob,
                                'device_type'=>$device_type ,
    							'is_verified'=>1,
                                'otp_value'=>$otpval
    						]);
    						
            	$Userdetails = DB::table('user')
    					->where('user_phone', $user_phone)
    					->first();
    		if($insertUser){
    		     DB::table('notificationby')
    						->insert(['user_id'=> $insertUser,
    						'sms'=> '1',
    						'app'=> '1',
    						'email'=> '1']);
    			$message = array('status'=>'200', 'message'=>'User Added Successfully', 'data'=>$Userdetails);
                return $message;			
             	}
            }
        }
    }
    
    public function verifyPhone(Request $request)
    {
        $phone = $request->user_phone;
        $otp = $request->otp;
        $smsby = DB::table('smsby')
              ->first();
        if($smsby->status==1){      
        // check for otp verify
        $getUser = DB::table('users')
                    ->where('user_phone', $phone)
                    ->first();
                    
        if($getUser){
            $getotp = $getUser->otp_value;
            
            if($otp == $getotp){
                // verify phone
                $getUser = DB::table('users')
                            ->where('user_phone', $phone)
                            ->update(['is_verified'=>1,
                            'otp_value'=>NULL]);
                    
                $message = array('status'=>1, 'message'=>"Phone Verified! login successfully");
                return $message;
            }
            else{
                $message = array('status'=>0, 'message'=>"Wrong OTP");
                return $message;
            }
       
        }
        else{
            $message = array('status'=>0, 'message'=>"User not registered");
            return $message;
        }
        }
        else{
              $getUser = DB::table('users')
                            ->where('user_phone', $phone)
                            ->update(['is_verified'=>1,
                            'otp_value'=>NULL]);
             $message = array('status'=>1, 'message'=>"Phone Verified! login successfully");
            return $message;
        }
    }
  /*  
    public function login(Request $request){//echo "sdfds";die;
    	$user_phone = $request->user_phone;
        $user_mail = $request->user_email;
        $is_mail = $request->is_mail;
    	$user_password = $request->user_password;
    	$device_id = $request->user_device_id;
        $device_type = $request->user_device_type;
        // $request->validate([
        //     'user_phone' => 'required',
        //     'user_email' => 'required|string|email',
        //     'user_password' => 'required|string',
        //     'user_device_id' => 'required',
        //     'user_device_type' => 'required',
        //     'remember_me' => 'boolean'
        // ]);
        // $credentials = request(['email' => request('user_email'), 'password' => request('user_password')]);
        $credentials = DB::table('user')->where('user_email', $user_mail)->where('user_password', $user_password)->first();
        // echo "<pre>";print_r($credentials);die;
        if (!Auth::attempt($credentials))
            return ['status'=>'false', 'message' => 'Unauthorized'];
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        return $this->loginSuccess($tokenResult, $user);
    }
    
    protected function loginSuccess($tokenResult, $user){
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addWeeks(100);
        $token->save();
        return response()->json([
            'status'=>'true',
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString(),
            'user' => [
                'id' => $user->id,
                'type' => $user->user_type,
                'name' => $user->name,
                'email' => $user->email,
                'avatar' => $user->avatar,
                'avatar_original' => $user->avatar_original,
                'address' => $user->address,
                'country'  => $user->country,
                'city' => $user->city,
                'postal_code' => $user->postal_code,
                'phone' => $user->phone,
                'fcm_token' => $user->device_token
            ]
        ]);
    }*/

    public function login(Request $request)
    {
		// echo "<pre>";print_r($_POST);die;
    	$user_phone = $request->user_phone;
        $user_mail = $request->user_email;
        $is_mail = $request->is_mail;
    	$user_password = $request->user_password;
    	$device_id = $request->user_device_id;
        $device_type = $request->user_device_type;
    	
    	if($is_mail == 0){
				$checkUserReg = DB::table('user')
                        ->where('user_phone', $user_phone)
                        ->first();
        }else{
                $checkUserReg = DB::table('user')
                        ->where('user_email', $user_mail)
                        ->first();
        }

        if(!($checkUserReg) || $checkUserReg->is_verified == 0){
    	    $message = array('status'=>'400', 'message'=>'User not registered', 'data'=>[]);
	        return $message;
    	}

        if($is_mail == 0){
            $checkUser = DB::table('user')
                        ->where('user_phone', $user_phone)
                        ->where('user_password', $user_password)
                        ->first();
        }else{
            $checkUser = DB::table('user')
                        ->where('user_email', $user_mail)
                        ->where('user_password', $user_password)
                        ->first();
        }
                
    	if($checkUser){
    	    if($checkUser->is_verified == 0){
    	        $chars = "0123456789";
                $otpval = "";
                for ($i = 0; $i < 4; $i++){
                    $otpval .= $chars[mt_rand(0, strlen($chars)-1)];
                }

                if($is_mail == 0){
					
                    $updateOtp = DB::table('user')
											->where('user_phone', $user_phone)
											->update([
														'otp_value'		=>	$otpval,
														'auth_token'=>	Str::random(60)
													]);
                                
					$checkUser1 = DB::table('user')
											->where('user_phone', $user_phone)
											->first();
                }else{
                        $updateOtp = DB::table('user')
                                ->where('user_email', $user_mail)
                                ->update([
                                            'otp_value'		=>	$otpval,
											'auth_token'=>	Str::random(60)
                                        ]);
                                
                        $checkUser1 = DB::table('user')
                                        ->where('user_email', $user_mail)
                                        ->first();
					
                }
                
    	        $message = array('status'=>'200', 'message'=>'Verify Phone', 'data'=>$checkUser1);
	        	return $message;
    	    }
    	   else{
                if($is_mail == 0){
                    $updateDeviceId = DB::table('user')
                                    ->where('user_phone', $user_phone)
                                    ->update([
                                                'device_id'=>$device_id,
                                                'device_type'=>$device_type,
												'auth_token'=>	Str::random(60)
                                            ]);

                    $chars = "0123456789";
                    $otpval = "";
                    for ($i = 0; $i < 4; $i++){
                        $otpval .= $chars[mt_rand(0, strlen($chars)-1)];
                    }
                    
                    $updateOtp = DB::table('user')
                                    ->where('user_phone', $user_phone)
                                    ->update([
                                                'otp_value'		=> 	$otpval,
												'auth_token'=>	Str::random(60)
                                            ]);          
                                       
					$checkUser1 = DB::table('user')
                                    ->where('user_phone', $user_phone)
                                    ->where('user_password', $user_password)
                                    ->first(); 

				// 	$path = 'http://artybrainsdemo.com/mole/public/'.$checkUser1->user_image;
				// 	$type = pathinfo($path, PATHINFO_EXTENSION);
				// 	$data = file_get_contents($path);
				// 	$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
					
                }else{
                    $updateDeviceId = DB::table('user')
                                    ->where('user_email', $user_mail)
                                    ->update([
                                                'device_id'		=>	$device_id,
                                                'device_type'	=>	$device_type,
												'auth_token'=>	Str::random(60)
                                            ]);                 

                    $checkUser1 = DB::table('user')
                                    ->where('user_email', $user_mail)
                                    ->where('user_password', $user_password)
                                    ->first();     

				// 	$path = 'http://artybrainsdemo.com/mole/public/'.$checkUser1->user_image;
				// 	$type = pathinfo($path, PATHINFO_EXTENSION);
				// 	$data = file_get_contents($path);
				// 	$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
			
                }
    			$message = array('status'=>'200', 'message'=>'login successfully', 'data'=>$checkUser1);
	        	return $message;
    	   }	   
    	
    	}
    	else{
    		$message = array('status'=>'400', 'message'=>'Wrong Password', 'data'=>[]);
	        return $message;
    	}
    }
    
    
    public function fbLogin(Request $request)
    
     {
    	$user_phone = $request->user_phone;
    	$device_id = $request->device_id;
    	
    	$checkUserReg = DB::table('users')
    					->where('user_phone', $user_phone)
    					->first();
    					
    	if(!($checkUserReg) || $checkUserReg->is_verified== 0){
    	    $message = array('status'=>'0', 'message'=>'Phone not registered', 'data'=>[]);
	        return $message;
    	}
                
    	$checkUser = DB::table('users')
    					->where('user_phone', $user_phone)
    					->first();

    	if($checkUser){
    	    
    	    if($checkUser->is_verified == 0){
    	        $chars = "0123456789";
                $otpval = "";
                for ($i = 0; $i < 4; $i++){
                    $otpval .= $chars[mt_rand(0, strlen($chars)-1)];
                }
                
               $otpmsg = $this->otpmsg($otpval,$user_phone);
               
                $updateOtp = DB::table('users')
                                ->where('user_phone', $user_phone)
                                ->update(['otp_value'=>$otpval]);
                                
                $checkUser1 = DB::table('users')
            					->where('user_phone', $user_phone)
            					->first();                
                                
    	        $message = array('status'=>'2', 'message'=>'Verify Phone', 'data'=>[$checkUser1]);
	        	return $message;
    	    }
    	   else{
    		   $updateDeviceId = DB::table('users')
    		                        ->where('user_phone', $user_phone)
    		                        ->update(['device_id'=>$device_id]);
    		                       
    		   $checkUser1 = DB::table('users')
            					->where('user_phone', $user_phone)
            					->first();
    		                        
    			$message = array('status'=>'1', 'message'=>'login successfully', 'data'=>[$checkUser1]);
	        	return $message;
    	   }	   
    	
    	}
    	else{
    		$message = array('status'=>'0', 'message'=>'Wrong Password', 'data'=>[]);
	        return $message;
    	}
    }
    
    
    public function getStoreName(Request $request){
        $store_id = $request->store_id;
        $store_details = DB::table('store')
                        ->where('store_id', $store_id)
                        ->first();
        
        if($store_details){
            $message = array('status'=>'1', 'message'=>'Store Data', 'data'=>$store_details);
	        return $message;
        }else{
            $message = array('status'=>'0', 'message'=>'Store not found', 'data'=>[]);
	        return $message;
        }
    }
    
   
    public function myprofile(Request $request)
    {   
        $user_id = $request->user_id;
         $user =  DB::table('user')
                ->where('user_id', $user_id )
                ->first();
				
				// $path = 'http://artybrainsdemo.com/mole/public/'.$user->user_image;
				// 	$type = pathinfo($path, PATHINFO_EXTENSION);
				// 	$data = file_get_contents($path);
				// 	$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                        
    if($user){
        	$message = array('status'=>'200', 'message'=>'User Profile', 'data'=>$user);
	        return $message;
              }
    	else{
    		$message = array('status'=>'400', 'message'=>'User not found', 'data'=>[]);
	        return $message;
    	}
        
    }   
    
    public function forgotPassword(Request $request)
    {
        $user_phone = $request->user_phone;
        
        $checkUser = DB::table('users')
                        ->where('user_phone', $user_phone)
                        ->where('is_verified',1)
                        ->first();
                        
        if($checkUser){
                $chars = "0123456789";
                $otpval = "";
                for ($i = 0; $i < 4; $i++){
                    $otpval .= $chars[mt_rand(0, strlen($chars)-1)];
                }
                
               $otpmsg = $this->otpmsg($otpval,$user_phone);
    
                $updateOtp = DB::table('users')
                                ->where('user_phone', $user_phone)
                                ->update(['otp_value'=>$otpval]);
                                
            if($updateOtp){
              $checkUser1 = DB::table('users')
            					->where('user_phone', $user_phone)
            					->first();
    		                        
    			$message = array('status'=>'1', 'message'=>'Verify OTP', 'data'=>[$checkUser1]);
	        	return $message; 
            }
            else{
                $message = array('status'=>'0', 'message'=>'Something wrong', 'data'=>[]);
	        	return $message; 
            }
        }                
        else{
            $message = array('status'=>'0', 'message'=>'User not registered', 'data'=>[]);
	        return $message;
        }
        
    }
    
    public function verifyOtp(Request $request)
    {
        $phone = $request->user_phone;
        $otp = $request->otp;
        $divice_id = $request->divice_id;
        $divice_type = $request->divice_type;
        
        // check for otp verify
        $getUser = DB::table('user')
                            ->where('user_phone', $phone)
                            ->first();
        if($getUser){
                    $updateotp = DB::table('user')
                            ->where('user_id', $getUser->user_id)
                            ->update([
                                'otp_value'=>$otp
                            ]);
            if($updateotp){
                $message = array('status'=>200, 'message'=>"Otp Matched Successfully");
                return $message;
            }
            else{
                $message = array('status'=>400, 'message'=>"Wrong OTP");
                return $message;
            }
        }else{
            $message = array('status'=>400, 'message'=>"User not registered");
            return $message;
        }
    }
    
    public function changePassword(Request $request)
    {
        $user_phone = $request->user_phone;
        $password = $request->user_password;
        
        $getUser = DB::table('users')
                    ->where('user_phone', $user_phone)
                    ->first();
                    
        if($getUser){
            $updateOtp = DB::table('users')
                            ->where('user_phone', $user_phone)
                            ->update(['user_password'=>$password]);
                                
            if($updateOtp){
              $checkUser1 = DB::table('users')
            					->where('user_phone', $user_phone)
            					->first();
    		                        
    			$message = array('status'=>'1', 'message'=>'Password changed', 'data'=>[$checkUser1]);
	        	return $message; 
            }
            else{
                $message = array('status'=>'0', 'message'=>'Something wrong', 'data'=>[]);
	        	return $message; 
            }
        }
        else{
            $message = array('status'=>0, 'message'=>"User not registered");
            return $message;
        }
    }
    
    
     public function profile_edit(Request $request)
    {
        $user_id = $request->user_id;
    	$user_name = $request->user_name;
    	$user_email = $request->user_email;
    	$user_phone = $request->user_phone;
    	$user_image = $request->user_image;
        $dob = $request->user_dob;
        $gender = $request->user_gender;
        $child_name = $request->user_child_name;
    		$uu = DB::table('user')
    	    ->where('user_id', $user_id)
    	    ->first();
    	$user_password = $uu->user_password;
        // $date=date('d-m-Y');
    	    
    	   if($request->user_image){
            $user_image = $request->user_image;
            $user_image = str_replace('data:image/png;base64,', '', $user_image);
            $fileName = str_replace(" ", "-", $user_image);
            $fileName = date('dmyHis').'user_image'.'.'.'png';
            $fileName = str_replace(" ", "-", $fileName);
            \File::put(public_path(). '/images/user/' . $fileName, base64_decode($user_image));
            $user_image = 'images/user/'.$fileName;
        }
            else{
                $user_image = 'N/A';
            }
        
        $checkUser = DB::table('user')
    			->where('user_phone', $user_phone)
    			->where('user_id','!=', $user_id)
    			->first();
    	if($checkUser && $checkUser->is_verified==1){
    		$message = array('status'=>'400', 'message'=>'This Phone number is attached with another account');
            return $message;
    	}
    	
        else{

            $checkUserForMail = DB::table('user')
                ->where('user_email', $user_email)
                ->where('user_id','!=', $user_id)
                ->first();

                if($checkUserForMail && $checkUserForMail->is_verified==1){
                    $message = array('status'=>'400', 'message'=>'This Email Address is attached with another account');
                    return $message;
                }
                else{
    		$insertUser = DB::table('user')
    		            ->where('user_id', $user_id)
    						->update([
    							'user_name'=>$user_name,
    							'user_email'=>$user_email,
    							'user_phone'=>$user_phone,
    							'user_image'=>$user_image,
    							'user_password'=>$user_password,
                                'child_name'=>$child_name,
                                'gender'=>$gender,
                                'dob'=>$dob,
    						]);
    						
            	$Userdetails = DB::table('user')
    					->where('user_id', $user_id)
    					->first();
    					
    					
    		if($insertUser){
    						
	    		$message = array('status'=>'200', 'message'=>'Profile Updated', 'data'=>$Userdetails);
	        	return $message;
	    	}
	    	else{
	    		$message = array('status'=>'400', 'message'=>'Something Went wrong');
	        return $message;
	    	}  
    	}
    }
}
    
      public function user_block_check(Request $request)
    {   
        $user_id = $request->user_id;
         $user =  DB::table('users')
                ->select('block')
                ->where('user_id', $user_id )
                ->first();
                        
    if($user){
        if($user->block==1){
        	$message = array('status'=>'1', 'message'=>'User is Blocked');
	        return $message;
        }else{
            	$message = array('status'=>'2', 'message'=>'User is Active');
	        return $message;
            }
         }
    	else{
    		$message = array('status'=>'0', 'message'=>'User not found');
	        return $message;
    	}
        
    } 
    
    public function logout(Request $request){
        $user_id = $request->user_id;
		$logout = DB::table('user')->where('user_id', $user_id)
    						->update([
    							        'remember_token' =>	Str::random(60)
    						        ]);
		if($logout){	
			$message = array('status'=>'200', 'message'=>'Successfully logged out', 'data'=>$user_id);
			return $message;
		}else{
			$message = array('status'=>'400', 'message'=>'Something Went wrong');
			return $message;
		}  
    }
    
}
