<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\DB;
use Session;
class Operation extends Controller
{
    public function showToastrMessages(){

        // Flash messages settings
       
        // session()->flash("success", "This is success message");
    
        // session()->flash("warning", "This is warning message");
    
        // session()->flash("info", "This is information message");
    
        session()->flash("error", "This is error message");
    
        return view("toastr");
      }
    //home
    public function home()
    {
        
        //for special product
         
        $discount = DB::table('product_varient')    
        ->selectraw('mrp - price as discount, product_varient.varient_id as vid, product_varient.product_id as pid,
        product_varient.mrp as mrp, product_varient.price as price, product_varient.color as color, product_varient.size as size,
        product_varient.current_stock as current_stock, product_varient.en_description as en_description,
        product_varient.varient_image as varient_image, product_varient.other_image as other_image, products.name as name	 
        ')
        ->join("products", "product_varient.product_id", "=", "products.id")
         ->orderby('discount','desc')->limit(5)
        ->get();
       
        //for best sellers
        $order = DB::table('orders')
        ->selectRaw('count(store_id) as number_of_orders, store_id')
       ->orderBy('store_id', 'asc')
       ->limit(1)
       ->groupby('store_id')
       ->get();
       foreach ($order as $orders) {
        //     $cart = DB::table('orders')
        //   ->select('product_varient.varient_id as pid','product_varient.mrp as mrp','products.name as name','product_varient.price as price','product_varient.color as color','product_varient.size as size',
        //   'product_varient.current_stock as current_stock','product_varient.en_description as en_description',
        //   'product_varient.varient_image as varient_image','product_varient.other_image as other_image','products.id as product_id')
        //   ->join("store_orders", "orders.cart_id", "=", "store_orders.order_cart_id")
        //   ->join("product_varient", "store_orders.varient_id", "=", "product_varient.varient_id")
        //   ->join("products", "product_varient.product_id", "=", "products.id")
        //   ->where('store_id', $orders->store_id)
        //   ->where('vstatus', 1)
        //   ->groupby('product_varient.varient_id')
        //   ->groupby('products.name','product_varient.varient_id','product_varient.mrp','product_varient.price','product_varient.color','product_varient.size',
        //   'product_varient.current_stock','product_varient.en_description',
        //   'product_varient.varient_image','product_varient.other_image','products.id')
        //   ->get();
           
          $cart = DB::table('orders')
          ->select('product_varient.varient_id as pid','product_varient.mrp as mrp','products.name as name','product_varient.price as price','product_varient.color as color','product_varient.size as size',
          'product_varient.current_stock as current_stock','product_varient.en_description as en_description',
          'product_varient.varient_image as varient_image','product_varient.other_image as other_image','products.id as product_id')
          ->join("store_orders", "orders.cart_id", "=", "store_orders.order_cart_id")
          ->join("product_varient", "store_orders.varient_id", "=", "product_varient.varient_id")
          ->join("products", "product_varient.product_id", "=", "products.id")
          ->where('store_id', $orders->store_id)
          ->where('vstatus', 1)
          ->groupby('product_varient.varient_id')
          ->groupby('products.name','product_varient.varient_id','product_varient.mrp','product_varient.price','product_varient.color','product_varient.size',
          'product_varient.current_stock','product_varient.en_description',
          'product_varient.varient_image','product_varient.other_image','products.id')
          ->get();
       }
       
        //for our categories
        $bysub = DB::table('product_varient')
        ->select('products.name as name','product_varient.current_stock	 as current_stock',
                'product_varient.varient_id  as vid', 'product_varient.varient_image as varient_image',
                'product_varient.other_image as other_image', 'product_varient.product_id as pid',
                'product_varient.mrp as mrp', 'product_varient.price as price','product_varient.en_description as en_description'
                
                )
                 ->join("products", "product_varient.product_id", "=", "products.id")
                ->orderBy('id','asc')
                ->limit(3)
                ->get();

            //for subcat image
            $simage = DB::table('sub_categories')
                        ->select('categories.name as category_name','sub_categories.image as image', 'sub_categories.id')
                        ->join("categories", "sub_categories.category_id", "=", "categories.id")
                        
                        ->groupby('categories.name','sub_categories.image', 'sub_categories.id')
                        ->limit(1)
                        ->get();
            // ->where('product_varient.product_id','products.id')
            

        $users = DB::table('banner')->get();
        $category = DB::table('categories')
        ->where('status',1)
        ->get();
        //for subcategory
        $subcategory = DB::table('sub_categories')
        ->where('status',1)
        ->orderBy('id','asc')
        ->limit(4)
        ->get();
        //for featured product
        $feature = DB::table('product_varient')
                    ->join("products", "product_varient.product_id", "=", "products.id")
                    ->where('is_featured',1)
                    ->get();
        //for blog
        $blog = DB::table('blog')->get();
        //for lataest product
       $product = DB::table('product_varient')
        ->join("products", "product_varient.product_id", "=", "products.id")
                    ->where('vstatus',1)
                    ->orderBy('varient_id','desc')
                    ->limit(5)
                    ->get();
                 

        return view('front.home',['discount' => $discount, 'simage' => $simage, 'cart' => $cart, 'image' => $users, 'category' => $category, 'product' => $product, 'subcategory' => $subcategory, 'blog' => $blog, 'feature' => $feature,'bysub' => $bysub]);
       
    }

    //category
    public function category()
    {
             
       
        $high = DB::table('product_varient')            
        ->max('price');
        $low = DB::table('product_varient')            
        ->min('price');
        $size = DB::table('size')->get();
        $color = DB::table('color')->get();
        $product = DB::table('product_varient')
        ->join("products", "product_varient.product_id", "=", "products.id")
        ->join("size", "product_varient.size", "=", "size.size_id")
        ->join("color", "product_varient.color", "=", "color.color_id")
        ->where('vstatus',1)
        ->get();
        $wordCount = $product->count();
        $parrents = DB::table('categories')
         ->select('id','name')
         ->where('status',1)
         ->get();
         foreach($parrents as $parrent)
         {
           $subcat = DB::table('sub_categories')
           ->select('id','name','category_id')
           ->where('status',1)
         ->where('category_id',$parrent->id)
           ->get();
            if($subcat){
                $parrent->subcat = $subcat;
            }else{
                $parrent->subcat = [];
            }
          
           }
       return view('front.category',['category' => $parrents ,'product' => $product, 'size' => $size, 'color' => $color, 'max' => $high, 'min' => $low, 'wordCount' => $wordCount]);
        //return view('front.category',['category' => $parrents, 'subcategory' => $subcategory]);
        // print_r(json_encode($parrents));
        // $category = DB::table('categories')
        // ->select("categories.name as categories_name","sub_categories.name as sub_category_name")
        // ->join("sub_categories","categories.id","=","sub_categories.category_id")
        //  ->orderBy('categories.id')
        //  ->get();

        //  echo "<pre>";
        // print_r($category);
        // $category = DB::table('categories')->get();
        // // $cid = DB::table('categories')->select('id')->get();
        // // $results = DB::table('sub_categories')->where('category_id',$cid)->get();
      
       
    }
    //add registration
     public function index(Request $req)
     {
    $validated = $req->validate([
       'fname' => 'required||max:255',  
       'lname' => 'required||max:255' ,
       'email' =>'required||email', 
       'password' =>'required||max:8||min:6||',  
       'mobile' => 'required|digits:10||numeric',
       'dob' => 'required' 
        ],['fname.required' => 'First_name is required',
           'lname.required' => 'Last_name is required',
           'email.required' => 'Email_id is required',
           'email.email' => 'Incorrect Format',
           'password.required' => 'Password is required',
           'mobile.required' => 'Mobile_Number is required',
           'dob.required' => 'Date_Of_Birth is required']);
        
        $user =  DB::table('users')->where('email',$req->email)->select('email')->get();
        if($user->isEmpty()){

            $txt1 = $req->fname;
            $txt2 = $req->lname;
            $name = $txt1 . $txt2;
            DB::table('users')->insert(
                ['name' => $name,
                'fname' => $txt1,
                'lname' => $txt2,
                'gender' => $req->gender,
                'email' => $req->email,
                'password' => Hash::make( $req->password),
                'phone_no' => $req->mobile,
                'dob' => $req->dob,
                  ]
            );
            $req->session()->put('user',$req->name);
            return redirect('/home');
            
        }
        else
        {
            session()->flash('status', 'Email_id already exist');
            return redirect('/ureg');
          
        }
       
    }
    
    //login
    public function login(Request $req)
    {
        
        $validated = $req->validate([
            'email' =>'required||email', 
            'password' =>'required'
              ],['email.required' => 'Email_id is required',
                'email.email' => 'Incorrect Format',
                'password.required' => 'Password is required']);
        $user = User::where('email',$req->email)->select('id','name','email', 'password')->get();
       
       // if(($user[0]->password)==$req->password)
       if(Hash::check($req->password, $user[0]->password))
        {
            $req->session()->put('user', $user[0]->name);
            $req->session()->put('user_id', $user[0]->id);
           
            return redirect('/home');

        } else{
            session()->flash('slogin', 'INVALID_RECORD');
            return redirect('/login');
        }
    }

//logout
public function logout()
{
    
    Session::flush();
    return redirect('/home');
}

//viewproduct
public function vproduct($id)
    {
       
        $high = DB::table('product_varient')            
        ->max('price');
        $low = DB::table('product_varient')            
        ->min('price');
        $size = DB::table('size')->get();
        $color = DB::table('color')->get();

        $product = DB::table('product_varient')
        ->join("products", "product_varient.product_id", "=", "products.id")
        ->join("size", "product_varient.size", "=", "size.size_id")
        ->join("color", "product_varient.color", "=", "color.color_id")
        ->where('products.subcategory_id',$id)
        ->where('vstatus',1)
        ->get();
        $wordCount = $product->count();
        // $product = DB::table('products')
        // ->where('subcategory_id',$id)
        // ->where('status',1)
        // ->get();

        $parrents = DB::table('categories')
         ->select('id','name')
         ->where('status',1)
         ->get();
         foreach($parrents as $parrent)
         {
           $subcat = DB::table('sub_categories')
           ->select('id','name','category_id')
         ->where('category_id',$parrent->id)
         ->where('status',1)
           ->get();
            if($subcat){
                $parrent->subcat = $subcat;
            }else{
                $parrent->subcat = [];
            }
          
           }
        return view('front.category',['category' => $parrents ,'product' => $product, 'size' => $size, 'color' => $color, 'max' => $high, 'min' => $low, 'wordCount' => $wordCount]);
    }

   //viewproductbycat
public function bypro($cid,$sid)
{
    $high = DB::table('product_varient')            
        ->max('price');
        $low = DB::table('product_varient')            
        ->min('price');
         $size = DB::table('size')->get();
        $color = DB::table('color')->get();

        $product = DB::table('product_varient')
        ->join("products", "product_varient.product_id", "=", "products.id")
        ->join("size", "product_varient.size", "=", "size.size_id")
        ->join("color", "product_varient.color", "=", "color.color_id")
        ->where('subcategory_id',$sid)
        ->where('vstatus',1)
        ->get();
        $wordCount = $product->count();
    // $product = DB::table('products')
    // ->where('status',1)
    // ->where('subcategory_id',$sid)
    // ->get();

    $parrents = DB::table('categories')
     ->where('id',$cid)
     ->where('status',1)
     ->get();
     foreach($parrents as $parrent)
     {
       $subcat = DB::table('sub_categories')
       ->select('id','name','category_id')
     ->where('category_id',$parrent->id)
     ->where('status',1)
       ->get();
        if($subcat){
            $parrent->subcat = $subcat;
        }else{
            $parrent->subcat = [];
        }
      
       }
    
       
       
   return view('front.bycproduct',['category' => $parrents, 'product' => $product, 'size' => $size, 'color' => $color, 'max' => $high, 'min' => $low, 'wordCount' => $wordCount]);
}
    //contactsave
public function contact(Request $req)
{
  $save =  DB::table('contact_query')->insert(
        ['name' => $req->name,
        'email' => $req->email,
        'mobile' => $req->mobile,
        'query' => $req->msg
         ]
    );
    if($save)
    {
        $req->session()->put('query',"yes");
        return redirect('/contact');
    }else
    {
        return redirect('/contact');
    }
    
    
}
  //bycat
  public function bycat($id)
  {
    
    
    $high = DB::table('product_varient')            
        ->max('price');
        $low = DB::table('product_varient')            
        ->min('price');
    $size = DB::table('size')->get();
        $color = DB::table('color')->get();
    $parrents = DB::table('categories')
     ->where('id',$id)
     ->where('status',1)
     ->get();
     foreach($parrents as $parrent)
     {
        $subcat = DB::table('sub_categories')
        ->select('id','name','category_id')
      ->where('category_id',$parrent->id)
      ->where('status',1)
        ->get();
         if($subcat){
             $parrent->subcat = $subcat;
         }else{
             $parrent->subcat = [];
         }
       
        
        $subcategory = DB::table('sub_categories')
         ->select('sub_categories.id as id','sub_categories.name as name','sub_categories.category_id as category_id',
         'product_varient.varient_id  as varient_id','product_varient.product_id as product_id','product_varient.varient_image as varient_image',
         'product_varient.other_image as other_image', 'product_varient.mrp as mrp', 'product_varient.price as price','product_varient.en_description as en_description',
         'product_varient.size as size_name','product_varient.color as color_name','products.name as product_name',
         'product_varient.current_stock	 as current_stock')
       ->join("products", "sub_categories.id", "=", "products.subcategory_id")
       ->join("product_varient", "products.id", "=", "product_varient.product_id")
        ->where('sub_categories.status',1)
        ->where('sub_categories.category_id',$parrent->id)
       ->get();
    
       }
       $wordCount =  $wordCount = $subcategory->count();
   return view('front.bycategory',['wordCount' => $wordCount,'category' => $parrents, 'subcategory' => $subcategory, 'size' => $size, 'color' => $color, 'max' => $high, 'min' => $low]);
  }

public function about()
{
    $about = DB::table('about_us_page')->get();
    return view('front.about',['about' => $about]);
}
 //FOR BLOG
 public function blog()
{
    $blog = DB::table('blog')->get();
    return view('front.lblog',['blog' => $blog]);
}
//FOR BLOG
 //FOR practical
public function bestseller(Request $req)
{
       
     $id = $req->id;

    //for subcat image
    $simage = DB::table('sub_categories')
    ->select('categories.name as category_name','sub_categories.image as image', 'sub_categories.id')
    ->join("categories", "sub_categories.category_id", "=", "categories.id")
    ->where('sub_categories.id',$id)
    ->groupby('categories.name','sub_categories.image', 'sub_categories.id')
    ->get();
    
     $bysub = DB::table('product_varient')
     ->select('products.name as name','product_varient.current_stock as current_stock',
         'product_varient.varient_id  as vid', 'product_varient.varient_image as varient_image',
         'product_varient.other_image as other_image', 'product_varient.product_id as pid',
         'product_varient.mrp as mrp', 'product_varient.price as price',
         'product_varient.en_description as en_description')
      ->join("products", "product_varient.product_id", "=", "products.id")
     ->where('products.subcategory_id',$id)
     ->limit(3)
     // ->where('product_varient.product_id','products.id')
     ->get();
     
     $subcategory = DB::table('sub_categories')
        ->where('status',1)
        ->orderBy('id','asc')
        ->limit(4)
        ->get();
      
     return view('front.ajax_home',['simage' => $simage,'bysub' => $bysub, 'subcategory' => $subcategory]);
    
}
public function bloginfo($id)
{
    $blog = DB::table('blog')
    ->where('id',$id)
    ->get();
    $latest = DB::table('blog')
    ->orderby('id','desc')
    ->limit(5)
    ->get();
    return view('front.bloginfo',['blog' => $blog , 'latest' => $latest]);

}
    public function special()
    {
        
        $discount = DB::table('product_varient')    
        ->selectraw('mrp -price as discount, product_varient.varient_id as vid')
        ->orderby('discount','desc')->limit(5)
        ->get();
       
    
               
      


    }
}
