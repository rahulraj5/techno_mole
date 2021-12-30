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
        <h1 class="h1 category-title breadcrumb-title">Checkout</h1>
         </nav>
    </div>
    <!-- -----------Checkout page----------- -->
    <section id="wrapper" class="top-wrapper">
      <div class="container checkout_container_style">
        <section id="content">
          <div class="row">
            <div class="col-lg-4 col-sm-12">
              <div class="card p-0">
                <h3 class="step-title checkout_heading_style">1. Billing address
                  <!-- <span class="step-number">1</span> 1. Billing address -->
                </h3>
                <div class="container">
                @foreach($address as $add)
                <form action="#" id="customer-form" class="js-customer-form" method="post">
                  @csrf
                    <section>
                      <input type="hidden" name="id" value="{{$add->user_id}}">

                      <div class="form-group row ">
                        <label class="col-md-5 col-sm-12 checkout_colMd5_style form-control-label required">Receiver Name</label>
                        <div class="col-md-7 col-sm-12 checkout_colMd7_style">
                          <input class="form-control checkout_input_style" name="name" type="text" value="{{$add->receiver_name}}" readonly>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label class="col-md-5 col-sm-12 checkout_colMd5_style form-control-label required">Mobile No</label>
                        <div class="col-md-7 col-sm-12 checkout_colMd7_style">
                          <input class="form-control checkout_input_style" name="phone" type="text" value="{{$add->receiver_phone}}" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-5 col-sm-12 checkout_colMd5_style form-control-label required">City</label>
                        <div class="col-md-7 col-sm-12 checkout_colMd7_style">
                          <input class="form-control checkout_input_style" name="city" type="email" value="{{$add->city}}" readonly>
                        </div>
                      </div>
                      <!-- <div class="form-group row">
                        <label class="col-md-5 col-sm-12 checkout_colMd5_style form-control-label required">
                          Telephone
                        </label>
                        <div class="col-md-7 col-sm-12 checkout_colMd7_style">
                          <div class="input-group">
                            <input class="form-control checkout_input_style" name="Telephone" type="text" value="" required>
                          </div>
                        </div>
                      </div> -->
                      <div class="form-group row">
                        <label class="col-md-5 col-sm-12 checkout_colMd5_style form-control-label required">
                          Address
                        </label>
                        <div class="col-md-7 col-sm-12 checkout_colMd7_style">
                          <div class="input-group">
                            <textarea rows="2" cols="120" id="Address" class="form-control" name="address" readonly>{{$add->address_lane}}</textarea>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-5 col-sm-12 checkout_colMd5_style form-control-label required">Pincode</label>
                        <div class="col-md-7 col-sm-12 checkout_colMd7_style">
                          <input class="form-control checkout_input_style" name="pincode" type="text" value="{{$add->pincode}}" readonly>
                        </div>
                      </div>
                      

                      <!-- <div class="form-group row mb-0">

                        <div class="col-md-12 col-sm-12">
                          <a href="/profile/{{$add->user_id}}">Edit Address</a>
                        </div>
                      </div> -->
                      <div class="form-group row mb-0">

<div class="col-md-12 col-sm-12">
  <input type="checkbox" id="account" onclick="showToAccount()" name="account" value="account">
  <label for="vehicle1" class="mt-2"> Create an account for later use</label><br>
</div>
</div>

<div style="display: none;" id="useLater" >
<div class="form-group row">
  <label class="col-md-5 col-sm-12 checkout_colMd5_style form-control-label required">Password</label>
  <div class="col-md-7 col-sm-12 checkout_colMd7_style">
    <input class="form-control checkout_input_style" name="Password" type="password" value="" required>
  </div>
</div>

<div class="form-group row">
  <label class="col-md-5 col-sm-12 checkout_colMd5_style form-control-label required">Confirm password</label>
  <div class="col-md-7 col-sm-12 checkout_colMd7_style">
    <input class="form-control checkout_input_style" name="Password" type="password" value="" required>
  </div>
</div>
</div>

<div class="form-group row">

<div class="col-md-12 col-sm-12">
  <input type="checkbox" checked id="shipAccount" onclick="showToShipAccount()" name="shipAccount" value="shipAccount">
  <label for="vehicle1" class="mt-2">Ship to the same address</label><br>
</div>
</div>

<div style="display: none;" id="shippingDetail" >
<h4><b>Shipping address</b></h4>

<div class="form-group row mt-4">
  <label class="col-md-5 col-sm-12 checkout_colMd5_style form-control-label required">Receiver Name</label>
  <div class="col-md-7 col-sm-12 checkout_colMd7_style">
    <input class="form-control checkout_input_style"  name="name" type="text" value="" required>
  </div>
</div>
<div class="form-group row">
  <label class="col-md-5 col-sm-12 checkout_colMd5_style form-control-label required">Mobile No</label>
  <div class="col-md-7 col-sm-12 checkout_colMd7_style">
    <input class="form-control checkout_input_style" name="phone" type="text" value="" required>
  </div>
</div>
<div class="form-group row">
  <label class="col-md-5 col-sm-12 checkout_colMd5_style form-control-label required">
  City
  </label>
  <div class="col-md-7 col-sm-12 checkout_colMd7_style">
    <div class="input-group">
      <input class="form-control checkout_input_style" name="city" type="text" value="" required>
    </div>
  </div>
</div>
<div class="form-group row">
  <label class="col-md-5 col-sm-12 checkout_colMd5_style form-control-label required">
  Address
  </label>
  <div class="col-md-7 col-sm-12 checkout_colMd7_style">
    <div class="input-group">
      <textarea rows="2" cols="120" id="Address" class="form-control" name="alane"></textarea>
    </div>
  </div>
</div>

<div class="form-group row">
  <label class="col-md-5 col-sm-12 checkout_colMd5_style form-control-label required">
  Pincode
  </label>
  <div class="col-md-7 col-sm-12 checkout_colMd7_style">
    <div class="input-group">
      <input class="form-control checkout_input_style"  name="pincode" type="text" value="">
    </div>
  </div>
</div>

<!-- <div class="form-group row">
  <label class="col-md-5 col-sm-12 checkout_colMd5_style form-control-label required">
    Area
  </label>
  <div class="col-md-7 col-sm-12 checkout_colMd7_style">
    <select class="form-control form-control-select checkout_input_style" name="id_state" required="">
      <option value="" disabled="" selected="">Select Area</option>
      <option value="1">Area 1</option>
      <option value="2">Area 2</option>
      <option value="3">Area 3</option>
      <option value="4">Area 4</option>
      <option value="5">Area 5</option>
      <option value="6">Area 6</option>
      <option value="7">Area 7</option>
      <option value="8">Area 8</option>
      <option value="9">Area 9</option>
      <option value="10">Area 10</option>

    </select>
  </div>

</div> -->
</div>
                     
                    </section>

                  </form>
                  @endforeach
                </div>
              </div>


            </div>

            <div class="col-lg-4 col-sm-12">
              <div class="card p-0">
                <h3 class="step-title checkout_heading_style">2. Shipping method</h3>
                <div class="container">
                  <form action="#" id="customer-form" class="js-customer-form" method="post">
                    <section>
                      <p>3 Working Days Delivery</p>
                      <div class="col-md-6 col-sm-12 form-control-valign">
                        <label class="radio-inline">
                          <span class="custom-radio">
                            <input name="id_gender" type="radio" value="1">
                            <span></span>
                          </span>
                          KD1
                        </label>
                      </div>
                    </section>

                  </form>
                </div>

                <h3 class="step-title checkout_heading_style mt-5">3. Payment method</h3>

                <div class="container pb-4">
                  <form action="#" id="customer-form" class="js-customer-form" method="post">
                    <section>

                      <div class="col-md-12 col-sm-12 form-control-valign">
                        <div class="checkout_paymentDiv_style">
                          <label class="radio-inline checkout_label_style">
                            <span class="custom-radio">
                              <input name="id_gender" type="radio" value="1">
                              <span></span>
                            </span>
                            Knet
                          </label>
                          <div>
                            <img src="{{asset('assets/images/paymenticon/cardOne.png')}}" height="27px" width="32px" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12 col-sm-12 form-control-valign mt-3">
                        <div class="checkout_paymentDiv_style">
                          <label class="radio-inline checkout_label_style">
                            <span class="custom-radio">
                              <input name="id_gender" type="radio" value="1">
                              <span></span>
                            </span>
                            Visa and Mastercard
                          </label>
                          <div>
                            <img src="{{asset('assets/images/paymenticon/cardTwo.png')}}" height="27px" width="75px" />
                          </div>
                        </div>
                      </div>
                    </section>

                  </form>
                </div>

              </div>


            </div>

            <div class="col-lg-4 col-sm-12">
              <div class="card p-0">
                <h3 class="step-title checkout_heading_style">4. Review your order</h3>
                <div class="container">
                  <table style="width:100%">
                    
                    <thead class="checkout_thead_style">
                    <tr>                     
                      <th class="p-3">Product</th>
                      <th class="p-3">Qty</th>
                      <th class="p-3">Subtotal</th>
                  
                    </tr>
                  </thead>
                   
                    <tbody>
<!--                      
                    <tr class="checkout_thead_style">        

                      <td colspan="3" >
                        <p class="mt-2">
                          Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry
                        </p>                                               
                      </td>
                    </tr> -->
                    <?php $total = 0;  ?>
                    @if(session('cart'))
                    @foreach(session('cart') as $id => $product)
                    <?php $total += $product['total']; ?>
                    <tr data-id="{{ $id }}" class="checkout_thead_style">
                      <td class="p-2">{{$product['name']}}</td>
                      <td class="text-center">{{$product['quantity']}}</td>
                      <td class="text-right">{{$product['total']}}</td>
                    </tr>
                    @endforeach
                    @endif
                    <tr>                      
                      <td class="p-2" colspan="2">Subtotal</td>
                      <td class="text-right p-2">{{$total}}</td>
                    </tr>
                    @foreach($delivery as $dlv)
                    <tr>                      
                      <td class="p-1" colspan="2">Shipping</td>
                      <td class="text-right p-1">@if($total >= $dlv->min_cart_value)
                        0
                        @else
                        {{$dlv->min_cart_value}}
                        @endif
                      </td>
                    </tr>
                    <tr id="display_coupn" style="display:none;">                      
                      <td  class="p-1" >Coupn Discount</td>
                      <td class="text-right p-1"><b id="cdiscount"></b></td>
                    </tr>
                    
                    <tr class="checkout_tr_style">     
                      <input type="hidden" id="txtEmail" value="@if($total >= $dlv->min_cart_value)
                      {{$total}}
                        @else
                        {{$total + $dlv->min_cart_value}}
                        @endif">                 
                      <td class="p-1 pb-4" colspan="2"><b>Grand total</b></td>
                      <td class="text-right p-1 pb-4"><b id="gtotal">@if($total >= $dlv->min_cart_value)
                      {{$total}}
                        @else
                        {{$total + $dlv->min_cart_value}}
                        @endif</b></td>
                    </tr>
                    @endforeach
                  </tbody>
                  </table>
                  <form action="#" id="coupon_form" class="js-customer-form">
                    @csrf
                    <section>
                      <div><p id="expired_info"></p></div>
                      <div id="coupn_code_hide" class="form-group row mt-3">
                        <label class="col-md-5 col-sm-12 form-control-label required">Coupon Code</label>
                        <div class="col-md-7 col-sm-12">
                          <input class="form-control" name="code" type="text" value="" required>
                          <input class="form-control" name="cid" id="coupn_id" type="hidden">
                        </div>
                      </div>

                      <div id="apply_coupn_hide" class="form-group row mt-3">
                        <button id="applycoupon" class="btn checkout_btn_style" name="continue" type="submit"> Apply Coupon </button>
                       
                      </div>

                      <!-- <div class="form-group row">

                        <div class="col-md-12 col-sm-12">
                          <input type="checkbox" checked id="account" name="account" value="account">
                          <label for="vehicle1" class="mt-2">  Subscribe to our newsletter</label><br>
                        </div>
                      </div> -->

                      <div class="form-group row mt-3">
                        <button class="btn btn-primary ml-3 w-100 mr-3" name="continue" type="submit"> Place order now </button>
                       
                      </div>

                    </section>

                  </form>


                </div>
              </div>

            </div>

            <!-- <div class="col-lg-4 col-sm-12">
                <section id="js-checkout-summary" class="card js-cart">
                <div class="card-block-summary-details">
                  <div class="cart-summary-products">
                    <div id="cart-summary-product-list">
                      <ul class="media-list">
                        <li class="media">
                          <div class="media-left">
                            <a href="#" title="Omnis dicam mentitum">
                              <img src="{{asset('assets/images/product/12.jpg')}}" alt="Omnis dicam mentitum">
                            </a>
                          </div>
                          <div class="media-body">
                            <span class="product-name">Omnis dicam mentitum</span>
                            <span class="product-quantity">x1</span>
                            <span class="product-price float-xs-right">$25.99</span>
                          </div>
                        </li>
                        <li class="media">
                          <div class="media-left">
                            <a href="#" title="Simul dolorem voluptaria">
                              <img src="{{asset('assets/images/product/1.jpg')}}" alt="Simul dolorem voluptaria">
                            </a>
                          </div>
                          <div class="media-body">
                            <span class="product-name">Simul dolorem voluptaria</span>
                            <span class="product-quantity">x1</span>
                            <span class="product-price float-xs-right">$16.51</span>
                          </div>
                        </li>
                      </ul>
                    </div>                    
                  </div>
                  <div class="cart-summary-line cart-summary-subtotals" id="cart-subtotal-products">
                    <span class="label">Subtotal</span>
                    <span class="value">$42.50</span>
                  </div>
                  <div class="cart-summary-line cart-summary-subtotals" id="cart-subtotal-shipping">
                    <span class="label">Shipping</span>
                    <span class="value">$7.00</span>
                  </div>
                </div>
                <hr class="separator">
                <div class="cart-summary-totals">
                  <div class="cart-summary-line cart-total">
                    <span class="label">Total (tax excl.)</span>
                    <span class="value">$49.50</span>
                  </div>
                  <div class="cart-summary-line">
                    <span class="label sub">Taxes</span>
                    <span class="value sub">$0.00</span>
                  </div>
                </div>
              </section>
                <div id="block-reassurance" class="block-reassurance-cart">
                  <ul>
                    <li>
                      <div class="block-reassurance-item">
                        <img src="{{asset('assets/images/block-reassurance/1.png')}}" alt="Security policy (edit with Customer reassurance module)">
                        <span class="h6">Security policy (edit with Customer reassurance module)</span>
                      </div>
                    </li>
                    <li>
                      <div class="block-reassurance-item">
                        <img src="{{asset('assets/images/block-reassurance/2.png')}}" alt="Delivery policy (edit with Customer reassurance module)">
                        <span class="h6">Delivery policy (edit with Customer reassurance module)</span>
                      </div>
                    </li>
                    <li>
                      <div class="block-reassurance-item">
                        <img src="{{asset('assets/images/block-reassurance/3.png')}}" alt="Return policy (edit with Customer reassurance module)">
                        <span class="h6">Return policy (edit with Customer reassurance module)</span>
                      </div>
                    </li>
                  </ul>
                </div>
              </div> -->
          </div>
        </section>
      </div>
    </section>
   <script>
  function showToAccount(){
      var checkBox = document.getElementById("account");
      if (checkBox.checked == true){
          $("#useLater").css("display", "block")
      } else {
          $("#useLater").css("display", "none")
      }
     
  }

  function showToShipAccount(){
      var checkBox = document.getElementById("shipAccount");
      if (checkBox.checked == false){
          $("#shippingDetail").css("display", "block")
      } else {
          $("#shippingDetail").css("display", "none")
      }
     
  }
</script>
<script>
  $("#applycoupon").click(function(event) {
    event.preventDefault();

    var a = $("#txtEmail").val();

    $.ajax({
               url:"{{route('coupon')}}",
              type:'POST',
              dataType:"json",
              data: $("#coupon_form").serialize(),
              success:function(result) {

                if(result.data)
                {
                  $("#expired_info").html(result.data);
                }else{

                  $("#expired_info").hide();
                  $("#coupn_id").val(result.coupnid);
                  $("#display_coupn").css("display", "block");
                  $("#cdiscount").html(result.amount);
                  $("#gtotal").html(a-result.amount);
                  $("#coupn_code_hide").hide();
                  $("#apply_coupn_hide").hide();
                  
                  
                }
  
                
                
              }
      });
  
});
</script>
@endsection