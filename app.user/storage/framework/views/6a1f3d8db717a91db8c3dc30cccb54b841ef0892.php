<div id="product-list-top">
                  <div id="js-product-list-top" class="row products-selection">
                    <div class="col-lg-6 total-products">
                      <span class="layout-options">
                        <span id="grid-view" class="checked"></span>
                        <span id="list-view"></span>
                      </span>
                      <p>There are <?php echo e($wordCount); ?> products.</p>
                    </div>
                    <div class="col-lg-6">
                      <div class="row sort-by-row">
                        <span class="col-sm-3 col-xs-12 col-md-3 hidden-lg-down sort-by">Sort by:</span>
                        <div class="col-sm-9 col-xs-12 col-md-9 products-sort-order dropdown">
                          <a class="select-title" rel="nofollow" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">Relevance<i class="material-icons pull-xs-right">&#xE5C5;</i></a>
                          <div class="dropdown-menu">
                            <a rel="nofollow" href="#" class="select-list js-search-link" onclick="asc()">Name, A to Z</a>
                            <a rel="nofollow" href="#" class="select-list js-search-link" onclick="dsc()">Name, Z to A</a>
                            <a rel="nofollow" href="#" class="select-list js-search-link" onclick="asc_price()">Price, low to high</a>
                            <a rel="nofollow" href="#" class="select-list js-search-link" onclick="dsc_price()">Price, high to low</a>
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
                  <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($pro->current_stock > 0): ?>
                      <article
                      class="product-miniature js-product-miniature col-xs-12 col-sm-6 col-md-4 col-lg-6 col-xl-4">
                      <div class="product-container product-thumb">
                        
                        <div class="product-desc">
                          <div class="product-title"><a href="#"><?php echo e($pro->name); ?></a></div>
                          <div class="product-comments">
                            <div class="star_content">
                              <div class="star star_on">
                                <img src="<?php echo e(asset('./assets/images/star.png')); ?>" height="15px" width="15px">
                              </div>
                              <div class="star star_on">
                                <img src="<?php echo e(asset('./assets/images/star.png')); ?>" height="15px" width="15px">
                              </div>
                              <div class="star star_on">
                                <img src="<?php echo e(asset('./assets/images/star.png')); ?>" height="15px" width="15px">
                              </div>
                              <div class="star star_on">
                                <img src="<?php echo e(asset('./assets/images/star.png')); ?>" height="15px" width="15px">
                              </div>
                              <div class="star star_on">
                                <img src="<?php echo e(asset('./assets/images/star.png')); ?>" height="15px" width="15px">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="image">
                          <a href="#" class="thumbnail product-thumbnail">
                            <img src="<?php echo e(asset('../'.$pro->varient_image)); ?>" alt="product-img">
                            <img class="product-img-extra change" alt="product-img" src="<?php echo e(asset('../'.$pro->other_image)); ?>">
                          </a>
                        </div>
                        <div class="caption">
                          <p class="price">
                          <span class="price-sale"></span>  <span class="price-sale"><del><?php echo e($pro->mrp); ?></del> <i class="fa fa-rupee-sign"></i></span>&nbsp&nbsp&nbsp
                          <span class="price-sale"></span>  <span class="price-sale"><?php echo e($pro->price); ?> <i class="fa fa-rupee-sign"></i></span><br>
                           <span class="price-sale">Size</span>  <span class="price-sale"><?php echo e($pro->size_name); ?> </span>&nbsp&nbsp&nbsp
                          <span class="price-sale">Color</span>  <span class="price-sale"><?php echo e($pro->color_name); ?> </span><BR>
                          <span class="price-sale" style="color:red;">Save_off</span>  <span class="price-sale" style="color:red;"><?php echo e($pro->mrp - $pro->price); ?> <i class="fa fa-rupee-sign"></i></span><br>
                          </p>
                         
                          <div class="btn-cart">
                          <a href="/direct_cart/<?php echo e($pro->varient_id); ?>/<?php echo e($pro->name); ?>" data-button-action="add-to-cart" class="button">
                              <i class="fa fa-shopping-cart"></i>
                              <span class="lblcart">Add to cart</span>
                            </a>
                          </div>
                          <p class="description">
                          <?php echo e($pro->en_description); ?></p>
                          <div class="button-group">
                            <div class="btn-quickview">
                            <a class="quickbox" href="/detail/<?php echo e($pro->product_id); ?>/<?php echo e($pro->varient_id); ?>">                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
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
                            <a href="/direct_wish/<?php echo e($pro->varient_id); ?>/<?php echo e($pro->name); ?>">
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
                        <?php else: ?>
                        <article
                      class="product-miniature js-product-miniature col-xs-12 col-sm-6 col-md-4 col-lg-6 col-xl-4">
                      <div class="product-container product-thumb">
                        <a href="productpage_leftcolumn.html">
                          <div class="product-desc">


                            <div class="product-title"><a href="productpage_leftcolumn.html"><?php echo e($pro->name); ?></a></div>
                            <div class="product-comments">
                              <div class="star_content">
                                <div class="star star_on">
                                  <img src="./assets/images/star.png" height="15px" width="15px">
                                </div>
                                <div class="star star_on">
                                  <img src="./assets/images/star.png" height="15px" width="15px">
                                </div>
                                <div class="star star_on">
                                  <img src="./assets/images/star.png" height="15px" width="15px">
                                </div>
                                <div class="star star_on">
                                  <img src="./assets/images/star.png" height="15px" width="15px">
                                </div>
                                <div class="star star_on">
                                  <img src="./assets/images/star.png" height="15px" width="15px">
                                </div>
                              </div>
                            </div>

                          </div>

                          <div class="image">
                          <a href="#" class="thumbnail product-thumbnail">
                            <img src="<?php echo e(asset('../'.$pro->varient_image)); ?>" alt="product-img">
                            <img class="product-img-extra change" alt="product-img" src="<?php echo e(asset('../'.$pro->other_image)); ?>">
                          </a>
                            <span class="outstock-overlay">SOLD OUT</span>
                            <div class="product-flags">
                              <div class="sale">Sale</div>
                            </div>
                          </div>
                          <div class="caption">
                          <p class="price">
                          <span class="price-sale"></span>  <span class="price-sale"><del><?php echo e($pro->mrp); ?></del> <i class="fa fa-rupee-sign"></i> </span>&nbsp&nbsp&nbsp
                          <span class="price-sale"></span>  <span class="price-sale"><?php echo e($pro->price); ?> <i class="fa fa-rupee-sign"></i></span><br>
                           <span class="price-sale">Size</span>  <span class="price-sale"><?php echo e($pro->size_name); ?> </span>&nbsp&nbsp&nbsp
                          <span class="price-sale">Color</span>  <span class="price-sale"><?php echo e($pro->color_name); ?> </span><BR>
                          <span class="price-sale" style="color:red;">Save_off</span>  <span class="price-sale" style="color:red;"><?php echo e($pro->mrp - $pro->price); ?> <i class="fa fa-rupee-sign"></i></span><br>
                          </p>
                            <div class="btn-cart">
                              <a data-button-action="add-to-cart" class="button sold-out">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="lblcart">SOLD OUT</span>
                              </a>
                            </div>
                            <p class="description">
                          <?php echo e($pro->en_description); ?></p>
                            <div class="button-group">
                              <div class="btn-quickview">
                              <a class="quickbox" href="/detail/<?php echo e($pro->product_id); ?>/<?php echo e($pro->varient_id); ?>">                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
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
                              <a href="/direct_wish/<?php echo e($pro->varient_id); ?>/<?php echo e($pro->name); ?>">
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
                        </a>
                      </div>
                    </article>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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