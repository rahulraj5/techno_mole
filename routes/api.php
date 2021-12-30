<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix'=>'', ['middleware' => ['XSS']], 'namespace'=>'API'], function(){

	// for user
	Route::any('testing', 'UserController@testing');
    Route::post('getSN', 'UserController@getStoreName');
	Route::post('listuploading', 'UserController@listuploading');
	Route::any('register', 'UserController@signUp');
    Route::post('verify_phone', 'UserController@verifyPhone');
    Route::post('forget_password', 'UserController@forgotPassword');
    Route::post('verify_otp', 'UserController@verifyOtp');
    Route::post('change_password', 'UserController@changePassword');
    Route::any('login', 'UserController@login');
    Route::post('fbLogin', 'UserController@fbLogin');
    Route::post('checkotp', 'UserController@checkOTP');
    Route::any('myprofile', 'UserController@myprofile');
    Route::any('profile_edit', 'UserController@profile_edit');
    Route::post('logout', 'UserController@logout');


        //////address///////
    Route::post('add_address', 'AddressController@address');
    Route::get('city', 'AddressController@city');
    Route::post('society', 'AddressController@society');
    Route::post('show_address', 'AddressController@show_address');
    Route::post('select_address', 'AddressController@select_address');
    Route::post('edit_address', 'AddressController@edit_add');
    Route::post('delete_address', 'AddressController@delete_add');
    Route::post('remove_address', 'AddressController@rem_user_address');

	    ////// Dashboard ///////
    Route::any('dashboard', 'DashboardController@dashboard');
    Route::post('getproduct', 'CategoryController@get_subcategory_by');
    Route::post('get_product_by_subcat', 'CategoryController@get_product_by_subcat');
        
        ////// Favourite ///////
    Route::post('fav_product', 'FavouriteController@getfaveproduct');
    Route::post('post_favproduct', 'FavouriteController@postfav_product');
    
        ////// Rewiew rating ///////
    Route::post('addreview', 'RatingController@add_review');
    Route::post('getreview', 'RatingController@get_reviewlist');
    
        ////// Order details ///////
    Route::any('order_details', 'OrderController@orderdetails');

        ////// New offers ///////
    Route::get('new_offers', 'OffersController@offerslist');
    
        ////// all product details ///////
    Route::get('all_products', 'ProductController@productslist');
    Route::any('get_productdetail', 'ProductController@product_details');
    Route::get('get_allfilter', 'ProductController@filter_by');
    Route::post('post_filter', 'ProductController@processFilter');
    
        ////// cart routs details ///////
    Route::any('addtocart', 'CartController@addtocart');
    Route::any('get_cart_items', 'CartController@get_cart_items');
    Route::any('remove_item_from_cart', 'CartController@remove_item_from_cart');
    Route::any('quantity_plus_or_minus', 'CartController@quantity_plus_or_minus');
    Route::any('get_color', 'ProductController@get_color');
    
    Route::any('apply_filter', 'ProductController@apply_filter');
    
         ////// order routs details ///////
         
    Route::any('order_summary', 'OrderController@order_summary');
    Route::any('place_order', 'OrderController@place_order');
    Route::any('order_history', 'OrderController@order_history');
      
});