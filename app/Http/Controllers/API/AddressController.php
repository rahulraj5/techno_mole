<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class AddressController extends Controller
{
     public function address(Request $request)
    { 
            $user_id = $request->user_id;
            $token = $request->token;
            $unselect= DB::table('address')
                             ->where('user_id' ,$user_id)
                             ->get();
            if(count($unselect)>0){
                $unselect= DB::table('address')
                                 ->where('user_id' ,$user_id)
                                 ->update(['select_status' => 0]);
            }
            $receiver_name = $request->receiver_name;
            $receiver_phone = $request->receiver_phone;
            $city = $request->city_name;
            $address_lane = $request->address_lane;
            $pin = $request->pin;
            $status= 1;
       
            $added_at= Carbon::Now();
    	    
    	    $insertaddress = DB::table('address')
    						->insert([
    							'user_id'=>$user_id,
    							'receiver_name'=>$receiver_name,
    							'receiver_phone'=>$receiver_phone,
    							'city'=>$city,
    							'address_lane'=> $address_lane,
    							'pincode'=>$pin,
    							'select_status'=>1,
    							'added_at'=>$added_at
                            ]);
                            
          if($insertaddress){
                $message = array('status'=>'200', 'message'=>'Address Saved Successfully');
                return $message;
                            }		
          else{
                 $message = array('status'=>'400', 'message'=>'something went wrong');
	            return $message;
    	}
    }
      
    public function city(Request $request)
    {
    $city= DB::table('city')
         ->get();
         
       if(count($city)>0){
                $message = array('status'=>'200', 'message'=>'city list','data'=>$city);
                return $message;
                            }		
          else{
                 $message = array('status'=>'400', 'message'=>'city not found', 'data'=>[]);
	            return $message;
    	}    
    }
    
    public function society(Request $request)
    {
    $city_name = $request->city_name;
    $city = ucfirst($city_name);
    
   
    
    $society= DB::table('society')
         ->join('city', 'society.city_id','=','city.city_id')
         ->where('city.city_name',$city)
         ->get();
         
    
         
       if(count($society)>0){
                $message = array('status'=>'200', 'message'=>'Society list','data'=>$society);
                return $message;
                            }		
          else{
                 $message = array('status'=>'400', 'message'=>'Society not found', 'data'=>[]);
	            return $message;
    	}    
     }
     
     
   public function show_address(Request $request)
    {
    $user_id = $request->user_id;
       
    $address = DB::table('address')
         ->where('user_id',$user_id)
         ->where('select_status','!=',2)
         ->get();
    
	 
         
       if(count($address)>0){
		   foreach($address as $addresses)
		   {
			   $address_id[]=$addresses->address_id;
		   }
		    $check = DB::table('address')
             ->WhereIn('address_id',$address_id)
		     ->where('select_status',1)
		     ->get();
    if(count($check)==0){
		   $selected =   DB::table('address')
         ->where('user_id',$user_id)
         ->where('select_status',1)
	     ->update(['select_status'=>0]);
	}
                $message = array('status'=>'200', 'message'=>'Address Fetched Successfully','data'=>$address);
                return $message;
                            }		
          else{
                 $message = array('status'=>'400', 'message'=>'Address not found! Add Address', 'data'=>[]);
	            return $message;
    	}    
     }
     
     
public function select_address(Request $request)
    {
    $address_id = $request->address_id;
    $user = DB::table('address')
         ->where('address_id',$address_id)
         ->first();
    $checkuser = $user->user_id;  
    $select1 = DB::table('address')
         ->where('user_id',$checkuser)
         ->update(['select_status'=> 0]);
       if($select1){
             $select = DB::table('address')
         ->where('address_id',$address_id)
         ->update(['select_status'=> 1]);
                $message = array('status'=>'200', 'message'=>'Address Selected');
                return $message;
                            }		
          else{
                 $message = array('status'=>'400', 'message'=>'cannot select please try again later');
	            return $message;
    	}    
     }     
     
public function rem_user_address(Request $request)
    {
    $address_id = $request->address_id;
    $checkcart = DB::table('orders')
               ->where('address_id', $address_id)
               ->get();
    if(count($checkcart)==0) {
        $deladdress= DB::table('address')
         ->where('address_id',$address_id)
         ->delete();
        
    }  
    else{
    $deladdress= DB::table('address')
         ->where('address_id',$address_id)
         ->update(['select_status'=>2]);
    }
  
       if($deladdress){
         
                $message = array('status'=>'200', 'message'=>'Address Removed');
                return $message;
                            }		
          else{
                 $message = array('status'=>'400', 'message'=>'Try Again Later');
	            return $message;
    	}    
     }     
     
     public function delete_add(Request $request){
         $id = $request->id;
         $del = DB::table('address')
                ->where('address_id', $id)
                ->delete();
        $message = array('status'=>'200', 'message'=>'Address Deleted');
        return $message;
     }
          
     
      
	public function edit_add(Request $request)
    {
           $address_id = $request->address_id;
           $user_id = $request->user_id;
            $unselect= DB::table('address')
                     ->where('user_id' ,$user_id)
                     ->get();
                     
            if(count($unselect)>0){
            $unselect= DB::table('address')
                     ->where('user_id' ,$user_id)
                     ->update(['select_status'=> 0]);
            }
            
            $receiver_name = $request->receiver_name;
            $receiver_phone = $request->receiver_phone;
            $city = $request->city_name;
            $address_lane = $request->address_lane;
            $pin = $request->pin;
            $status= 1;
         
            $added_at= Carbon::Now();
     
    	    $insertaddress = DB::table('address')
    	                  ->where('address_id', $address_id)
    						->update([
    							'receiver_name'=>$receiver_name,
    							'receiver_phone'=>$receiver_phone,
    							'city'=>$city,
    							'address_lane'=> $address_lane,
    							'pincode'=>$pin,
    							'select_status'=>1,
    							'updated_at'=>$added_at
                            ]);
                            
          if($insertaddress){
                $message = array('status'=>'200', 'message'=>'Address Updated Successfully');
                return $message;
                            }		
          else{
                 $message = array('status'=>'400', 'message'=>'something went wrong');
	            return $message;
    	}  
     }  
}