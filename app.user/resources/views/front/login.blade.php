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
          <h1 class="h1 category-title breadcrumb-title">Login</h1>
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
                    <h2 class="title"><span>Login</span></h2>
                  </div>
                  <form method="post" action="/last" enctype="multipart/form-data" class="card">
                  {{csrf_field()}}
                    <div class="login-form">
                      <div class="form-group row ">
                        <label class="col-md-3 col-sm-12 form-control-label required">Email</label>
                        <div class="col-md-9 col-sm-12">
                          <input
                          class="form-control"
                          name="email"
                          type="text"
                          >	 @if ($errors->has('email'))
							
							<span class="login_span_validation_style">{{$errors->first('email')}}</span>@endif
                        </div>                            
                      </div>
                      <div class="form-group row ">
                        <label class="col-md-3 col-sm-12 form-control-label">
                          Password
                        </label>
                        <div class="col-md-9 col-sm-12">
                          <input
                          class="form-control"
                          name="password"
                          type="password"
                          > @if ($errors->has('password'))
							
							<span class="login_span_validation_style">{{$errors->first('password')}}</span>@endif
                        </div>                            
                      </div>
                      <div class="form-group text-center">
                        <div class="link">
                          <a href="/forgot">Forgot your password?</a> 
                          <a href="/ureg">Register?</a>
                        </div>
                      </div>
                      <div class="form-group text-center">
                        <input class="btn btn-primary" value="Sign In" type="submit">
                      </div>
                    </div>
                  </form>
                </div>
              </section>
            </div>
          </div>
        </div>
         </section>
      <script>
$(function(){
  // @if (count($errors) > 0)
	// 						@if($errors->any())
	// 						toastr.error("{{ $errors->first()}}");
	// 						@endif
	// 					@endif
            @if (Session::get('slogin'))
  toastr.error("{{Session::get('slogin')}}"); 
  @endif
   
   
});
</script>

      @endsection