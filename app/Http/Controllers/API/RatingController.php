<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class RatingController extends Controller
{
    public function add_review(Request $request){
		$user_id = $request->user_id;
        $cart_id = $request->product_id;
        $rating = $request->rating;
        $description = $request->description;
        $date = date('Y-m-d');
		 
        $review = DB::table('delivery_rating') 
					   ->insert([
									'user_id'	=>	$user_id,
									'product_id'=>	$cart_id,
									'rating'	=>	$rating,
									'description'=>	$description,
									'date'		=>	$date
							   ]);
		if($review){
            $message = array('status'=>'200', 'message'=>'Review Add Successfully');
            return $message;
            }
        else{
            $message = array('status'=>'400', 'message'=>'something went wrong');
            return $message;
        }
	}
	
	public function get_reviewlist(Request $request){
        $p_id = $request->product_id;
        $this->validate(
            $request,
                [
                    'product_id' => 'required',
                ],
                [
                    'product_id.required' => 'Product id is reqired.',
                ]
        );
            $review = [];
            $rating = DB::table('delivery_rating')
                                ->select('delivery_rating.rating_id','delivery_rating.user_id','delivery_rating.product_id','delivery_rating.rating','delivery_rating.description','delivery_rating.date','user.user_name','user.user_image')
                                ->leftjoin('user','user.user_id','=','delivery_rating.user_id')
                                ->where('delivery_rating.product_id',$p_id)->get();
            $review['reviewlist'] = $rating; 
                $avg = 0;
                foreach($rating as $rev){
                    $avg += $rev->rating;
                }
            
            $avg_rating =  number_format($avg/count($rating), 1);

    	    $review['avgrating'] = $avg_rating;
      
		if(count($review)>0){
            $message = array('status'=>'200', 'message'=>'Review List', 'data'=>$review);
            return $message;
        }
        else{
            $message = array('status'=>'400', 'message'=>'No Review Found', 'data'=>[]);
            return $message;
        }
	}
}