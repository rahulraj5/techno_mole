<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use \stdClass;

class DashboardController extends Controller
{
	public function privacy_policy(Request $request){
	   $privacy_policy = DB::table('privecypage')
            	        ->select('title', 'description')
    					->first();
    					
    					
    		if($privacy_policy){
    						
	    		$message = array('status'=>'200', 'message'=>'Pivacy Policy Fetched SuccessFully', 'data'=>$privacy_policy);
	        	return $message;
	    	}
	    	else{
	    		$message = array('status'=>'400', 'message'=>'Something Went wrong');
	        return $message;
	    	}  
	}
	
	public function dashboard(Request $request){
	    $coupon = DB::table('coupon')
	                    ->select(
	                                'coupon_id',
	                                'coupon_name',
	                                'coupon_code',
	                                'coupon_description',
	                                'start_date',
	                                'end_date',
	                                'cart_value',
	                                'amount',
	                                'type',
	                                'coupon_img',
	                                'uses_restriction'
	                            )
	                    ->where('status', 1)
	                    ->get();
	                    
	    $primary_banner = DB::table('banner')
        	                    ->select(
	                                'banner_id',
	                                'banner_name',
	                                'ar_bannername',
	                                'banner_image'
	                            )
        	                    ->get();
        	                    
        $secondary_banner = DB::table('secondary_banner')
        	                    ->get();
        	                   
        $categories = DB::table('categories')
        	                    ->select(
        	                                'id as cat_id',
        	                                'name as cat_name',
        	                                'ar_name',
        	                                'image'
        	                            )
        	                    ->get();
        	                    
        $new_arrival = DB::table('products')
                                ->select(
	                                'id as product_id',
	                                'category_id',
	                                'name as product_name',
	                                'ar_name',
	                                'featured_img',
	                                'mrp_price',
	                                'purchase_price',
	                                'description',
	                                'ar_description'
	                            )
                                ->orderBy('id', 'DESC')
                                ->limit(5)
        	                    ->get();
        	                    
        $bestsell = DB::table('product_varient')
                                ->join('store_orders', 'product_varient.varient_id', 'store_orders.varient_id')
                                ->join('products', 'product_varient.product_id', 'products.id')
                                ->join('orders', 'store_orders.order_cart_id', 'orders.cart_id')
                                ->where('orders.payment_status', 'SUCCESS')
                                ->select(
	                                'products.id as product_id',
	                                'products.category_id',
	                                'products.name as product_name',
	                                'products.ar_name',
	                                'products.featured_img',
	                                'products.mrp_price',
	                                'products.purchase_price',
	                                'products.description',
	                                'products.ar_description'
	                            )
                                ->groupBy('store_orders.varient_id')
                                ->orderBy('store_orders.varient_id', 'DESC')
                                ->limit(5)
        	                    ->get();
        	                    
        $data = new stdClass();
        $data->primary_banner = $primary_banner;
        $data->secondary_banner = $secondary_banner;
        $data->categories = $categories;
        $data->new_arrival = $new_arrival;
        $data->bestsell = $bestsell;
        $data->coupon = $coupon;
        
        $message = array('status'=>'200', 'message'=>'dashboard Data Fetched Successfully', 'data'=>$data);
	    return $message;
	}
	
	public function terms_and_conditions(Request $request){
	   $terms = DB::table('termspage')
            	        ->select('title', 'description')
    					->first();
    					
    					
    		if($terms){
    						
	    		$message = array('status'=>'200', 'message'=>'Terms Fetched Successfully', 'data'=>$terms);
	        	return $message;
	    	}
	    	else{
	    		$message = array('status'=>'400', 'message'=>'Something Went wrong');
	            return $message;
	    	}  
	}
	
}