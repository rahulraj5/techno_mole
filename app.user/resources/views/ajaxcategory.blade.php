@extends('front.master')
@section('content')
<body>
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
        <h1 class="h1 category-title breadcrumb-title">ALL_Products</h1>
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
                  <a class="block-title text-uppercase h6" href="#">SELECT CATEGORY</a>
                </h3>
                <div id="subcategories-container" class="block-categories collapse data-toggler">
                
                  <ul class="category-top-menu">
                    <li>
                       <ul class="category-sub-menu">
                       @foreach($category as $key => $cat)
                        <li @if ($key === 0) class="active" @endif data-depth="0">
                          <a href="#">{{$cat->name}}</a>
                          <div class="navbar-toggler collapse-icons" data-toggle="collapse"
                            data-target="#exCollapsingNavbar4{{$key+1}}">
                            <i class="material-icons add">&#xE145;</i>
                            <i class="material-icons remove">&#xE15B;</i>
                            <!-- <i class="fas fa-chevron-right"></i> -->

                          </div>
                          <div class="collapse" id="exCollapsingNavbar4{{$key+1}}">
                         
                            <ul class="category-sub-menu">
                              <!-- $CATEGORY ME SUBCAT NAME KA EK VARIABLE HAI $cat->subcat-->
                            <?php $subcategory = $cat->subcat; ?>
                             
                            @foreach($subcategory as $subcats)
                              <li data-depth="1">
                              <!-- /vproduct/{{$subcats->id}} -->
                               <a class="category-sub-link" data-id="{{$subcats->id}}" href="/vproduct/{{$subcats->id}}" onclick="edit()">{{$subcats->name}}</a>
                                </li>
                               @endforeach

                            </ul>
                           
                            </div>
                        </li>
                        @endforeach
                        </ul>
                       
                    </li>
                  </ul>
                  
                </div>
                
              </div>
              <form id="filter" method="post" action="/trial">
              @csrf
              <input type="hidden" name="id" id="input">
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
                      @foreach($size as $ss)
                      <li>
                        <label class="facet-label" for="facet_input_41135_0">
                          <span class="custom-checkbox">
                            <input id="facet_input_41135_0" name="size" value="{{$ss->size_id}}"  data-search-url="#" type="radio">
                            <span class="ps-shown-by-js"><i class="material-icons checkbox-checked">&#xE5CA;</i></span>
                          </span>
                          <a href="#" class="_gray-darker search-link js-search-link" rel="nofollow">{{$ss->size_name}}<span
                              class="magnitude">(7)</span></a>
                        </label>
                      </li>
                      @endforeach
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
                    @foreach($color as $clr)
                      <li>
                        <label class="facet-label" for="facet_input_56250_0">
                          <span class="custom-checkbox">
                            <input id="facet_input_56250_0" name="color" value="{{$clr->color_id}}" data-search-url="#" type="radio">
                            <span class="color" style="background-color:{{$clr->color_code}}"></span>
                          </span>
                          <a href="#" class="_gray-darker search-link js-search-link" rel="nofollow">{{$clr->color_name}}<span
                              class="magnitude">(1)</span></a>
                        </label>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                  <div class="facet clearfix">
                    <h1 class="h6 facet-title hidden-md-down">Price range:</h1>
                    <div class="title hidden-lg-up collapsed" data-target="#facet_91981" data-toggle="collapse">
                      <h1 class="h6 facet-title">Price range:</h1>
                      <span class="float-xs-right">
                        <span class="navbar-toggler collapse-icons">
                          <i class="material-icons add">&#xE313;</i>
                          <i class="material-icons remove">&#xE316;</i>
                        </span>
                      </span>
                    </div>
                   Minimum_value  <input type="text" name="min" value="{{$min}}">
                   Maximum_value  <input type="text" name="max" value="{{$max}}">
                  </div>
                  <div class="facet clearfix">
                    <div class="popular-blog clearfix">
                      <div class="title hidden-lg-up collapsed" data-target="#facet_91982" data-toggle="collapse">
                        <span class="float-xs-right">
                          <span class="navbar-toggler collapse-icons">
                            <i class="material-icons add">&#xE313;</i>
                            <i class="material-icons remove">&#xE316;</i>
                          </span>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
          </div>
          @csrf
</form>
          <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
            <section id="main">
              <input id="ishiCartURL" name="ishicarturl" value="#" type="hidden">
              <input id="ishiStaticToken" name="ishistatictoken" value="3d2187fdc78a54510e1e1670c3ff42b0" type="hidden">
              <section id="products" class="category-product-info">
                <div id="product-list-top">
                  <div id="js-product-list-top" class="row products-selection">
                    <div class="col-lg-6 total-products">
                      <span class="layout-options">
                        <span id="grid-view" class="checked"></span>
                        <span id="list-view"></span>
                      </span>
                      <p>There are {{$wordCount}} products.</p>
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
                  <div id="bodyData" class="products row">
                  <table border="2">
       <thead>
        <tr>
            <th>varient_id</th>
            <th>Product_Image</th>
            <th>MRP</th>
            <th>PRICE</th>
            <th>SIZE</th>
            <th>COLOR</th>
        </tr>
       </thead>
       <tbody id="bodyData">

       </tbody>  
    </table>
    
                    
                   
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
   

@endsection


<script>

function edit() {
  $(document).on('click', '.category-sub-link', (e) => {
    e.preventDefault();
    var aid = $(e.target).data('id');
    $('#input').val(aid);
    // alert(aid);
    
    $.ajax({
            url:"{{route('trial')}}",
            type:'POST',
            dataType:"json",
            data: $("#filter").serialize(),
            success:function(dataResult) {
              if(dataResult.data){
                $('tbody').html("");
                jQuery.each(dataResult.data, function(index, itemData) {
                  $('tbody').append('<tr>\
                  <td>'+itemData.varient_id+'</td>\
                  <td><img class="product-img-extra change" alt="product-img" src="{{asset('assets/images/product/itemData.varient_image')}}">'+itemData.mrp+'</td>\
                  <td>'+itemData.mrp+'</td>\
                  <td>'+itemData.price+'</td>\
                  <td>'+itemData.size+'</td>\
                  <td>'+itemData.color+'</td>\
                  </tr> ');
});
           
              }
              
            }
    });
  });
}

</script>

