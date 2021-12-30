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
          <h1 class="h1 category-title breadcrumb-title">Blog Information</h1>
         </nav>
      </div>
      <!-- ---------------Smart Blog ----------------- -->
      <section id="wrapper">
        <div class="container">
          <div class="row">    
          @foreach($blog as $blg)
          
            <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-9"> 
              <div id="smartblogcat" class="block">
                <div class="sdsarticleCat clearfix row">
                  <div class="articleContent col-xl-12 col-lg-12 col-md-12">
                    <a href="#" title="Upon of seasons earth dominion">
                      <img alt="Upon of seasons earth dominion" class="blogIngo_img_style" src="{{asset('assets/images/banner/'.$blg->image)}}">
                    </a>
                  </div>
                  <div class="smartblog-desc col-xl-12 col-lg-12 col-md-12">
                    &nbsp;
                    <span class="author"><i class="fa fa-user"></i>&nbsp;&nbsp;Posted by: Admin Admin</span>&nbsp;&nbsp;
                    <div class="sdsarticleHeader">
                      <p class='sdstitle_block'><a title="Upon of seasons earth dominion" href="#">{{$blg->title}}</a></p>
                    </div>
                    <span class="blogdetail">       
                      <span class="articleSection"><a href="#"><i class="fa fa-tags"></i>&nbsp;&nbsp;Uncategories</a></span>&nbsp;&nbsp;
                      <span class="blogcomment"><a title="0 Comments" href="#"><i class="fa fa-comments"></i>&nbsp;&nbsp;0  Comments</a></span>
                      &nbsp;
                      <span class="viewed"><i class="fa fa-eye"></i>&nbsp;&nbsp; views (0)</span>
                    </span>
                    <div class="sdsarticle-des">
                      <div class="clearfix">
                        <div class="lipsum">
                        {{$blg->description}}
                        </div>

                    </div>
                    </div>
                   
                  </div>
                </div>
        
              </div>
            @endforeach
            </div>     
            <div id="_desktop_left_column" class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
              <div id="left-column">
                <section class="blog-category">
                  <h3 class="h1 products-section-title block-title hidden-md-down">latest blogs</h3>
                  <div class="block-title clearfix  hidden-lg-up collapsed" data-target="#blogarticle-container" data-toggle="collapse">
                    <span class="products-section-title">Top viewed</span>
                    <span class="navbar-toggler collapse-icons">
                      <i class="material-icons add">&#xE313;</i>
                      <i class="material-icons remove">&#xE316;</i>
                    </span>
                  </div>
                  <div id="blogarticle-container" class="collapse data-toggler">
                  @foreach($latest as $lts)
                    <div class="description clearfix">                        
                      <div class="blog-artical">
                        <a href="#" title="Upon of seasons earth dominion">
                          <img alt="Upon of seasons earth dominion" src="{{asset('assets/images/banner/'.$lts->image)}}">
                        </a>
                      </div>
                      <div class="blog-desc">
                        <p class='sdstitle_block'><a title="Upon of seasons earth dominion" href="#">{{$lts->title}}</a></p>
                        <div class="smart-desc">
                          <div class="meta-likes">
                            <a href="#" class="touchsize-likes"><i class="fa fa-heart"></i><span>{{$lts->no_of_comments}}</span></a>
                          </div>
                          <div class="meta-date">
                            <span>{{$lts->created_at}}</span>
                          </div>                          
                        </div>
                      </div>
                     
                    </div>
                    @endforeach
                  
                  </div>
                  
                </section>
               
                
              </div>
            </div>      
          </div>
        </div>        
      </section>
      <div class="container">
        <div id="_mobile_left_column"></div>
        <div id="_mobile_right_column"></div>
        <div class="clearfix"></div>
      </div>
      @endsection