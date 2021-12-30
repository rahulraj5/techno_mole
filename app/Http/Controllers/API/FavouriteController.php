<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class FavouriteController extends Controller
{
    public function getfaveproduct(Request $request){
        $user_id = $request->user_id;
        // $fav = [];
        $fev_product = DB::table('products')
		                        ->select('products.id as product_id','products.category_id','products.subcategory_id','products.name as product_name','products.ar_name','products.mrp_price','products.purchase_price','products.description','products.ar_description','products.featured_img')
								->join('fav_product as fav','fav.product_id','=','products.id')
								->where('fav.fev_status',1)
								->where('fav.user_id',$user_id)->get();
    	if(count($fev_product)>0){ 
            $message = array('status'=>'200', 'message'=>'Favourite Product List', 'data'=>$fev_product);
            return $message;
        }else{
            $message = array('status'=>'400', 'message'=>'No Favourite list Found', 'data'=>[]);
            return $message;
        }
    }
    
    public function postfav_product(Request $request){
        $user_id = $request->user_id; 
        $pro_id = $request->product_id;
        $status = $request->fav_status;
        $check = DB::table('fav_product')->where('user_id',$user_id)->first();
        if(isset($check)){
            $fev_pro = DB::table('fav_product')
                            ->where('user_id', $user_id)
                            ->update([
                                        'fev_status'=>0,
                                        'product_id'=>$pro_id,
                                        'fev_status'=>$status
                                    ]);
        }else{
            $fev_pro = DB::table('fav_product')
    						->insert([
    							'user_id'=>$user_id,
                                'product_id'=>$pro_id,
                                'fev_status'=>$status
    						]);
        }
    	if($fev_pro){
            $message = array('status'=>'200', 'message'=>'Favourite Product Added Successfully');
            return $message;
        }else{
            $message = array('status'=>'400', 'message'=>'Something wents wrong');
            return $message;
        }
    }
}