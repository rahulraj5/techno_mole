<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class Order extends Controller
{
    public function check(Request $req)
    {
      if($req->session()->has('user'))
      {
        $delivery = DB::table('freedeliverycart')->get();
        $id = session()->get('user_id');
        $user =  DB::table('users')->where('id',$id)->get();
        $address =  DB::table('address')->where('user_id', $id)->where('select_status',1)->get();
        return view('front.checkout',['user' => $user, 'address' => $address, 'delivery' => $delivery]);
      }else
      {
       
        return redirect('/login');
      
      }

    }

    public function color()
    {
     
      $color = DB::table('color')
      ->select("color.color_name")
      ->rightjoin("product_varient","color.color_id", "=", "product_varient.color")
      ->get();
      echo "<pre>";
      print_r($color);


    }

    public function expiry_date(Request $req)
    {
      
      $coupon = DB::table('coupon')->select('coupon_id','end_date','amount')->where('coupon_code', $req->code)->get();
      foreach($coupon as $coup)
      {
        
        $now = Carbon::now();
     }
     
      if($coup->end_date >= $now)
      {
       
        return response()->json([ 
          'data' => "Your coupn code is expired",
      ]);

      }else{
        return response()->json([ 
          'amount' =>$coup->amount, 'coupnid' => $coup->coupon_id,
        ]);
      }
    }
      
  }
