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
        <h1 class="h1 category-title breadcrumb-title">Orders</h1>
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
              <div class="card order_cardTable_style">
                <table class="std table table-bordered order_table_style">
                  <thead>
                    <tr class="order_headTr_style">

                      <th class="first_item order_th_style">Product Image</th>
                      <th class="item mywishlist_first order_th_style">product name</th>
                      <!-- <th class="item mywishlist_second order_th_style">delivery address</th> -->

                      <th class="item mywishlist_first order_th_style">price</th>
                      <th class="order_th_style">Status</th>


                    </tr>
                  </thead>

                </table>
              </div>

              <div class="card order_cardTable_style">
                <a target="" href="orders-detail.html">
                <table class="std table table-bordered order_table_style">
                  <tbody>

                    <tr id="wishlist_1" class="order_tr_style">

                      <td class="wishlist-product-image order_td_style">
                        <a class="wishlist-item-link" href="orders-detail.html">
                          <img class="js-qv-product-cover" src="{{asset('assets/images/product/1.jpg')}}" alt="product-image"
                            title="product-image">
                        </a>
                      </td>
                      <td class="bold align_center text-center wishlist-product-name order_td_style">
                        <a class="wishlist-item-link order_aTag_style" href="orders-detail.html">Simul dolorem</a>
                      </td>

                      <td class="bold align_center wishlist-product-price order_td_style">
                        <span class="money">$19.00</span>
                      </td>
                      <td class="bold align_center wishlist-product-stock order_td_style">
                        <span class="stockstatus order_statusOne_style">Delivered</span>
                      </td>

                    </tr>


                  </tbody>
                </table>
                </a>
              </div>

              <div class="card order_cardTable_style">
                <a target="" href="orders-detail.html">
                <table class="std table table-bordered order_table_style">
                  <tbody>

                    <tr id="wishlist_2" class="order_tr_style">

                      <td class="wishlist-product-image order_td_style">
                        <a class="wishlist-item-link" href="orders-detail.html">
                          <img class="js-qv-product-cover" src="{{asset('assets/images/product/3.jpg')}}" alt="product-image"
                            title="product-image">
                        </a>
                      </td>
                      <td class="bold align_center text-center wishlist-product-name order_td_style">
                        <a class="wishlist-item-link order_aTag_style" href="orders-detail.html">Simul dolorem</a>
                      </td>

                      <td class="bold align_center wishlist-product-price order_td_style">
                        <span class="money">$19.00</span>
                      </td>
                      <td class="bold align_center wishlist-product-stock order_td_style">
                        <span class="stockstatus order_statusTwo_style">pending</span>
                      </td>

                    </tr>
                  </tbody>
                </table>
                </a>
              </div>

              <div class="card order_cardTable_style">
                <a target="" href="orders-detail.html">
                <table class="std table table-bordered order_table_style">
                  <tbody>
                    <tr id="wishlist_3" class="order_tr_style">
                   
                        <td class="wishlist-product-image order_td_style">
                          <a class="wishlist-item-link" href="orders-detail.html">
                            <img class="js-qv-product-cover" src="{{asset('assets/images/product/7.jpg')}}" alt="product-image"
                              title="product-image">
                          </a>
                        </td>
                        <td class="bold align_center text-center wishlist-product-name order_td_style">
                          <a class="wishlist-item-link order_aTag_style" href="orders-detail.html">Simul dolorem</a>
                        </td>

                        <td class="bold align_center wishlist-product-price order_td_style">
                          <span class="money">$19.00</span>
                        </td>
                        <td class="bold align_center wishlist-product-stock order_td_style">
                          <span class="stockstatus order_statusThree_style">Cancelled</span>
                        </td>
                                              
                    </tr>
                  </tbody>
                </table>
                </a>
              </div>



            </div>
          </div>
        </div>
      </div>
    </section>

  @endsection