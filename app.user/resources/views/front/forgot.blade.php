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
          <h1 class="h1 category-title breadcrumb-title">Forgot Password</h1>
          </nav>
      </div>
      <!-- -----------Cart page----------- -->
      <section id="wrapper">
        <div class="container">
          <div class="row">
            <div id="content-wrapper" class="col-12">
              <section id="main">
                <div class="login-page">                  
                  <div class="block-title">
                    <h2 class="title"><span>Forgot Password</span></h2>
                  </div>
                  <form  id="form_forgot"  method="post" action="update_password" enctype="multipart/form-data" class="card">
                 
                    <div class="login-form">
                      <div class="form-group row first_box">
                        <label class="col-md-3 col-sm-12 form-control-label required">Email</label>
                        <div class="col-md-9 col-sm-12">
                          <input
                          class="form-control"
                          name="email"
                          type="text"
                          ><span id="invalid"></span>
                        </div>                            
                      </div>
                      <div class="form-group row  second_box">
                        <label class="col-md-3 col-sm-12 form-control-label">
                         Enter_OTP
                        </label>
                        <div class="col-md-9 col-sm-12">
                          <input
                          class="form-control otp"
                          name="password"
                          type="password"
                          >
                        </div>                            
                      </div>
                      <div class="form-group row  third_box">
                        <label class="col-md-3 col-sm-12 form-control-label">
                         Enter_NEW_PASSWORD
                        </label>
                        <div class="col-md-9 col-sm-12">
                          <input
                          class="form-control"
                          name="npassword"
                          type="password"
                          >
                        </div>                            
                      </div>
                     
                      <div class="form-group text-center">
                        <input class="btn btn-primary first_box" id="first" value="Send_OTP" type="submit">
                      </div>
                      <div class="form-group text-center second_box">
                        <input class="btn btn-primary" id="second" name="verify" value="Verify_OTP" type="submit">
                      </div>
                      <div class="form-group text-center third_box">
                        <input class="btn btn-primary" id="third" name="verify" value="SAVE" type="submit">
                      </div>
                    </div>
                    @csrf
                  </form>
                </div>
              </section>
            </div>
          </div>
        </div>
         </section>
         
         <script>
                 $(document).ready(function(){
            $('#first').click( function(e){
            e.preventDefault();
            alert('TEST');
            $.ajax({
            url:"{{route('verify')}}",
            type:'POST',
            dataType:"json",
            data:$("#form_forgot").serialize(),
            success:function(result) {
                if(result.yes){
                   $('.second_box').show();
                   $('.first_box').hide();

                }else{
                  toastr.error("INVALID_EMAIL_ID");
                }
                  
                
                  //$("#invalid").html(result.no);          
             
              
                  //console.log(result.no);
            //$("#message").html(result.data);               
            // $("#add").attr('disabled',false);
            }

       });
            

         });
});
         </script>
         <!--forcheck otp-->
          <script>
                 $(document).ready(function(){
            $('#second').click( function(e){
            e.preventDefault();
            alert('TEST');
            $.ajax({
            url:"{{route('right')}}",
            type:'POST',
            dataType:"json",
            data:$("#form_forgot").serialize(),
            success:function(result) {
                if(result.right){
                  $('.third_box').show();
                   $('.second_box').hide();
                    $('.first_box').hide();

                }else
                {
                  $('.otp').val("");
                  $('#first').val("RESEND_OTP");
                  $('.first_box').show();
                  $('.second_box').hide();
                  $('.third_box').hide();
                  toastr.error("INVALID_OTP: PLEASE_RESEND");
                }
                  
                
                  //$("#invalid").html(result.no);          
             
              
                  //console.log(result.no);
            //$("#message").html(result.data);               
            // $("#add").attr('disabled',false);
            }

       });
            

         });
});
         </script>
         <style>
             .second_box{display:none;}
             .third_box{display:none;}
        </style>
      @endsection
      