<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class ProductController extends Controller
{
    //
    public function detail($id,$vid)
    {

        $latestproduct = DB::table('products')
        ->select("product_varient.varient_id as varient_id","products.id as pid","products.name as name",
        "products.photos as photos","products.product_info as product_info")
        ->join("product_varient", "products.id", "=", "product_varient.product_id")
        ->orderby('products.id','desc')
        ->limit(4)
        ->get();

        $psize = DB::table('size')->get();
        $pcolor = DB::table('color')->get();
        $vproduct = DB::table('product_varient')
        ->join("products", "product_varient.product_id", "=", "products.id")
        ->get();
        
        $category = DB::table('products')
        ->select("categories.name as name","categories.id as id","sub_categories.name as sname")
        ->join("sub_categories", "products.category_id", "=", "sub_categories.category_id")
        ->join("categories", "products.category_id", "=", "categories.id")
        ->where('products.id', $id)
        ->get();
       
        $product = DB::table('product_varient')
            ->select("size.size_name as size_name",
                        "product_varient.varient_image as varient_image",
                        "product_varient.product_id as product_id",
                        "product_varient.en_description as en_description",
                        "size.size_name as size",
                        "size.size_id as size_id",
                        "color.color_code as color_code",
                        "color.color_id as color_id",
                        "color.color_name as color_name",
                        "products.name as product_name",
                        "products.photos as product_photos"
                        
                        )
             ->join("products", "product_varient.product_id", "=", "products.id")
             ->join("size", "product_varient.size", "=", "size.size_id")
            ->join("color", "product_varient.color", "=", "color.color_id")
             ->where("product_varient.product_id", $id)->get();
       
       
        // $product = DB::table('product_varient')
        // ->where('product_id',$id)
        // ->get();
        if(!$product->isEmpty()){

            $size  = DB::table('product_varient')
            ->select('price','color','size')
        ->where("varient_id", $vid)->get();
   return view('front.productpage',['latestproduct' => $latestproduct,'category' => $category, 'vproduct' => $vproduct,'product' => $product, 'size' => $size, 'psize' => $psize, 'pcolor' => $pcolor]);
        }
        return redirect('/category');

        
    }

    public function other(Request $req)
    {
          $pid = $req->pid;
          $si = $req->size;
         $clr = $req->color;
         
          
         $size = DB::table('product_varient')
        ->select('price','en_description')
        ->where([
            ['product_id', '=', $pid],
            ['size', '=', $si],           
            ['color', '=', $clr]
         ])->get();

         if(!$size->isEmpty())
         {
           
            return response()->json([ 
                'data' => $size,
            ]);
             
            //return ["msg" => "DATA INSERTED"];
            //return view('front.productpage',['product' => $product,'size' => $size]);

         }else{
            
            return response()->json([ 
                'msg' => 'Not_available'
            ]);
         }
     

    }
    
}
