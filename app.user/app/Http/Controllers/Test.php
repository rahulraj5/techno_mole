<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//for password
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Mail\testemail;
use Mail;
use Session;


class Test extends Controller
{
    //
    public function active()
    {
             
        $product = DB::table('products')->get();
        return view('active',['product' => $product]);
    }

    public function update($id, $ss)
    {

        $status = DB::table('products')
       ->where('id', $id)
       ->update([
        'status' => $ss
        ]);
       
        $product = DB::table('products')->get();
        return view('active',['product' => $product]);
    }

    public function verify(Request $req)
    {
       $login = DB::table('users')->where('email',$req->email)->get();
       
        if($login->isEmpty())
        {
            return response()->json([ 
                'no' => "INVALID_EMAIL_ID",
            ]);
        }else{
            $number = mt_rand(100000, 999999);
            Mail::to([$req->email])->send(new testemail($number));
            DB::table('users')->where('email', $req->email)
             ->update(['otp_value' => $number]);
            return response()->json([ 
                'yes' => "success",
            ]);

        }
      
    
     
      

    }
public function right(Request $req)
{
    
    $email = $req->email;
    $otp = $req->password;
    $check = DB::table('users')
    ->where('email', $email)
    ->where('otp_value',$otp)
    ->get();
    if($check->isEmpty())
    {
        return response()->json([ 
            'false' => "otp_invalid",
        ]);
    }else{
        return response()->json([ 
            'right' => "success",
        ]);
    }
        
}
   
public function update_password(Request $req)
    {
       
        $password = $req->npassword;
       $email = $req->email;
        $otp = $req->password;
       $validated = $req->validate([
        
        'password' =>'required||max:8||min:6||',  
       
         ],[
            'password.required' => 'Password is required'
            ]);
         
       $check = DB::table('users')
    ->where('email', $email)
    ->where('otp_value',$otp)
    ->update(['password' => Hash::make($password)]);
    
            return redirect('/login');
     

    }
//
    public function vproduct(Request $req)
    {
        
        
        //  $color = $req->color;
        $cid = $req->id;
        $size = $req->size;
        $color = $req->color;
        $from = $req->min;
        $to = $req->max;

    $product = DB::table('product_varient')
    ->join("products", "product_varient.product_id", "=", "products.id")
    ->join("size", "product_varient.size", "=", "size.size_id")
    ->join("color", "product_varient.color", "=", "color.color_id")
    ->where('products.subcategory_id',$cid)
    ->where('size',$size)
    ->where('color',$color) 
    ->whereBetween('price', [$from, $to])   
    ->where('vstatus',1)
    ->get();
    $wordCount = $product->count();
    return view('front.today',['product' => $product, 'wordCount' => $wordCount]);



        
       
        // echo"<pre>";
        // print_r($varient_product);
        // $wordCount = $product->count();
        // // $product = DB::table('products')
        // // ->where('subcategory_id',$id)
        // // ->where('status',1)
        // // ->get();
        // return json_encode(array('data'=>$data));
        
        
    }

    public function asc_name(Request $req)
    {

        $cid = $req->id;
        $size = $req->size;
        $color = $req->color;
        $from = $req->min;
        $to = $req->max;

    $product = DB::table('product_varient')
    ->join("products", "product_varient.product_id", "=", "products.id")
    ->join("size", "product_varient.size", "=", "size.size_id")
    ->join("color", "product_varient.color", "=", "color.color_id")
    ->where('products.subcategory_id',$cid)
    ->where('size',$size)
    ->where('color',$color) 
    ->whereBetween('price', [$from, $to])   
    ->where('vstatus',1)
    // ->orderBy('products.name', 'desc')
     ->orderBy('products.name', 'asc')
    ->get();
    $wordCount = $product->count();
    return view('front.today',['product' => $product, 'wordCount' => $wordCount]);
    }

    //product_by desc
    public function dsc_name(Request $req)
    {

        $cid = $req->id;
        $size = $req->size;
        $color = $req->color;
        $from = $req->min;
        $to = $req->max;

    $product = DB::table('product_varient')
    ->join("products", "product_varient.product_id", "=", "products.id")
    ->join("size", "product_varient.size", "=", "size.size_id")
    ->join("color", "product_varient.color", "=", "color.color_id")
    ->where('products.subcategory_id',$cid)
    ->where('size',$size)
    ->where('color',$color) 
    ->whereBetween('price', [$from, $to])   
    ->where('vstatus',1)
    ->orderBy('products.name', 'desc')
    ->get();
    $wordCount = $product->count();
    return view('front.today',['product' => $product, 'wordCount' => $wordCount]);
    }
//product by price
    public function asc_price(Request $req)
    {

        $cid = $req->id;
        $size = $req->size;
        $color = $req->color;
        $from = $req->min;
        $to = $req->max;

    $product = DB::table('product_varient')
    ->join("products", "product_varient.product_id", "=", "products.id")
    ->join("size", "product_varient.size", "=", "size.size_id")
    ->join("color", "product_varient.color", "=", "color.color_id")
    ->where('products.subcategory_id',$cid)
    ->where('size',$size)
    ->where('color',$color) 
    ->whereBetween('price', [$from, $to])   
    ->where('vstatus',1)
    // ->orderBy('product_varient.price', 'desc')
     ->orderBy('product_varient.price', 'asc')
    ->get();
    $wordCount = $product->count();
    return view('front.today',['product' => $product, 'wordCount' => $wordCount]);
    }

    //product by desc_price
    public function dsc_price(Request $req)
    {

        $cid = $req->id;
        $size = $req->size;
        $color = $req->color;
        $from = $req->min;
        $to = $req->max;

    $product = DB::table('product_varient')
    ->join("products", "product_varient.product_id", "=", "products.id")
    ->join("size", "product_varient.size", "=", "size.size_id")
    ->join("color", "product_varient.color", "=", "color.color_id")
    ->where('products.subcategory_id',$cid)
    ->where('size',$size)
    ->where('color',$color) 
    ->whereBetween('price', [$from, $to])   
    ->where('vstatus',1)
    ->orderBy('product_varient.price', 'desc')     
    ->get();
    $wordCount = $product->count();
    return view('front.today',['product' => $product, 'wordCount' => $wordCount]);
    }

    //display product by category using ajax at home
    public function dpbsc($id)
        {
           
  
            //for subcat image
            $simage = DB::table('sub_categories')
            ->select("image")
            ->where('id',$id)
            ->get();

            $bysub = DB::table('product_varient')
            ->select('products.name as name','product_varient.current_stock	 as current_stock',
                'product_varient.varient_id  as vid', 'product_varient.varient_image as varient_image',
                'product_varient.other_image as other_image', 'product_varient.product_id as pid',
                'product_varient.mrp as mrp', 'product_varient.price as price','product_varient.en_description as en_description')
               
                ->join("products", "product_varient.product_id", "=", "products.id")
                ->where('products.subcategory_id',$id)
                ->limit(3)            
                 ->get();
           
            return view('front.ajax_home',['simage' => $simage,'bysub' => $bysub]);
            
        }
        //
        public function insertall()
        {
           
            $user = session()->get('user_id');
          //  $cart = session()->get('cart');
           $address = DB::table('address')
           ->select('address_id')
           ->where('user_id', $user)
           ->get();
           $dcharge =  DB::table('freedeliverycart')->get();
           $coupn =  DB::table('coupon')
           ->where('coupon_code', 12453)
           ->get();
          

            $number = mt_rand(10,99);
            
        
            if(session('cart'))
            {
               
                foreach(session('cart') as $id => $product)
                {
                    DB::table('store_orders')->insert(array(array("product_name"=> $product['name'], "varient_image"=> $product['image'],
                    "quantity" => $product['quantity'], "unit"=> "nos", "varient_id"=> $product['vid'],"price"=> $product['total'],
                    "total_mrp"=> $product['mrp'] * $product['quantity'], "order_cart_id"=> $number )));
                    
                }
                //for order_table
        foreach($address as $add)
        {
            
                $store =  DB::table('store_orders')
                ->selectRaw('sum(price) as price, sum(total_mrp) as mrp')
                ->where('order_cart_id',$number)
                ->get();
                foreach($store as $stores)
                {
                    foreach($dcharge as $dc)
                    {
                       if($stores->price >= $dc->min_cart_value)
                       {
                           $charge = 0;
                       }else{
                           $charge = $dc->del_charge;
                       }
                    }
                    foreach($coupn as $discount)
                    {
                       if($stores->price >= $discount->cart_value)
                       {
                           $disc_amount = $discount->amount;
                           $cid = $discount->coupon_id;
                       }else{
                           $disc_amount = 0;
                           $cid = 0;
                       }
                    }
                 DB::table('orders')->insert(
                         ['user_id' => $user,
                         'cart_id' => $number,
                         'address_id' => $add->address_id,
                         'total_price' => $stores->price + $charge,
                         'price_without_delivery' => $stores->price,
                         'total_products_mrp' => $stores->mrp,
                        'delivery_charge' => $charge,
                        'coupon_id' => $cid,
                        'coupon_discount' => $disc_amount 
                         ]
                     );

            }
           
           
            

        }
               
                

            }else{

                
                echo "not added item to cart";

            }
          
        }
        
}
