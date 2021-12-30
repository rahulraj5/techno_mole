<?php $__env->startSection('content'); ?>
    <!-- -------------------mobile media---------- -->
    <div id="mobile_top_menu_wrapper" class="hidden-lg-up" style="display:none;">
      <div id="top_menu_closer">
        <i class="material-icons"></i>
      </div>
      <div class="js-top-menu mobile" id="_mobile_top_menu"></div>
    </div>
    <!-- --------------------hometop------------ -->    
    <div id="top_home">
      <!-- -------------------slider----------- -->
      <section id="ishislider" class="ishislider-container owl-carousel">
        <?php $__currentLoopData = $image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $im): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="item">
          <a href="#">
            <img src="<?php echo e(asset('assets/images/banner/'.$im->banner_image)); ?>" alt="Slide-1" class="img-responsive">
          </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!-- <div class="item">
          <a href="#">
            <img src="<?php echo e(asset('assets/images/slider/slide-2.png')); ?>" alt="Slide-2" class="img-responsive">
          </a>
        </div> -->
      </section>
      
       <!-- -------------------category----------- -->
       <section id="ishicategory" class="ishicategoryblock">
        <h3 class="home-title"><span class="title-icon"><span></span></span>Shop By Category</h3>
        <div class="ishicategoryblock-carousel owl-carousel">
        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="image-container"> 
            <div class="item">
              <a href="bycat/<?php echo e($cat->id); ?>">
                <img src="<?php echo e(asset('assets/images/category/'.$cat->image)); ?>" alt="category-2" class="img-responsive" />
              </a>
              
              <div class="text-container">
                  <?php echo e($cat->name); ?>

               </div>
              
            </div>  
          </div> 
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
          </div>        
      </section>
      <!-- -------------------fourbanner---------- -->
      <section id="ishifourbanner" class="ishifourbannerblock">
        <div class="container"> 
          <div class="row">
            <div class="bannerleft col-md-4 col-sm-12">
              <div class="bannerblock">
                <a href="#" class="ishi-customhover-fadeinrotate3D">
                  <img src="<?php echo e(asset('assets/images/banner/1.png')); ?>" alt="banner" class="img-responsive" />
                </a>  
              </div> 
            </div>
            <div class="bannercenter col-md-4 col-sm-12">
              <div class="bannerblock">
                <a href="#" class="ishi-customhover-fadeinrotate3D ">
                  <img src="<?php echo e(asset('assets/images/banner/2.png')); ?>" alt="banner" class="img-responsive" />
                </a>  
              </div>
              <div class="bannerblock">
                <a href="#" class="ishi-customhover-fadeinrotate3D ">
                  <img src="<?php echo e(asset('assets/images/banner/3.png')); ?>" alt="banner" class="img-responsive" />
                </a>  
              </div>
            </div>
            <div class="bannerright col-md-4 col-sm-12">
              <div class="bannerblock"> 
                <a href="#" class="ishi-customhover-fadeinrotate3D ">
                  <img src="<?php echo e(asset('assets/images/banner/4.png')); ?>" alt="banner" class="img-responsive" />
                </a>  
              </div>
            </div> 
          </div>
        </div>
      </section> 
      <!-- ------------------product block---------- -->
      <section id="ishiproductsblock" class="ishiproductsblock container">
        <h3 class="home-title"><span class="title-icon"><span></span></span>Trending Products</h3>
        <ul id="ishiproductstab" class="nav nav-tabs clearfix">
          <li class="nav-item first_item active">
           <a class="nav-link" href="#featured-products-block" data-toggle="tab">Featured</a>
         </li>
         <li class="nav-item ">
           <a class="nav-link" href="#new-products-block" data-toggle="tab">Latest</a>
         </li>
         <li class="nav-item last_item">
           <a class="nav-link " href="#bestseller-products-block" data-toggle="tab">Best sellers</a>
         </li>
        </ul>       
        <div class="tab-content">
          <div id="featured-products-block" class="tab-pane active">
            <div class="block_content row">
              <div id="ishi-featured-products" class="owl-carousel">
                <?php $__currentLoopData = $feature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($ff->current_stock > 0): ?>
                  <div class="product-thumb">
                  <div class="item">
                    <div class="product-desc">
                      <div class="product-title"><a href="#"><?php echo e($ff->name); ?></a></div>
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
                      <img src="<?php echo e(asset('assets/images/product/'.$ff->varient_image)); ?>" alt="product-img">
                          <img class="product-img-extra change" alt="product-img" src="<?php echo e(asset('assets/images/product/'.$ff->other_image)); ?>">
                      </a>
                      <div class="product-flags">
                        <div class="sale">Sale</div>
                      </div>
                    </div>
                    <div class="caption">  
                      <p class="description">
                      <?php echo e($ff->en_description); ?></p>
                      <p class="price">
                        <span class="regular price-old"><?php echo e($ff->mrp); ?></span> 
                        <span class="price-discount"><?php echo e($ff->mrp - $ff->price); ?></span> 
                        <span class="price-sale"><?php echo e($ff->price); ?></span>
                      </p>
                      <div class="btn-cart">
                        <a href="direct_cart/<?php echo e($ff->varient_id); ?>/<?php echo e($ff->name); ?>" data-button-action="add-to-cart" class="button">
                              <i class="fa fa-shopping-cart"></i>
                              <span class="lblcart">Add to cart</span>
                            </a>
                      </div>                           
                      <div class="button-group">  
                        <div class="btn-quickview"> 
                        <a class="quickbox" href="http://localhost/mole2/detail/<?php echo e($ff->product_id); ?>/<?php echo e($ff->varient_id); ?>">                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
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
                        <a href="direct_wish/<?php echo e($ff->varient_id); ?>/<?php echo e($ff->name); ?>">
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
<?php else: ?>
                <div class="product-thumb">
                  <div class="item">
                    <div class="product-desc">
                      <div class="product-title"><a href="#"><?php echo e($ff->name); ?></a></div>
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
                        <img src="<?php echo e(asset('assets/images/product/'.$ff->varient_image)); ?>" alt="product-img">
                        <img class="product-img-extra change" alt="product-img" src="<?php echo e(asset('assets/images/product/'.$ff->other_image)); ?>">
                      </a>
                      <span class="outstock-overlay">SOLD OUT</span>
                      <div class="product-flags">
                        <div class="sale">Sale</div>
                      </div>
                    </div>
                    <div class="caption">  
                      <p class="description">
                      <?php echo e($ff->en_description); ?></p>
                      <p class="price">
                        <span class="regular price-old"><?php echo e($ff->mrp); ?></span> 
                        <span class="price-discount"><?php echo e($ff->mrp - $ff->price); ?></span> 
                        <span class="price-sale"><?php echo e($ff->price); ?></span>
                      </p>
                      <div class="btn-cart">
                        <a data-button-action="add-to-cart" class="button sold-out">
                          <i class="fa fa-shopping-cart"></i> 
                          <span class="lblcart">Sold Out</span>
                        </a>
                      </div>                           
                      <div class="button-group">  
                        <div class="btn-quickview"> 
                        <a class="quickbox" href="http://localhost/mole2/detail/<?php echo e($ff->product_id); ?>/<?php echo e($ff->varient_id); ?>"> 
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                              <symbol id="eye-open" viewBox="0 0 1190 1190"><title>eye-open</title><path d="M505.918,236.117c-26.651-43.587-62.485-78.609-107.497-105.065c-45.015-26.457-92.549-39.687-142.608-39.687 c-50.059,0-97.595,13.225-142.61,39.687C68.187,157.508,32.355,192.53,5.708,236.117C1.903,242.778,0,249.345,0,255.818 c0,6.473,1.903,13.04,5.708,19.699c26.647,43.589,62.479,78.614,107.495,105.064c45.015,26.46,92.551,39.68,142.61,39.68 c50.06,0,97.594-13.176,142.608-39.536c45.012-26.361,80.852-61.432,107.497-105.208c3.806-6.659,5.708-13.223,5.708-19.699 C511.626,249.345,509.724,242.778,505.918,236.117z M194.568,158.03c17.034-17.034,37.447-25.554,61.242-25.554 c3.805,0,7.043,1.336,9.709,3.999c2.662,2.664,4,5.901,4,9.707c0,3.809-1.338,7.044-3.994,9.704 c-2.662,2.667-5.902,3.999-9.708,3.999c-16.368,0-30.362,5.808-41.971,17.416c-11.613,11.615-17.416,25.603-17.416,41.971 c0,3.811-1.336,7.044-3.999,9.71c-2.667,2.668-5.901,3.999-9.707,3.999c-3.809,0-7.044-1.334-9.71-3.999 c-2.667-2.666-3.999-5.903-3.999-9.71C169.015,195.482,177.535,175.065,194.568,158.03z M379.867,349.04 c-38.164,23.12-79.514,34.687-124.054,34.687c-44.539,0-85.889-11.56-124.051-34.687s-69.901-54.2-95.215-93.222 c28.931-44.921,65.19-78.518,108.777-100.783c-11.61,19.792-17.417,41.207-17.417,64.236c0,35.216,12.517,65.329,37.544,90.362 s55.151,37.544,90.362,37.544c35.214,0,65.329-12.518,90.362-37.544s37.545-55.146,37.545-90.362 c0-23.029-5.808-44.447-17.419-64.236c43.585,22.265,79.846,55.865,108.776,100.783C449.767,294.84,418.031,325.913,379.867,349.04 z"/></symbol>
                            </svg>
                            <svg class="icon" viewBox="0 0 30 30"><use xlink:href="#eye-open" x="28%" y="28%"></use></svg>
                            <span class="lblcart">Quick View</span>
                          </a>
                        </div>                  
                        <div class="btn-wishlist">
                        <a href="direct_wish/<?php echo e($ff->varient_id); ?>/<?php echo e($ff->name); ?>">
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
                <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
          <div id="new-products-block" class="tab-pane">
            <div class="block_content row">
            
              <div id="ishi-new-products" class="owl-carousel">
<!--  --> <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($pro->current_stock > 0): ?>
<div class="product-thumb">
                  <div class="item">
                    <div class="product-desc">
                      <div class="product-title"><a href="#"><?php echo e($pro->name); ?></a></div>
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
                      <img src="<?php echo e(asset('assets/images/product/'.$pro->varient_image)); ?>" alt="product-img">
                          <img class="product-img-extra change" alt="product-img" src="<?php echo e(asset('assets/images/product/'.$pro->other_image)); ?>">
                      </a>
                      <div class="product-flags">
                        <div class="sale">Sale</div>
                      </div>
                    </div>
                    <div class="caption">  
                      <p class="description">
                      <?php echo e($pro->en_description); ?></p>
                      <p class="price">
                        <span class="regular price-old"><?php echo e($pro->mrp); ?></span> 
                        <span class="price-discount"><?php echo e($pro->mrp - $pro->price); ?></span> 
                        <span class="price-sale"><?php echo e($pro->price); ?></span>
                      </p>
                      <div class="btn-cart">
                        <a href="direct_cart/<?php echo e($pro->varient_id); ?>/<?php echo e($pro->name); ?>" data-button-action="add-to-cart" class="button">
                              <i class="fa fa-shopping-cart"></i>
                              <span class="lblcart">Add to cart</span>
                            </a>
                      </div>                           
                      <div class="button-group">  
                        <div class="btn-quickview"> 
                        <a class="quickbox" href="http://localhost/mole2/detail/<?php echo e($pro->product_id); ?>/<?php echo e($pro->varient_id); ?>">                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
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
                        <a href="direct_wish/<?php echo e($pro->varient_id); ?>/<?php echo e($pro->name); ?>">
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
<?php else: ?>
<div class="product-thumb">
                    <div class="item">
                      <div class="product-desc">
                        <div class="product-title"><a href="#"><?php echo e($pro->name); ?></a></div>
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
                         <img src="<?php echo e(asset('assets/images/product/'.$pro->varient_image)); ?>" alt="product-img">
                          <img class="product-img-extra change" alt="product-img" src="<?php echo e(asset('assets/images/product/'.$pro->other_image)); ?>">
                        </a>
                        <span class="outstock-overlay">SOLD OUT</span>
                      </div>
                      <div class="caption"> 
                        <p class="description">
                        <?php echo e($pro->en_description); ?></p>
                        <p class="price">
                        <span class="regular price-old"><?php echo e($pro->mrp); ?></span> 
                        <span class="price-discount"><?php echo e($pro->mrp - $pro->price); ?></span> 
                        <span class="price-sale"><?php echo e($pro->price); ?></span>
                      </p>
                        <div class="btn-cart">
                          <a data-button-action="add-to-cart" class="button sold-out">
                            <i class="fa fa-shopping-cart"></i> 
                            <span class="lblcart">Sold Out</span>
                          </a>
                        </div>                            
                        <div class="button-group">  
                          <div class="btn-quickview"> 
                          <a class="quickbox" href="http://localhost/mole2/detail/<?php echo e($pro->product_id); ?>/<?php echo e($pro->varient_id); ?>">                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
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
                          <a href="direct_wish/<?php echo e($pro->varient_id); ?>/<?php echo e($pro->name); ?>">
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
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <!--  -->
               </div>
               
              </div>
            
          </div>
          <div id="bestseller-products-block" class="tab-pane">
            <div class="block_content row">
              <div id="ishi-bestseller-products" class="owl-carousel">
              <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($ff->current_stock > 0): ?>
<div class="product-thumb">
                  <div class="item">
                    <div class="product-desc">
                      <div class="product-title"><a href="#"><?php echo e($ff->name); ?></a></div>
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
                      <img src="<?php echo e(asset('assets/images/product/'.$ff->varient_image)); ?>" alt="product-img">
                          <img class="product-img-extra change" alt="product-img" src="<?php echo e(asset('assets/images/product/'.$ff->other_image)); ?>">
                      </a>
                      <div class="product-flags">
                        <div class="sale">Sale</div>
                      </div>
                    </div>
                    <div class="caption">  
                      <p class="description">
                      <?php echo e($ff->en_description); ?></p>
                      <p class="price">
                        <span class="regular price-old"><?php echo e($ff->mrp); ?></span> 
                        <span class="price-discount"><?php echo e($ff->mrp - $ff->price); ?></span> 
                        <span class="price-sale"><?php echo e($ff->price); ?></span>
                      </p>
                      <div class="btn-cart">
                        <a href="direct_cart/<?php echo e($ff->pid); ?>/<?php echo e($ff->name); ?>" data-button-action="add-to-cart" class="button">
                              <i class="fa fa-shopping-cart"></i>
                              <span class="lblcart">Add to cart</span>
                            </a>
                      </div>                           
                      <div class="button-group">  
                        <div class="btn-quickview"> 
                        <a class="quickbox" href="http://localhost/mole2/detail/<?php echo e($ff->product_id); ?>/<?php echo e($ff->pid); ?>">                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
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
                        <a href="direct_wish/<?php echo e($ff->pid); ?>/<?php echo e($ff->name); ?>">
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
<?php else: ?>
                <div class="product-thumb">
                  <div class="item">
                    <div class="product-desc">
                      <div class="product-title"><a href="#"><?php echo e($ff->name); ?></a></div>
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
                        <img src="<?php echo e(asset('assets/images/product/'.$ff->varient_image)); ?>" alt="product-img">
                        <img class="product-img-extra change" alt="product-img" src="<?php echo e(asset('assets/images/product/'.$ff->other_image)); ?>">
                      </a>
                      <span class="outstock-overlay">SOLD OUT</span>
                      <div class="product-flags">
                        <div class="sale">Sale</div>
                      </div>
                    </div>
                    <div class="caption">  
                      <p class="description">
                      <?php echo e($ff->en_description); ?></p>
                      <p class="price">
                        <span class="regular price-old"><?php echo e($ff->mrp); ?></span> 
                        <span class="price-discount"><?php echo e($ff->mrp - $ff->price); ?></span> 
                        <span class="price-sale"><?php echo e($ff->price); ?></span>
                      </p>
                      <div class="btn-cart">
                        <a data-button-action="add-to-cart" class="button sold-out">
                          <i class="fa fa-shopping-cart"></i> 
                          <span class="lblcart">Sold Out</span>
                        </a>
                      </div>                           
                      <div class="button-group">  
                        <div class="btn-quickview"> 
                        <a class="quickbox" href="http://localhost/mole2/detail/<?php echo e($ff->product_id); ?>/<?php echo e($ff->pid); ?>"> 
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                              <symbol id="eye-open" viewBox="0 0 1190 1190"><title>eye-open</title><path d="M505.918,236.117c-26.651-43.587-62.485-78.609-107.497-105.065c-45.015-26.457-92.549-39.687-142.608-39.687 c-50.059,0-97.595,13.225-142.61,39.687C68.187,157.508,32.355,192.53,5.708,236.117C1.903,242.778,0,249.345,0,255.818 c0,6.473,1.903,13.04,5.708,19.699c26.647,43.589,62.479,78.614,107.495,105.064c45.015,26.46,92.551,39.68,142.61,39.68 c50.06,0,97.594-13.176,142.608-39.536c45.012-26.361,80.852-61.432,107.497-105.208c3.806-6.659,5.708-13.223,5.708-19.699 C511.626,249.345,509.724,242.778,505.918,236.117z M194.568,158.03c17.034-17.034,37.447-25.554,61.242-25.554 c3.805,0,7.043,1.336,9.709,3.999c2.662,2.664,4,5.901,4,9.707c0,3.809-1.338,7.044-3.994,9.704 c-2.662,2.667-5.902,3.999-9.708,3.999c-16.368,0-30.362,5.808-41.971,17.416c-11.613,11.615-17.416,25.603-17.416,41.971 c0,3.811-1.336,7.044-3.999,9.71c-2.667,2.668-5.901,3.999-9.707,3.999c-3.809,0-7.044-1.334-9.71-3.999 c-2.667-2.666-3.999-5.903-3.999-9.71C169.015,195.482,177.535,175.065,194.568,158.03z M379.867,349.04 c-38.164,23.12-79.514,34.687-124.054,34.687c-44.539,0-85.889-11.56-124.051-34.687s-69.901-54.2-95.215-93.222 c28.931-44.921,65.19-78.518,108.777-100.783c-11.61,19.792-17.417,41.207-17.417,64.236c0,35.216,12.517,65.329,37.544,90.362 s55.151,37.544,90.362,37.544c35.214,0,65.329-12.518,90.362-37.544s37.545-55.146,37.545-90.362 c0-23.029-5.808-44.447-17.419-64.236c43.585,22.265,79.846,55.865,108.776,100.783C449.767,294.84,418.031,325.913,379.867,349.04 z"/></symbol>
                            </svg>
                            <svg class="icon" viewBox="0 0 30 30"><use xlink:href="#eye-open" x="28%" y="28%"></use></svg>
                            <span class="lblcart">Quick View</span>
                          </a>
                        </div>                  
                        <div class="btn-wishlist">
                        <a href="direct_wish/<?php echo e($ff->pid); ?>/<?php echo e($ff->name); ?>">
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
                <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ------------------gallery block---------- -->
      <!-- <section id="ishigallery" class="ishibannerblock ishigalleryblock">
        <h3 class="home-title"><span class="title-icon"><span></span></span>Kid’s Gallery</h3>
        <div class="bannerblock col-lg-3 col-md-3 col-sm-3 col-xs-6">
          <div class="image-container">
            <a href="#" class="ishi-customhover-fadeoutcenter ">
              <img src="<?php echo e(asset('assets/images/gallery/1.jpg')); ?>" alt="banner-img" class="img-responsive"> 
            </a>
          </div>
        </div>
        <div class="bannerblock col-lg-3 col-md-3 col-sm-3 col-xs-6">
          <div class="image-container">
            <a href="#" class="ishi-customhover-fadeoutcenter ">
              <img src="<?php echo e(asset('assets/images/gallery/2.jpg')); ?>" alt="banner-img" class="img-responsive"> 
            </a>
          </div>
        </div>
        <div class="bannerblock col-lg-3 col-md-3 col-sm-3 col-xs-6">
          <div class="image-container">
            <a href="#" class="ishi-customhover-fadeoutcenter ">
              <img src="<?php echo e(asset('assets/images/gallery/3.jpg')); ?>" alt="banner-img" class="img-responsive"> 
            </a>
          </div>
        </div>
        <div class="bannerblock col-lg-3 col-md-3 col-sm-3 col-xs-6">
          <div class="image-container">
            <a href="#" class="ishi-customhover-fadeoutcenter ">
              <img src="<?php echo e(asset('assets/images/gallery/4.jpg')); ?>" alt="banner-img" class="img-responsive"> 
            </a>
          </div>
        </div>
        <div class="bannerblock col-lg-3 col-md-3 col-sm-3 col-xs-6">
          <div class="image-container">
            <a href="#" class="ishi-customhover-fadeoutcenter ">
              <img src="<?php echo e(asset('assets/images/gallery/5.jpg')); ?>" alt="banner-img" class="img-responsive"> 
            </a>
          </div>
        </div>
        <div class="bannerblock col-lg-3 col-md-3 col-sm-3 col-xs-6">
          <div class="image-container">
            <a href="#" class="ishi-customhover-fadeoutcenter ">
              <img src="<?php echo e(asset('assets/images/gallery/6.jpg')); ?>" alt="banner-img" class="img-responsive"> 
            </a>
          </div>
        </div>
        <div class="bannerblock col-lg-3 col-md-3 col-sm-3 col-xs-6">
          <div class="image-container">
            <a href="#" class="ishi-customhover-fadeoutcenter ">
              <img src="<?php echo e(asset('assets/images/gallery/7.jpg')); ?>" alt="banner-img" class="img-responsive"> 
            </a>
          </div>
        </div>
        <div class="bannerblock col-lg-3 col-md-3 col-sm-3 col-xs-6">
          <div class="image-container">
            <a href="#" class="ishi-customhover-fadeoutcenter ">
              <img src="<?php echo e(asset('assets/images/gallery/8.jpg')); ?>" alt="banner-img" class="img-responsive"> 
            </a>
          </div>
        </div>
      </section> -->
      <!-- -------------------manufacture---------- -->
      <!-- <section id="ishimanufacturerblock" class="clearfix container">
        <div id="manufacturer-carousel" class="owl-carousel">
            <div class="item">
                <div class="image-container">
                    <a href="#">
                        <img src="<?php echo e(asset('assets/images/brand/logo1.png')); ?>" title="Fashion Manufacturer 1" alt="Fashion Manufacturer 1">
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="image-container">
                    <a href="#">
                        <img src="<?php echo e(asset('assets/images/brand/logo2.png')); ?>" title="Fashion Manufacturer 2" alt="Fashion Manufacturer 2">
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="image-container">
                    <a href="#">
                        <img src="<?php echo e(asset('assets/images/brand/logo3.png')); ?>" title="Fashion Manufacturer 3" alt="Fashion Manufacturer 3">
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="image-container">
                    <a href="#">
                        <img src="<?php echo e(asset('assets/images/brand/logo4.png')); ?>" title="Fashion Manufacturer 4" alt="Fashion Manufacturer 4">
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="image-container">
                    <a href="#">
                        <img src="<?php echo e(asset('assets/images/brand/logo5.png')); ?>" title="Fashion Manufacturer 5" alt="Fashion Manufacturer 5">
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="image-container">
                    <a href="#">
                        <img src="<?php echo e(asset('assets/images/brand/logo6.png')); ?>" title="Fashion Manufacturer 6" alt="Fashion Manufacturer 6">
                    </a>
                </div>
            </div>
        </div>
      </section> -->
    
      <!-- -------------------special product---------- -->
      <!-- <section id="ishispecialproducts" class="container">
        <h3 class="home-title"><span class="title-icon"><span></span></span>Special Products</h3>
        <div class="block_content row">
          <div id="ishispecialproducts-carousel" class="owl-carousel products">
            <?php $__currentLoopData = $discount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($disc->current_stock > 0): ?>
            <div class="product-thumb">
                  <div class="item">
                    <div class="product-desc">
                      <div class="product-title"><a href="#"><?php echo e($disc->name); ?></a></div>
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
                      <img src="<?php echo e(asset('assets/images/product/'.$disc->varient_image)); ?>" alt="product-img">
                          <img class="product-img-extra change" alt="product-img" src="<?php echo e(asset('assets/images/product/'.$disc->other_image)); ?>">
                      </a>
                      <div class="product-flags">
                        <div class="sale">Sale</div>
                      </div>
                    </div>
                    <div class="caption">  
                      <p class="description">
                      <?php echo e($disc->en_description); ?></p>
                      <p class="price">
                        <span class="regular price-old"><?php echo e($disc->mrp); ?></span> 
                        <span class="price-discount"><?php echo e($disc->mrp - $disc->price); ?></span> 
                        <span class="price-sale"><?php echo e($disc->price); ?></span>
                      </p>
                      <div class="btn-cart">
                        <a href="direct_cart/<?php echo e($disc->vid); ?>/<?php echo e($disc->name); ?>" data-button-action="add-to-cart" class="button">
                              <i class="fa fa-shopping-cart"></i>
                              <span class="lblcart">Add to cart</span>
                            </a>
                      </div>                           
                      <div class="button-group">  
                        <div class="btn-quickview"> 
                        <a class="quickbox" href="http://localhost/mole2/detail/<?php echo e($disc->pid); ?>/<?php echo e($disc->vid); ?>">                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
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
                        <a href="direct_wish/<?php echo e($disc->vid); ?>/<?php echo e($disc->name); ?>">
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
              <?php else: ?>
                <div class="product-thumb">
                  <div class="item">
                    <div class="product-desc">
                      <div class="product-title"><a href="#"><?php echo e($disc->name); ?></a></div>
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
                        <img src="<?php echo e(asset('assets/images/product/'.$disc->varient_image)); ?>" alt="product-img">
                        <img class="product-img-extra change" alt="product-img" src="<?php echo e(asset('assets/images/product/'.$disc->other_image)); ?>">
                      </a>
                      <span class="outstock-overlay">SOLD OUT</span>
                      <div class="product-flags">
                        <div class="sale">Sale</div>
                      </div>
                    </div>
                    <div class="caption">  
                      <p class="description">
                      <?php echo e($disc->en_description); ?></p>
                      <p class="price">
                        <span class="regular price-old"><?php echo e($disc->mrp); ?></span> 
                        <span class="price-discount"><?php echo e($disc->mrp - $disc->price); ?></span> 
                        <span class="price-sale"><?php echo e($disc->price); ?></span>
                      </p>
                      <div class="btn-cart">
                        <a data-button-action="add-to-cart" class="button sold-out">
                          <i class="fa fa-shopping-cart"></i> 
                          <span class="lblcart">Sold Out</span>
                        </a>
                      </div>                           
                      <div class="button-group">  
                        <div class="btn-quickview"> 
                        <a class="quickbox" href="http://localhost/mole2/detail/<?php echo e($disc->pid); ?>/<?php echo e($disc->vid); ?>"> 
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                              <symbol id="eye-open" viewBox="0 0 1190 1190"><title>eye-open</title><path d="M505.918,236.117c-26.651-43.587-62.485-78.609-107.497-105.065c-45.015-26.457-92.549-39.687-142.608-39.687 c-50.059,0-97.595,13.225-142.61,39.687C68.187,157.508,32.355,192.53,5.708,236.117C1.903,242.778,0,249.345,0,255.818 c0,6.473,1.903,13.04,5.708,19.699c26.647,43.589,62.479,78.614,107.495,105.064c45.015,26.46,92.551,39.68,142.61,39.68 c50.06,0,97.594-13.176,142.608-39.536c45.012-26.361,80.852-61.432,107.497-105.208c3.806-6.659,5.708-13.223,5.708-19.699 C511.626,249.345,509.724,242.778,505.918,236.117z M194.568,158.03c17.034-17.034,37.447-25.554,61.242-25.554 c3.805,0,7.043,1.336,9.709,3.999c2.662,2.664,4,5.901,4,9.707c0,3.809-1.338,7.044-3.994,9.704 c-2.662,2.667-5.902,3.999-9.708,3.999c-16.368,0-30.362,5.808-41.971,17.416c-11.613,11.615-17.416,25.603-17.416,41.971 c0,3.811-1.336,7.044-3.999,9.71c-2.667,2.668-5.901,3.999-9.707,3.999c-3.809,0-7.044-1.334-9.71-3.999 c-2.667-2.666-3.999-5.903-3.999-9.71C169.015,195.482,177.535,175.065,194.568,158.03z M379.867,349.04 c-38.164,23.12-79.514,34.687-124.054,34.687c-44.539,0-85.889-11.56-124.051-34.687s-69.901-54.2-95.215-93.222 c28.931-44.921,65.19-78.518,108.777-100.783c-11.61,19.792-17.417,41.207-17.417,64.236c0,35.216,12.517,65.329,37.544,90.362 s55.151,37.544,90.362,37.544c35.214,0,65.329-12.518,90.362-37.544s37.545-55.146,37.545-90.362 c0-23.029-5.808-44.447-17.419-64.236c43.585,22.265,79.846,55.865,108.776,100.783C449.767,294.84,418.031,325.913,379.867,349.04 z"/></symbol>
                            </svg>
                            <svg class="icon" viewBox="0 0 30 30"><use xlink:href="#eye-open" x="28%" y="28%"></use></svg>
                            <span class="lblcart">Quick View</span>
                          </a>
                        </div>                  
                        <div class="btn-wishlist">
                        <a href="direct_wish/<?php echo e($disc->vid); ?>/<?php echo e($disc->name); ?>">
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
                <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
          <div id="new-products-block" class="tab-pane">
            <div class="block_content row">
                <div id="ishi-new-products" class="owl-carousel">
                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($pro->current_stock > 0): ?>
                <div class="product-thumb">
                  <div class="item">
                    <div class="product-desc">
                      <div class="product-title"><a href="#"><?php echo e($pro->name); ?></a></div>
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
                      <img src="<?php echo e(asset('assets/images/product/'.$pro->varient_image)); ?>" alt="product-img">
                          <img class="product-img-extra change" alt="product-img" src="<?php echo e(asset('assets/images/product/'.$pro->other_image)); ?>">
                      </a>
                      <div class="product-flags">
                        <div class="sale">Sale</div>
                      </div>
                    </div>
                    <div class="caption">  
                      <p class="description">
                      <?php echo e($pro->en_description); ?></p>
                      <p class="price">
                        <span class="regular price-old"><?php echo e($pro->mrp); ?></span> 
                        <span class="price-discount"><?php echo e($pro->mrp - $pro->price); ?></span> 
                        <span class="price-sale"><?php echo e($pro->price); ?></span>
                      </p>
                      <div class="btn-cart">
                        <a href="direct_cart/<?php echo e($pro->varient_id); ?>/<?php echo e($pro->name); ?>" data-button-action="add-to-cart" class="button">
                              <i class="fa fa-shopping-cart"></i>
                              <span class="lblcart">Add to cart</span>
                            </a>
                      </div>                           
                      <div class="button-group">  
                        <div class="btn-quickview"> 
                        <a class="quickbox" href="http://localhost/mole2/detail/<?php echo e($pro->product_id); ?>">                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
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
                        <a href="direct_wish/<?php echo e($pro->varient_id); ?>/<?php echo e($pro->name); ?>">
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
                <?php else: ?>
                <div class="product-thumb">
                    <div class="item">
                      <div class="product-desc">
                        <div class="product-title"><a href="#"><?php echo e($pro->name); ?></a></div>
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
                         <img src="<?php echo e(asset('assets/images/product/'.$pro->varient_image)); ?>" alt="product-img">
                          <img class="product-img-extra change" alt="product-img" src="<?php echo e(asset('assets/images/product/'.$pro->other_image)); ?>">
                        </a>
                        <span class="outstock-overlay">SOLD OUT</span>
                      </div>
                      <div class="caption"> 
                        <p class="description">
                        <?php echo e($pro->en_description); ?></p>
                        <p class="price">
                        <span class="regular price-old"><?php echo e($pro->mrp); ?></span> 
                        <span class="price-discount"><?php echo e($pro->mrp - $pro->price); ?></span> 
                        <span class="price-sale"><?php echo e($pro->price); ?></span>
                      </p>
                        <div class="btn-cart">
                          <a data-button-action="add-to-cart" class="button sold-out">
                            <i class="fa fa-shopping-cart"></i> 
                            <span class="lblcart">Sold Out</span>
                          </a>
                        </div>                            
                        <div class="button-group">  
                          <div class="btn-quickview"> 
                          <a class="quickbox" href="http://localhost/mole2/detail/<?php echo e($pro->product_id); ?>">                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
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
                          <a href="direct_wish/<?php echo e($pro->varient_id); ?>/<?php echo e($pro->name); ?>">
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
                    <?php endif; ?>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </section> -->

      <section id="ishispecialproducts" class="container">
        <h3 class="home-title"><span class="title-icon"><span></span></span>Special Products</h3>
        <div class="block_content row">
          <div id="ishispecialproducts-carousel" class="owl-carousel products">
            <?php $__currentLoopData = $discount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($disc->current_stock > 0): ?>
              <div class="product-thumb">
                  <div class="item">
                    <div class="product-desc">
                      <div class="product-title"><a href="#"><?php echo e($disc->name); ?></a></div>
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
                      <img src="<?php echo e(asset('assets/images/product/'.$disc->varient_image)); ?>" alt="product-img">
                          <img class="product-img-extra change" alt="product-img" src="<?php echo e(asset('assets/images/product/'.$disc->other_image)); ?>">
                      </a>
                      <div class="product-flags">
                        <div class="sale">Sale</div>
                      </div>
                    </div>
                    <div class="caption">  
                      <p class="description">
                      <?php echo e($disc->en_description); ?></p>
                      <p class="price">
                        <span class="regular price-old"><?php echo e($disc->mrp); ?></span> 
                        <span class="price-discount"><?php echo e($disc->mrp - $disc->price); ?></span> 
                        <span class="price-sale"><?php echo e($disc->price); ?></span>
                      </p>
                      <div class="btn-cart">
                        <a href="direct_cart/<?php echo e($disc->vid); ?>/<?php echo e($disc->name); ?>" data-button-action="add-to-cart" class="button">
                              <i class="fa fa-shopping-cart"></i>
                              <span class="lblcart">Add to cart</span>
                            </a>
                      </div>                           
                      <div class="button-group">  
                        <div class="btn-quickview"> 
                        <a class="quickbox" href="http://localhost/mole2/detail/<?php echo e($disc->pid); ?>">                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
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
                        <a href="direct_wish/<?php echo e($disc->vid); ?>/<?php echo e($disc->name); ?>">
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
              <?php else: ?>
                <div class="product-thumb">
                  <div class="item">
                    <div class="product-desc">
                      <div class="product-title"><a href="#"><?php echo e($disc->name); ?></a></div>
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
                        <img src="<?php echo e(asset('assets/images/product/'.$disc->varient_image)); ?>" alt="product-img">
                        <img class="product-img-extra change" alt="product-img" src="<?php echo e(asset('assets/images/product/'.$disc->other_image)); ?>">
                      </a>
                      <span class="outstock-overlay">SOLD OUT</span>
                      <div class="product-flags">
                        <div class="sale">Sale</div>
                      </div>
                    </div>
                    <div class="caption">  
                      <p class="description">
                      <?php echo e($disc->en_description); ?></p>
                      <p class="price">
                        <span class="regular price-old"><?php echo e($disc->mrp); ?></span> 
                        <span class="price-discount"><?php echo e($disc->mrp - $disc->price); ?></span> 
                        <span class="price-sale"><?php echo e($disc->price); ?></span>
                      </p>
                      <div class="btn-cart">
                        <a data-button-action="add-to-cart" class="button sold-out">
                          <i class="fa fa-shopping-cart"></i> 
                          <span class="lblcart">Sold Out</span>
                        </a>
                      </div>                           
                      <div class="button-group">  
                        <div class="btn-quickview"> 
                        <a class="quickbox" href="http://localhost/mole2/detail/<?php echo e($disc->pid); ?>"> 
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                              <symbol id="eye-open" viewBox="0 0 1190 1190"><title>eye-open</title><path d="M505.918,236.117c-26.651-43.587-62.485-78.609-107.497-105.065c-45.015-26.457-92.549-39.687-142.608-39.687 c-50.059,0-97.595,13.225-142.61,39.687C68.187,157.508,32.355,192.53,5.708,236.117C1.903,242.778,0,249.345,0,255.818 c0,6.473,1.903,13.04,5.708,19.699c26.647,43.589,62.479,78.614,107.495,105.064c45.015,26.46,92.551,39.68,142.61,39.68 c50.06,0,97.594-13.176,142.608-39.536c45.012-26.361,80.852-61.432,107.497-105.208c3.806-6.659,5.708-13.223,5.708-19.699 C511.626,249.345,509.724,242.778,505.918,236.117z M194.568,158.03c17.034-17.034,37.447-25.554,61.242-25.554 c3.805,0,7.043,1.336,9.709,3.999c2.662,2.664,4,5.901,4,9.707c0,3.809-1.338,7.044-3.994,9.704 c-2.662,2.667-5.902,3.999-9.708,3.999c-16.368,0-30.362,5.808-41.971,17.416c-11.613,11.615-17.416,25.603-17.416,41.971 c0,3.811-1.336,7.044-3.999,9.71c-2.667,2.668-5.901,3.999-9.707,3.999c-3.809,0-7.044-1.334-9.71-3.999 c-2.667-2.666-3.999-5.903-3.999-9.71C169.015,195.482,177.535,175.065,194.568,158.03z M379.867,349.04 c-38.164,23.12-79.514,34.687-124.054,34.687c-44.539,0-85.889-11.56-124.051-34.687s-69.901-54.2-95.215-93.222 c28.931-44.921,65.19-78.518,108.777-100.783c-11.61,19.792-17.417,41.207-17.417,64.236c0,35.216,12.517,65.329,37.544,90.362 s55.151,37.544,90.362,37.544c35.214,0,65.329-12.518,90.362-37.544s37.545-55.146,37.545-90.362 c0-23.029-5.808-44.447-17.419-64.236c43.585,22.265,79.846,55.865,108.776,100.783C449.767,294.84,418.031,325.913,379.867,349.04 z"/></symbol>
                            </svg>
                            <svg class="icon" viewBox="0 0 30 30"><use xlink:href="#eye-open" x="28%" y="28%"></use></svg>
                            <span class="lblcart">Quick View</span>
                          </a>
                        </div>                  
                        <div class="btn-wishlist">
                        <a href="direct_wish/<?php echo e($disc->vid); ?>/<?php echo e($disc->name); ?>">
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
                <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            
          </div>

          <!-- <div id="new-products-block" class="tab-pane">
            <div class="block_content row">
                <div id="ishi-new-products" class="owl-carousel">
                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($pro->current_stock > 0): ?>
                <div class="product-thumb">
                  <div class="item">
                    <div class="product-desc">
                      <div class="product-title"><a href="#"><?php echo e($pro->name); ?></a></div>
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
                      <img src="<?php echo e(asset('assets/images/product/'.$pro->varient_image)); ?>" alt="product-img">
                          <img class="product-img-extra change" alt="product-img" src="<?php echo e(asset('assets/images/product/'.$pro->other_image)); ?>">
                      </a>
                      <div class="product-flags">
                        <div class="sale">Sale</div>
                      </div>
                    </div>
                    <div class="caption">  
                      <p class="description">
                      <?php echo e($pro->en_description); ?></p>
                      <p class="price">
                        <span class="regular price-old"><?php echo e($pro->mrp); ?></span> 
                        <span class="price-discount"><?php echo e($pro->mrp - $pro->price); ?></span> 
                        <span class="price-sale"><?php echo e($pro->price); ?></span>
                      </p>
                      <div class="btn-cart">
                        <a href="direct_cart/<?php echo e($pro->varient_id); ?>/<?php echo e($pro->name); ?>" data-button-action="add-to-cart" class="button">
                              <i class="fa fa-shopping-cart"></i>
                              <span class="lblcart">Add to cart</span>
                            </a>
                      </div>                           
                      <div class="button-group">  
                        <div class="btn-quickview"> 
                        <a class="quickbox" href="http://localhost/mole2/detail/<?php echo e($pro->product_id); ?>">                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
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
                        <a href="direct_wish/<?php echo e($pro->varient_id); ?>/<?php echo e($pro->name); ?>">
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
                <?php else: ?>
                <div class="product-thumb">
                    <div class="item">
                      <div class="product-desc">
                        <div class="product-title"><a href="#"><?php echo e($pro->name); ?></a></div>
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
                         <img src="<?php echo e(asset('assets/images/product/'.$pro->varient_image)); ?>" alt="product-img">
                          <img class="product-img-extra change" alt="product-img" src="<?php echo e(asset('assets/images/product/'.$pro->other_image)); ?>">
                        </a>
                        <span class="outstock-overlay">SOLD OUT</span>
                      </div>
                      <div class="caption"> 
                        <p class="description">
                        <?php echo e($pro->en_description); ?></p>
                        <p class="price">
                        <span class="regular price-old"><?php echo e($pro->mrp); ?></span> 
                        <span class="price-discount"><?php echo e($pro->mrp - $pro->price); ?></span> 
                        <span class="price-sale"><?php echo e($pro->price); ?></span>
                      </p>
                        <div class="btn-cart">
                          <a data-button-action="add-to-cart" class="button sold-out">
                            <i class="fa fa-shopping-cart"></i> 
                            <span class="lblcart">Sold Out</span>
                          </a>
                        </div>                            
                        <div class="button-group">  
                          <div class="btn-quickview"> 
                          <a class="quickbox" href="http://localhost/mole2/detail/<?php echo e($pro->product_id); ?>">                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
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
                          <a href="direct_wish/<?php echo e($pro->varient_id); ?>/<?php echo e($pro->name); ?>">
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
                    <?php endif; ?>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div> -->
      </section>
      <!-- ------------------parallax block ---------- -->
      <!-- <section id="ishiparallaxbanner" class="clearfix">
        <div class="parallax" data-source-url="<?php echo e(asset('assets/images/parallax.jpg')); ?>" style="background-image: url(https://ishithemes.com/);">    
          <div class="container">
            <div class="parallax-list">
              <div class="parallax-discount">Welcome Baby Born</div>          
              <div class="parallax-title">Care Your Baby</div>   
              <div class="parallax-subtitle">Flat 20% Off All Type Plant &amp; Accessories </div>
              <div class="parallax-btn"><a href="#" class="btn btn-primary theme-button">SHOP NOW</a></div>
            </div>
          </div>
        </div>
      </section> -->
      <!-- -------------------category featured product---------- -->
      <section id="ishiproductsblock" class="ishiproductsblock container">
        <h3 class="home-title"><span class="title-icon"><span></span></span>Our Categories</h3>
        <ul id="ishiproductstab" class="nav nav-tabs clearfix">
          <?php $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="nav-item first_item">
          <input type="hidden" id="cat">
          <!-- data-toggle="tab" -->
          <!-- data-id="<?php echo e($subcat->id); ?>" onclick="get_image()" -->
           <a class="nav-link" href="dpbsc/<?php echo e($subcat->id); ?>" data-id="<?php echo e($subcat->id); ?>" onclick="get_image()"><?php echo e($subcat->name); ?></a>
         </li>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>      
          <div class="tab-content">
              <!--  -->
            <div id="linkproductcategoryblock8" class="tab-pane active">
              <div class="row">
                 <?php $__currentLoopData = $simage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $si): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="banner_productblock col-lg-3 col-md-3 hidden-md-down">
                  <a class="ishi-customhover-fadeinrotate home_Categories_aTag_style" href="category">
                    <img src="<?php echo e(asset('assets/images/subcategory/'.$si->image)); ?>" alt="banner">
                    <h2 class="text-center home_Categories_h2_style"><?php echo e($si->category_name); ?></h2>
                    <button class="btn text-center home_Categories_btn_style"> Shop Now</button>
                  </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="block_content col-lg-9 col-md-12 col-sm-12 col-xs-12">
                  <div  id="ishi-products-category" class="owl-carousel d-flex">
                    <?php $__currentLoopData = $bysub; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($bys->current_stock > 0): ?>                    
                    <div class="product-thumb">
                      <div class="item">
                        <div class="product-desc">
                          <div class="product-title"><a href="#"><?php echo e($bys->name); ?></a></div>
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
                          <img src="<?php echo e(asset('assets/images/product/'.$bys->varient_image)); ?>" alt="product-img">
                              <img class="product-img-extra change" alt="product-img" src="<?php echo e(asset('assets/images/product/'.$bys->other_image)); ?>">
                          </a>
                          <div class="product-flags">
                            <div class="sale">Sale</div>
                          </div>
                        </div>
                        <div class="caption">  
                          <p class="description">
                          <?php echo e($bys->en_description); ?></p>
                          <p class="price">
                            <span class="regular price-old"><?php echo e($bys->mrp); ?></span> 
                            <span class="price-discount"><?php echo e($bys->mrp - $bys->price); ?></span> 
                            <span class="price-sale"><?php echo e($bys->price); ?></span>
                          </p>
                          <div class="btn-cart">
                            <a href="direct_cart/<?php echo e($bys->vid); ?>/<?php echo e($bys->name); ?>" data-button-action="add-to-cart" class="button">
                                  <i class="fa fa-shopping-cart"></i>
                                  <span class="lblcart">Add to cart</span>
                                </a>
                          </div>                           
                          <div class="button-group">  
                            <div class="btn-quickview"> 
                            <a class="quickbox" href="http://localhost/mole2/detail/<?php echo e($bys->pid); ?>/<?php echo e($bys->vid); ?>">                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
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
                            <a href="direct_wish/<?php echo e($bys->vid); ?>/<?php echo e($bys->name); ?>">
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
                    <?php else: ?>
                    <div class="product-thumb">
                      <div class="item">
                        <div class="product-desc">
                          <div class="product-title"><a href="#"><?php echo e($bys->name); ?></a></div>
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
                            <img src="<?php echo e(asset('assets/images/product/'.$bys->varient_image)); ?>" alt="product-img">
                            <img class="product-img-extra change" alt="product-img" src="<?php echo e(asset('assets/images/product/'.$bys->other_image)); ?>">
                          </a>
                          <span class="outstock-overlay">SOLD OUT</span>
                          <div class="product-flags">
                            <div class="sale">Sale</div>
                          </div>
                        </div>
                        <div class="caption">  
                          <p class="description">
                          <?php echo e($bys->en_description); ?></p>
                          <p class="price">
                            <span class="regular price-old"><?php echo e($bys->mrp); ?></span> 
                            <span class="price-discount"><?php echo e($bys->mrp - $bys->price); ?></span> 
                            <span class="price-sale"><?php echo e($bys->price); ?></span>
                          </p>
                          <div class="btn-cart">
                            <a data-button-action="add-to-cart" class="button sold-out">
                              <i class="fa fa-shopping-cart"></i> 
                              <span class="lblcart">Sold Out</span>
                            </a>
                          </div>                           
                          <div class="button-group">  
                            <div class="btn-quickview"> 
                            <a class="quickbox" href="http://localhost/mole2/detail/<?php echo e($bys->pid); ?>/<?php echo e($bys->vid); ?>"> 
                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                  <symbol id="eye-open" viewBox="0 0 1190 1190"><title>eye-open</title><path d="M505.918,236.117c-26.651-43.587-62.485-78.609-107.497-105.065c-45.015-26.457-92.549-39.687-142.608-39.687 c-50.059,0-97.595,13.225-142.61,39.687C68.187,157.508,32.355,192.53,5.708,236.117C1.903,242.778,0,249.345,0,255.818 c0,6.473,1.903,13.04,5.708,19.699c26.647,43.589,62.479,78.614,107.495,105.064c45.015,26.46,92.551,39.68,142.61,39.68 c50.06,0,97.594-13.176,142.608-39.536c45.012-26.361,80.852-61.432,107.497-105.208c3.806-6.659,5.708-13.223,5.708-19.699 C511.626,249.345,509.724,242.778,505.918,236.117z M194.568,158.03c17.034-17.034,37.447-25.554,61.242-25.554 c3.805,0,7.043,1.336,9.709,3.999c2.662,2.664,4,5.901,4,9.707c0,3.809-1.338,7.044-3.994,9.704 c-2.662,2.667-5.902,3.999-9.708,3.999c-16.368,0-30.362,5.808-41.971,17.416c-11.613,11.615-17.416,25.603-17.416,41.971 c0,3.811-1.336,7.044-3.999,9.71c-2.667,2.668-5.901,3.999-9.707,3.999c-3.809,0-7.044-1.334-9.71-3.999 c-2.667-2.666-3.999-5.903-3.999-9.71C169.015,195.482,177.535,175.065,194.568,158.03z M379.867,349.04 c-38.164,23.12-79.514,34.687-124.054,34.687c-44.539,0-85.889-11.56-124.051-34.687s-69.901-54.2-95.215-93.222 c28.931-44.921,65.19-78.518,108.777-100.783c-11.61,19.792-17.417,41.207-17.417,64.236c0,35.216,12.517,65.329,37.544,90.362 s55.151,37.544,90.362,37.544c35.214,0,65.329-12.518,90.362-37.544s37.545-55.146,37.545-90.362 c0-23.029-5.808-44.447-17.419-64.236c43.585,22.265,79.846,55.865,108.776,100.783C449.767,294.84,418.031,325.913,379.867,349.04 z"/></symbol>
                                </svg>
                                <svg class="icon" viewBox="0 0 30 30"><use xlink:href="#eye-open" x="28%" y="28%"></use></svg>
                                <span class="lblcart">Quick View</span>
                              </a>
                            </div>                  
                            <div class="btn-wishlist">
                            <a href="direct_wish/<?php echo e($bys->vid); ?>/<?php echo e($bys->name); ?>">
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
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </section>

        <!-- -------------------testimonial---------- -->
        <section id="ishitesimonial" class="ishitestimonialsblock"> 
          <div class="container">
            <h3 class="home-title"><span class="title-icon"><span></span></span>Our Client Say’s</h3>
            <div id="ishitestimonials-carousel" class="owl-carousel">       
              <div class="item ishitestimonials-container">
                <div class="testimonial-img">
                  <img src="<?php echo e(asset('assets/images/testimonial/testimonial-1.png')); ?>" alt="Marko Westin">
                </div>
                <div class="testimonial-info">
                  <span class="quote">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 298.7 298.7" style="enable-background:new 0 0 298.7 298.7;" xml:space="preserve">
                      <g>
                        <g>
                          <g>
                            <polygon points="298.7,128 234.7,128 277.3,42.7 213.3,42.7 170.7,128 170.7,256 298.7,256      "/>
                            <polygon points="128,256 128,128 64,128 106.7,42.7 42.7,42.7 0,128 0,256      "/>
                          </g>
                        </g>
                      </g>
                    </svg>
                  </span>
                  <div class="user-description">
                    Lorem ipsum dolor sit amet, consectetur adipiselit. Mauris non tortor nec eros digniim dapibus Etiam vitae magna sed urna t
                  </div>
                  <h3 class="user-name">
                    Marko Westin
                  </h3>
                  <div class="user-designation">
                    Co-Founder
                  </div>
                </div>
              </div>
              <div class="item ishitestimonials-container">
                <div class="testimonial-img">
                  <img src="<?php echo e(asset('assets/images/testimonial/testimonial-2.png')); ?>" alt="John Duff">
                </div>
                <div class="testimonial-info">
                  <span class="quote">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 298.7 298.7" style="enable-background:new 0 0 298.7 298.7;" xml:space="preserve">
                      <g>
                        <g>
                          <g>
                            <polygon points="298.7,128 234.7,128 277.3,42.7 213.3,42.7 170.7,128 170.7,256 298.7,256      "/>
                            <polygon points="128,256 128,128 64,128 106.7,42.7 42.7,42.7 0,128 0,256      "/>
                          </g>
                        </g>
                      </g>
                    </svg>
                  </span>
                  <div class="user-description">
                    Lorem ipsum dolor sit amet, consectetur adipiselit. Mauris non tortor nec eros digniim dapibus Etiam vitae magna sed urna t
                  </div>
                  <h3 class="user-name">
                    John Duff
                  </h3>
                  <div class="user-designation">
                    Web Developer
                  </div>
                </div>
              </div>
              <div class="item ishitestimonials-container">
                <div class="testimonial-img">
                  <img src="<?php echo e(asset('assets/images/testimonial/testimonial-3.png')); ?>" alt="Marko Westin">
                </div>
                <div class="testimonial-info">
                  <span class="quote">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 298.7 298.7" style="enable-background:new 0 0 298.7 298.7;" xml:space="preserve">
                      <g>
                        <g>
                          <g>
                            <polygon points="298.7,128 234.7,128 277.3,42.7 213.3,42.7 170.7,128 170.7,256 298.7,256      "/>
                            <polygon points="128,256 128,128 64,128 106.7,42.7 42.7,42.7 0,128 0,256      "/>
                          </g>
                        </g>
                      </g>
                    </svg>
                  </span>
                  <div class="user-description">
                    Lorem ipsum dolor sit amet, consectetur adipiselit. Mauris non tortor nec eros digniim dapibus Etiam vitae magna sed urna t
                  </div>
                  <h3 class="user-name">
                    Marko Westin
                  </h3>
                  <div class="user-designation">
                    Co-Founder
                  </div>
                </div>
              </div>
              <div class="item ishitestimonials-container">
                <div class="testimonial-img">
                  <img src="<?php echo e(asset('assets/images/testimonial/testimonial-4.png')); ?>" alt="Marko Westin">
                </div>
                <div class="testimonial-info">
                  <span class="quote">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 298.7 298.7" style="enable-background:new 0 0 298.7 298.7;" xml:space="preserve">
                      <g>
                        <g>
                          <g>
                            <polygon points="298.7,128 234.7,128 277.3,42.7 213.3,42.7 170.7,128 170.7,256 298.7,256      "/>
                            <polygon points="128,256 128,128 64,128 106.7,42.7 42.7,42.7 0,128 0,256      "/>
                          </g>
                        </g>
                      </g>
                    </svg>
                  </span>
                  <div class="user-description">
                    Lorem ipsum dolor sit amet, consectetur adipiselit. Mauris non tortor nec eros digniim dapibus Etiam vitae magna sed urna t
                  </div>
                  <h3 class="user-name">
                    Marko Westin
                  </h3>
                  <div class="user-designation">
                    Co-Founder
                  </div>
                </div>
              </div>
              <div class="item ishitestimonials-container">
                <div class="testimonial-img">
                  <img src="<?php echo e(asset('assets/images/testimonial/testimonial-5.png')); ?>" alt="Marko Westin">
                </div>
                <div class="testimonial-info">
                  <span class="quote">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 298.7 298.7" style="enable-background:new 0 0 298.7 298.7;" xml:space="preserve">
                      <g>
                        <g>
                          <g>
                            <polygon points="298.7,128 234.7,128 277.3,42.7 213.3,42.7 170.7,128 170.7,256 298.7,256      "/>
                            <polygon points="128,256 128,128 64,128 106.7,42.7 42.7,42.7 0,128 0,256      "/>
                          </g>
                        </g>
                      </g>
                    </svg>
                  </span>
                  <div class="user-description">
                    Lorem ipsum dolor sit amet, consectetur adipiselit. Mauris non tortor nec eros digniim dapibus Etiam vitae magna sed urna t
                  </div>
                  <h3 class="user-name">
                    Marko Westin
                  </h3>
                  <div class="user-designation">
                    Co-Founder
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      <!-- -------------------smartblock---------- -->
      <section id="smartblog_block" class="smartblog_block clearfix container">
        <h3 class="home-title"><span class="title-icon"><span></span></span>Latest Blog</h3>
      
        <div class="block_content">
          <div id="smartblog-carousel" class="smartblog-carousel owl-carousel">
          <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <div class="item blog_post">
              <div class="news_module_image_holder">
                <a href="blog_info/<?php echo e($blg->id); ?>">
                  <img alt="Upon of seasons earth dominion" class="feat_img_small" src="<?php echo e(asset('assets/images/banner/'.$blg->image)); ?>">
                  <span class="blog-hover"></span>
                </a>
                <div class="date-comment">
                  <span class="blog_date"> <i class="fa fa-calendar"></i><?php echo e($blg->created_at); ?></span>
                  <span class="write-comment"> <a href="#"><i class="fa fa-comment"></i>&nbsp&nbsp<?php echo e($blg->no_of_comments); ?>&nbsp&nbspCOMMENTS</a></span>
                </div>
              </div>
              <div class="blog_content">
                <div class="blog_inner">
                  <h4 class="blog_title"><a href="blog_post.html"><?php echo e($blg->title); ?></a></h4>
                  <p class="blog-desc"><?php echo e($blg->description); ?></p>
                </div>
              </div>  
             
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
         
        </div>
        
      </section>      
      <!-- -------------------newsletter---------- -->
      <section class="block_newsletter container">
        <div class="row">
          <div class="bannerimage bannerblock col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <a href="#" class="ishi-customhover-fadeinnormal scale">
              <img src="<?php echo e(asset('assets/images/banner/5.png')); ?>" alt="banner" class="img-responsive" />
            </a>
          </div>
          <div id="newsletter-container" class="bannerblock box-content col-lg-4 col-md-12 col-sm-12 col-xs-12"> 
            <h3 class="home-title"><span class="title-icon"><span></span></span>Newsletter</h3>
            <p class="block-newsletter-label">Subscribe Now For Exclusive Offers</p>    
            <div class="newsletter_form">
              <form action="#" method="post">                   
                <input name="email" value="" placeholder="Your email address" type="text">
                <a class="button btn-submit"></a>
              </form>
            </div>
            <!-- -------------------socialmedia---------- -->
            <div class="block-social">
              <div id="block-container">
                <ul class="social-inner">
                  <li class="facebook">
                    <a href="#" target="_blank">
                      <i class="fa fa-facebook"></i><span class="socialicon-label">Facebook</span>
                    </a>
                  </li>
                  <li class="twitter">
                    <a href="#" target="_blank">
                      <i class="fa fa-twitter"></i><span class="socialicon-label">Twitter</span>
                    </a>
                  </li>
                  <li class="rss">
                    <a href="#" target="_blank">
                      <i class="fa fa-pinterest-p"></i><span class="socialicon-label">Pinterest</span>
                    </a>
                  </li>
                  <li class="youtube">
                    <a href="#" target="_blank">
                      <i class="fa fa-youtube"></i><span class="socialicon-label">YouTube</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            
          </div>
          <div class="bannerimage bannerblock col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <a href="#" class="ishi-customhover-fadeinnormal scale">
            <img src="<?php echo e(asset('assets/images/banner/6.png')); ?>" alt="banner" class="img-responsive" />
            </a>
          </div>
        </div>
      </section>
    </div>
    <!-- -----------------footer-------------------- -->
    <?php $__env->stopSection(); ?>
    <script>
  
  function get_image() {
    $(document).on('click', '.nav-link', (e) => {
      e.preventDefault();
      var aid = $(e.target).data('id');
      $('#cat').val(aid);
      var first = $('#cat').val();
           
      $.ajax({

              url:"<?php echo e(route('best_seller')); ?>",
              type: "get", 
              dataType:'html',
              data: {id:first},
              success:function(result) {
                $('#linkproductcategoryblock8').html(result);
                // console.log(result.bysub);
                                
              }
      });
    });
  }
  
  </script>

<?php echo $__env->make('front.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>