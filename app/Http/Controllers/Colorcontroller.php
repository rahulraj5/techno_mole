<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
class Colorcontroller extends Controller
{
    public function colorlist(Request $request)
    {
         $title = "Manage Color";
         $admin_email=Session::get('bamaAdmin');
    	 $admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
    	  $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
        
        $color = DB::table('color')
                ->paginate(6);
                
        return view('admin.color.colorlist', compact('title','color','admin','logo'));    
        
        
    }
    public function color(Request $request)
    {
        $title = "Color Add";
		$admin_email=Session::get('bamaAdmin');
		$admin= DB::table('admin')
				->where('admin_email',$admin_email)
				->first();
		$logo = DB::table('tbl_web_setting')
				->where('set_id', '1')
                ->first();
        
        $color = DB::table('color')
                ->get();
                
        return view('admin.color.coloradd', compact('title','color','admin','logo'));    
    }
	
    public function coloradd(Request $request)
    {
        $title = "Color Add";
        
        $color = $request->color;
        $color_code = $request->color_code;
      
        
        $this->validate(
            $request,
                [
                    
                    'color'=>'required',
                    'color_code'=>'required',
                ],
                [
                    'color.required'=>'Color Name Required',
                    'color_code.required'=>'Color Code Required',
                ]
        );
        $check = DB::table('color')
				   ->where('color_name',$color)
				   ->where('color_code',$color_code)
				   ->first();
		if(empty($check)){
			 $insert = DB::table('color')
						->insert([
							'color_name'=>$color,
							'color_code'=>$color_code,
							]);
		}
    return redirect()->back()->withSuccess('Color Added Successfully');

    }
    
    public function coloredit(Request $request)
    {
       $title = "Color Edit";
         $admin_email=Session::get('bamaAdmin');
    	 $admin= DB::table('admin')
    	 		   ->where('admin_email',$admin_email)
    	 		   ->first();
    	  $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();
        $color_id = $request->color_id;
        
        $color = DB::table('color')
                ->where('color_id',$color_id)
                ->first();
                
        return view('admin.color.coloredit', compact('title','color','admin','logo'));    
        
        
    }
    
    public function colorupdate(Request $request)
    {
        $title = "Update Color";
        $id = $request->color_id;
// echo $id;die;		
        $color = $request->color;
        $color_code = $request->color_code;
       
        $this->validate(
            $request,
                [
                    'color'=>'required',
                    'color_code'=>'required',
                ],
                [
                    'color.required'=>'Color Name Required',
                    'color_code.required'=>'Color Code Required',
                ]
        );
        
    	 $insert = DB::table('color')
    	            ->where('color_id',$id)
                    ->update([
                        'color_name'=>$color,
                        'color_code'=>$color_code,
                        ]);
                        
                        
        if ($insert){               
				/*DB::table('product_varient')
					->whereIn('color',[$check->color_id])
					// ->where('city',$check->color_id)
					->update(['color'=>$id]);*/
        
			return redirect()->back()->withSuccess('Color Updated Successfully');
        }else{
          return redirect()->back()->withErrors('Something Wents Wrong');  
        }
    }
    
    public function colordelete(Request $request)
    {
        
		$color_id=$request->id;

		$color = DB::table('color')
				->where('color_id',$color_id)
				->first();

		$delete = DB::table('color')->where('color_id',$request->id)->delete();
		
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
}