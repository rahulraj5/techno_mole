<!DOCTYPE html>
<html dir="ltr" lang="en-US">


<!-- Mirrored from demo.ishithemes.com/html/toytown/Layout001/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 May 2021 08:28:34 GMT -->
<head>
  <!-- Document Meta
  ============================================= -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!--IE Compatibility Meta-->
  <meta name="author" content="zytheme" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="ToyTown - Responsive HTML5 Template">
  <link rel="icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>" sizes="32x32" type="image/png">
  <link rel="stylesheet" href="../../../../cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
  <link rel="stylesheet" href="../../../../www.atlasestateagents.co.uk/css/tether.min.css">
  <script src="../../../../www.atlasestateagents.co.uk/javascript/tether.min.js"></script>

  <!-- Stylesheets
  ============================================= -->
  <link href="<?php echo e(asset('assets/css/bootstrap.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/css/owl.carousel.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('assets/css/theme.css')); ?>" rel="stylesheet">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <!-- for toastr -->
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

   <!-- fontawesome -->

   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
   integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous" />

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
 <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <!-- JavaScripts
  ============================================= -->   
  <script src="<?php echo e(asset('assets/js/jquery.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset('assets/js/bootstrap.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset('assets/js/owl.carousel.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset('assets/js/animate.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset('assets/js/totalstorage.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset('assets/js/counter.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset('assets/js/parallax.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset('assets/js/bxslider.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset('assets/js/ishi.initialize.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset('assets/js/support.js')); ?>" type="text/javascript"></script>

  <!--for price slider-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!--for price slider-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
                  $( function() {
                    minone = $("#min_price").val();
                    maxone = $("#max_price").val();
                      $("#slider-range").slider({
                      range: true,
                      min: 10,
                      max: maxone,
                      values: [ 200, 300 ],
                      slide: function( event, ui ) {
                       $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                       $("#min_price").val( ui.values[ 0 ] );
                       $("#max_price").val( ui.values[ 1 ] );

                      }
                    });
                    
                    $("#amount").val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
                      " - $" + $("#slider-range").slider( "values", 1 ));
                    
                  } );

                  
                  </script>
 
  <!--for use toaster-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


  <!-- Document Title
  ============================================= -->
  <title>Mole</title>
  <style>
#snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  height: auto;
  background-color: red;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 90%;
  top: 10px;
  font-size: 17px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes  fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes  fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
</style>
</head>

<body id="index">
  <main>
    <div id="menu_wrapper" class=""></div>
    <!-- --------------------loader------------ -->
    <div id="spin-wrapper"></div>
    <div id="siteloader">
      <div class="loader"></div>
    </div>
    <!-- --------------------header------------ -->
    <header id="header" class="home">
      <div class="header-nav">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 left-nav"> 
              <!-- Block search  -->
              <div id="_desktop_seach_widget">
                <div id="search_widget" class="search-widget">
                  <span class="search-logo hidden-lg-up">
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                     <symbol id="magnifying-glass" viewBox="0 0 910 910"><title>magnifying-glass</title><path d="M495,466.2L377.2,348.4c29.2-35.6,46.8-81.2,46.8-130.9C424,103.5,331.5,11,217.5,11C103.4,11,11,103.5,11,217.5 S103.4,424,217.5,424c49.7,0,95.2-17.5,130.8-46.7L466.1,495c8,8,20.9,8,28.9,0C503,487.1,503,474.1,495,466.2z M217.5,382.9 C126.2,382.9,52,308.7,52,217.5S126.2,52,217.5,52C308.7,52,383,126.3,383,217.5S308.7,382.9,217.5,382.9z"/></symbol>
                    </svg>
                    <svg class="icon" viewBox="0 0 30 30"><use xlink:href="#magnifying-glass" x="22%" y="20%"></use></svg>
                  </span>
                  <form method="get" action="#">
                    <input name="controller" value="search" type="hidden">
                    <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input name="s" value="" placeholder="Search our catalog" class="ui-autocomplete-input" autocomplete="off" type="text">
                    <button type="submit">
                      <i class="material-icons search"></i>
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 right-nav">       
              <div class="userinfo-inner">
                <ul class="userinfo">
                <?php if(Session::get('user')): ?>
                <li class="log-in">
                <a class="nav-item nav-link" href="http://artybrainsdemo.com/mole/app.user/profile/<?php echo e(Session::get('user_id')); ?>">Welcome, <?php echo e(Session::get('user')); ?></a>
                  </li>
          <?php else: ?>
                      <li class="log-in">
                    <a href="http://artybrainsdemo.com/mole/app.user/login" id="customer_login_link">Log in</a>
                  </li>
                  <li class="create_account">
                    <a href="http://artybrainsdemo.com/mole/app.user/ureg" id="customer_register_link">Create Account</a>
                  </li>   

            <?php endif; ?>
                   
                  <li class="wishlist">
                    <a href="http://artybrainsdemo.com/mole/app.user/wish">Wishlist</a>
                  </li>
                  <li class="checkout">
                    <a  href="checkout">Checkout</a>
                  </li>
                  <?php if(Session::get('user')): ?>
                <li class="logout">
                <a class="nav-item nav-link" href="http://artybrainsdemo.com/mole/app.user/logout">Logout</a>
                  </li>
          <?php endif; ?>
                </ul>
              </div>  
            </div>
          </div>
        </div>
      </div>
      <div class="header-top">
        <div class="container">
          <div class="row"> 
            <!-- --------------------desktop_logo------------ -->
            <div id="desktop_logo" class="col-lg-3 col-md-5 col-sm-12 col-xs-12">
              <a href="home">
                <img class="logo img-responsive" src="<?php echo e(asset('assets/images/header-logo.png')); ?>" alt="Demo Shop">
              </a>
            </div>
            <div class="header-top-right offset-xl-2 col-xl-7 col-lg-9 col-md-7 col-sm-12 col-xs-12">  
              <!-- --------------------services------------ -->    
              <div id="ishiservices" class="ishiservicesblock">
                <div class="ishiservices owl-carousel">        
                  <div class="services item">
                    <a href="#">
                      <div class="service-img" style="background-image: url(<?php echo e(asset('assets/images/services/1.png')); ?>);">
                      </div>
                      <div class="service-block">
                        <div class="service-title">Free Worldwide Delivery</div>
                        <div class="service-desc">Lorem ipsum Dolor Site Amet</div>
                      </div>
                    </a>
                  </div>
                  <div class="services item">
                    <a href="#">
                      <div class="service-img" style="background-image: url(<?php echo e(asset('assets/images/services/2.png')); ?>);">
                      </div>
                      <div class="service-block">
                        <div class="service-title">Free Gift Voucher</div>
                        <div class="service-desc">Lorem ipsum Dolor Site Amet</div>
                      </div>
                    </a>
                  </div>
                  <div class="services item">
                    <a href="#">
                      <div class="service-img" style="background-image: url(<?php echo e(asset('assets/images/services/3.png')); ?>);">
                      </div>
                      <div class="service-block">
                        <div class="service-title">Money Back Guarantee</div>
                        <div class="service-desc">Lorem ipsum Dolor Site Amet</div>
                      </div>
                    </a>
                  </div>
                  <div class="services item">
                    <a href="#">
                      <div class="service-img" style="background-image: url(<?php echo e(asset('assets/images/services/4.png')); ?>);">
                      </div>
                      <div class="service-block">
                        <div class="service-title">24X7 Support Assistance</div>
                        <div class="service-desc">Lorem ipsum Dolor Site Amet</div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>  
          </div>
        </div>
      </div> 
      <div class="nav-full-width">
        <div class="container">
          <div class="row">
            <!-- ------------------mega menu----------- -->
            <div id="_desktop_top_menu" class="menu js-top-menu hidden-sm-down">
            <ul class="top-menu" id="top-menu" data-depth="0">  
                <li class="cms-page" id="category-12">
                  <a class="dropdown-item" href="http://artybrainsdemo.com/mole/app.user/home" data-depth="0">
                    Home
                  </a>
                </li>
                <li class="cms-page" id="cms-page-4">
                  <a class="dropdown-item" href="http://artybrainsdemo.com/mole/app.user/about" data-depth="0">
                    About us
                  </a>
                </li>
              
                <li class="category" id="category-3">
                  <a class="dropdown-item" href="http://artybrainsdemo.com/mole/app.user/category" data-depth="0">
                    Category
                  </a>
                </li>
                
              
                <!-- <li class="cms-page" id="cms-page-4">
                  <a class="dropdown-item" href="/order" data-depth="0">
                    Orders
                  </a>
                </li> -->
                <li class="category" id="category-1111">
                  <a class="dropdown-item" href="http://artybrainsdemo.com/mole/app.user/blog" data-depth="0">Blog</a>
                 
                </li>
                <li class="cms-page" id="cms-page-1">
                  <a class="dropdown-item" href="http://artybrainsdemo.com/mole/app.user/contact" data-depth="0">
                    Contact us
                  </a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <!-- -------------------shopping cart----------- -->
            <div id="_desktop_cart">
              <div class="blockcart cart-preview inactive">
                <div class="header">
                  <span class="cart-link">
                    <span class="cart-img">
                      <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="shopping-cart" viewBox="0 0 850 850">
                          <title>shopping-cart</title>
                          <path d="M194.59,382.711c-35.646,0-64.646,29-64.646,64.646s29,64.646,64.646,64.646c35.646,0,64.646-29,64.646-64.646
                              S230.235,382.711,194.59,382.711z M194.59,473.215c-14.261,0-25.858-11.597-25.858-25.858c0-14.261,11.597-25.858,25.858-25.858
                              c14.254,0,25.858,11.597,25.858,25.858C220.448,461.617,208.851,473.215,194.59,473.215z">
                          </path>
                          <path
                            d="M385.941,382.711c-35.646,0-64.646,29-64.646,64.646s29,64.646,64.646,64.646c35.646,0,64.646-29,64.646-64.646
                              S421.587,382.711,385.941,382.711z M385.941,473.215c-14.261,0-25.858-11.597-25.858-25.858
                              c0-14.261,11.597-25.858,25.858-25.858c14.261,0,25.858,11.597,25.858,25.858C411.799,461.617,400.202,473.215,385.941,473.215z">
                          </path>
                          <path
                            d="M498.088,126.274c-3.685-4.629-9.27-7.324-15.179-7.324H143.326l-17.629-89.095c-1.545-7.803-7.699-13.873-15.528-15.308
                              L32.594,0.325C22.038-1.621,11.953,5.368,10.02,15.905s5.042,20.641,15.58,22.574l64.607,11.843l56.914,287.667
                              c1.797,9.083,9.768,15.631,19.025,15.631h271.512c9.031,0,16.86-6.225,18.896-15.037l45.252-195.876
                              C503.137,136.947,501.767,130.896,498.088,126.274z M422.233,314.833H182.074l-31.075-157.089h307.519L422.233,314.833z">
                          </path>
                        </symbol>
                      </svg>
                      <svg class="icon" viewBox="0 0 40 40">
                        <use xlink:href="#shopping-cart" x="15%" y="18%"></use>
                      </svg>
                    </span>
                    <span class="cart-content">
                      <span class="cart-name">
                      <?php 
                       $count = 0;
                       if(session('cart')){

                        $count = count(session('cart'));
                       }
                       ?>
                        <span class="cart-products-count"><?php echo $count; ?></span> items
                      </span>
                      <span class="cart-products-count hidden-lg-up">3</span>
                    </span>
                  </span>
                  <div class="cart-dropdown">
                    <div class="product-container">
                      <?php $total = 0; ?>
                      <?php if(session('cart')): ?>
                      <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php $total += $product['price']*$product['quantity']; ?>
                      <div class="product">
                        <a class="product-image" href="#">
                          <img src="<?php echo e(asset('assets/images/product/'.$product['image'])); ?>" alt="Simul dolorem voluptaria">
                        </a>
                        <div class="product-detail">
                          <div class="product-name">
                            <span class="quantity-formated">
                              <span class="quantity"><?php echo e($product['quantity']); ?></span>
                              &nbsp;x&nbsp;
                            </span>
                            <a class="cart_block_product_name" href="#"><?php echo e($product['name']); ?></a>
                          </div>
                          <div class="price"><?php echo e($product['quantity']*$product['price']); ?></div>
                          <ul class="product-atributes">
                            <li class="atributes">
                              <span class="label">Size:</span>
                              <span class="value">S</span>
                            </li>
                            <li class="atributes">
                              <span class="label">Color:</span>
                              <span class="value">Orange</span>
                            </li>
                          </ul>
                        </div>
                        <div class="remove-product">
                          <a class="remove-from-cart" rel="nofollow" href="detail_dltcart/<?php echo e($id); ?>">
                            <i class="material-icons">delete</i>
                          </a>
                        </div>
                      </div>
                     
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?> 
                    </div>
                    <div class="billing-info">
                    <?php if(session('cart')): ?>
                    <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="billing subtotal-info">
                        <span class="label">Subtotal</span>
                        <span class="value"><?php echo e($total); ?></span>
                      </div>
                     
                      <div class="billing shipping-info">
                        <span class="label">Shipping</span>
                        <span class="value"><?php if($total >= $product['shipping']): ?>
                        0
                        <?php else: ?>
                        <?php echo e($product['shipping']); ?>

                        <?php endif; ?></span>
                      </div>
                       <div class="billing total-info">
                        <span class="label">Total</span>
                        <span class="value"><?php if($total >= $product['shipping']): ?>
                      <?php echo e($total); ?>

                        <?php else: ?>
                        <?php echo e($total + $product['shipping']); ?>

                        <?php endif; ?></span>
                      </div>
                      <?php break; ?>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   <?php endif; ?> 
                    </div>
                    <div class="cart-btn col-xs-12">
                      <a href="http://artybrainsdemo.com/mole/app.user/ac" class="btn btn-primary checkout">Go to Cart</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- -------------------headercontact----------- -->
            <div class="contact-num">
              <a href="http://artybrainsdemo.com/mole/app.user/contact">
                <div class="call-img">
                  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="call" viewBox="0 0 50 50">
                      <title>call</title>
                      <path
                        d="M16.333,0C7.327,0,0,7.327,0,16.334c0,9.006,7.326,16.333,16.333,16.333c0.557,0,1.007-0.451,1.007-1.006 c0-0.556-0.45-1.007-1.007-1.007c-7.896,0-14.318-6.424-14.318-14.319c0-7.896,6.422-14.32,14.318-14.32 c7.896,0,14.317,6.424,14.317,14.32c0,3.299-1.756,6.571-4.269,7.955c-0.913,0.502-1.903,0.751-2.959,0.761 c0.634-0.378,1.183-0.887,1.591-1.531c0.08-0.121,0.186-0.226,0.238-0.359c0.328-0.789,0.357-1.684,0.555-2.516 c0.243-1.066-4.658-3.143-5.084-1.815c-0.154,0.493-0.39,2.048-0.699,2.458c-0.275,0.365-0.953,0.193-1.377-0.168 c-1.117-0.952-2.364-2.352-3.458-3.457l0.002-0.001c-0.028-0.029-0.062-0.062-0.092-0.091c-0.031-0.03-0.062-0.062-0.093-0.092l0,0 c-1.106-1.093-2.506-2.338-3.457-3.458c-0.36-0.424-0.534-1.1-0.168-1.376c0.41-0.31,1.966-0.543,2.458-0.698 c1.326-0.425-0.75-5.329-1.816-5.084c-0.832,0.195-1.727,0.225-2.516,0.552c-0.134,0.056-0.238,0.16-0.359,0.24 c-2.799,1.775-3.16,6.083-0.428,9.292c1.041,1.228,2.127,2.416,3.245,3.576l-0.006,0.004c0.031,0.031,0.063,0.06,0.095,0.09 c0.03,0.031,0.059,0.062,0.088,0.095l0.006-0.006c1.16,1.118,2.535,2.764,4.769,4.255c4.703,3.141,8.312,2.264,10.438,1.098 c3.67-2.021,5.312-6.338,5.312-9.719C32.667,7.327,25.339,0,16.333,0z">
                      </path>
                    </symbol>
                  </svg>
                  <svg class="icon" viewBox="0 0 40 40">
                    <use xlink:href="#call" x="20%" y="18%"></use>
                  </svg>
                </div>
                <div class="call-num">+00 900 123456789</div>
              </a>
            </div>
            <!-- ------------------mobile media--------- -->
            <div id="menu-icon" class="menu-icon hidden-lg-up">
              <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <div id="_mobile_cart"></div>
            <div id="_mobile_seach_widget"></div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </header>