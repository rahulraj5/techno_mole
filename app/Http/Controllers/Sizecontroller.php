<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
class Sizecontroller extends Controller
{
    public function sizelist(Request $request)
    {
         $title = "Manage Size";
         $admin_email=Session::get('bamaAdmin');
    	 $admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
    	  $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
        
        $size = DB::table('size')
                ->paginate(6);
                
        return view('admin.size.sizelist', compact('title','size','admin','logo'));    
        
        
    }
	
	
    public function size(Request $request)
    {
        $title = "Size Add";
		$admin_email=Session::get('bamaAdmin');
		$admin= DB::table('admin')
				->where('admin_email',$admin_email)
				->first();
		$logo = DB::table('tbl_web_setting')
				->where('set_id', '1')
                ->first();
        
        $size = DB::table('size')
                ->get();
                
        return view('admin.size.sizeadd', compact('title','size','admin','logo'));    
    }
	
    public function sizeadd(Request $request)
    {
        $title = "Size Add";
        $size = $request->size;
      
        $this->validate(
            $request,
                [
                    
                    'size'=>'required'
                ],
                [
                    'size.required'=>'Color Name Required'
                ]
        );
        $check = DB::table('size')
				   ->where('size_name',$size)
				   ->first();
		if(empty($check)){
			 $insert = DB::table('size')
						->insert([
							'size_name'=>$size
							]);
		}
    return redirect()->back()->withSuccess('Size Added Successfully');

    }
    
    public function sizeedit(Request $request)
    {
       $title = "Size Edit";
		$admin_email=Session::get('bamaAdmin');
		$admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
		$logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
        $size_id = $request->size_id;
        
        $size = DB::table('size')
                ->where('size_id',$size_id)
                ->first();
                
        return view('admin.size.sizeedit', compact('title','size','admin','logo'));    
        
        
    }
    
    public function sizeupdate(Request $request)
    {
        $title = "Update Size";
        $id = $request->size_id;
// echo $id;die;		
        $size = $request->size;
       
        $this->validate(
            $request,
                [
                    'size'=>'required'
                ],
                [
                    'size.required'=>'Size Name Required'
                ]
        );
        
    	 $insert = DB::table('size')
    	            ->where('size_id',$id)
                    ->update([
                        'size_name'=>$size
                        ]);
                        
                        
        if ($insert){               
				/*DB::table('product_varient')
					->whereIn('color',[$check->color_id])
					// ->where('city',$check->color_id)
					->update(['color'=>$id]);*/
        
			return redirect()->back()->withSuccess('Size Updated Successfully');
        }else{
          return redirect()->back()->withErrors('Something Wents Wrong');  
        }
    }
    
    public function sizedelete(Request $request)
    {
		$size_id = $request->id;
		$size = DB::table('size')
				->where('size_id',$size_id)
				->first();

		$delete = DB::table('size')->where('size_id',$request->id)->delete();
		
		if($delete)
		{
			// DB::table('product_varient')
				// ->whereIn('color',[$color->color_id])
				// ->update(['color'=>removeItemString[$color->color_id]]);
			return redirect()->back()->withSuccess('Delete successfully');

		}
		else
		{
		   return redirect()->back()->withErrors('Something Wents Wrong'); 
		}
    }
	
	public function currencylist(Request $request)
    {
         $title = "Manage Currency";
         $admin_email=Session::get('bamaAdmin');
    	 $admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
    	  $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
        
        $currency = DB::table('currency')
						->paginate(6);
                
        return view('admin.currency.currencylist', compact('title','currency','admin','logo'));   
    }
	
	public function currency(Request $request)
    {
        $title = "Currency Add";
		$admin_email=Session::get('bamaAdmin');
		$admin= DB::table('admin')
				->where('admin_email',$admin_email)
				->first();
		$logo = DB::table('tbl_web_setting')
				->where('set_id', '1')
                ->first();
        
        $currency = DB::table('currency')
                ->get();
                
        return view('admin.currency.currencyadd', compact('title','currency','admin','logo'));    
    }
	
	public function currencyadd(Request $request)
    {
        $title = "Currency Add";
        $c_name = $request->name;
        $c_sign = $request->sign;
      
        $this->validate(
            $request,
                [
                    'name'=>'required',
                    'sign'=>'required'
                ],
                [
                    'name.required'=>'Currency Name Required',
                    'sign.required'=>'Currency Sign Required'
                ]
        );
        $check = DB::table('currency')
				   ->where('currency_name',$c_name)
				   ->first();
		if(empty($check)){
			 $insert = DB::table('currency')
						->insert([
							'currency_name'=>$c_name,
							'currency_sign'=>$c_sign,
							]);
		}
		return redirect()->back()->withSuccess('Currency Added Successfully');
    }
	
	public function currencyedit(Request $request)
    {
       $title = "Currency Edit";
		$admin_email=Session::get('bamaAdmin');
		$admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
		$logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
        $currency_id = $request->id;
        
        $currency = DB::table('currency')
                ->where('id',$currency_id)
                ->first();
        return view('admin.currency.currencyedit', compact('title','currency','admin','logo'));    
        
        
    }
    
    public function currencyupdate(Request $request)
    {
        $title = "Update Currency";
        $id = $request->currency_id;
        $c_name = $request->name;		
        $c_sign = $request->sign;
       
        $this->validate(
            $request,
                [
                    'name'=>'required',
                    'sign'=>'required'
                ],
                [
                    'name.required'=>'Currency Name Required',
                    'sign.required'=>'Currency Sign Required'
                ]
        );
        
    	 $insert = DB::table('currency')
    	            ->where('id',$id)
                    ->update([
                        'currency_name'=>$c_name,
                        'currency_sign'=>$c_sign
                        ]);
                        
                        
        if ($insert){               
			return redirect()->back()->withSuccess('Currency Updated Successfully');
        }else{
          return redirect()->back()->withErrors('Something Wents Wrong');  
        }
    }
    
    public function currencydelete(Request $request)
    {
		$currency_id = $request->id;
		$currency = DB::table('currency')
				->where('id',$currency_id)
				->first();

		$delete = DB::table('currency')->where('id',$request->id)->delete();
		
		if($delete)
		{
			return redirect()->back()->withSuccess('Delete successfully');

		}
		else
		{
		   return redirect()->back()->withErrors('Something Wents Wrong'); 
		}
    }
}