<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class OffersController extends Controller
{
	    public function offerslist(){
    // 		$NewOffers = [];
    		$Offers = DB::table('products')
    		                        ->select('products.id as product_id','products.category_id','products.subcategory_id','products.name as product_name','products.ar_name','products.mrp_price','products.purchase_price','products.description','products.ar_description','deal_product.deal_price','deal_product.deal_img')
    		                        ->join('deal_product','products.id','=','deal_product.product_id')
    								->get();
    // 		$NewOffers['New_Offers'] = $Offers;
    		
    		if(count($Offers)>0){
                $message = array('status'=>'200', 'message'=>'Offers List', 'data'=>$Offers);
                return $message;
                }
            else{
                $message = array('status'=>'400', 'message'=>'No Offers Found', 'data'=>[]);
                return $message;
            }
	   // }else{
	   //     $message = array('status'=>'400', 'message'=>'Auth token not match');
    //             return $message;
	   // }
	}
	
}