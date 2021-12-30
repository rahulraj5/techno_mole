<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addcategory()
    {
		// echo "come category";die;
       
		return view('admin.category.addcategory');
    }
	
	public function Logout(){
		auth()->logout();
     return redirect('/admin');
}
}
