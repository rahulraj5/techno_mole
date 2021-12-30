<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Carbon\Carbon;

class Dealcontroller extends Controller
{
    public function list(Request $request)
    {
        $title = "Offer Products List";
        $currentdate = Carbon::now();
         $admin_email=Session::get('bamaAdmin');
    	 $admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
    	  $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
           $deal_p = DB::table('deal_product')
                    ->leftjoin('products','deal_product.product_id','=','products.id')
                    ->paginate(10);
        
    	return view('admin.deal_product.deal_list', compact('title',"admin", "logo","deal_p","currentdate"));
    }

   
     public function AddDeal(Request $request)
    {
    
        $title = "Add Offers";
         $admin_email=Session::get('bamaAdmin');
    	 $admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
		$logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
                
		$deal = DB::table('products')->get();
        return view('admin.deal_product.deal_add',compact("deal", "admin_email","logo", "admin", "title"));
     }
    
     public function AddNewDeal(Request $request)
    {
        $p_id       = $request->product_id;
        $deal_price = $request->deal_price;
        $valid_from = $request->valid_from;
        $valid_to = $request->valid_to;
        $date=date('d-m-Y');
        
        $this->validate(
            $request,
                [
                    
                    'product_id' => 'required',
                    'deal_price' => 'required',
                    'valid_from' => 'required',
                    'valid_to'   =>'required',
                ],
                [
                    'product_id.required' => 'Select Product',
                    'deal_price.required' => 'Enter Deal Price',
                    'valid_from.required' => 'Choose valid from date',
                    'valid_to.required'=> 'Choose valid from date',
                ]
        );

        if($request->hasFile('offer_image')){
            $offer_image = $request->offer_image;
            $fileName = $offer_image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $offer_image->move('images/product/'.$date.'/', $fileName);
            $offer_image = 'images/product/'.$date.'/'.$fileName;
        }
        else{
            $offer_image = 'N/A';
        }
        $insertOffers = DB::table('deal_product')
                                ->insert([
                                    'product_id'    =>  $p_id,
                                    'deal_price'    =>  $deal_price,
                                    'valid_from'    =>  $valid_from,
                                    'valid_to'      =>  $valid_to,
                                    'status'        =>  1,
                                    'deal_img'      =>  $offer_image
                            ]);
        
        if($insertOffers){
            return redirect()->back()->withSuccess('Offer Products Added successfully');
        }
        else{
            return redirect()->back()->withErrors("Something Wents Wrong");
        }
      
    }
    
    public function EditDeal(Request $request)
    {
        $deal_id = $request->id;
        $title = "Edit Offer Products";
        
        $admin_email=Session::get('bamaAdmin');
	    $admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
	    $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
        $product = DB::table('products')->get();    
        $deal_p = DB::table('deal_product')
                    ->join('products','deal_product.product_id','=','products.id')
                    ->where('deal_id',$deal_id)
                    ->first();
        return view('admin.deal_product.deal_edit',compact("deal_p","admin_email","admin","logo","product", "title"));
    }

    public function UpdateDeal(Request $request)
    {
        $deal_id    = $request->deal_id;
		$pro_id     = $request->product_id;
        $deal_price = $request->deal_price;
        $valid_from = $request->valid_from;
        $valid_to   = $request->valid_to;
        $date       = date('d-m-Y');
 
        $this->validate(
            $request,
                [
                    'product_id' => 'required',
                    'deal_price' => 'required',
                    'valid_from' => 'required',
                    'valid_to'=>'required',
                ],
                [
                    'product_id.required' => 'Select Varient',
                    'deal_price.required' => 'Enter Deal Price',
                    'valid_from.required' => 'Choose valid from date',
                    'valid_to.required'=> 'Choose valid from date',
                ]
        );
        if($request->hasFile('offer_image')){
            $offer_image = $request->offer_image;
            $fileName = $offer_image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $offer_image->move('images/product/'.$date.'/', $fileName);
            $offer_image = 'images/product/'.$date.'/'.$fileName;
        }
        else{
            $offer_image = $request->old_img;
        }

        $updateDeal = DB::table('deal_product')
                    ->where('deal_id', $deal_id)
                            ->update([
                                    'product_id'    =>  $pro_id,
                                    'deal_price'    =>  $deal_price,
                                    'valid_from'    =>  $valid_from,
                                    'valid_to'      =>  $valid_to,
                                    'status'        =>  1,
                                    'deal_img'      =>  $offer_image
                            ]);
        
        if($updateDeal){
            return redirect()->back()->withSuccess('Deal Product Updated successfully');
        }
        else{
            return redirect()->back()->withErrors("Something Wents Wrong");
        }
    }

 public function DeleteDeal(Request $request)
    {
        $deal_id=$request->id;

    	$delete=DB::table('deal_product')->where('deal_id',$deal_id)->delete();
        if($delete)
        {
        return redirect()->back()->withSuccess('Deleted Successfully');
        }
        else
        {
           return redirect()->back()->withErrors('Unsuccessfull Delete'); 
        }
    }

}