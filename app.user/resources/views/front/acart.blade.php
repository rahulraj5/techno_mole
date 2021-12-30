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
        <h1 class="h1 category-title breadcrumb-title">My Cart</h1>
        <!-- <ul>
          <li>
            <a href="#">
              <span>Home</span>
            </a>
          </li>
          <li>
            <a href="#">
              <span>Add_to_cart</span>
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
              <?php $total = 0;  ?>
                    @if(session('cart'))
                <thead>
                  <tr>
                    <th class="first_item">image</th>
                    <th class="item mywishlist_first">product name</th>
                    <th class="item mywishlist_first">price</th>
                    <th class="item mywishlist_second">Quantity</th>
                    <th class="item mywishlist_second">Amount</th>
                    <th class="item mywishlist_second">Remove_Item</th>
                  </tr>
                </thead>
                <tbody>
                   
                    @foreach(session('cart') as $id => $product)
                   
                    <?php $total += $product['total']; ?>
                    <tr data-id="{{ $id }}" id="wishlist_1">
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
                    <input type="number" value="{{$product['quantity']}}" class="form-control quantity update-cart" />
                    </td>
                    <td class="bold align_center wishlist-product-stock" style="width:160px;">
                      <span class="stockstatus" id="total{{$id}}">{{$product['total']}}</span>
                    </td>
                    <td class="remove">
                      <a href="/detail_dltcart/{{$id}}">
                        <i class="fa fa-times"></i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                  @else
                  <tr><td>No Item Added</td></tr>
                    @endif   
                  </tbody>
                 
              </table>
              <div class="cart-btn text-right col-xs-12">
                      <a href="/checkout" class="btn btn-primary checkout">Checkout</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   <script>
     @if(Session::has('message'))
     toastr.error("{{ Session::get('message')}}");
     @endif
     </script>
@endsection
   