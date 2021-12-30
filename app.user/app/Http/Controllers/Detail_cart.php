<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class Detail_cart extends Controller
{
    //add_to cart and increase qty
    public function acart(Request $req)
    {
        $delivery = DB::table('freedeliverycart')->get();
        foreach($delivery as $dd) { }

        if($req->addtocartbtn == "Add to cart"){
            
            $id = $req->pid;
       $size = $req->size;
       $color = $req->color;
       $qty = $req->quantity;
       $pname = $req->pname;

       $sid = DB::table('product_varient')
        ->select('varient_id','varient_image','price','current_stock','mrp')
        ->where([
            ['product_id', '=', $id],
            ['size', '=', $size],           
            ['color', '=', $color]
         ])->get();

       
   
        $cart = session()->get('cart');
        foreach($sid as $pid){
            if(!$cart)
            {
               $cart = [
                   $pid->varient_id => [
                       'vid'        =>  $pid->varient_id,
                       'shipping'   =>  $dd->min_cart_value,
                       'mrp'        =>  $pid->mrp,
                       'name'      =>   $pname,
                       'quantity'  =>   $qty,
                       'price'     =>   $pid->price,
                        'image'    =>   $pid->varient_image,
                        'size'      =>  $size,
                        'color'     =>  $color,
                        'total'     =>  $pid->price*$qty,
                        'stock'    =>  $pid->current_stock
                                ]
                   ];
                   
                   session()->put('cart',$cart);
                   return view('front.acart',[]);
            }
            //
            if(isset($cart[$pid->varient_id]))
            {
                $cart[$pid->varient_id]['quantity']++;
                session()->put('cart',$cart);
                return view('front.acart',[]);
            }
    
            $cart[$pid->varient_id] = [ 
                'vid'        =>  $pid->varient_id,
                'shipping'   =>  $dd->min_cart_value,
                'mrp'        =>  $pid->mrp,
                'name'      =>   $pname,
                'quantity'  =>   $qty,
                'price'     =>   $pid->price,
                 'image'    =>   $pid->varient_image,
                 'size'      =>  $size,
                 'color'     =>  $color,
                 'total'     =>  $pid->price*$qty,
                 'stock'    =>  $pid->current_stock
                 
    
                            ];
                            
                            
            session()->put('cart',$cart);                   
            return view('front.acart',[]);



            }
        }
        else if($req->addtocartbtn == "Add to wishlist"){
         $id = $req->pid;
         $size = $req->size;
         $color = $req->color;
         $pname = $req->pname;

        $sid = DB::table('product_varient')
         ->select('varient_id','varient_image','price','current_stock')
         ->where([
             ['product_id', '=', $id],
             ['size', '=', $size],           
             ['color', '=', $color]
          ])->get();
 
        
    
         $wish = session()->get('wish');
         foreach($sid as $pid){
             if(!$wish)
             {
                $wish = [
                    $pid->varient_id => [
                        'name'      =>   $pname,
                         'price'     =>   $pid->price,
                         'image'    =>   $pid->varient_image,
                         'size'      =>  $size,
                         'color'     =>  $color,
                         'stock'    =>  $pid->current_stock
                         
                                 ]
                    ];
                    
                    session()->put('wish',$wish);
                    return view('front.wishlist',[]);
             }
             //
             if(isset($wish[$pid->varient_id]))
             {
                return view('front.wishlist',[]);
             }
     
             $wish[$pid->varient_id] = [ 
                'name'      =>   $pname,
                'price'     =>   $pid->price,
                'image'    =>   $pid->varient_image,
                'size'      =>  $size,
                'color'     =>  $color,
                'stock'    =>  $pid->current_stock
     
                             ];
                             
                             
             session()->put('wish',$wish);                   
             return view('front.wishlist',[]);
 
 
             }
        }
       
        
    }

    //delete cart
    public function delete($id)
    {
       $cart = session()->get('cart');
       if(isset($cart[$id]))
       {
             unset($cart[$id]);
             session()->put('cart',$cart);
       }
       return view('front.acart');
    }

//delete wishlist
public function delete_wish($id)
{
   $wish = session()->get('wish');
   if(isset($wish[$id]))
   {
         unset($wish[$id]);
         session()->put('wish',$wish);
   }
   return view('front.wishlist',[]);
}
//update cart qty
public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            $cart[$request->id]["total"] = $cart[$request->id]["quantity"]*$cart[$request->id]["price"];
            session()->put('cart', $cart);
            return response()->json([ "total" => $cart[$request->id]["total"], ]);
        }
    }

//direct_addtocart
public function direct_add_cart($id,$name)
{
   
    $delivery = DB::table('freedeliverycart')->get();
    foreach($delivery as $dd) { }   
    $sid = DB::table('product_varient')
           ->where('varient_id',$id)      
           ->get();

        $cart = session()->get('cart');
        foreach($sid as $pid){
            if(!$cart)
            {
               $cart = [
                   $pid->varient_id => [
                        'vid'        =>  $pid->varient_id,
                        'shipping'   =>  $dd->min_cart_value,
                         'mrp'        =>  $pid->mrp,
                       'name'      =>   $name,
                       'quantity'  =>   1,
                       'price'     =>   $pid->price,
                        'image'    =>   $pid->varient_image,
                        'size'      =>  $pid->size,
                        'color'     =>  $pid->color,
                        'total'     =>  $pid->price*1,
                        'stock'    =>  $pid->current_stock
                        
                                ]
                   ];

                   session()->put('cart',$cart);
                   return view('front.acart',[]);
            }
           
            //
            if(isset($cart[$pid->varient_id]))
            {
                Session::flash('message', 'Already ADDED ITEM'); 
                return view('front.acart');
            }
    
            $cart[$pid->varient_id] = [ 
                'vid'        =>  $pid->varient_id,
                'shipping'   =>  $dd->min_cart_value,
                'mrp'        =>  $pid->mrp,
                'name'      =>   $name,
                'quantity'  =>   1,
                'price'     =>   $pid->price,
                 'image'    =>   $pid->varient_image,
                 'size'      =>  $pid->size,
                 'color'     =>  $pid->color,
                 'total'     =>  $pid->price*1,
                 'stock'    =>  $pid->current_stock
                 
    
                            ];
                            
                            
            session()->put('cart',$cart);                   
            return view('front.acart',[]);

    
           



            
        }

}
//direct_addtowishlist
public function direct_add_wish($id,$name)
{
      //
    $sid = DB::table('product_varient')
    ->where('varient_id',$id)         
     ->get();
  
    $wish = session()->get('wish');
    foreach($sid as $pid){
        if(!$wish)
        {
           $wish = [
               $pid->varient_id => [
                   'name'      =>   $name,
                    'price'     =>   $pid->price,
                    'image'    =>   $pid->varient_image,
                    'size'      =>  $pid->size,
                    'color'     =>  $pid->color,
                    'stock'    =>  $pid->current_stock
                    
                            ]
               ];
               
               session()->put('wish',$wish);
               return view('front.wishlist',[]);
        }
       //
        if(isset($wish[$pid->varient_id]))
        {
            Session::flash('other', 'Already ADDED ITEM!'); 
            return view('front.wishlist',[]);
        }

        $wish[$pid->varient_id] = [ 
            'name'      =>   $name,
            'price'     =>   $pid->price,
            'image'    =>   $pid->varient_image,
            'size'      =>  $pid->size,
            'color'     =>  $pid->color,
            'stock'    =>  $pid->current_stock

                        ];
                        
        session()->put('wish',$wish);                   
        return view('front.wishlist',[]);

}

}
}
