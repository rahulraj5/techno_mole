<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class Categorycontroller extends Controller
{
    public function list(Request $request)
    {
        $title = "Category List";
		$admin_email=Session::get('bamaAdmin');
		$admin= DB::table('admin')
			->where('admin_email',$admin_email)
			->first();
		$logo = DB::table('tbl_web_setting')
			->where('set_id', '1')
			->first();
		$category = DB::table('categories')
			        	        ->select('categories.*')
				                ->get();
		return view('admin.category.list', compact('title',"admin", "logo","category"));
    }

    public function block(Request $request)
    {
        $user_id = $request->id;
        // echo $user_id;die;
         $users = DB::table('categories')
                ->where('id',$user_id)
                ->update(['status'=>0]);
		if($users){   
			return redirect()->back()->withSuccess('Category Disabled Successfully');
		}
		else{
		  return redirect()->back()->withErrors('Something Wents Wrong');   
		}
    }
    
	public function unblock(Request $request)
    {
        
        $user_id = $request->id;
         $users = DB::table('categories')
                ->where('id',$user_id)
                ->update(['status'=>1]);
                
		if($users){   
			return redirect()->back()->withSuccess('Category ENABLED Successfully');
		}
		else{
		  return redirect()->back()->withErrors('Something Wents Wrong');   
		}
    }
     public function AddCategory(Request $request)
    {
        $title = "Add Category";
        return view('admin.category.addcategory',compact("title"));
     }
    
     public function AddNewCategory(Request $request)
    {
        $en_name = $request->encat_name;
        $ar_name = $request->arcat_name;
        $date=date('d-m-Y');
        
        $this->validate(
            $request,
                [
                    
                    'encat_name' => 'required',
                    'arcat_name' => 'required',
                    'cat_image' => 'required|max:2000',
                ],
                [
                    'encat_name.required' => 'Enter English category name.',
                    'arcat_name.required' => 'Enter Arabic category name.',
                    'cat_image.required' => 'Choose category image.',
                ]
        );

        if($request->hasFile('cat_image')){
            $category_image = $request->cat_image;
            $fileName = $category_image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $category_image->move('images/category/'.$date.'/', $fileName);
            $category_image = 'images/category/'.$date.'/'.$fileName;
        }
        else{
            $category_image = 'N/A';
        }
		
		$check = DB::table('categories')->where('name', $en_name)->first();
        if(isset($check)){
            return redirect()->back()->withErrors("Category Already Available");
        }else{
                $insertCategory = DB::table('categories')
                                                ->insert([
                                                            'name'=>$en_name,
                                                            'ar_name'=>$ar_name,
                                                            'image'=>$category_image
                                                   
                    ]);
                
        }    
    
        if($insertCategory){
            return redirect()->back()->withSuccess('Category Added Successfully');
        }
        else{
            return redirect()->back()->withErrors("Something Wents Wrong");
        }
      
    }
    
    public function EditCategory(Request $request)
    { 
		$category_id = $request->category_id;
	
		$title = "Edit Category";
        $cat =  DB::table('categories')->where('id', $category_id)->first();
       
        return view('admin.category.edit',compact("cat","title"));
    }

    public function UpdateCategory(Request $request)
    {
        $category_id = $request->category_id;
        $en_name = $request->encat_name;
        $ar_name = $request->arcat_name;
        $date=date('d-m-Y');
  
        $this->validate(
            $request,
                [
                    'encat_name' => 'required',
                    'arcat_name' => 'required'
                ],
                [
                     'encat_name.required' => 'Enter English category name.',
                    'arcat_name.required' => 'Enter Arabic category name.'
                ]
        );

        if($request->hasFile('cat_image')){
            $category_image = $request->cat_image;
            $fileName = $category_image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $category_image->move('images/category/'.$date.'/', $fileName);
            $category_image = 'images/category/'.$date.'/'.$fileName;
        }
        else{
            $category_image = $request->old_img;
        }
        
        $insertCategory = DB::table('categories')
                          ->where('id', $category_id)
                                ->update([
                                    'name'=>$en_name,
                                    'ar_name'=>$ar_name,
                                    'image'=>$category_image
                                ]);
        // 	$check = DB::table('categories')->where('name', $en_name)->first();
        // if(isset($check)){
        //     return redirect()->back()->withErrors("Category Already Available");
        // }else{
        //     $insertCategory = DB::table('categories')
        //                   ->where('id', $category_id)
        //                         ->update([
        //                             'name'=>$en_name,
        //                             'ar_name'=>$ar_name,
        //                             'image'=>$category_image
        //                         ]);
        // }
        
        if($insertCategory){
            return redirect()->back()->withSuccess('Category Update Successfully');
        }else{
            return redirect()->back()->withErrors("Something Wents Wrong");
        }
    }
    
	public function DeleteCategory(Request $request)
    {
        $category_id = $request->category_id;

    	$delete=DB::table('categories')->where('id',$category_id)->delete();
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