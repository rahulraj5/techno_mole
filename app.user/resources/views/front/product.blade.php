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
        <h1 class="h1 category-title breadcrumb-title">Product</h1>
        <!-- <ul>
          <li>
            <a href="#">
              <span>Home</span>
            </a>
          </li>
          <li>
            <a href="#">
              <span>Girl</span>
            </a>
          </li>
        </ul> -->
      </nav>
    </div>
    <!-- -----------Category page------------- -->
    <section id="wrapper">
      <div class="container">
        <div class="row">
          <!-- ------------------Left-column------------------ -->
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
                  <a class="block-title text-uppercase h6" href="#">Girl</a>
                </h3>
                <div id="subcategories-container" class="block-categories collapse data-toggler">
                  <ul class="category-top-menu">
                    <li>
                      <ul class="category-sub-menu">
                        <li data-depth="0">
                          <a href="#">Tops</a>
                          <div class="navbar-toggler collapse-icons" data-toggle="collapse"
                            data-target="#exCollapsingNavbar4">
                            <i class="material-icons add">&#xE145;</i>
                            <i class="material-icons remove">&#xE15B;</i>
                            <!-- <i class="fas fa-chevron-right"></i> -->

                          </div>
                          <div class="collapse" id="exCollapsingNavbar4">
                            <ul class="category-sub-menu">
                              <li data-depth="1">
                                <a class="category-sub-link" href="#">T-shirts</a>
                              </li>
                              <li data-depth="1">
                                <a class="category-sub-link" href="#">Blouses</a>
                              </li>
                            </ul>
                          </div>
                        </li>
                        <li data-depth="0">
                          <a href="#">Dresses</a>
                          <div class="navbar-toggler collapse-icons" data-toggle="collapse"
                            data-target="#exCollapsingNavbar8">
                            <i class="material-icons add">&#xE145;</i>
                            <i class="material-icons remove">&#xE15B;</i>
                            <!-- <i class="fas fa-chevron-right"></i> -->
                          </div>
                          <div class="collapse" id="exCollapsingNavbar8">
                            <ul class="category-sub-menu">
                              <li data-depth="1">
                                <a class="category-sub-link" href="#">Casual Dresses</a>
                              </li>
                              <li data-depth="1">
                                <a class="category-sub-link" href="#">Evening Dresses</a>
                              </li>
                              <li data-depth="1">
                                <a class="category-sub-link" href="#">Summer Dresses</a>
                              </li>
                            </ul>
                          </div>
                        </li>
                        <li data-depth="0">
                          <a href="#">Shoes</a>
                          <div class="navbar-toggler collapse-icons" data-toggle="collapse"
                            data-target="#exCollapsingNavbar14">
                            <i class="material-icons add">&#xE145;</i>
                            <i class="material-icons remove">&#xE15B;</i>
                            <!-- <i class="fas fa-chevron-right"></i> -->
                          </div>
                          <div class="collapse" id="exCollapsingNavbar14">
                            <ul class="category-sub-menu">
                              <li data-depth="1">
                                <a class="category-sub-link" href="#">Printed</a>
                              </li>
                              <li data-depth="1">
                                <a class="category-sub-link" href="#">Trackwear</a>
                              </li>
                              <li data-depth="1">
                                <a class="category-sub-link" href="#">Summer Wear</a>
                              </li>
                            </ul>
                          </div>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
              <div id="search_filters_wrapper">
                <div class="block-title clearfix hidden-lg-up collapsed" data-target="#search_filters"
                  data-toggle="collapse">
                  <span class="h1 products-section-title text-uppercase">
                    <a class="text-uppercase h6" href="#">Filter</a>
                  </span>
                  <span class="navbar-toggler collapse-icons">
                    <i class="material-icons add">&#xE313;</i>
                    <i class="material-icons remove">&#xE316;</i>
                  </span>
                </div>
                <div id="search_filters" class="collapse data-toggler">
                  <h3 class="hidden-md-down">
                    <a class="block-title text-uppercase h6" href="#">Filter</a>
                  </h3>
                  <div id="_desktop_search_filters_clear_all" class="hidden-md-down clear-all-wrapper">
                    <button data-search-url="#" class="btn btn-tertiary js-search-filters-clear-all"><i
                        class="material-icons">&#xE14C;</i> Clear all</button>
                  </div>
                  <div class="facet clearfix">
                    <h1 class="h6 facet-title hidden-md-down">Categories</h1>
                    <div class="title hidden-lg-up collapsed" data-target="#facet_71002" data-toggle="collapse">
                      <h1 class="h6 facet-title">Categories</h1>
                      <span class="float-xs-right">
                        <span class="navbar-toggler collapse-icons">
                          <i class="material-icons add">&#xE313;</i>
                          <i class="material-icons remove">&#xE316;</i>
                        </span>
                      </span>
                    </div>
                    <ul id="facet_71002" class="collapse">
                      <li>
                        <label class="facet-label" for="facet_input_71002_0">
                          <span class="custom-checkbox">
                            <input id="facet_input_71002_0" data-search-url="#" type="checkbox">
                            <span class="ps-shown-by-js"><i class="material-icons checkbox-checked">&#xE5CA;</i></span>
                          </span>
                          <a href="#" class="_gray-darker search-link js-search-link" rel="nofollow">Tops<span
                              class="magnitude">(19)</span></a>
                        </label>
                      </li>
                      <li>
                        <label class="facet-label" for="facet_input_71002_1">
                          <span class="custom-checkbox">
                            <input id="facet_input_71002_1" data-search-url="#" type="checkbox">
                            <span class="ps-shown-by-js"><i class="material-icons checkbox-checked">&#xE5CA;</i></span>
                          </span>
                          <a href="#" class="_gray-darker search-link js-search-link" rel="nofollow">Dresses<span
                              class="magnitude">(20)</span></a>
                        </label>
                      </li>
                    </ul>
                  </div>
                  <div class="facet clearfix">
                    <h1 class="h6 facet-title hidden-md-down">Size</h1>
                    <div class="title hidden-lg-up collapsed" data-target="#facet_41135" data-toggle="collapse">
                      <h1 class="h6 facet-title">Size</h1>
                      <span class="float-xs-right">
                        <span class="navbar-toggler collapse-icons">
                          <i class="material-icons add">&#xE313;</i>
                          <i class="material-icons remove">&#xE316;</i>
                        </span>
                      </span>
                    </div>
                    <ul id="facet_41135" class="collapse">
                      <li>
                        <label class="facet-label" for="facet_input_41135_0">
                          <span class="custom-checkbox">
                            <input id="facet_input_41135_0" data-search-url="#" type="checkbox">
                            <span class="ps-shown-by-js"><i class="material-icons checkbox-checked">&#xE5CA;</i></span>
                          </span>
                          <a href="#" class="_gray-darker search-link js-search-link" rel="nofollow">S<span
                              class="magnitude">(7)</span></a>
                        </label>
                      </li>
                      <li>
                        <label class="facet-label" for="facet_input_41135_1">
                          <span class="custom-checkbox">
                            <input id="facet_input_41135_1" data-search-url="#" type="checkbox">
                            <span class="ps-shown-by-js"><i class="material-icons checkbox-checked">&#xE5CA;</i></span>
                          </span>
                          <a href="#" class="_gray-darker search-link js-search-link" rel="nofollow">M<span
                              class="magnitude">(7)</span></a>
                        </label>
                      </li>
                      <li>
                        <label class="facet-label" for="facet_input_41135_2">
                          <span class="custom-checkbox">
                            <input id="facet_input_41135_2" data-search-url="#" type="checkbox">
                            <span class="ps-shown-by-js"><i class="material-icons checkbox-checked">&#xE5CA;</i></span>
                          </span>
                          <a href="#" class="_gray-darker search-link js-search-link" rel="nofollow">L<span
                              class="magnitude">(7)</span></a>
                        </label>
                      </li>
                    </ul>
                  </div>
                  <div class="facet clearfix">
                    <h1 class="h6 facet-title hidden-md-down">Color</h1>
                    <div class="title hidden-lg-up collapsed" data-target="#facet_56250" data-toggle="collapse">
                      <h1 class="h6 facet-title">Color</h1>
                      <span class="float-xs-right">
                        <span class="navbar-toggler collapse-icons">
                          <i class="material-icons add">&#xE313;</i>
                          <i class="material-icons remove">&#xE316;</i>
                        </span>
                      </span>
                    </div>
                    <ul id="facet_56250" class="collapse">
                      <li>
                        <label class="facet-label" for="facet_input_56250_0">
                          <span class="custom-checkbox">
                            <input id="facet_input_56250_0" data-search-url="#" type="checkbox">
                            <span class="color" style="background-color:#f5f5dc"></span>
                          </span>
                          <a href="#" class="_gray-darker search-link js-search-link" rel="nofollow">Beige<span
                              class="magnitude">(1)</span></a>
                        </label>
                      </li>
                      <li>
                        <label class="facet-label" for="facet_input_56250_1">
                          <span class="custom-checkbox">
                            <input id="facet_input_56250_1" data-search-url="#" type="checkbox">
                            <span class="color" style="background-color:#ffffff"></span>
                          </span>
                          <a href="#" class="_gray-darker search-link js-search-link" rel="nofollow">White<span
                              class="magnitude">(2)</span></a>
                        </label>
                      </li>
                      <li>
                        <label class="facet-label" for="facet_input_56250_2">
                          <span class="custom-checkbox">
                            <input id="facet_input_56250_2" data-search-url="#" type="checkbox">
                            <span class="color" style="background-color:#434A54"></span>
                          </span>
                          <a href="#" class="_gray-darker search-link js-search-link" rel="nofollow">Black<span
                              class="magnitude">(2)</span></a>
                        </label>
                      </li>
                      <li>
                        <label class="facet-label" for="facet_input_56250_3">
                          <span class="custom-checkbox">
                            <input id="facet_input_56250_3" data-search-url="#" type="checkbox">
                            <span class="color" style="background-color:#F39C11"></span>
                          </span>
                          <a href="#" class="_gray-darker search-link js-search-link" rel="nofollow">Orange<span
                              class="magnitude">(3)</span></a>
                        </label>
                      </li>
                      <li>
                        <label class="facet-label" for="facet_input_56250_4">
                          <span class="custom-checkbox">
                            <input id="facet_input_56250_4" data-search-url="#" type="checkbox">
                            <span class="color" style="background-color:#5D9CEC"></span>
                          </span>
                          <a href="#" class="_gray-darker search-link js-search-link" rel="nofollow">Blue<span
                              class="magnitude">(2)</span></a>
                        </label>
                      </li>
                      <li>
                        <label class="facet-label" for="facet_input_56250_5">
                          <span class="custom-checkbox">
                            <input id="facet_input_56250_5" data-search-url="#" type="checkbox">
                            <span class="color" style="background-color:#A0D468"></span>
                          </span>
                          <a href="#" class="_gray-darker search-link js-search-link" rel="nofollow">Green<span
                              class="magnitude">(1)</span></a>
                        </label>
                      </li>
                    </ul>
                  </div>
                  <div class="facet clearfix">
                    <h1 class="h6 facet-title hidden-md-down">Compositions</h1>
                    <div class="title hidden-lg-up collapsed" data-target="#facet_91981" data-toggle="collapse">
                      <h1 class="h6 facet-title">Compositions</h1>
                      <span class="float-xs-right">
                        <span class="navbar-toggler collapse-icons">
                          <i class="material-icons add">&#xE313;</i>
                          <i class="material-icons remove">&#xE316;</i>
                        </span>
                      </span>
                    </div>
                    <ul id="facet_91981" class="collapse">
                      <li>
                        <label class="facet-label" for="facet_input_91981_0">
                          <span class="custom-checkbox">
                            <input id="facet_input_91981_0" data-search-url="#" type="checkbox">
                            <span class="ps-shown-by-js"><i class="material-icons checkbox-checked">&#xE5CA;</i></span>
                          </span>
                          <a href="#" class="_gray-darker search-link js-search-link" rel="nofollow">Cotton<span
                              class="magnitude">(3)</span></a>
                        </label>
                      </li>
                      <li>
                        <label class="facet-label" for="facet_input_91981_1">
                          <span class="custom-checkbox">
                            <input id="facet_input_91981_1" data-search-url="#" type="checkbox">
                            <span class="ps-shown-by-js"><i class="material-icons checkbox-checked">&#xE5CA;</i></span>
                          </span>
                          <a href="#" class="_gray-darker search-link js-search-link" rel="nofollow">Polyester<span
                              class="magnitude">(2)</span></a>
                        </label>
                      </li>
                      <li>
                        <label class="facet-label" for="facet_input_91981_2">
                          <span class="custom-checkbox">
                            <input id="facet_input_91981_2" data-search-url="#" type="checkbox">
                            <span class="ps-shown-by-js"><i class="material-icons checkbox-checked">&#xE5CA;</i></span>
                          </span>
                          <a href="#" class="_gray-darker search-link js-search-link" rel="nofollow">
                            Viscose<span class="magnitude">(2)</span></a>
                        </label>
                      </li>
                    </ul>
                  </div>
                  <div class="facet clearfix">
                    <div class="popular-blog clearfix">
                      <h1 class="h6 facet-title hidden-md-down">Popular Tag</h1>
                      <div class="title hidden-lg-up collapsed" data-target="#facet_91982" data-toggle="collapse">
                        <h1 class="h6 facet-title">Popular Tag</h1>
                        <span class="float-xs-right">
                          <span class="navbar-toggler collapse-icons">
                            <i class="material-icons add">&#xE313;</i>
                            <i class="material-icons remove">&#xE316;</i>
                          </span>
                        </span>
                      </div>
                      <ul id="facet_91982" class="collapse">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Top</a></li>
                        <li><a href="#">Blouses</a></li>
                        <li><a href="#">Dress</a></li>
                        <li><a href="#">Outfits</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Blog</a></li>
                      </ul>
                    </div>
                  </div>
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
                    <article class="product-miniature js-product-miniature">
                      <div class="product-container">
                        <div class="image">
                          <a href="#" class="thumbnail product-thumbnail">
                            <img src="{{asset('assets/images/product/1.jpg')}}" alt="Pellentesque et pharetra">
                          </a>
                        </div>
                        <div class="caption">
                          <div class="product-title"><a href="#">Pellentesque et pharetra</a></div>
                          <div class="product-price-and-shipping">
                            <span class="sr-only">Regular price</span>
                            <span class="regular-price">$50.00</span>
                            <span class="discount-percentage discount-product">-10%</span>
                            <span class="sr-only">Price</span>
                            <span class="price">$45.00</span>
                          </div>
                        </div>
                      </div>
                    </article>
                    <article class="product-miniature js-product-miniature">
                      <div class="product-container">
                        <div class="image">
                          <a href="#" class="thumbnail product-thumbnail">
                            <img src="{{asset('assets/images/product/2.jpg')}}" alt="Pellentesque et pharetra">
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
                            <img src="{{asset('assets/images/product/3.jpg')}}" alt="Pellentesque et pharetra">
                          </a>
                        </div>
                        <div class="caption">
                          <div class="product-title"><a href="#">Curabitur laoret luctus</a></div>
                          <div class="product-price-and-shipping">
                            <span class="sr-only">Price</span>
                            <span class="price">$50.00</span>
                          </div>
                        </div>
                      </div>
                    </article>
                    <article class="product-miniature js-product-miniature">
                      <div class="product-container">
                        <div class="image">
                          <a href="#" class="thumbnail product-thumbnail">
                            <img src="{{asset('assets/images/product/4.jpg')}}" alt="Pellentesque et pharetra">
                          </a>
                        </div>
                        <div class="caption">
                          <div class="product-title"><a href="#">Aliquam fringilla juste</a></div>
                          <div class="product-price-and-shipping">
                            <span class="sr-only">Price</span>
                            <span class="price">$24.00</span>
                          </div>
                        </div>
                      </div>
                    </article>
                  </div>
                  <a class="all-product-link h4" href="#">All new products <i class="material-icons">&#xE315;</i></a>
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
                  <a class="all-product-link h4" href="#">All best sellers <i class="material-icons">&#xE315;</i></a>
                </div>
              </section>
            </div>
          </div>
          <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
            <section id="main">
              <input id="ishiCartURL" name="ishicarturl" value="#" type="hidden">
              <input id="ishiStaticToken" name="ishistatictoken" value="3d2187fdc78a54510e1e1670c3ff42b0" type="hidden">

              <!-- <div class="block-category card card-block">
                  <div class="category-cover">
                    <img src="{{asset('assets/images/category_img.jpg')}}" alt="category-img">
                  </div>
                </div>
                <div class="category-info">
                  <h1 class="h1">Women</h1>
                  <div id="category-description"><p>You will find here all woman fashion collections.</p>
                    <p>This category includes all the basics of your wardrobe and much more:</p>
                    <p>shoes, accessories, printed t-shirts, feminine dresses, women's jeans!</p>
                  </div>
                </div> -->
              <section id="products" class="category-product-info">
                <div id="product-list-top">
                  <div id="js-product-list-top" class="row products-selection">
                    <div class="col-lg-6 total-products">
                      <span class="layout-options">
                        <span id="grid-view" class="checked"></span>
                        <span id="list-view"></span>
                      </span>
                      <p>There are 20 products.</p>
                    </div>
                    <div class="col-lg-6">
                      <div class="row sort-by-row">
                        <span class="col-sm-3 col-xs-12 col-md-3 hidden-lg-down sort-by">Sort by:</span>
                        <div class="col-sm-9 col-xs-12 col-md-9 products-sort-order dropdown">
                          <a class="select-title" rel="nofollow" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">Relevance<i class="material-icons pull-xs-right">&#xE5C5;</i></a>
                          <div class="dropdown-menu">
                            <a rel="nofollow" href="#" class="select-list current js-search-link">Relevance</a>
                            <a rel="nofollow" href="#" class="select-list js-search-link">Name, A to Z</a>
                            <a rel="nofollow" href="#" class="select-list js-search-link">Name, Z to A</a>
                            <a rel="nofollow" href="#" class="select-list js-search-link">Price, low to high</a>
                            <a rel="nofollow" href="#" class="select-list js-search-link">Price, high to low</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12 hidden-md-up showing">Showing 1-20 of 20 item(s)</div>
                  </div>
                </div>
                <div class="hidden-sm-down">
                  <section id="js-active-search-filters" class="hide">
                    <h1 class="h6 hidden-xs-up">Active filters</h1>
                  </section>
                </div>
                <div id="js-product-list">
                  <div class="products row">
                  @foreach($product as $pro)
                                       <article
                      class="product-miniature js-product-miniature col-xs-12 col-sm-6 col-md-4 col-lg-6 col-xl-4">
                      <div class="product-container product-thumb">
                        
                        <div class="product-desc">
                          <div class="product-title"><a href="#">{{$pro->name}}</a></div>
                          <div class="product-comments">
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
                          </div>
                        </div>
                        <div class="image">
                          <a href="#" class="thumbnail product-thumbnail">
                            <img src="{{asset('assets/images/product/'.$pro->photos)}}" alt="product-img">
                            <img class="product-img-extra change" alt="product-img" src="{{asset('assets/images/product/'.$pro->featured_img)}}">
                          </a>
                        </div>
                        <div class="caption">
                          <p class="price">
                            <span class="price-sale">{{$pro->mrp_price}} </span>
                          </p>
                          <div class="btn-cart">
                            <a data-button-action="add-to-cart" class="button">
                              <i class="fa fa-shopping-cart"></i>
                              <span class="lblcart">Add to cart</span>
                            </a>
                          </div>
                          <p class="description">
                            The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution.
                            Designed sp..</p>
                          <div class="button-group">
                            <div class="btn-quickview">
                              <a class="quickbox" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
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
                              <a href="#">
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
                    </article>
                    @endforeach
                  </div>
                  <div class="pagination">
                    <div class="col-xl-4 col-lg-5 col-md-5 col-xs-12 pagination-desc">Showing 1-15 of 19 item(s)</div>
                    <div class="col-xl-8  col-lg-7 col-md-7 col-xs-12 pagination-right">
                      <ul class="page-list clearfix">
                        <li>
                          <a rel="prev" href="#" class="previous">
                            <i class="fas fa-chevron-left"></i><span class="pagination-lbl">Previous</span>
                          </a>
                        </li>
                        <li class="current">
                          <a rel="nofollow" href="#" class="disabled js-search-link">1</a>
                        </li>
                        <li>
                          <a rel="nofollow" href="#" class="js-search-link">2</a>
                        </li>
                        <li>
                          <a rel="next" href="#" class="next js-search-link">
                            <span class="pagination-lbl">Next</span><i class="fas fa-chevron-right"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </section>
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
    
<script type="text/javascript">
  $(document).ready(function () {
    var currentLayout = $.totalStorage('productLayout');
    if (currentLayout && currentLayout == 'listView') {
      $('#grid-view').removeClass('checked');
      setProductLayout('listView');
    } else {
      setProductLayout('gridView');
    }

    $(document).on('click', '#list-view', function (e) {
      if ($(this).hasClass('checked'))
        return;
      $('#js-product-list').fadeOut(500, function () {
        setProductLayout('listView');
      });
      $('#js-product-list').fadeIn(500);
    });

    $(document).on('click', '#grid-view', function (e) {
      if ($(this).hasClass('checked'))
        return;
      $('#js-product-list').fadeOut(500, function () {
        setProductLayout('gridView');
      });
      $('#js-product-list').fadeIn(500);
    });
    function setProductLayout(layout) {
      if (layout == 'listView') {
        $('#list-view').addClass('checked');
        $('#grid-view').removeClass('checked');
        $('#js-product-list .products').removeClass('grid');
        $('#js-product-list .products').addClass('list');
        $('#js-product-list .products article').each(function () {
          $(this).removeClass(' col-sm-6 col-md-4 col-lg-6 col-xl-4');
          $(this).find('.image').addClass('col-xs-12 col-sm-6 col-md-4 col-lg-4');
          $(this).find('.caption').addClass('col-xs-12 col-sm-6 col-md-8 col-lg-8');
        });
        $.totalStorage('productLayout', 'listView');
      } else {
        $('#grid-view').addClass('checked');
        $('#list-view').removeClass('checked');
        $('#js-product-list .products').removeClass('list');
        $('#js-product-list .products').addClass('grid');
        $('#js-product-list .products article').each(function () {
          $(this).addClass(' col-sm-6 col-md-4 col-lg-6 col-xl-4');
          $(this).find('.image').removeClass('col-xs-12 col-sm-6 col-md-4 col-lg-4');
          $(this).find('.caption').removeClass('col-xs-12 col-sm-6 col-md-8 col-lg-8');
        });
        $.totalStorage('productLayout', 'gridView');
      }
    }
  });
</script>
@endsection
