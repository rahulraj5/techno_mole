@extends('front.master')
@section('content')
    <!-- -------------------mobile media---------- -->
    <div id="mobile_top_menu_wrapper" class="hidden-lg-up mobile_top_iconDiv_style">
      <div id="top_menu_closer">
        <i class="material-icons"></i>
      </div>
      <div class="js-top-menu mobile" id="_mobile_top_menu"></div>
    </div>
    <!-- --------------------Breadcrumb------------ -->
    <div class="breadcrumb-container">
      <nav data-depth="2" class="breadcrumb container">
        <h1 class="h1 category-title breadcrumb-title">My Profile</h1>
       </nav>
    </div>
    <!-- -----------Cart page----------- -->
    
<span class="myProfile">
    <section class="py-5 header">
      <div class="container py-4">
      
        <div class="row">
            <div class="col-md-3">
              <div class="card profile_form_style">
                <!-- Tabs nav -->
                <ul id="tabs" class="nav nav-tabs" role="tablist" style="display:block;">
                  <li class="nav-item">
                    <a id="Account-Dtl" href="#Account-Details" class="nav-link profile_nav_link_style active" data-toggle="tab" role="tab">
                      <i class="fa fa-user-circle-o mr-2"></i>
                                        <span class="font-weight-bold small text-uppercase">Account Details</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a id="Order-Dtl" href="#Order-Details" class="nav-link profile_nav_link_style" data-toggle="tab" role="tab">
                      <i class="fa fa-calendar-minus-o mr-2"></i>
                      <span class="font-weight-bold small text-uppercase">Orders</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a id="add" href="#Address" class="nav-link profile_nav_link_style" data-toggle="tab" role="tab">
                      <i class="fa fa-star mr-2"></i>
                      <span class="font-weight-bold small text-uppercase">Address</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a id="pass" href="#Change-Password" class="nav-link profile_nav_link_style" data-toggle="tab" role="tab">
                      <i class="fa fa-lock mr-2"></i>
                      <span class="font-weight-bold small text-uppercase">Change Password</span></a>
                    </a>
                  </li>
                </ul>
              </div>
            </div>


            <div class="col-md-9">
                <!-- Tabs content -->
                <div class="card profile_form_style">
                  <div id="content" class="tab-content" role="tablist">
                    <div id="Account-Details" class="tab-pane fade show active" role="tabpanel" aria-labelledby="Account-Dtl">
                      <div  role="tab" id="Account_Details">
                        <h3 class="mt-3 mb-4">Personal Details</h3>
                      </div>
                      <div id="Account-Detail" class="collapse show" role="tabpanel" aria-labelledby="Account_Details">
                        <div >
                            @foreach($user as $users)
                            <form  method="post" action="/edit_user" enctype="multipart/form-data">
                             @csrf
                              <div class="profile-form">
                                <div class="form-group row ">
                                  <label class="col-md-3 col-sm-12 form-control-label form_lable_style required">First name</label>
                                  <div class="col-md-9 col-sm-12">
                                  <input
                                      type="hidden"
                                      value="{{$users->id}}"
                                      name="uid"                                   
                                      >
                                    <input
                                      class="form-control"
                                      value="{{$users->fname}}"
                                      name="fname"
                                      type="text"
                                      > @if ($errors->has('fname'))
							
							                          <span class="signup_span_validation_style">{{$errors->first('fname')}}</span>@endif 
                                  </div>                            
                                </div>
                                <div class="form-group row ">
                                  <label class="col-md-3 col-sm-12 form-control-label form_lable_style required">Last name</label>
                                  <div class="col-md-9 col-sm-12">
                                    <input
                                      class="form-control"
                                      value="{{$users->lname}}"
                                      name="lname"
                                      type="text"
                                      >@if ($errors->has('lname'))
							
							                          <span class="signup_span_validation_style">{{$errors->first('lname')}}</span>@endif
                                  </div>                            
                                </div>
                                <div class="form-group row ">
                                  <label class="col-md-3 col-sm-12 form-control-label form_lable_style required">Gender</label>
                                  <div class="col-md-4 col-sm-12 d-flex">
                                    <input
                                      class="form-control radio_btn_style"
                                      name="gender"
                                      type="radio"
                                      value="male" {{($users->gender=="male")? "checked" : "" }}>MALE 
                                      <input
                                      class="form-control radio_btn_style"
                                      name="gender"
                                      type="radio"
                                      value="female"  {{($users->gender=="female")? "checked" : "" }}>FEMALE 
      
                                      
                                  </div>                            
                                </div>
                                <div class="form-group row ">
                                  <label class="col-md-3 col-sm-12 form-control-label form_lable_style required">Date Of Birth</label>
                                  <div class="col-md-9 col-sm-12">
                                    <input
                                    class="form-control"
                                    value="{{$users->dob}}"
                                    name="dob"
                                    type="date"
                                    > @if ($errors->has('dob'))
							
							                        <span class="signup_span_validation_style">{{$errors->first('dob')}}</span>@endif
                                  </div>                            
                                </div>
                                <div class="form-group row ">
                                  <label class="col-md-3 col-sm-12 form-control-label form_lable_style required">Email</label>
                                  <div class="col-md-9 col-sm-12">
                                    <input
                                    class="form-control"
                                    value="{{$users->email}}"
                                    name="email"
                                    type="text"
                                    > @if($errors->has('email'))
							
							                        <span class="signup_span_validation_style">{{$errors->first('email')}}</span>@endif
                                  </div>                            
                                </div>                      
                                <div class="form-group row ">
                                  <label class="col-md-3 col-sm-12 form-control-label form_lable_style required">Mobile_No</label>
                                  <div class="col-md-9 col-sm-12">
                                    <input
                                    class="form-control"
                                    value="{{$users->phone_no}}"
                                    name="mobile"
                                    type="text"
                                    > @if ($errors->has('mobile'))
							
							                        <span class="signup_span_validation_style">{{$errors->first('mobile')}}</span>@endif
                                  </div>                            
                                </div>
                                <div class="form-group text-center">
                                  <input class="btn btn-primary" value="Edit profile" type="submit">
                                </div>
                              </div>
                            </form>
                            @endforeach
                        </div>
                      </div>
                    </div>

                    <div id="Order-Details" class="tab-pane fade" role="tabpanel" aria-labelledby="Order-Dtl">
                      <div  role="tab" id="Orders">
                        <h3 class="mt-3 mb-4">Order Details</h3>
                      </div>
                      <div id="Order" class="collapse" role="tabpanel" aria-labelledby="Orders">
                        <div >
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

                                        <tbody>

                                          <tr id="wishlist_1" class="order_tr_style">

                                            <td class="wishlist-product-image order_td_style">
                                              <a class="wishlist-item-link" href="#">
                                                <img class="js-qv-product-cover" src="{{asset('assets/images/product/1.jpg')}}" alt="product-image"
                                                  title="product-image">
                                              </a>
                                            </td>
                                            <td class="bold align_center text-center wishlist-product-name order_td_style">
                                              <a class="wishlist-item-link order_aTag_style" href="#">Simul dolorem</a>
                                            </td>

                                            <td class="bold align_center wishlist-product-price order_td_style">
                                              <span class="money">$19.00</span>
                                            </td>
                                            <td class="bold align_center wishlist-product-stock order_td_style">
                                              <span class="stockstatus order_statusOne_style">Delivered</span>
                                            </td>

                                          </tr>

                                          <tr id="wishlist_2" class="order_tr_style">

                                            <td class="wishlist-product-image order_td_style">
                                              <a class="wishlist-item-link" href="#">
                                                <img class="js-qv-product-cover" src="{{asset('assets/images/product/3.jpg')}}" alt="product-image"
                                                  title="product-image">
                                              </a>
                                            </td>
                                            <td class="bold align_center text-center wishlist-product-name order_td_style">
                                              <a class="wishlist-item-link order_aTag_style" href="#">Simul dolorem</a>
                                            </td>

                                            <td class="bold align_center wishlist-product-price order_td_style">
                                              <span class="money">$19.00</span>
                                            </td>
                                            <td class="bold align_center wishlist-product-stock order_td_style">
                                              <span class="stockstatus order_statusTwo_style">pending</span>
                                            </td>

                                          </tr>

                                          <tr id="wishlist_3" class="order_tr_style">
                                        
                                            <td class="wishlist-product-image order_td_style">
                                              <a class="wishlist-item-link" href="#">
                                                <img class="js-qv-product-cover" src="{{asset('assets/images/product/7.jpg')}}" alt="product-image"
                                                  title="product-image">
                                              </a>
                                            </td>
                                            <td class="bold align_center text-center wishlist-product-name order_td_style">
                                              <a class="wishlist-item-link order_aTag_style" href="#">Simul dolorem</a>
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
                                    </div>

                                  </div>
                                </div>
                              </div>
                            </div>
                          </section>
                        </div>
                      </div>
                    </div>

                    <div id="Address" class="tab-pane fade" role="tabpanel" aria-labelledby="add">
                      <div role="tab" id="Address-line">
                        <h3>Address</h3>
                      </div>
                      <div id="address-body" class="collapse" role="tabpanel" aria-labelledby="Address-line">
                        <div >
                        <div class="container">
                              <div class="row">
                                <div id="profile_address" class="block-center col-12">
                                  <div class="card order_cardTable_style">
                                    <table class="std table table-bordered order_table_style">
                                      <thead>
                                        <tr class="order_headTr_style">

                                          <th class="first_item order_th_style">Receiver Name</th>
                                          <th class="item mywishlist_first order_th_style">Phone No</th>
                                          <th class="item mywishlist_first order_th_style">City</th>
                                          <th class="item mywishlist_first order_th_style">ADDRESS</th>
                                          <th class="item mywishlist_first order_th_style">Defalt</th>                                          
                                          <th class="order_th_style">Action</th>

                                        </tr>
                                      </thead>

                                      <tbody>
                                          @foreach($address as $add)
                                        <tr id="wishlist_1" class="order_tr_style">

                                          <td class="wishlist-product-image order_td_style">
                                            {{$add->receiver_name	}}
                                          </td>
                                          <td class="bold align_center wishlist-product-name order_td_style">
                                          {{$add->receiver_phone}}
                                          </td>
                                          <td class="bold align_center wishlist-product-name order_td_style">
                                          {{$add->city}}
                                          </td>

                                          <td class="bold align_center wishlist-product-price order_td_style">
                                          {{$add->address_lane}}
                                          </td>
                                          <td class="bold align_center wishlist-product-stock order_td_style">
                                          @if($add->select_status =='1')  
                                            <label class="switch">
                                            <input data-id="{{$add->address_id}}" data-uid="{{$add->user_id}}" class="toggle-class" type="checkbox" checked>
                                            <span class="slider round"></span>
                                          </label>       
                                           
                                           @else
                                           <label class="switch">
                                            <input  data-id="{{$add->address_id}}" data-uid="{{$add->user_id}}" class="toggle-class"type="checkbox" >
                                            <span class="slider round"></span>
                                          </label>
                                          @endif
                                          </td>
                                          <td class="bold align_center wishlist-product-stock order_td_style">
                                         <a href="/add_delete/{{$add->address_id}}/{{$add->user_id}}" data-id="{{$add->address_id}}" onclick="dlt_address()"> <i class="fa fa-trash mr-2"></i></a>
                                          
                                          </td>

                                        </tr>
                                          @endforeach
                                      </tbody>

                                    </table>
                                  </div>

                                </div>
                              </div>
                              
                            </div>

                            <form  method="post" action="/add_address" enctype="multipart/form-data">
                             @csrf
                              <div class="profile-form">
                                <div class="form-group row ">
                                  <label class="col-md-3 col-sm-12 form-control-label form_lable_style required">Receiver Name</label>
                                  <div class="col-md-9 col-sm-12">
                                  @foreach($user as $users)
                                  <input
                                      type="hidden"
                                      value="{{$users->id}}"
                                      name="aid"                                   
                                      >
                                      @endforeach
                                    <input
                                      class="form-control"
                                      name="name"
                                      type="text"
                                      >  @if ($errors->has('name'))
							
              <span class="signup_span_validation_style">{{$errors->first('name')}}</span>@endif 
                                  </div>                            
                                </div>
                                <div class="form-group row ">
                                  <label class="col-md-3 col-sm-12 form-control-label form_lable_style required">Phone No</label>
                                  <div class="col-md-9 col-sm-12">
                                    <input
                                      class="form-control"
                                      name="phone"
                                      type="text"
                                      >@if ($errors->has('phone'))
							
              <span class="signup_span_validation_style">{{$errors->first('phone')}}</span>@endif 
                                  </div>                            
                                </div>
                                
                                <div class="form-group row ">
                                  <label class="col-md-3 col-sm-12 form-control-label form_lable_style required">Select City</label>
                                  <div class="col-md-9 col-sm-12">
                                   <input
                                    class="form-control"
                                    name="city"
                                    type="text"
                                    > @if ($errors->has('city'))
							
              <span class="signup_span_validation_style">{{$errors->first('city')}}</span>@endif 
                                   </div>                            
                                </div>
                                <div class="form-group row ">
                                  <label class="col-md-3 col-sm-12 form-control-label form_lable_style required">Address</label>
                                  <div class="col-md-9 col-sm-12">
                                    <textarea  class="form-control"
                                    name="alane"></textarea>@if ($errors->has('alane'))
							
              <span class="signup_span_validation_style">{{$errors->first('alane')}}</span>@endif 
                                    
                                  </div>                            
                                </div>                      
                                <div class="form-group row ">
                                  <label class="col-md-3 col-sm-12 form-control-label form_lable_style required">Pincode</label>
                                  <div class="col-md-9 col-sm-12">
                                    <input
                                    class="form-control"
                                    name="pincode"
                                    type="text"
                                    > @if($errors->has('pincode'))							
              <span class="signup_span_validation_style">{{$errors->first('pincode')}}</span>@endif 
                                  </div>                            
                                </div>
                                <div class="form-group text-center">
                                  <input class="btn btn-primary" value="ADD" type="submit">
                                </div>
                              </div>
                            </form>
                                        
                            <!-- <img src="{{asset('assets/images/map.png')}}" class="product_map_img_style" alt="map"> -->
                              
                        </div>
                      </div>
                    </div>

                    <div id="Change-Password" class="tab-pane fade" role="tabpanel" aria-labelledby="pass">
                      <div role="tab" id="Chn-Pass">
                        <h3 class="mt-3 mb-4">Change Password</h3>
                      </div>
                      <div id="pass-body" class="collapse" role="tabpanel" aria-labelledby="Chn-Pass">
                        <div>
                        <form  method="post" action="/change_password" enctype="multipart/form-data" class="">
                        @csrf
                        @foreach($user as $users)
                                  <input
                                      type="hidden"
                                      value="{{$users->id}}"
                                      name="user_id"                                   
                                      >
                                      @endforeach
                          <div class="form-group row ">
                            <label class="col-md-3 col-sm-12 form-control-label form_lable_style">
                              Old Password
                            </label>
                          
                            <div class="col-md-9 col-sm-12">
                              <input
                              class="form-control"
                              name="oldpassword"
                              type="password"
                              > @if($errors->has('oldpassword'))							
              <span class="signup_span_validation_style">{{$errors->first('oldpassword')}}</span>@endif 
                            </div>                            
                          </div>

                          <div class="form-group row ">
                            <label class="col-md-3 col-sm-12 form-control-label form_lable_style">
                              New Password
                            </label>
                            <div class="col-md-9 col-sm-12">
                              <input
                              class="form-control"
                              name="newpassword"
                              type="password"
                              > @if($errors->has('newpassword'))							
              <span class="signup_span_validation_style">{{$errors->first('newpassword')}}</span>@endif 
                            </div>                            
                          </div>

                          <div class="form-group row ">
                            <label class="col-md-3 col-sm-12 form-control-label form_lable_style">
                              Confirm Password
                            </label>
                            <div class="col-md-9 col-sm-12">
                              <input
                              class="form-control"
                              name="confirmpassword"
                              type="password"
                              >  @if($errors->has('confirmpassword'))							
              <span class="signup_span_validation_style">{{$errors->first('confirmpassword')}}</span>@endif 
                            </div>                            
                          </div>
                        
                          <div class="form-group text-center">
                            <input class="btn btn-primary" value="Change Password" type="submit">
                          </div>
                      
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                
                </div>
            </div>
        </div>
    
    </section>
</span>
    <script>
     @if(Session::has('edituser'))
     toastr.success("{{ Session::get('edituser')}}");
     unset($_SESSION['editpassword']['wrongpassword']);
     
     @endif
     //
     @if(Session::has('editpassword'))
     toastr.success("{{ Session::get('editpassword')}}");
     unset($_SESSION['edituser']['wrongpassword']);
     @endif
     //
     @if(Session::has('wrongpassword'))
     toastr.error("{{ Session::get('wrongpassword')}}");
     unset($_SESSION['edituser']['editpassword']);
     @endif
     </script>
    <script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var add_id = $(this).data('id'); 
        var uid = $(this).data('uid'); 
               
         $.ajax({
               url:"{{route('address_status')}}",
              type:'GET',
              dataType:'Json',
              data: {'status': status, 'user_id': uid, 'add_id':add_id},
              success: function(result){

              console.log(result.data);
            }
        });
    })
  })

// for delete address
function dlt_address() {
  alert('hi');
    // $(document).on('click', '.category-sub-link', (e) => {
    //   e.preventDefault();
    //   var aid = $(e.target).data('id');
    //   $('#input').val(aid);
    //   // alert(aid);
      
    //   $.ajax({
    //           url:"{{route('trial')}}",
    //           type:'POST',
    //           dataType:'html',
    //           data: $("#filter").serialize(),
    //           success:function(response) {
  
    //             $('#productdata').html(response);
                
    //           }
    //   });
    // });
  }

</script>
    @endsection
    
    

  
  
  
   