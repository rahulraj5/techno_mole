<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
// use SendMail; 
// use SendSms;
use Carbon\Carbon;
// use App\Traits\SendMail;
// use App\Traits\SendSms;

class OrderController extends Controller
{
    
     public function order_summary(Request $request)
    {   
        $user_id = $request->user_id;
	    $cart_data = DB::table('cart')
	                    ->where('cart.user_id', $user_id)
	                    ->where('cart.order_status', 0)
	                    ->join('product_varient', 'cart.variant_id', 'product_varient.varient_id')
	                    ->join('products', 'products.id', 'product_varient.product_id')
	                    ->join('color', 'color.color_id', 'product_varient.color')
	                    ->join('size', 'size.size_id', 'product_varient.size')
	                    ->select(
	                                'cart.cart_id',
	                                'cart.qty',
	                                'products.name',
	                                'products.ar_name',
	                                'product_varient.mrp',
	                                'product_varient.price',
	                                'product_varient.en_description',
	                                'product_varient.ar_description',
	                                'product_varient.varient_image',
	                                'color.color_name',
	                                'color.color_code',
	                                'size.size_name'
	                            )
	                     ->get();
	        $extraa_data = Array();             
	       if(count($cart_data) > 0){
	           $no_of_items = count($cart_data);
	           $subtotal = 0;
	           foreach($cart_data as $cd){
	               $subtotal += ($cd->price * $cd->qty);
	           }
	           $extraa_data["sub_total"] = $subtotal;
	           $shipping_charge = DB::table('freedeliverycart')
	                                ->first();
	           if($subtotal < $shipping_charge->min_cart_value){
	               $extraa_data["total"] = $subtotal + $shipping_charge->del_charge;
	               $extraa_data["shipping_charge"] = $shipping_charge->del_charge;
	           }else{
	               $extraa_data["total"] = $subtotal;
	               $extraa_data["shipping_charge"] = "Free";
	           }
	           $gift_warp = DB::table('gift_warp')
	                                ->first();
	           $extraa_data["gift_warp_value"] = $gift_warp->value;
	           $extraa_data["noofitems"] = $no_of_items;
	           $settings = DB::table('global_product_settings')
                    ->select([
                                'cod_available',
                                'return_days',
                                'loyalty_cash',
                                'tentative_delivery'
                            ])
                    ->first();
                $extraa_data["settings"] = $settings;
                $address = DB::table('address')
                                ->where('user_id', $user_id)
                                ->where('select_status', 1)
                                ->first();
	           $message = array('status'=>'200', 'message'=>'Items Found', 'data'=> $cart_data, 'extraa_data' => $extraa_data, 'selected_address'=> $address);
			    return $message;
	       }else{
	           $message = array('status'=>'400', 'message'=>'No items in your cart', 'data'=>[]);
			    return $message;
	       }
    }
    
    public function place_order(Request $request){
        $address_id = $request->address_id;
        $cart_id = json_decode($request->cart_id);
        $payment_method = $request->payment_method;
        foreach($cart_id as $crt_id){
            $variant_id_db = DB::table('cart')
                                ->where('cart_id', $crt_id)
                                ->first();
           if(!$variant_id_db){
               $message = array('status'=>'400', 'message'=>'Item not found in cart', 'data'=>[]);
			    return $message;
           }
            $variant_id = $variant_id_db->variant_id;
            $update = DB::table('cart')
                        ->where('cart_id', $crt_id)
                        ->update([
                                    'order_status' => 1,
                                    'address_id' => $address_id,
                                    'payment_method' => $payment_method
                                ]);
            $current_stock = DB::table('product_varient')
                                ->where('varient_id', $variant_id)
                                ->first();
            $updated_stock = $current_stock->current_stock - $variant_id_db->qty;
            
            $update_stock = DB::table('product_varient') 
                        ->where('varient_id', $variant_id)
                        ->update([
                                    'current_stock' => $updated_stock,
                                ]);
        }
                            
        if($update_stock && $update){
            $message = array('status'=>'200', 'message'=>'Order Placed Successfully', 'data'=>[]);
			    return $message;
        }else{
            $message = array('status'=>'400', 'message'=>'Something Went Wrong', 'data'=>[]);
			    return $message;
        }
    }
      
  
    public function order_history(Request $request){
        $user_id = $request->user_id;
        $order = DB::table('cart')
                            ->where('user_id',$user_id)
                            ->where('order_status', 'compelete')
                            ->join('', '', '')
                            ->get();     
        if(count($order)>0){
            $message = array('status'=>'200', 'message'=>'Order List', 'data'=>$order);
            return $message;
        }else{
            $message = array('status'=>'400', 'message'=>'No Order Found', 'data'=>[]);
            return $message;
        }
    }
}