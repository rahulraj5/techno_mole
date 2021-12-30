@extends('front.master')
@section('content')
    <!-- -------------------mobile media---------- -->
    <div id="mobile_top_menu_wrapper" class="hidden-lg-up" style="display:none;">
      <div id="top_menu_closer">
        <i class="material-icons"></i>
      </div>
      <div class="js-top-menu mobile" id="_mobile_top_menu"></div>
    </div>
    <!-- --------------------Breadcrumb------------ -->
    <div class="breadcrumb-container">
      <nav data-depth="2" class="breadcrumb container">
        <h1 class="h1 category-title breadcrumb-title">Order Details</h1>
        <!-- <ul>
          <li>
            <a href="#">
              <span>Home</span>
            </a>
          </li>
          <li>
            <a href="#">
              <span>Wishlist</span>
            </a>
          </li>
        </ul> -->
      </nav>
    </div>

    <!-- ----------------contactpage----------- -->
    <section id="wrapper">
      <div id="content-wrapper">
        <div class="container">
          <div class="row">
            <div id="wishlist-history" class="block-center col-12">


              <div class="card order_cardTable_style orderDetail_card_style">
                <div class="Container">
                  <div class="row">
                    <div class="col-md-4 orderDetail_col4_style">

                      <h3 class="mb-3">Delivery Address</h3>
                      <div class="">
                        <div class="mb-3">
                          <div><b>Demo</b> </div>
                        </div>
                        <div class="mb-3">demo@gmail.com</div>
                        <div class=" mb-3">Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying
                          out print, graphic or web designs.
                        </div>
                        <div class="mb-3">
                          <div>
                            <div class=""><b>Phone number</b></div>
                            <div class="">1254785963, 1254785698</div>
                          </div>
                        </div>
                      </div>


                    </div>
                    <div class="col-md-4 orderDetail_col4_style">
                      <h3 class="mb-3">Your Rewards</h3>
                      <div class="d-flex">
                        <div class="orderDetail_div_style">
                          <img src="{{asset('assets/images/lighting.png')}}" class="" height="20px" width="20px">
                        </div>
                        <div class="orderDetail_RewardsDiv_style">
                          <p>6 SuperCoins</p>
                          <p class="orderDetail_RewardsPtag_style">Lorem ipsum, or lipsum as it is sometimes known, is dummy text used</p>
                        </div>
                        
                      </div>

                    </div>
                    <div class="col-md-4 orderDetail_col4_style">
                      <h3 class="mb-3">More actions</h3>
                      <div class="d-flex">
                        <div class="orderDetail_div_style">
                          <img src="{{asset('assets/images/document.png')}}" class="" height="18px" width="18px">
                        </div>
                        <div class="orderDetail_divPtag_style">
                          <p>Download Invoice</p>
                        </div>
                        <div class="orderDetail_divBtn_style">
                          <button type="button" class="btn orderDetail_btn_style">Download</button>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
          <div class="row">
            <div id="wishlist-history" class="block-center col-12">


              <div class="card order_cardTable_style orderDetail_card_style">
                <div class="Container">
                  <div class="row">
                    <div class="col-md-4 orderDetail_col4_style">
                      <div class="row">
                        <div class="col-md-4">

                          <img class="js-qv-product-cover" width="115px" src="{{asset('assets/images/product/7.jpg')}}"
                            alt="product-image" title="product-image">
                        </div>
                        <div class="col-md-8 mt-2">
                          <h3>Simul dolorem</h3>
                          <p>Lorem ipsum, or lipsum as it is sometimes known</p>
                          <h3>$200</h3>
                        </div>
                      </div>

                    </div>
                    <div class="col-md-8">
                      <ul class="Container-progessbar">
                        <li class="active">Ordered </li>
                        <li class="active">Confirmed</li>
                        <li class="">Shipped</li>
                        <li class="">Out for Delivery</li>
                        <li class="">Delivered</li>
                      </ul>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

    @endsection