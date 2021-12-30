<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* start web routing */

/* end web routing */

Auth::routes();
/* start admin routing */
Route::get('/admin', function () {
    return view('auth.login');
});
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@Logout');
	
	/* Update Profile */
Route::get('/profile', 'Usercontroller@profileview');
Route::post('/profile_update', 'Usercontroller@profileupdate');
	
	/* user management */
Route::get('/manage_user', 'Usercontroller@list');
Route::get('/user_block/{id}', 'Usercontroller@block');
Route::get('/user_unblock/{id}', 'Usercontroller@unblock');

	/* vendor management */
Route::get('/manage_vendor', 'Storecontroller@storeclist');
Route::get('/add_store', 'Storecontroller@store');
Route::post('/store_add', 'Storecontroller@storeadd');
Route::get('/edit_store/{store_id}','Storecontroller@storedit');
Route::post('/update_store','Storecontroller@storeupdate');
Route::get('/delete_store/{store_id}','Storecontroller@storedelete');
Route::get('/vendor_enable/{id}', 'Storecontroller@block');
Route::get('/vendor_disable/{id}', 'Storecontroller@unblock');

	/* category management */
Route::get('/manage_category', 'Categorycontroller@list');
Route::get('/add_category', 'Categorycontroller@AddCategory');
Route::post('/category_add', 'Categorycontroller@AddNewCategory');
Route::get('/edit_category/{category_id}','Categorycontroller@EditCategory');
Route::post('/update_category','Categorycontroller@UpdateCategory');
Route::get('/delete_category/{category_id}','Categorycontroller@DeleteCategory');
Route::get('/category_enable/{id}', 'Categorycontroller@block');
Route::get('/category_disable/{id}', 'Categorycontroller@unblock');

	/* sub category management */
Route::get('/manage_subcategory', 'SubcategoryController@list');
Route::get('/add_subcategory', 'SubcategoryController@AddsubCategory');
Route::post('/subcategory_add', 'SubcategoryController@AddNewsubCategory');
Route::get('/edit_subcategory/{subcategory_id}','SubcategoryController@EditsubCategory');
Route::post('/update_subcategory','SubcategoryController@UpdatesubCategory');
Route::get('/delete_subcategory/{subcategory_id}','SubcategoryController@DeletesubCategory');
Route::get('/subcategory_enable/{id}', 'SubcategoryController@block');
Route::get('/subcategory_disable/{id}', 'SubcategoryController@unblock');

	/* banner management */
Route::get('/primary_banner', 'Bannercontroller@primarylist');
Route::get('/add_primary_banner', 'Bannercontroller@addprimarybanner');
Route::post('/primarybanner_add', 'Bannercontroller@bannerprimaryadd');
Route::get('/edit_primary_banner/{banner_id}','Bannercontroller@bannerprimayedit');
Route::post('/update_primary_banner','Bannercontroller@bannerprimaryupdate');
Route::get('/delete_primary_banner/{id}','Bannercontroller@bannerprimarydelete');
Route::get('/secondary_banner', 'Bannercontroller@secondarylist');
Route::get('/add_secondary_banner', 'Bannercontroller@addsecondarybanner');
Route::post('/secondarybanner_add', 'Bannercontroller@bannersecondaryadd');
Route::get('/edit_secondary_banner/{banner_id}','Bannercontroller@bannersecondaryedit');
Route::post('/update_secondary_banner','Bannercontroller@bannersecondaryupdate');
Route::get('/delete_secondary_banner/{id}','Bannercontroller@bannersecondarydelete');
Route::get('/pbanner_enable/{id}', 'Bannercontroller@block');
Route::get('/pbanner_disable/{id}', 'Bannercontroller@unblock');

	/* product management */
Route::get('/manage_product', 'Productcontroller@list');
Route::get('/add_product', 'Productcontroller@AddProduct');
Route::post('/product_add', 'Productcontroller@AddNewProduct');
Route::get('/edit_product/{product_id}','Productcontroller@EditProduct');
Route::post('/update_product','Productcontroller@UpdateProduct');
Route::get('/delete_product/{product_id}','Productcontroller@DeleteProduct');
Route::post('/get_subcategory','Productcontroller@get_subcategory');
Route::get('/product_enable/{id}', 'Productcontroller@block');
Route::get('/product_disable/{id}', 'Productcontroller@unblock');


	/* varient management */
Route::get('/manage_varient/{id}', 'Varientcontroller@varient');
Route::get('/add_varient/{id}', 'Varientcontroller@Addproductvarient');
Route::post('/varient_add', 'Varientcontroller@AddNewproductvarient');
Route::get('/edit_varient/{id}','Varientcontroller@Editproductvarient');
Route::post('/update_varient','Varientcontroller@Updateproductvarient');
Route::get('/delete_varient/{id}','Varientcontroller@deleteproductvarient');
Route::get('/varient_enable/{id}', 'Varientcontroller@block');
Route::get('/varient_disable/{id}', 'Varientcontroller@unblock');

	/* city management */
Route::get('/manage_city', 'Citycontroller@citylist');
Route::get('/add_city', 'Citycontroller@city');
Route::post('/city_add', 'Citycontroller@cityadd');
Route::get('/edit_city/{city_id}','Citycontroller@cityedit');
Route::post('/update_city','Citycontroller@cityupdate');
Route::get('/delete_city/{city_id}','Citycontroller@citydelete');


	/* color management */
Route::get('/manage_color', 'Colorcontroller@colorlist');
Route::get('/add_color', 'Colorcontroller@color');
Route::post('/color_add', 'Colorcontroller@coloradd');
Route::get('/edit_color/{color_id}','Colorcontroller@coloredit');
Route::post('/update_Color','Colorcontroller@colorupdate');
Route::get('/delete_color/{id}','Colorcontroller@colordelete');


	/* size management */
Route::get('/manage_size', 'Sizecontroller@sizelist');
Route::get('/add_size', 'Sizecontroller@size');
Route::post('/size_add', 'Sizecontroller@sizeadd');
Route::get('/edit_size/{size_id}','Sizecontroller@sizeedit');
Route::post('/update_size','Sizecontroller@sizeupdate');
Route::get('/delete_size/{id}','Sizecontroller@sizedelete');

	/* currency management */
Route::get('/manage_currency', 'Sizecontroller@currencylist');
Route::get('/add_currency', 'Sizecontroller@currency');
Route::post('/currency_add', 'Sizecontroller@currencyadd');
Route::get('/edit_currency/{id}','Sizecontroller@currencyedit');
Route::post('/update_currency','Sizecontroller@currencyupdate');
Route::get('/delete_currency/{id}','Sizecontroller@currencydelete');

	/* terms and condition management */
Route::get('/terms_condition', 'Termscontroller@termscondition');
Route::post('/terms_update', 'Termscontroller@termsconditionupdate');

	/* privacy policy management */
Route::get('/privacy_policy', 'Termscontroller@privecy_policy');
Route::post('/policy_update', 'Termscontroller@privecy_policyupdate');

	/* fcm notification */
Route::get('/fcm', 'Settingscontroller@fcm');
Route::post('/fcm_update', 'Settingscontroller@updatefcm');
Route::get('/send_notification', 'Notificationcontroller@adminNotification');
Route::post('/notification_send', 'Notificationcontroller@adminNotificationSend');

	/* coupon management */
Route::get('/manage_coupon', 'Couponcontroller@couponlist');
Route::get('/add_coupon', 'Couponcontroller@coupon');
Route::post('/coupon_add', 'Couponcontroller@addcoupon');
Route::get('/edit_coupon/{coupon_id}', 'Couponcontroller@editcoupon');
Route::post('/update_coupon', 'Couponcontroller@updatecoupon');
Route::get('/delete_coupon/{coupon_id}','Couponcontroller@deletecoupon');
Route::get('/coupon_enable/{id}', 'Couponcontroller@block');
Route::get('/coupon_disable/{id}', 'Couponcontroller@unblock');


	/* offers management */
Route::get('/manage_offer', 'Dealcontroller@list');
Route::get('/add_offer', 'Dealcontroller@AddDeal');
Route::post('/deal_add', 'Dealcontroller@AddNewDeal');
Route::get('/edit_offer/{id}', 'Dealcontroller@EditDeal');
Route::post('/update_deal', 'Dealcontroller@UpdateDeal');
Route::get('/delete_offer/{id}','Dealcontroller@DeleteDeal');


	/* delivery charge */
Route::get('/delivery_charge', 'Settingscontroller@del_charge');
Route::post('/update_charge', 'Settingscontroller@updatedel_charge');

	/* order charge */
Route::get('/order_charge', 'Settingscontroller@setorder_charge');
Route::post('/order_update', 'Settingscontroller@updateorder_charge');

	/* update stock */
Route::get('/update_stock', 'Productcontroller@stocklist');
Route::post('/stock_update', 'Productcontroller@updatestock');

	/* order history */
Route::get('/order_history', 'Ordercontroller@list');


/* end admin routing */