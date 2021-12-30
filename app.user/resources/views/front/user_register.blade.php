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
          <h1 class="h1 category-title breadcrumb-title">Create Account</h1>
        
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
                  <h2 class="title"><span>Create Account</span></h2>
                  </div>
                  <form  method="post" action="/first" enctype="multipart/form-data" class="card">
                  {{csrf_field()}}
                    <div class="login-form">
                      <div class="form-group row ">
                        <label class="col-md-3 col-sm-12 form-control-label form_lable_style required">First name</label>
                        <div class="col-md-9 col-sm-12">
                          <input
                            class="form-control"
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
                            name="lname"
                            type="text"
                            >@if ($errors->has('lname'))
							
							<span class="signup_span_validation_style">{{$errors->first('lname')}}</span>@endif
                        </div>                            
                      </div>
                      <div class="form-group row ">
                        <label class="col-md-3 col-sm-12 form-control-label form_lable_style required">Gender</label>
                        <div class="col-md-9 col-sm-12 d-flex">
                          <input
                            class="form-control radio_btn_style"
                            name="gender"
                            type="radio"
                            value="male" checked>MALE 
                            <input
                            class="form-control radio_btn_style"
                            name="gender"
                            type="radio"
                            value="female">FEMALE 

                            
                        </div>                            
                      </div>
                      <div class="form-group row ">
                        <label class="col-md-3 col-sm-12 form-control-label form_lable_style required">Date_Of_Birth</label>
                        <div class="col-md-9 col-sm-12">
                          <input
                          class="form-control"
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
                          name="email"
                          type="text"
                          > @if ($errors->has('email'))
							
							<span class="signup_span_validation_style">{{$errors->first('email')}}</span>@endif
                        </div>                            
                      </div>
                      <div class="form-group row ">
                        <label class="col-md-3 col-sm-12 form-control-label form_lable_style">
                          Password
                        </label>
                        <div class="col-md-9 col-sm-12">
                          <input
                          class="form-control"
                          name="password"
                          type="password"
                          > @if ($errors->has('password'))
							
							<span class="signup_span_validation_style">{{$errors->first('password')}}</span>@endif
                        </div>                            
                      </div>
                      <div class="form-group row ">
                        <label class="col-md-3 col-sm-12 form-control-label form_lable_style required">Mobile_No</label>
                        <div class="col-md-9 col-sm-12">
                          <input
                          class="form-control"
                          name="mobile"
                          type="text"
                          > @if ($errors->has('mobile'))
							
							<span class="signup_span_validation_style">{{$errors->first('mobile')}}</span>@endif
                        </div>                            
                      </div>
                      <div class="form-group text-center">
                        <input class="btn btn-primary" value="Create Account" type="submit">
                      </div>
                    </div>
                  </form>
                </div>
              </section>
            </div>
          </div>
        </div>
      </section>
      <!-- <script>

$(function(){
  // @if (count($errors) > 0)
	// 						@if($errors->any())
	// 						toastr.error("{{ $errors->first()}}");
	// 						@endif
	// 					@endif

            @if (Session::get('status'))
  toastr.error("{{Session::get('status')}}"); 
  @endif
   
});
</script> -->
      @endsection