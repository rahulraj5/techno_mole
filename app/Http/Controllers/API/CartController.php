<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function addtocart(Request $request){ 
		 
		$user_id = $request->user_id;
		$store_id = $request->vendor_id;
		$product_id = $request->product_id;
		$variant_id = $request->variant_id;
		$order_id = Str::random(15);
		
		$check = DB::table('cart')
		            ->where('user_id', $user_id)
		            ->where('product_id', $product_id)
		            ->where('variant_id', $variant_id)
		            ->where('order_status', 0)
		            ->first();
		 if($check){
		     $insertcart = DB::table('cart')
	                    ->where('cart_id', $check->cart_id)
	                    ->increment('qty');
		 }else{
		     $double_check = DB::table('cart')
		            ->where('user_id', $user_id)
		            ->where('order_status', 0)
		            ->first();
		     if($double_check){
		         $order_id = $double_check->order_id;
		     }
		     $insertcart = DB::table('cart')
		                    ->insert([
									'qty' 		=>	1,
									'user_id' 	=>	$user_id,
									'product_id'=>	$product_id,
									'order_id'=>	$order_id,
									'store_id'  =>	$store_id,
									'variant_id' => $variant_id,
								]);
		 }
		
		
		if(isset($insertcart)){
		    $noofitems = DB::table('cart')
		                ->where('user_id', $user_id)
		                ->count();
			$message = array('status'=>'200', 'message'=>'Sucessfully added into cart', 'data'=>[], 'noofitems' => $noofitems);
			return $message;
		}else{
			$message = array('status'=>'400', 'message'=>'Something went wrong', data => []);
			return $message;
		}
	}
	
	public function get_cart_items(Request $request){ 
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
	                                'product_varient.current_stock',
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
	           $address = DB::table('address')
	                            ->where('user_id', $user_id)
	                            ->select(
	                                        'address_id',
	                                        'receiver_name',
	                                        'receiver_phone',
	                                        'city',
	                                        'address_lane',
	                                        'pincode'
	                                    )
	                           ->first();
	           $extraa_data["address"] = $address;
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
	           $message = array('status'=>'200', 'message'=>'Items Found', 'data'=> $cart_data, 'extraa_data' => $extraa_data);
			    return $message;
	       }else{
	           $message = array('status'=>'400', 'message'=>'No items in your cart', 'data'=>[]);
			    return $message;
	       }
	}
	
	public function quantity_plus_or_minus(Request $request){
	    $cart_id = $request->cart_id;
	    $plus = $request->plus;
	    $minus = $request->minus;
	    if($plus){
	        $incre = DB::table('cart')
	                    ->where('cart_id', $cart_id)
	                    ->increment('qty');
	        if($incre){
	            $message = array('status'=>'200', 'message'=>'Successfully Incremented', 'data'=>[]);
			    return $message;
	        }else{
	            $message = array('status'=>'400', 'message'=>'Something went wrong', 'data'=>[]);
			    return $message;
	        }
	    }elseif($minus){
	        $decre = DB::table('cart')
	                    ->where('cart_id', $cart_id)
	                    ->decrement('qty');
	        if($decre){
	            $message = array('status'=>'200', 'message'=>'Successfully Decremented', 'data'=>[]);
			    return $message;
	        }else{
	            $message = array('status'=>'400', 'message'=>'Something went wrong', 'data'=>[]);
			    return $message;
	        }
	    }else{
	        $message = array('status'=>'400', 'message'=>'Invalid arguments', 'data'=>[]);
			return $message;
	    }
	}
	
	public function remove_item_from_cart(Request $request){
	    $cart_id = $request->cart_id;
		$cart = DB::table('cart')
		            ->where('cart_id',$cart_id)
		            ->delete();
		
		if($cart){
            $message = array('status'=>'200', 'message'=>'Product Removed Successfully', 'data'=>[]);
            return $message;
            }
        else{
            $message = array('status'=>'400', 'message'=>'Something Went Wrong', 'data'=>[]);
            return $message;
        }
	}
	
	public function filter_by(){
	    $filter = [];
	    $product = DB::table('products')->get();
	    $filter['product'] = $product;
	    $category = DB::table('categories')->get();
	    $filter['category'] = $category;
	    $subcategory = DB::table('sub_categories')->get();
	    $filter['sub_category'] = $subcategory;
	    $brands = DB::table('brands')->get();
	    $filter['brands'] = $brands;
	    $color = DB::table('color')->get();
	    $filter['colors'] = $color;
	    $rating = DB::table('delivery_rating as dr')->select('dr.rating_id','dr.product_id','dr.rating','dr.description','products.*')->join('products', 'dr.product_id', '=', 'products.id')->orderBy('dr.rating','DESC')->get();
	    $filter['rating_pro'] = $rating;
	    $shipping = DB::table('store')->get();
	    $filter['shipping'] = $shipping;
	    if(count($filter)>0){
            $message = array('status'=>'200', 'message'=>'Get All Filter', 'data'=>$filter);
            return $message;
            }
        else{
            $message = array('status'=>'400', 'message'=>'No Filter Found', 'data'=>[]);
            return $message;
        }
	}
	/*
	public function processFilter(Request $request){
	    $pro_id = $request->product_id;
	    $cat_id = json_decode($request->category_id);
	    $brand_id = $request->brand_id;
	    $color_id = $request->color_id;
	    $st_pr = $request->start_price;
	    $end_pr = $request->end_price;
	    $vend_id = $request->vendor_id;
echo "<pre>";print_r($cat_id);die;
	    if(isset($pro_id))
		    
	    if(count($filter)>0){
            $message = array('status'=>'200', 'message'=>'Get All Filter', 'data'=>$filter);
            return $message;
            }
        else{
            $message = array('status'=>'400', 'message'=>'No Filter Found', 'data'=>[]);
            return $message;
        }
	}
	
// 	public function FilterProduct(Request $request){
	    
	    
// 	}
// 	public function FilterProduct(Request $request){
	    
	    
// 	}
	*/
}