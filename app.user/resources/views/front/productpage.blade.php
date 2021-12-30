@extends('front.master')
@section('content')
     <!-- -------------------mobile media---------- -->
     <div id="mobile_top_menu_wrapper" class="hidden-lg-up" style="display:none;">
      <div id="top_menu_closer">
        <i class="material-icons"></i>
      </div>
      <div class="js-top-menu mobile" id="_mobile_top_menu"></div>
    </div>
    <!-- ------------------breadcrumb-------------->
    <div class="breadcrumb-container">
      <nav data-depth="5" class="breadcrumb container">
        <h1 class="h1 product-title breadcrumb-title">Product Details</h1>
        <!-- <ol>
          <li>
            <a href="#">
              <span>Home</span>
            </a>
          </li>
          <li >
            <a  href="#">
              <span>Women</span>
            </a>
          </li>
          <li>
            <a href="#">
              <span>Tops</span>
            </a>
          </li>
          <li>
            <a  href="#">
              <span>T-shirts</span>
            </a>
          </li>
          <li>
            <a href="#">
              <span>Simul dolorem voluptaria</span>
            </a>
          </li>
        </ol> -->
      </nav>
    </div>
    <!-- ---------------section-------------------- -->
    <section id="wrapper">
      <div class="container">
        <div class="row">
          <div id="_desktop_left_column" class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
            <div id="left-column">
              <div class="category-block-container">
                <div class="block-title clearfix hidden-lg-up collapsed" data-target="#subcategories-container"
                  data-toggle="collapse">
                  <span class="h1 products-section-title text-uppercase">
                    <a class="text-uppercase h6" href="#">Girl</a>
                  </span>
                  <span class="navbar-toggler collapse-icons">
                    <i class="material-icons add">&#xE313;</i>
                    <i class="material-icons remove">&#xE316;</i>
                  </span>
                </div>
                <h3 class="hidden-md-down">
                  @foreach($category as $cat)
                  <a class="block-title text-uppercase h6" href="#">{{$cat->name}}</a>
                  <?php break; ?>
                  @endforeach
                </h3>
                <div id="subcategories-container" class="block-categories collapse data-toggler">
                  <ul class="category-top-menu">
                    <li>
                      <ul class="category-sub-menu">
                      @foreach($category as $cat)
                              <li data-depth="1">
                                <a class="category-sub-link" href="/bycat/{{$cat->id}}">{{$cat->sname}}</a>
                              </li>
                            @endforeach 
                            
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
              <section class="featured-products clearfix mt-3">
                <h3 class="h1 products-section-title block-title hidden-md-down">New products</h3>
                <div class="block-title clearfix  hidden-lg-up collapsed" data-target="#newproducts-container"
                  data-toggle="collapse">
                  <span class="products-section-title">New products</span>
                  <span class="navbar-toggler collapse-icons">
                    <i class="material-icons add">&#xE313;</i>
                    <i class="material-icons remove">&#xE316;</i>
                  </span>
                </div>
                <div id="newproducts-container" class="collapse data-toggler">
                  <div class="products">
                    @foreach($latestproduct as $lp)
                    <article class="product-miniature js-product-miniature">
                      <div class="product-container">
                        <div class="image">
                          <a href="/detail/{{$lp->pid}}/{{$lp->varient_id}}" class="thumbnail product-thumbnail">
                            <img src="{{asset('assets/images/product/'.$lp->photos)}}" alt="Pellentesque et pharetra">
                          </a>
                        </div>
                        <div class="caption">
                          <div class="product-title"><a href="#">{{$lp->name}}</a></div>
                          <div class="product-price-and-shipping">
                             <span class="discount-percentage discount-product">{{$lp->product_info}}</span>
                          </div>
                        </div>
                      </div>
                    </article>
                    @endforeach
                  </div>
                  <a class="all-product-link h4" href="/category">All new products <i class="material-icons">&#xE315;</i></a>
                </div>
              </section>
              <div id="ishileftbanners" class="clearfix">
                <div class="image-container">
                  <a class="ishi-customhover-fadeinflip" href="#">
                    <img src="{{asset('assets/images/leftbanner.jpg')}}" / alt="leftbanner1">
                  </a>
                </div>
              </div>
              <section class="featured-products clearfix mt-3">
                <h3 class="h1 products-section-title block-title hidden-md-down">Popular Products</h3>
                <div class="block-title clearfix hidden-lg-up collapsed" data-target="#bestsellers-container"
                  data-toggle="collapse">
                  <span class="products-section-title">Popular Products</span>
                  <span class="navbar-toggler collapse-icons">
                    <i class="material-icons add">&#xE313;</i>
                    <i class="material-icons remove">&#xE316;</i>
                  </span>
                </div>
                <div id="bestsellers-container" class="collapse data-toggler">
                  <div class="products">
                    <article class="product-miniature js-product-miniature">
                      <div class="product-container">
                        <div class="image">
                          <a href="#" class="thumbnail product-thumbnail">
                            <img src="{{asset('assets/images/product/5.jpg')}}" alt="Pellentesque et pharetra">
                          </a>
                        </div>
                        <div class="caption">
                          <div class="product-title"><a href="#">Simul dolorem voluptaria</a></div>
                          <div class="product-price-and-shipping">
                            <span class="sr-only">Price</span>
                            <span class="price">$61.21</span>
                          </div>
                        </div>
                      </div>
                    </article>
                    <article class="product-miniature js-product-miniature">
                      <div class="product-container">
                        <div class="image">
                          <a href="#" class="thumbnail product-thumbnail">
                            <img src="{{asset('assets/images/product/6.jpg')}}" alt="Pellentesque et pharetra">
                          </a>
                        </div>
                        <div class="caption">
                          <div class="product-title"><a href="#">Vis feugiat delenit</a></div>
                          <div class="product-price-and-shipping">
                            <span class="sr-only">Regular price</span>
                            <span class="regular-price">$23.00</span>
                            <span class="discount-percentage discount-product">-5%</span>
                            <span class="sr-only">Price</span>
                            <span class="price">$21.85</span>
                          </div>
                        </div>
                      </div>
                    </article>
                    <article class="product-miniature js-product-miniature">
                      <div class="product-container">
                        <div class="image">
                          <a href="#" class="thumbnail product-thumbnail">
                            <img src="{{asset('assets/images/product/7.jpg')}}" alt="Pellentesque et pharetra">
                          </a>
                        </div>
                        <div class="caption">
                          <div class="product-title"><a href="#">Omnis dicam mentitum</a></div>
                          <div class="product-price-and-shipping">
                            <span class="sr-only">Price</span>
                            <span class="price">$25.99</span>
                          </div>
                        </div>
                      </div>
                    </article>
                    <article class="product-miniature js-product-miniature">
                      <div class="product-container">
                        <div class="image">
                          <a href="#" class="thumbnail product-thumbnail">
                            <img src="{{asset('assets/images/product/8.jpg')}}" alt="Pellentesque et pharetra">
                          </a>
                        </div>
                        <div class="caption">
                          <div class="product-title"><a href="#">Vidit dolore eu qui</a></div>
                          <div class="product-price-and-shipping">
                            <span class="sr-only">Price</span>
                            <span class="price">$30.50</span>
                          </div>
                        </div>
                      </div>
                    </article>
                  </div>
                  <a class="all-product-link h4" href="/category">All best sellers <i class="material-icons">&#xE315;</i></a>
                </div>
              </section>
            </div>
          </div>
          <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
            <section id="main">
              <div class="row">
                <div class="col-md-6">
                  <section class="page-content" id="content">
                    <ul class="product-flags">
                      <li class="product-flag new">New</li>
                    </ul>
                    <div class="images-container">
    <div class="product-cover">
     @foreach($product as $pro)
      <div id="product-zoom">
        <img class="js-qv-product-cover" src="{{asset('assets/images/product/'.$pro->varient_image)}}" alt="product-image"
          title="product-image" style="width:100%;">
      </div>
      <?php break; ?>
      @endforeach
    </div>
    <div class="col-md-12">
      <div class="js-qv-mask mask">
        <ul class="qv-carousel product-images owl-carousel">
        @foreach($product as $pro)
          <li class="thumb-container item">
            <img class="thumb js-thumb  selected " src="{{asset('assets/images/product/'.$pro->varient_image)}}"
              alt="related-items" title="" data-image-large-src="{{asset('assets/images/product/'.$pro->varient_image)}}"
              width="100" itemprop="image">
          </li>
          @endforeach
          </ul>
      </div>
    </div>
  </div>
                    <div class="scroll-box-arrows">
                      <i class="material-icons left">&#xE314;</i>
                      <i class="material-icons right">&#xE315;</i>
                    </div>
                    <div id="block-reassurance">
                      <ul>
                        <li>
                          <div class="block-reassurance-item">
                            <img src="{{asset('assets/images/block-reassurance/1.png')}}"
                              alt="Security policy (edit with Customer reassurance module)">
                            <span class="h6">Security policy (edit with Customer reassurance module)</span>
                          </div>
                        </li>
                        <li>
                          <div class="block-reassurance-item">
                            <img src="{{asset('assets/images/block-reassurance/2.png')}}"
                              alt="Delivery policy (edit with Customer reassurance module)">
                            <span class="h6">Delivery policy (edit with Customer reassurance module)</span>
                          </div>
                        </li>
                        <li>
                          <div class="block-reassurance-item">
                            <img src="{{asset('assets/images/block-reassurance/3.png')}}"
                              alt="Return policy (edit with Customer reassurance module)">
                            <span class="h6">Return policy (edit with Customer reassurance module)</span>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </section>
                </div>
                <div class="col-md-6 productfullldetails">
                  <h1 class="h1 product-title">{{$pro->product_name}}</h1>
                  <div class="product-information">
                    <div id="product-description-short-1">
                      <!-- <p id="description">{{$pro->en_description}}</p> -->
                    </div>
                    <div class="product-comments display_comments">
                      <div class="star_content">
                        <div class="star star_on">
                          <img src="{{asset('./assets/images/star.png')}}" height="15px" width="15px">
                        </div>
                        <div class="star star_on">
                          <img src="{{asset('./assets/images/star.png')}}" height="15px" width="15px">
                        </div>
                        <div class="star star_on">
                          <img src="{{asset('./assets/images/star.png')}}" height="15px" width="15px">
                        </div>

                        <div class="star star_on">
                          <img src="{{asset('./assets/images/star.png')}}" height="15px" width="15px">
                        </div>
                        <div class="star star_on">
                          <img src="{{asset('./assets/images/star.png')}}" height="15px" width="15px">
                        </div>
                      </div>
                      <div class="comment_advice">
                        <a href="#tab-review" class="read_comment scrollLink"><i class="material-icons comments"
                            aria-hidden="true"></i>Read Reviews</a>
                        <a href="#tab-review" class="write_comment scrollLink"><i class="material-icons comments"
                            aria-hidden="true"></i>Write Review</a>
                      </div>
                      <span>5 review</span>
                    </div>
                    <div class="product-actions">
                      <form id="add-to-cart-or-refresh" method="post" action="/add_detail_cart">
                      {{ csrf_field() }}
                      <input type="hidden" name="pid" value="{{$pro->product_id}}">
                      <input type="hidden" name="pname" value="{{$pro->product_name}}">
                        <input type="hidden" name="id_product" value="1" id="product_page_product_id">
                        <input type="hidden" name="id_customization" value="0" id="product_customization_id">
                        <div class="product-variants">
                         <div class="clearfix product-variants-item">
                           
                            <span class="control-label">Size</span>
                            <select class="form-control-select" id="group_1" data-product-attribute="1" name="size" onchange="getState(this.value)" required>
                             @foreach($psize as $pro)
                             @foreach($size as $s)
                            <option value="{{$pro->size_id}}" {{ $s->size == $pro->size_id ? 'selected' : ''}}>{{$pro->size_name}}</option>
                           @endforeach
                           @endforeach
                          </select>
                          
                          </div>
                          <div class="clearfix product-variants-item">
                            <span class="control-label">Color</span>
                            <ul id="group_3">
                            
                            @foreach($pcolor as $pro)
                            @foreach($size as $s)
                              <li class="float-xs-left input-container">
                                <label>
                                  <input type="radio" name="color" value="{{$pro->color_id}}" {{ $s->color == $pro->color_id ? 'checked' : '' }}>{{$pro->color_name}}
                                  <!-- <input class="input-color" type="radio" data-product-attribute="3" name="color"
                                    value="{{$pro->color_id}}">
                                  <span class="color" style="background-color:{{$pro->color_code}}">
                                    <span class="sr-only">Orange</span></span> -->
                                </label>
                              </li>
                             @endforeach
                             @endforeach
                            </ul>
                          </div>
                        </div>
                        <section class="product-discounts">
                        </section>
                        <div class="product-prices">
                          <div class="product-price h5">
                            <link href="#">
                            <meta itemprop="priceCurrency" content="USD">
                            @if($size)
                            @foreach($size as $s)
                            <div class="current-price" >
                              <span itemprop="price" id="message">{{$s->price}}</span>
                              </div>
                            @endforeach
                            @endif
                          </div>
                           </div>
                        <div class="product-add-to-cart">
                          <div id="quantity_hide" class="product-quantity-selector form-control-select">
                            <p>Quantity</p>
                            <div class="quantity-counter">
                              <i class="fa fa-caret-left dec button qtyminus"><span>-</span></i>
                              <input name="quantity" value="1" class="quantity">
                              <i class="fa fa-caret-right inc button qtyplus"><span>+</span></i>
                            </div>
                          </div>
                          <div class="product-quantity clearfix">
                            <div class="add">
                              <button id="add_cart_hide" name="addtocartbtn" value="Add to cart" class="btn btn-primary add-to-cart" data-button-action="add-to-cart"
                                type="submit">
                                <i class="material-icons shopping-cart">&#xE547;</i>
                                Add to cart
                              </button>
                            </div>
                            <div class="add">
                              <button  id="add_wish_hide" name="addtocartbtn" value="Add to wishlist" style="margin-top: -8px;background-color: white;" class="btn buttons_bottom_block no-print wishlist_login"
                                type="submit">
                                <a class="wishlist_button" href="#" title="Add to my wishlist">
                                 <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                  <symbol id="wishlist-outline" viewBox="0 0 1200 1200">
                                    <title>wishlist-outline</title>
                                    <path
                                      d="M511.825,170.191c-0.14-1.786-0.298-3.155-0.44-4.095C504.22,84.955,444.691,20.73,367.434,20.73
                                        c-44.758,0-85.66,21.18-112.442,55.516C228.835,41.679,189.491,20.73,144.97,20.73C67.976,20.73,8.584,84.52,0.937,166.557
                                        c-0.147,0.956-0.295,2.12-0.43,3.489C-0.8,183.3,0.287,200.862,5.338,222.26c10.732,45.463,35.828,86.871,71.224,118.958
                                        l164.828,144.92c8.028,7.059,20.042,7.085,28.101,0.062l166.037-144.683c39.134-40.728,62.393-77.366,71.616-119.584
                                        C511.771,200.731,512.848,183.284,511.825,170.191z M465.46,212.833c-7.254,33.204-26.552,63.603-59.352,97.843L255.545,441.771
                                        l-150.569-132.38c-28.881-26.184-49.406-60.051-58.113-96.933c-3.953-16.747-4.747-29.585-3.895-38.225
                                        c0.075-0.764,0.393-3.072,0.393-3.072C48.849,109.384,91.478,63.397,144.97,63.397c39.823,0,73.704,24.287,90.17,63.294
                                        c7.338,17.382,31.97,17.382,39.308,0c16.136-38.225,52.419-63.294,92.986-63.294c53.494,0,96.121,45.99,101.609,107.786
                                        c0.147,1.242,0.187,1.586,0.245,2.333C469.993,182.541,469.174,195.811,465.46,212.833z">
                                    </path>
                                  </symbol>
                                </svg>
                                <svg class="icon" viewBox="0 0 30 30">
                                  <use xlink:href="#wishlist-outline" x="29%" y="30%"></use>
                                </svg>
                                <span>Add to wishlist</span>
                              </a>
                                
                              </button>
                            </div>
                            <div id="product-availability">
                              <i class="material-icons product-available">&#xE5CA;</i>                               
                              In stock                                                        
                            </div>
                           </div>
                        </div>
                        <div class="product-additional-info">
                          <div class="social-sharing">
                            <span>Share</span>
                            <ul>
                              <li class="facebook icon-gray">
                                <a href="#" title="Share" target="_blank">
                                  <i class="fab fa-facebook-f"></i>
                                </a>
                              </li>
                              <li class="twitter ">
                                <a href="#" title="Tweet" target="_blank">
                                  <i class="fab fa-twitter"></i>
                                </a>
                              </li>
                              <li class="googleplus icon-gray">
                                <a href="#" title="Google+" target="_blank">
                                  <i class="fab fa-youtube"></i>
                                </a>
                              </li>
                              <li class="pinterest icon-gray">
                                <a href="#" title="Pinterest" target="_blank">
                                  <i class="fab fa-google-plus-g"></i>
                                </a>
                              </li>
                            </ul>
                          </div>
                          <div class="col-xl-12 col-lg-12 col-md-12 paymentlogo-container">
                            <span>Payment</span>
                            <img src="{{asset('assets/images/paymenticon/1.png')}}" alt="Discover" />
                            <img src="{{asset('assets/images/paymenticon/2.png')}}" alt="Visa" />
                            <img src="{{asset('assets/images/paymenticon/3.png')}}" alt="JCB" />
                            <img src="{{asset('assets/images/paymenticon/4.png')}}" alt="PayPal" />
                            <img src="{{asset('assets/images/paymenticon/5.png')}}" alt="Master Card" />
                            <img src="{{asset('assets/images/paymenticon/6.png')}}" alt="American Express" />
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

              </div>

              <div class="row product-block-information">
                <div class="col-sm-12 product-details">
                  <div class="tabs">
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item active">
                        <a class="nav-link" data-toggle="tab" href="#description" role="tab" aria-controls="description"
                          aria-selected="true">Description</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#product-details" role="tab"
                          aria-controls="product-details">Product Details</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-review" role="tab"
                          aria-controls="product-details">reviews</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="tab-content">
                      <div class="tab-pane fade show active" id="description" role="tabpanel">
                      @foreach($product as $pro)  
                      <div class="product-description">
                          <p id="ajax_descrip">{{$pro->en_description}}</p>
                        </div>
                        @endforeach
                      </div>
                      <div class="tab-pane fade" id="product-details" role="tabpanel">
                        <div class="product-manufacturer">
                          <a href="#">
                            <img src="{{asset('assets/images/product-brandlogo.png')}}" class="img img-thumbnail manufacturer-logo"
                              alt="Fashion Manufacturer 1">
                          </a>
                        </div>
                        <div class="product-reference">
                          <label class="label">Reference </label>
                          <span itemprop="sku">demo_1</span>
                        </div>
                        <div class="product-quantities">
                          <label class="label">In stock</label>
                          <span data-stock="294" data-allow-oosp="0">294 Items</span>
                        </div>
                        <div class="product-out-of-stock"></div>
                        <section class="product-features">
                          <h3 class="h6">Data sheet</h3>
                          <dl class="data-sheet">
                            <dt class="name">Compositions</dt>
                            <dd class="value">Cotton</dd>
                            <dt class="name">Styles</dt>
                            <dd class="value">Casual</dd>
                            <dt class="name">Properties</dt>
                            <dd class="value">Short Sleeve</dd>
                          </dl>
                        </section>
                      </div>
                      <div class="tab-pane fade" id="tab-review" role="tabpanel">
                        <form class="form-horizontal " id="form-review">
                          <div id="review">
                            <p>There are no reviews for this product.</p>
                          </div>
                          <h2>Write a review</h2>
                          <div class="form-group required">
                            <div class="col-sm-12">
                              <input name="name" value="" id="input-name" class="form-control" type="text"
                                placeholder="Your Name">
                            </div>
                          </div>
                          <div class="form-group required">
                            <div class="col-sm-12">
                              <textarea name="text" rows="5" id="input-review" class="form-control"
                                placeholder="Your Review"></textarea>
                              <div class="help-block"> HTML is not translated!</div>
                            </div>
                          </div>
                          <div class="form-group required">
                            <div class="col-sm-12">
                              <label class="control-label">Rating</label>
                              <span class="custom-radio">
                                <input name="rating" value="1" type="radio">
                                <span></span>
                              </span>
                              <span class="custom-radio">
                                <input name="rating" value="2" type="radio">
                                <span></span>
                              </span>
                              <span class="custom-radio">
                                <input name="rating" value="3" type="radio">
                                <span></span>
                              </span>
                              <span class="custom-radio">
                                <input name="rating" value="4" type="radio">
                                <span></span>
                              </span>
                              <span class="custom-radio">
                                <input name="rating" value="5" type="radio">
                                <span></span>
                              </span>
                            </div>
                          </div>
                          <div class="buttons clearfix">
                            <div class="pull-right">
                              <button type="button" id="button-review" data-loading-text="Loading..."
                                class="btn btn-primary">Continue</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <section class="product-accessories-block clearfix">
                  <h3 class="home-title"><span class="title-icon"><span></span></span>You might also like</h3>
                  <div class="block_content">
                    <div id="ishi-left-right-product-accessories" class="owl-carousel">
                      @foreach($vproduct as $vp)
                      @if($vp->current_stock > 0)                    
                    <div class="product-thumb">
                      <div class="item">
                        <div class="product-desc">
                          <div class="product-title"><a href="#">{{$vp->name}}</a></div>
                          <div class="product-comments">  
                            <div class="star_content">
                                <div class="star star_on"></div>
                                <div class="star star_on"></div>
                                <div class="star star_on"></div>
                                <div class="star star_on"></div>
                                <div class="star star_on"></div>
                            </div>
                          </div>
                        </div>
                        <div class="image">
                          <a href="#" class="thumbnail product-thumbnail">
                          <img src="{{asset('assets/images/product/'.$vp->varient_image)}}" alt="product-img">
                              <img class="product-img-extra change" alt="product-img" src="{{asset('assets/images/product/'.$vp->other_image)}}">
                          </a>
                          <div class="product-flags">
                            <div class="sale">Sale</div>
                          </div>
                        </div>
                        <div class="caption">  
                          <p class="description">
                          {{$vp->en_description}}</p>
                          <p class="price">
                            <span class="regular price-old">{{$vp->mrp}}</span> 
                            <span class="price-discount">{{$vp->mrp - $vp->price}}</span> 
                            <span class="price-sale">{{$vp->price}}</span>
                          </p>
                          <div class="btn-cart">
                            <a href="/direct_cart/{{$vp->varient_id}}/{{$vp->name}}" data-button-action="add-to-cart" class="button">
                                  <i class="fa fa-shopping-cart"></i>
                                  <span class="lblcart">Add to cart</span>
                                </a>
                          </div>                           
                          <div class="button-group">  
                            <div class="btn-quickview"> 
                            <a class="quickbox" href="/detail/{{$vp->product_id}}">                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                      <symbol id="eye-open" viewBox="0 0 1190 1190">
                                        <title>eye-open</title>
                                        <path
                                          d="M505.918,236.117c-26.651-43.587-62.485-78.609-107.497-105.065c-45.015-26.457-92.549-39.687-142.608-39.687 c-50.059,0-97.595,13.225-142.61,39.687C68.187,157.508,32.355,192.53,5.708,236.117C1.903,242.778,0,249.345,0,255.818 c0,6.473,1.903,13.04,5.708,19.699c26.647,43.589,62.479,78.614,107.495,105.064c45.015,26.46,92.551,39.68,142.61,39.68 c50.06,0,97.594-13.176,142.608-39.536c45.012-26.361,80.852-61.432,107.497-105.208c3.806-6.659,5.708-13.223,5.708-19.699 C511.626,249.345,509.724,242.778,505.918,236.117z M194.568,158.03c17.034-17.034,37.447-25.554,61.242-25.554 c3.805,0,7.043,1.336,9.709,3.999c2.662,2.664,4,5.901,4,9.707c0,3.809-1.338,7.044-3.994,9.704 c-2.662,2.667-5.902,3.999-9.708,3.999c-16.368,0-30.362,5.808-41.971,17.416c-11.613,11.615-17.416,25.603-17.416,41.971 c0,3.811-1.336,7.044-3.999,9.71c-2.667,2.668-5.901,3.999-9.707,3.999c-3.809,0-7.044-1.334-9.71-3.999 c-2.667-2.666-3.999-5.903-3.999-9.71C169.015,195.482,177.535,175.065,194.568,158.03z M379.867,349.04 c-38.164,23.12-79.514,34.687-124.054,34.687c-44.539,0-85.889-11.56-124.051-34.687s-69.901-54.2-95.215-93.222 c28.931-44.921,65.19-78.518,108.777-100.783c-11.61,19.792-17.417,41.207-17.417,64.236c0,35.216,12.517,65.329,37.544,90.362 s55.151,37.544,90.362,37.544c35.214,0,65.329-12.518,90.362-37.544s37.545-55.146,37.545-90.362 c0-23.029-5.808-44.447-17.419-64.236c43.585,22.265,79.846,55.865,108.776,100.783C449.767,294.84,418.031,325.913,379.867,349.04 z" />
                                      </symbol>
                                    </svg>
                                    <svg class="icon" viewBox="0 0 30 30">
                                      <use xlink:href="#eye-open" x="28%" y="28%"></use>
                                    </svg>
                                    <span class="lblcart">Quick View</span>
                                  </a>
                            </div>                  
                            <div class="btn-wishlist">
                            <a href="/direct_wish/{{$vp->varient_id }}/{{$vp->name}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                      <symbol id="heart-shape-outline" viewBox="0 0 1400 1400">
                                        <title>heart-shape-outline</title>
                                        <path
                                          d="M492.719,166.008c0-73.486-59.573-133.056-133.059-133.056c-47.985,0-89.891,25.484-113.302,63.569c-23.408-38.085-65.332-63.569-113.316-63.569C59.556,32.952,0,92.522,0,166.008c0,40.009,17.729,75.803,45.671,100.178l188.545,188.553c3.22,3.22,7.587,5.029,12.142,5.029c4.555,0,8.922-1.809,12.142-5.029l188.545-188.553C474.988,241.811,492.719,206.017,492.719,166.008z" />
                                      </symbol>
                                    </svg>
                                    <svg class="icon" viewBox="0 0 30 30">
                                      <use xlink:href="#heart-shape-outline" x="32%" y="33%"></use>
                                    </svg>
                                  </a>
                            </div>
                          </div> 
                        </div> 
                      </div>
                    </div>
                    @else
                    <div class="product-thumb">
                      <div class="item">
                        <div class="product-desc">
                          <div class="product-title"><a href="#">{{$vp->name}}</a></div>
                          <div class="product-comments">  
                            <div class="star_content">
                                <div class="star star_on"></div>
                                <div class="star star_on"></div>
                                <div class="star star_on"></div>
                                <div class="star star_on"></div>
                                <div class="star star_on"></div>
                            </div>
                          </div>
                        </div>
                        <div class="image">
                          <a href="#" class="thumbnail product-thumbnail">
                            <img src="{{asset('assets/images/product/'.$vp->varient_image)}}" alt="product-img">
                            <img class="product-img-extra change" alt="product-img" src="{{asset('assets/images/product/'.$vp->other_image)}}">
                          </a>
                          <span class="outstock-overlay">SOLD OUT</span>
                          <div class="product-flags">
                            <div class="sale">Sale</div>
                          </div>
                        </div>
                        <div class="caption">  
                          <p class="description">
                          {{$vp->en_description}}</p>
                          <p class="price">
                            <span class="regular price-old">{{$vp->mrp}}</span> 
                            <span class="price-discount">{{$vp->mrp - $vp->price}}</span> 
                            <span class="price-sale">{{$vp->price}}</span>
                          </p>
                          <div class="btn-cart">
                            <a data-button-action="add-to-cart" class="button sold-out">
                              <i class="fa fa-shopping-cart"></i> 
                              <span class="lblcart">Sold Out</span>
                            </a>
                          </div>                           
                          <div class="button-group">  
                            <div class="btn-quickview"> 
                            <a class="quickbox" href="/detail/{{$vp->product_id}}"> 
                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                  <symbol id="eye-open" viewBox="0 0 1190 1190"><title>eye-open</title><path d="M505.918,236.117c-26.651-43.587-62.485-78.609-107.497-105.065c-45.015-26.457-92.549-39.687-142.608-39.687 c-50.059,0-97.595,13.225-142.61,39.687C68.187,157.508,32.355,192.53,5.708,236.117C1.903,242.778,0,249.345,0,255.818 c0,6.473,1.903,13.04,5.708,19.699c26.647,43.589,62.479,78.614,107.495,105.064c45.015,26.46,92.551,39.68,142.61,39.68 c50.06,0,97.594-13.176,142.608-39.536c45.012-26.361,80.852-61.432,107.497-105.208c3.806-6.659,5.708-13.223,5.708-19.699 C511.626,249.345,509.724,242.778,505.918,236.117z M194.568,158.03c17.034-17.034,37.447-25.554,61.242-25.554 c3.805,0,7.043,1.336,9.709,3.999c2.662,2.664,4,5.901,4,9.707c0,3.809-1.338,7.044-3.994,9.704 c-2.662,2.667-5.902,3.999-9.708,3.999c-16.368,0-30.362,5.808-41.971,17.416c-11.613,11.615-17.416,25.603-17.416,41.971 c0,3.811-1.336,7.044-3.999,9.71c-2.667,2.668-5.901,3.999-9.707,3.999c-3.809,0-7.044-1.334-9.71-3.999 c-2.667-2.666-3.999-5.903-3.999-9.71C169.015,195.482,177.535,175.065,194.568,158.03z M379.867,349.04 c-38.164,23.12-79.514,34.687-124.054,34.687c-44.539,0-85.889-11.56-124.051-34.687s-69.901-54.2-95.215-93.222 c28.931-44.921,65.19-78.518,108.777-100.783c-11.61,19.792-17.417,41.207-17.417,64.236c0,35.216,12.517,65.329,37.544,90.362 s55.151,37.544,90.362,37.544c35.214,0,65.329-12.518,90.362-37.544s37.545-55.146,37.545-90.362 c0-23.029-5.808-44.447-17.419-64.236c43.585,22.265,79.846,55.865,108.776,100.783C449.767,294.84,418.031,325.913,379.867,349.04 z"/></symbol>
                                </svg>
                                <svg class="icon" viewBox="0 0 30 30"><use xlink:href="#eye-open" x="28%" y="28%"></use></svg>
                                <span class="lblcart">Quick View</span>
                              </a>
                            </div>                  
                            <div class="btn-wishlist">
                            <a href="/direct_wish/{{$vp->varient_id }}/{{$vp->name}}">
                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                  <symbol id="heart-shape-outline" viewBox="0 0 1400 1400"><title>heart-shape-outline</title><path d="M492.719,166.008c0-73.486-59.573-133.056-133.059-133.056c-47.985,0-89.891,25.484-113.302,63.569c-23.408-38.085-65.332-63.569-113.316-63.569C59.556,32.952,0,92.522,0,166.008c0,40.009,17.729,75.803,45.671,100.178l188.545,188.553c3.22,3.22,7.587,5.029,12.142,5.029c4.555,0,8.922-1.809,12.142-5.029l188.545-188.553C474.988,241.811,492.719,206.017,492.719,166.008z"/></symbol>
                                </svg>
                                <svg class="icon" viewBox="0 0 30 30"><use xlink:href="#heart-shape-outline" x="32%" y="33%"></use></svg>
                              </a>
                            </div>
                          </div> 
                        </div> 
                      </div>
                      </div>
                    @endif
                     @endforeach
                      </div>
                  </div>
                </section>
              </div>
              
            </section>
          </div>
        </div>
      </div>
    </section>
    <div class="container">
      <div id="_mobile_left_column"></div>
      <div id="_mobile_right_column"></div>
      <div class="clearfix"></div>
    </div>
</section>
 @endsection
   