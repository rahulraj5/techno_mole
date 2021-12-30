<h3 class="home-title"><span class="title-icon"><span></span></span>Our Categories</h3>
        <ul id="ishiproductstab" class="nav nav-tabs clearfix">
          <?php $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="nav-item first_item">
          <input type="hidden" id="cat">
          <!-- data-toggle="tab" -->
          <!-- data-id="<?php echo e($subcat->id); ?>" onclick="get_image()" -->
           <a class="nav-link <?php if($simage[0]->id == $subcat->id): ?> active <?php endif; ?>" href="dpbsc/<?php echo e($subcat->id); ?>" data-id="<?php echo e($subcat->id); ?>" onclick="get_image()"><?php echo e($subcat->name); ?></a>
         </li>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>      
          <div class="tab-content">
              <!--  -->
            <div id="" class="tab-pane active">
              <div class="row">
                 <?php $__currentLoopData = $simage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $si): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="banner_productblock col-lg-3 col-md-3 hidden-md-down">
                  <a class="ishi-customhover-fadeinrotate home_Categories_aTag_style" href="category">
                    <img src="<?php echo e(asset('../'.$si->image)); ?>" alt="banner">
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
                          <img src="<?php echo e(asset('../'.$bys->varient_image)); ?>" alt="product-img">
                              <img class="product-img-extra change" alt="product-img" src="<?php echo e(asset('../'.$bys->other_image)); ?>">
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
                            <a class="quickbox" href="http://artybrainsdemo.com/mole/app.user/detail/<?php echo e($bys->pid); ?>/<?php echo e($bys->vid); ?>">                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
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
                            <img src="<?php echo e(asset('../'.$bys->varient_image)); ?>" alt="product-img">
                            <img class="product-img-extra change" alt="product-img" src="<?php echo e(asset('../'.$bys->other_image)); ?>">
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
                            <a class="quickbox" href="http://artybrainsdemo.com/mole/app.user/detail/<?php echo e($bys->pid); ?>/<?php echo e($bys->vid); ?>"> 
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