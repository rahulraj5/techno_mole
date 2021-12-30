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
        <h1 class="h1 category-title breadcrumb-title">wishlist</h1>
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
                <table class="std table table-bordered">
                @if(session('wish'))
                <thead>
                  <tr>
                    <th class="first_item">image</th>
                    <th class="item mywishlist_first">product name</th>
                    <th class="item mywishlist_first">price</th>
                    <th class="item mywishlist_second">stockstatus</th>
                    <th class="item mywishlist_second">action</th>
                    <th class="item mywishlist_second">Remove_Item</th>
                  </tr>
                </thead>
                <tbody>
                   
                    @foreach(session('wish') as $id => $product)
                  <tr id="wishlist_1">
                    <td class="wishlist-product-image" style="width:150px;">
                      <a class="wishlist-item-link" href="#">
                              <img class="js-qv-product-cover" src="{{asset('assets/images/product/'.$product['image'])}}" alt="product-image" title="product-image">                 
                          </a>
                    </td>
                    <td class="bold align_center wishlist-product-name">
                      <a class="wishlist-item-link" href="#">{{$product['name']}}</a>
                    </td>
                    <td class="bold align_center wishlist-product-price">
                      <span class="money">{{$product['price']}}</span>
                    </td>
                    <td class="bold align_center wishlist-product-stock" style="width:160px;">
                      <span class="stockstatus">@if($product['stock'] > 0)
stock_in
@else
<span style="color:red">sold_out</span>
@endif </span>
                    </td>
                      <td class="add">
                      @if($product['stock'] > 0)
                      <a href="/direct_cart/{{$id}}/{{$product['name']}}" class="btn btn-primary add-to-cart" type="submit">
                        add to cart
                      </a>
                      @else
                      <span style="color:red">Not Available Item</span>
                      @endif
                    </td>
                    <td class="remove">
                      <a href="/detail_dltcart_wish/{{$id}}">
                        <i class="fa fa-times"></i>
                      </a>
                    </td>
                  </tr>
                  
                  @endforeach
                  @else
                  <tr><td>NO ADDED ITEM</td></tr>
                  @endif   
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script>
     @if(Session::has('other'))
     toastr.error("{{ Session::get('other')}}");
     @endif
     </script>
@endsection
