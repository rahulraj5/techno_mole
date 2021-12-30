<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Session;

class Productcontroller extends Controller
{
    public function list(Request $request)
    {
        $title = "Product List";
		$admin_email=Session::get('bamaAdmin');
		$admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
		$logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
		$product = DB::table('products')
		            ->select('products.*','categories.id as cat_id','categories.name as cat_name')
                    ->join('categories','products.category_id','=','categories.id')
                   ->get();
        
    	return view('admin.product.list', compact('title',"admin", "logo","product"));
    }
public function block(Request $request)
    {
        $user_id = $request->id;
        // echo $user_id;die;
         $users = DB::table('products')
                ->where('id',$user_id)
                ->update(['status'=>0]);
		if($users){   
			return redirect()->back()->withSuccess('Product Disabled Successfully');
		}
		else{
		  return redirect()->back()->withErrors('Something Wents Wrong');   
		}
    }
    
	public function unblock(Request $request)
    {
        
        $user_id = $request->id;
         $users = DB::table('products')
                ->where('id',$user_id)
                ->update(['status'=>1]);
                
		if($users){   
			return redirect()->back()->withSuccess('Product ENABLED Successfully');
		}
		else{
		  return redirect()->back()->withErrors('Something Wents Wrong');   
		}
    }
	public function AddProduct(Request $request)
    {
        $title = "Add Product";
         $admin_email=Session::get('bamaAdmin');
    	 $admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
    	  $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
           $category = DB::table('categories')->get();
        return view('admin.product.add_product',compact("category", "admin_email","logo", "admin","title"));
	}
	
	 public function get_subcategory(Request $request){
        $catid = $request->catid;
        $subcategory = DB::table('sub_categories')->select('id','name')->where('category_id', $catid)->get();
        return response()->json($subcategory);
         
    }
    
    public function AddNewProduct(Request $request)
    {
		$user = Auth::guard()->user();

        $en_product     = $request->en_productname;
        $ar_product     = $request->ar_productname;
        $category_id    = $request->category;
        $sub_category   = $request->sub_category;
        $endescription  = $request->en_description;
        $ar_description = $request->ar_description;
        $eng_info = $request->eng_info;
        $ar_info = $request->ar_info;
        $added_by       = $user->id;
        $date           = date('d-m-Y');
        $varient_mrp    = $request->v_mrp;
        $varient_price  = $request->v_price;
		$colors         = $request->color;
		$size           = $request->size;
    
        $this->validate(
            $request,
                [
                    'category'      =>  'required',
                    'sub_category'  =>  'required',
                    'en_productname'=>  'required',
                    'ar_productname'=>  'required',
                    'product_image' =>  'required',
                    'en_description'=>  'required',
                    'ar_description'=>  'required',
                    'v_mrp'         =>  'required',
                    'v_price'       =>  'required',
                    'color'         =>  'required',
                    'size'          =>  'required',
                ],
                [
                    'category.required'     =>  'Select category',
                    'sub_category.required' =>  'Select sub category',
                    'en_productname.required'=> 'Select english product',
                    'ar_productname.required'=> 'Enter arabic product.',
                    'product_image.required' => 'Choose product image.',
                    'en_description.required'=> 'Enter english description.',
                    'ar_description.required'=> 'Enter arabic description.',
                    'v_mrp.required'        =>  'Enter varient MRP.',
                    'v_price.required'      =>  'Enter varient Price.',
                    'color.required'        =>  'Enter varient Color.',
                    'size.required'         =>  'Enter varient Size.'
                ]
        );

        if($request->hasFile('product_image')){ 
            foreach ($request->file('product_image') as $image) {   
                $fileName = $image->getClientOriginalName();
                $fileName = str_replace(" ", "-", $fileName);
                $image->move('images/product/'.$date.'/', $fileName);
                $product_image[] = 'images/product/'.$date.'/'.$fileName;
            }
        }
        else{
            $product_image[] = 'N/A';
        }
        if($request->hasFile('promain_image')){
            $pro_image = $request->promain_image;
            $fileName = $pro_image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $pro_image->move('images/product/'.$date.'/', $fileName);
            $pro_image = 'images/product/'.$date.'/'.$fileName;
        }
        else{
            $pro_image = 'N/A';
        }
        
// echo "<pre>";print_r($product_image);/*echo "<br>";print_r($_FILES);*/die;
        $insertproduct = DB::table('products')
                                ->insertGetId([
                                        'name'          =>  $en_product,
                                        'ar_name'       =>  $ar_product,
                                        'added_by'      =>  $added_by,
                                        'category_id'   =>  $category_id,
                                        'subcategory_id'=>  $sub_category,
                                        'photos'        =>  implode(',',$product_image),
                                        'featured_img'  =>  $pro_image,
                                        'description'   =>  $endescription,
                                        'ar_description'=>  $ar_description,
                                        'product_info'  =>  $eng_info,
                                        'ar_product_info' =>$ar_info,
                                        'mrp_price'     =>  $varient_mrp,
                                        'purchase_price'=>  $varient_price
                            ]);
        
                if($insertproduct){
                         DB::table('product_varient')
                                ->insert([
                                    'product_id'    =>  $insertproduct,
                                    'varient_image' =>  implode(',',$product_image),
                                    'price'         =>  $varient_price,
                                    'color'         =>  $colors,
                                    'size'          =>  $size,
                                    'mrp'           =>  $varient_mrp,
                                    'other_image'  =>  $pro_image,
                                    'current_stock'  =>  20,
                                    'en_description' =>  $endescription,
                                    'ar_description' =>  $ar_description,
                                ]);
            
            return redirect()->back()->withSuccess('Product Added Successfully');
        }
        else{
            return redirect()->back()->withErrors("Something Wents Wrong");
        }
      
    }
   
    public function EditProduct(Request $request)
    {
		$title = "Edit Product";
		$product_id = $request->product_id;

		$admin_email=Session::get('bamaAdmin');
		$admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
		$logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
    	$category = DB::table('categories')->select('id','name')->get();
		$product = DB::table('products')
		                        ->select('products.*','categories.id as cat_id','categories.name as cat_name','sub_categories.id as sub_id','sub_categories.name as sc_name')
		                        ->leftjoin('categories','categories.id','=','products.category_id')
		                        ->leftjoin('sub_categories','sub_categories.id','=','products.subcategory_id')
		                        ->where('products.id',$product_id)->first();
        return view('admin.product.edit',compact("admin_email","admin","logo","title","product","category"));
    }

    public function UpdateProduct(Request $request)
    {
        $product_id = $request->product_id;
        $user           = Auth::guard()->user();
        $en_product     = $request->en_productname;
        $ar_product     = $request->ar_productname;
        $category_id    = $request->category;
        $sub_category   = $request->sub_category;
        $mrp            = $request->mrp;
        $price          = $request->price;
        $endescription  = $request->en_description;
        $ar_description = $request->ar_description;
        $eng_info       = $request->eng_info;
        $ar_info        = $request->ar_info;
        $added_by       = $user->id;
        $date           = date('d-m-Y');
        
        $this->validate(
            $request,
                [
                    'category'      =>  'required',
                    'sub_category'  =>  'required',
                    'en_productname'=>  'required',
                    'ar_productname'=>  'required',
                    'en_description'=>  'required',
                    'ar_description'=>  'required',
                    // 'price'         =>  'required',
                    // 'mrp'           =>  'required',
                ],
                [
                    'category.required'     =>  'Select category',
                    'sub_category.required' =>  'Select sub category',
                    'en_productname.required'=> 'Select english product',
                    'ar_productname.required'=> 'Enter arabic product.',
                    'en_description.required'=> 'Enter english description.',
                    'ar_description.required'=> 'Enter arabic description.',
                    // 'price.required'        =>  'Enter price.',
                    // 'mrp.required'          =>  'Enter MRP.',
                ]
        );

        // if($request->hasFile('product_image')){
        //     foreach ($request->file('product_image') as $image) {   

        //         $fileName = $image->getClientOriginalName();
        //         $fileName = str_replace(" ", "-", $fileName);
        //         $image->move('images/product/'.$date.'/', $fileName);
        //         $product_image[] = 'images/product/'.$date.'/'.$fileName;
        //     }
        // }
         if($request->hasFile('product_image')){
            $product_image = $request->product_image;
            $fileName = $product_image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $product_image->move('images/product/'.$date.'/', $fileName);
            $product_image = 'images/product/'.$date.'/'.$fileName;
        }
        else{
            $product_image = $request->old_img;
        }
        
        if($request->hasFile('promain_image')){
            $pro_image = $request->promain_image;
            $fileName = $pro_image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $pro_image->move('images/product/'.$date.'/', $fileName);
            $pro_image = 'images/product/'.$date.'/'.$fileName;
        }
        else{
            $pro_image = $request->oldmain_img;
        }
        $insertproduct = DB::table('products')
                       ->where('id', $product_id)
                            ->update([
                                        'name'          =>  $en_product,
                                        'ar_name'       =>  $ar_product,
                                        'added_by'      =>  $added_by,
                                        'category_id'   =>  $category_id,
                                        'subcategory_id'=>  $sub_category,
                                        'photos'        =>  $product_image,
                                        'featured_img'  =>  $pro_image,
                                        'description'   =>  $endescription,
                                        'ar_description'=>  $ar_description,
                                        'product_info'   =>  $eng_info,
                                        'ar_product_info' =>  $ar_info,
                                        // 'mrp_price'     =>  $mrp,
                                        // 'purchase_price'=>  $price
                            ]);
        
        if($insertproduct){
            return redirect()->back()->withSuccess('Product Updated Successfully');
        }
        else{
            return redirect()->back()->withErrors("Something Wents Wrong");
        }
       
    }
    
    
    
	public function DeleteProduct(Request $request)
    {
        $product_id = $request->product_id;

    	$delete=DB::table('products')->where('id',$request->product_id)->delete();
        if($delete)
        {
         $delete=DB::table('product_varient')->where('product_id',$request->product_id)->delete();  
         
        return redirect()->back()->withSuccess('Deleted Successfully');
        }
        else
        {
           return redirect()->back()->withErrors('Unsuccessfull Delete'); 
        }
    }
	
	public function stocklist(Request $request){
		$title = "Update Stock";
		$admin_email=Session::get('bamaAdmin');
		$admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
		$logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
		// $store = DB::table('product')
					// ->selectRaw('product.*, pv.varient_id')
					// ->leftJoin('product_varient as pv', 'pv.product_id', '=' , 'product.product_id')
					// ->paginate(10);
		$store = DB::table('product_varient as pv')
		            ->select('pv.*','products.name','sp.stock')
					->leftJoin('products', 'pv.product_id', '=' , 'products.id')
					->leftJoin('store_products as sp', 'sp.varient_id', '=' , 'pv.varient_id')
					->paginate(10);
        // echo "<pre>";print_r($store);die;
    	return view('admin.stock.stocklist', compact('title',"admin", "logo","store"));
	}

	public function updatestock(Request $request)
    {
		$user = Auth::guard()->user();
		$store_id = $user['id'];
        $varient_id = $request->varient_id;
        $stock = $request->stock;
        $this->validate(
            $request,
                [
                    'stock' => 'required',
                ],
                [
                    'stock.required' => 'Enter stock.',
                ]
        );
		$check = DB::table('store_products')->where('varient_id',$varient_id)->first(); 
        // echo "<pre>";print_r($check);die;
		if(isset($check)){
			// echo "check";die;
			$insertstock = DB::table('store_products')
							->where('varient_id',$varient_id)
							->update([
									'varient_id'=>$varient_id,
									'stock'=>$stock,
									'store_id'=>$store_id
								]);
		}else{
// 			echo "check update";die;
			$insertstock = DB::table('store_products')
							->insert([
									'varient_id'=>$varient_id,
									'stock'=>$stock,
									'store_id'=>$store_id
								]);
		}
        
        if($insertstock){
            return redirect()->back()->withSuccess('Stock Add Successfully');
        }
        else{
            return redirect()->back()->withSuccess("Stock Updated Successfully");
        }
       
    }
    
    
    public function AddNewProductThroughCSV(Request $request){
        $category_id=$request->cat_id;
        $date=date('d-m-Y');
        $product_image = 'images/product/12-08-2020/HomeBackground.jpg';
        
        $this->validate(
            $request,
                [
                    'cat_id'=>'required',
                    'product_csv_file' => 'required|max:1000',
                ],
                [
                    'cat_id.required'=>'Select category',
                    'product_csv_file.required' => 'Upload CSV File',
                ]
        );
        
        $upload = $request->file('product_csv_file');
        $realpath = $upload->getRealPath();
        $file = fopen($realpath, 'r');
        $i = 0;
        while(($columns=fgetcsv($file,0,",")) !== false){
            if($i == 0){
                $i = 1;
                continue;
            }else{
                $product_name = $columns[0];
                $quantity = $columns[1];
                $unit = $columns[2];
                $mrp = $columns[3];
                $price = $columns[4];
                $description = $columns[5];
                
                $insertproduct = DB::table('product')
                            ->insertGetId([
                                'cat_id'=>$category_id,
                                'product_name'=>$product_name,
                                'product_image'=>$product_image,
                                
                               
                            ]);
        
                if($insertproduct){
                     DB::table('product_varient')
                    ->insert([
                        'product_id'=>$insertproduct,
                        'quantity'=>$quantity,
                        'varient_image'=>$product_image,
                        'unit'=>$unit,
                        'price'=>$price,
                        'mrp'=>$mrp,
                        'description'=>$description,
                       
                    ]);
                    
                    
                }
                else{
                    return redirect()->back()->withErrors("Something Wents Wrong");
                }
            }
        }
        return redirect()->back()->withSuccess('Product Added Successfully');
    }


}