<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use Session;

class Varientcontroller extends Controller
{
    public function varient(Request $request)
    {
		$id = $request->id;
		$p= DB::table('products')->where('id', $id)->first();
         
        $title = "Manage Varient";
    	 
		$titles =  ucfirst($p->name." Varient");
	// echo "<pre>";print_r($titles);die;	
    	$admin_email=Session::get('bamaAdmin');
		$admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
		$logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
        $product    = DB::table('product_varient')
                                    ->leftjoin('products','products.id','=','product_varient.product_id')
                                    ->where('product_id', $id)
                                    ->paginate(10);
                 
        return view('admin.product.varient.varient_list',compact("admin_email","product","admin","id",'title','titles','logo'));
    }
    
  public function block(Request $request)
    {
        $user_id = $request->id;
        // echo $user_id;die;
         $users = DB::table('product_varient')
                ->where('varient_id',$user_id)
                ->update(['vstatus'=>0]);
		if($users){   
			return redirect()->back()->withSuccess('Product_Varient Disabled Successfully');
		}
		else{
		  return redirect()->back()->withErrors('Something Wents Wrong');   
		}
    }
    
	public function unblock(Request $request)
    {
        
        $user_id = $request->id;
         $users = DB::table('product_varient')
                ->where('varient_id',$user_id)
                ->update(['vstatus'=>1]);
                
		if($users){   
			return redirect()->back()->withSuccess('Product_Varient Enabled Successfully');
		}
		else{
		  return redirect()->back()->withErrors('Something Wents Wrong');   
		}
    }
    
    public function Addproductvarient(Request $request)
    {
        $id = $request->id;  
        $p= DB::table('products')->where('id', $id)->first();
         
        $title=$p->name." Varient Addition";
    	 
    	$admin_email=Session::get('bamaAdmin');
    	 $admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
    	  $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
        $product= DB::table('product_varient')
                 ->where('product_id', $id)
                ->get();
        $currency =  DB::table('currency')
               ->select('currency_sign')
                ->get(); 
        
         return view('admin.product.varient.add_varient',compact("admin_email","admin","id",'title','logo'));
    }
    
    
   public function AddNewproductvarient(Request $request)
    {
       // echo "<pre>";print_r($_POST);die;
        $id = $request->id;
        $mrp = $request->mrp;
        $price=$request->price;
        // $unit=$request->unit;
        $endescription = $request->en_description;
        $ardescription = $request->ar_description;
        $date = date('d-m-Y');
        $created_at=date('d-m-Y h:i a');
		$colors = implode(",",$request->color);
		$size = implode(",",$request->size);
          
        $this->validate(
            $request,
                [
                    'mrp'=>'required',
                    'en_description'=>'required',
                    'ar_description'=>'required',
                    'price'=>'required',
                    'varient_image'=>'required|mimes:jpeg,png,jpg|max:1000',
                ],
                [
                    'mrp.required'=>'Enter mrp',
                    'en_description.required'=>'Enter English description about product',
                    'ar_description.required'=>'Enter Arabic description about product',
                    'price.required'=>'enter product Sell Price',
                    'varient_image.required'=>'select an image',
                    // 'quantity.required'=>'enter quantity',
                    // 'unit.required'=>'enter unit'
                ]
        );
		$product= DB::table('product_varient')->where('product_id', $id)->first();
		$img = $product->varient_image;
				
        if($request->hasFile('varient_image')){
            $image = $request->varient_image;
            $fileName = $image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $image->move('images/product/'.$date.'/', $fileName);
            $image = 'images/product/'.$date.'/'.$fileName;
        }
        else{
            $image = $img;
        }

        $insert =  DB::table('product_varient')
                        ->insert(['product_id'=>$id,'mrp'=>$mrp, 'color'=>$colors, 'size'=>$size, 'price'=>$price,'varient_image'=>$image,'en_description'=>$endescription,'ar_description'=>$ardescription]);
        
     if($insert){
         return redirect()->back()->withSuccess('Successfully Added');
     }
     else{
     return redirect()->back()->withErrors('something went wrong');
     }
	
    }
    
    public function Editproductvarient(Request $request)
    {
 
       $varient_id=$request->id;

    	$admin_email=Session::get('bamaAdmin');
    	 $admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
    	  $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
        $product    = DB::table('product_varient')
                                    ->where('varient_id', $varient_id)
                                    ->first();
                
        $p= DB::table('products')
                         ->where('id', $product->product_id)
                        ->first();
         $title=$p->name." Varient Update";
         
    	 return view('admin.product.varient.editvarient',compact("admin_email","admin","product","varient_id",'title','logo'));
   }
    public function Updateproductvarient(Request $request)
	{
        $product_id =   $request->vid;
		$id         =   $request->pid;
        $mrp        =   $request->mrp;
        $price      =   $request->price;
        $en_descr   =   $request->endescription;
        $ar_descr   =   $request->ardescription;
        $date       =   date('d-m-Y');
        $created_at =   date('d-m-Y h:i a');
		$colors     =   implode(",",$request->color);
		$size       =   implode(",",$request->size);
        $varient_image = $request->varient_image;
        
        $getImage = DB::table('product_varient')
                                ->where('varient_id',$product_id)
                                ->first();

        $image = $getImage->varient_image;  

        if($request->hasFile('varient_image')){
             if(file_exists($image)){
                unlink($image);
            }
            $varient_image = $request->varient_image;
            $fileName = date('dmyhisa').'-'.$varient_image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $varient_image->move('images/product/'.$date.'/', $fileName);
            $varient_image = 'images/product/'.$date.'/'.$fileName;
        }
        else{
            $varient_image = $image;
        }

        $varient_update = DB::table('product_varient')
                                ->where('varient_id', $product_id)
                                ->update([
                                            'mrp'           =>  $mrp,
                                            'price'         =>  $price,
                                            'color'         =>  $colors,
                                            'size'          =>  $size,
                                            'varient_image' =>$varient_image,
                                            'en_description'=>$en_descr,
                                            'ar_description'=>$ar_descr
                                        ]);

        if($varient_update){

            return redirect()->back()->withSuccess('Updated Successfully');
        }
        else{
            return redirect()->back()->withErrors("Something Wents Wrong.");
        }
    }
	
	public function deleteproductvarient(Request $request)
    {
        $varient_id=$request->id;

        $getfile = DB::table('product_varient')
					->where('varient_id',$varient_id)
					->first();
// echo "<pre>";print_r($getfile);die;
        $product_image = $getfile->varient_image;

    	$delete=DB::table('product_varient')->where('varient_id',$request->id)->delete();
        if($delete)
        {
        
            if(file_exists($product_image)){
                unlink($product_image);
            }
         
			return redirect()->back()->withSuccess('Deleted Successfully');

        }
        else
        {
           return redirect()->back()->withErrors('Unsuccessfull Delete'); 
        }

    }
	
    
}
