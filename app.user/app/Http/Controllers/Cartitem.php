<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class Cartitem extends Controller
{
     //add_to cart and increase qty
     public function acart($id)
     {
        echo $id ;
        die();
        $size = $req->size;
        $color = $req->color;
        $pname = $req->pname;
 
        $sid = DB::table('product_varient')
         ->select('varient_id','varient_image','price')
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
                         
                                 ]
                    ];
                    
                    session()->put('wish',$wish);
                    return view('front.wishlist',[]);
             }
             //
             if(isset($wish[$pid->varient_id]))
             {
                 echo"already added item";
             }
     
             $wish[$pid->varient_id] = [ 
                'name'      =>   $pname,
                'price'     =>   $pid->price,
                'image'    =>   $pid->varient_image,
                'size'      =>  $size,
                'color'     =>  $color,
     
                             ];
                             
                             
             session()->put('wish',$wish);                   
             return view('front.wishlist',[]);
 
 
 
             }
         
     }
 
     //delete wishlist
     public function delete($id)
     {
        $wish = session()->get('wish');
        if(isset($wish[$id]))
        {
              unset($wish[$id]);
              session()->put('wish',$wish);
        }
        return view('/wish',[]);
     }

    
  
 }
 