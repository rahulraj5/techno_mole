<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function productslist(){
    		$product = DB::table('products')
								->get();
    		if(count($product)>0){
                $message = array('status'=>'200', 'message'=>'Product List', 'data'=>$product);
                return $message;
                }
            else{
                $message = array('status'=>'400', 'message'=>'No Product Found', 'data'=>[]);
                return $message;
            }
	}
	
	public function get_color(Request $request){
	    $variant_id = $request->product_id;
	    $size = $request->size_id;
	    $color = DB::table('product_varient')
	                ->join('color', 'color.color_id', 'product_varient.color')
	                ->where('product_id', $variant_id)
	                ->where('size', $size)
	                ->select(
	                            'color.color_name',
	                            'color.color_code'
	                        )
	                 ->get();
	    if($color){
                $message = array('status'=>'200', 'message'=>'Color Fetched Successfully', 'data'=>$color);
                return $message;
            }
        else{
            $message = array('status'=>'400', 'message'=>'No Color Found', 'data'=>[]);
            return $message;
        }
	}
	
	public function apply_filter(Request $request){
	    $category_id = $request->category_id;
	    $brand_id = $request->brand_id;
	    $color_id = $request->color_id;
	    $starting_price = floor($request->starting_price);
	    $ending_price = floor($request->ending_price);
	    
	    $sql = DB::table('products')
	                ->join('product_varient', 'product_varient.product_id', 'products.id')
	                ->join('brands', 'brands.id', 'products.brands')
	                ->select('products.*');
	   
	   
	    
	    if(count(json_decode($category_id)) > 0){
	        $sql->whereIn('products.category_id', json_decode($category_id));
	    }
	    if(count(json_decode($brand_id)) > 0){
	        $sql->whereIn('products.brands', json_decode($brand_id));
	    }
	    if(count(json_decode($color_id)) > 0){
	        $sql->whereIn('product_varient.color', json_decode($color_id));
	    }
	    if(isset($starting_price)){
	        $sql->where('products.purchase_price', '>=', $starting_price);
	    }
	    if(isset($ending_price)){
	        $sql->where('products.purchase_price', '<=', $ending_price);
	    }
	    $filtered_products = $sql->get();
	    
	    if(count($filtered_products)){
                $message = array('status'=>'200', 'message'=>'Products Fetched Successfully', 'data'=>$filtered_products);
                return $message;
            }
        else{
            $message = array('status'=>'400', 'message'=>'No Products Found', 'data'=>[]);
            return $message;
        }
	}
	
	public function product_details(Request $request){
	    $product_id = $request->product_id;
	    $user_id = $request->user_id;
		$product = DB::table('products')->where('id',$product_id)->first();
	
		if($product){
		    $result = [];
		    $i = 0;
		        $photo = explode(',',$product->photos);
		        array_push($result, $product);
    		    $varient = DB::table('product_varient')->where('product_id',$product->id)->get();
    		    if(count($varient)>0){ 
    		        $result[$i]->photos = $photo;
    		        $result[$i]->varients = $varient;
    		        $i++;
    		        $res = [];
    		        $j = 0;
    		        foreach($varient as $vr){ 
    		            array_push($res, $vr);
		                $color = DB::table('color')
                                        ->where('color_id', $vr->color)
                                        ->get();
                        $size = DB::table('size')
                                        ->where('size_id', $vr->size)
                                        ->get();
                        if(count($color)>0){
                            $res[$j]->colors = $color;
                            $res[$j]->size = $size;
                            $j++;
                        }
                    }
		        }
		         $similar_products = DB::table('products')
                ->inRandomOrder()
                ->limit(10)
                ->get();
                
        $no_of_reviews = DB::table('delivery_rating')
                    ->where('product_id', $product_id)
                    ->count();
                    
        $avg_rating = DB::table('delivery_rating')
                    ->where('product_id', $product_id)
                    ->avg('rating');
        
        if($avg_rating){
            $rating_txt = DB::table('rating_pharases')
                    ->where('rating', $avg_rating)
                    ->first();
            $product->avg_rating = $avg_rating;
            $product->rating_txt = $rating_txt->text;
        }else{
            $product->rating_txt = "";
            $product->avg_rating = null;
        }
        if($no_of_reviews){
            $product->no_of_reviews = $no_of_reviews;
        }else{
            $product->no_of_reviews = "0";
        }
        
        $is_favret = DB::table('fav_product')
                    ->select([
                                'fev_status',
                            ])
                    ->where('user_id', $user_id)
                    ->where('product_id', $product_id)
                    ->first();
        if($is_favret){
            $product->is_favret = $is_favret->fev_status;
        }else{
            $product->is_favret = "0";
        }
        
        $settings = DB::table('global_product_settings')
                    ->select([
                                'cod_available',
                                'return_days',
                                'loyalty_cash',
                                'tentative_delivery'
                            ])
                    ->first();
                    
        $product->tentative_delivery = $settings;
        
        $offers =  DB::table('deal_product')
                    ->select([
                                'deal_price',
                                'valid_from',
                                'deal_txt',
                                'valid_to'
                            ])
                    ->where('product_id', $product_id)
                    ->first();
        $product->offer = $offers;
	    }
	    
	   
	   
		if($product){
		    if(count($similar_products)>0){
		        $product->similar_products = $similar_products;
		    }
                $message = array('status'=>'200', 'message'=>'Product Details', 'data'=>$product);
                return $message;
            }
        else{
            $message = array('status'=>'400', 'message'=>'No Product Details Found', 'data'=>[]);
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