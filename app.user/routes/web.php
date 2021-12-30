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

route::post('/trial','Test@vproduct')->name('trial');
route::post('/asc_name','Test@asc_name')->name('asc_name');
route::post('/dsc_name','Test@dsc_name')->name('dsc_name');
route::post('/asc_price','Test@asc_price')->name('asc_price');
route::post('/dsc_price','Test@dsc_price')->name('dsc_price');

//

route::get('/best_seller','Operation@bestseller')->name('best_seller');


route::post('/last','Operation@login');
route::get('/logout','Operation@logout');
route::get('/vproduct/{id}','Operation@vproduct');

route::get('/bycatpro/{cid}/{sid}','Operation@bypro');

route::get('/dcart/{id}','Cartitem@dcart');

route::get('/dltcart/{id}','Cartitem@delete');

route::post('/first','Operation@index');
//login
route::get('/','Operation@home');
route::get('/home','Operation@home');
route::get('/category','Operation@category');
route::get('/bycat/{id}','Operation@bycat');
route::post('/msg','Operation@contact');
//forpdetail
route::get('/detail/{id}/{vid}','ProductController@detail');
route::post('/practical','ProductController@other')->name('practical');
route::get('/tst','Operation@showToastrMessages');

//detail_cart
route::get('/direct_cart/{id}/{name}','Detail_cart@direct_add_cart');
route::get('/direct_wish/{id}/{name}','Detail_cart@direct_add_wish');
route::post('/add_detail_cart','Detail_cart@acart');
route::get('/detail_dltcart/{id}','Detail_cart@delete');
route::get('/detail_acart','Detail_cart@increase');
route::get('/detail_dcart/{id}/{pname}','Detail_cart@dcart');
Route::patch('update-cart','Detail_cart@update')->name('update.cart');

// wishlist
route::get('/detail_dltcart_wish/{id}','Detail_cart@delete_wish');
//order for
route::get('/checkout','Order@check');
route::get('/clr','Order@color');
route::post('/expiry_date','Order@expiry_date')->name('coupon');



//otpverification
route::post('/verify','Test@verify')->name('verify');
route::post('/right','Test@right')->name('right');
route::post('/update_password','Test@update_password');
//test filter
route::post('/vproduct','Test@vproduct')->name('vproduct');
route::get('/about','Operation@about');
route::get('/blog','Operation@blog');
route::get('/dpbsc/{id}','Test@dpbsc');
route::get('/insertall','Test@insertall');


Route::get('/bycp', function () {
    return view('front.bycproduct');
});

Route::get('/forgot', function () {
    return view('front.forgot');
});

Route::get('/page', function () {
    return view('index');
});

Route::get('/ureg', function () {
    return view('front.user_register');
});

Route::get('/cart', function () {
    return view('front.cartpage');
});

Route::get('/chkout', function () {
    return view('front.checkout');
});

Route::get('/contact', function () {
    return view('front.contact');
});

Route::get('/login', function () {
    return view('front.login');
});

Route::get('/main', function () {
    return view('front.mainten');
});

Route::get('/wish', function () {
    return view('front.wishlist');
});

Route::get('/order', function () {
    return view('front.order');
});

Route::get('/odetail', function () {
    return view('front.odetail');
});

Route::get('/product', function () {
    return view('front.product');
});

Route::get('/pdetail', function () {
    return view('front.productpage');
});

Route::get('/ac', function () {
    return view('front.acart');
});

//for profile
route::get('/profile/{id}','Profile@get_user');
route::post('/edit_user','Profile@edit_user');
route::post('/add_address','Profile@add_address');
route::get('/add_delete/{id}/{uid}','Profile@dlt_address');
route::get('/status_active/{id}/{uid}','Profile@off_status');
route::get('/status_on/{id}/{uid}','Profile@on_status');
route::GET('/status','Profile@status')->name('address_status');
route::post('/change_password','Profile@change_password');



//for blog
route::get('/blog_info/{id}','Operation@bloginfo');
route::get('/special','Operation@special');




//TEST
route::get('/active','Test@active');
route::get('/update/{id}/{ss}','Test@update');
Route::get('/tadd', function () {
    return view('test');
});
route::post('/insert','Test@add')->name('test.add');

route::get('/image','Test@cat_image');
route::get('/popular','Home@popular_product');