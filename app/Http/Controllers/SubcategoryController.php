<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class SubcategoryController extends Controller
{
    public function list(Request $request)
    {
        $title = "Sub Category List";
		$admin_email=Session::get('bamaAdmin');
		$admin= DB::table('admin')
			->where('admin_email',$admin_email)
			->first();
		$logo = DB::table('tbl_web_setting')
			->where('set_id', '1')
			->first();
		$subcategory = DB::table('sub_categories')
		                        ->join('categories', 'sub_categories.category_id', 'categories.id')
		                        ->select('sub_categories.*', 'categories.name as cat_name')
		                        ->get();
		return view('admin.subcategory.list', compact('title',"admin", "logo","subcategory"));
    }

    public function block(Request $request)
    {
        $user_id = $request->id;
        // echo $user_id;die;
         $users = DB::table('sub_categories')
                ->where('id',$user_id)
                ->update(['status'=>0]);
		if($users){   
			return redirect()->back()->withSuccess('Sub_category Disabled Successfully');
		}
		else{
		  return redirect()->back()->withErrors('Something Wents Wrong');   
		}
    }
    
	public function unblock(Request $request)
    {
        
        $user_id = $request->id;
         $users = DB::table('sub_categories')
                ->where('id',$user_id)
                ->update(['status'=>1]);
                
		if($users){   
			return redirect()->back()->withSuccess('Sub_category ENABLED Successfully');
		}
		else{
		  return redirect()->back()->withErrors('Something Wents Wrong');   
		}
    }
     public function AddsubCategory(Request $request)
    {
        $title = "Add Sub Category";
    	$category = DB::table('categories')->where('status', 1)->get();
        return view('admin.subcategory.addsubcategory',compact("title","category"));
     }
    
     public function AddNewsubCategory(Request $request)
    {
        $category_id = $request->category;
        $en_name = $request->ensubcat_name;
        $ar_name = $request->arsubcat_name;
        $date=date('d-m-Y');
        
        $this->validate(
            $request,
                [
                    'category'  => 'required',
                    'ensubcat_name' => 'required',
                    'arsubcat_name' => 'required'
                ],
                [
                    'category.required' =>  'Select category name.',
                    'ensubcat_name.required' => 'Enter English sub category name.',
                    'arsubcat_name.required' => 'Enter Arabic sub category name.'
                ]
        );

		$check = DB::table('sub_categories')->where('category_id', $category_id)->where('name',$en_name)->first();
        if(isset($check)){
            return redirect()->back()->withErrors("Sub Category Already Available This Category");
        }else{
                if($request->hasFile('image')){
                    $sub_category_image = $request->image;
                    $fileName = $sub_category_image->getClientOriginalName();
                    $fileName = str_replace(" ", "-", $fileName);
                    $sub_category_image->move('images/subcategory/'.$date.'/', $fileName);
                    $sub_category_image = 'images/subcategory/'.$date.'/'.$fileName;
                }
                else{
                    $sub_category_image = 'N/A';
                }
                $insertCategory = DB::table('sub_categories')
                                                ->insert([
                                                            'name'      =>  $en_name,
                                                            'ar_name'   =>  $ar_name,
                                                            'category_id' =>$category_id,
                                                            'image' => $sub_category_image
                                                   
                    ]);
                
        }    
    
        if($insertCategory){
            return redirect()->back()->withSuccess('Sub Category Added Successfully');
        }
        else{
            return redirect()->back()->withErrors("Something Wents Wrong");
        }
      
    }
    
    public function EditsubCategory(Request $request)
    { 
		$subcat_id = $request->subcategory_id;
	
		$title = "Edit Category";
        $category = DB::table('categories')->get();
        $subcat =  DB::table('sub_categories')->where('id', $subcat_id)->first();
        return view('admin.subcategory.editsubcategory',compact("subcat","title","category"));
    }

    public function UpdatesubCategory(Request $request)
    {
        $subcat_id = $request->subcategory_id;
        $cat_id = $request->category;
        $en_name = $request->ensubcat_name;
        $ar_name = $request->arsubcat_name;
        $date=date('d-m-Y');
  
        $this->validate(
            $request,
                [
                    'category'  => 'required',
                    'ensubcat_name' => 'required',
                    'arsubcat_name' => 'required'
                ],
                [
                     'category.required' =>  'Select category name.',
                    'ensubcat_name.required' => 'Enter English sub category name.',
                    'arsubcat_name.required' => 'Enter Arabic sub category name.'
                ]
        );
        
        if($request->hasFile('sub_cat_image')){
            $sub_category_image = $request->sub_cat_image;
            $fileName = $sub_category_image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $sub_category_image->move('images/subcategory/'.$date.'/', $fileName);
            $sub_category_image = 'images/subcategory/'.$date.'/'.$fileName;
        }
        else{
            $sub_category_image = $request->old_img;
        }
         $insertCategory = DB::table('sub_categories')
                                  ->where('id', $subcat_id)
                                                ->update([
                                                                    'name'      =>  $en_name,
                                                                    'ar_name'   =>  $ar_name,
                                                                    'category_id' =>$cat_id,
                                                                    'image'=>$sub_category_image
                                        ]);
    // 	$check = DB::table('sub_categories')->where('category_id', $cat_id)->where('name',$en_name)->first();
    //     if(isset($check)){
    //         return redirect()->back()->withErrors("Sub Category Already Available This Category");
    //     }else{
    //         $insertCategory = DB::table('sub_categories')
    //                       ->where('id', $subcat_id)
    //                                     ->update([
    //                                                         'name'      =>  $en_name,
    //                                                         'ar_name'   =>  $ar_name,
    //                                                         'category_id' =>$cat_id,
    //                                                         'image'=>$sub_category_image
    //                             ]);
    //     }
        
        if($insertCategory){
            return redirect()->back()->withSuccess('Sub Category Update Successfully');
        }else{
            return redirect()->back()->withErrors("Something Wents Wrong");
        }
    }
    
	public function DeletesubCategory(Request $request)
    {
        $subcat_id = $request->subcategory_id;
    	$delete=DB::table('sub_categories')->where('id', $subcat_id)->delete();
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