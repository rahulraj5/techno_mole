<?php $__env->startSection('content'); ?>
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
      <?php $__currentLoopData = $about; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h1 class="h1 category-title breadcrumb-title"><?php echo e($ab->title); ?></h1>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </nav>
    </div>
    <!-- -----------Cart page----------- -->
    <section id="wrapper">
      <div class="container">
        <?php $__currentLoopData = $about; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div id="content-wrapper" class="col-xs-12">
          <section id="main">
            <div class="about-page">
              <div class="about-container">
                <!-- <h2 class="home-title">Story Block</h2> -->
                <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="about-us">
                      <p>
                        <?php echo e($ab->description); ?>

                      </p>
                      <a class="btn-primary" href="/category" style="width: fit-content;" name="continue" type="submit"> Shop Now </a>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <a href="#"><img alt="about-img" src="<?php echo e(asset('assets/images/banner/'.$ab->image)); ?>"></a>
                  </div>
                </div>
              </div>
              <div class="block-title">
                <h2 class="home-title">Something about us</h2>
                <p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative to
                  corporate strategy to the table win-win survival strategies to ensure</p>
              </div>
              <div class="about-services">
                <div class="row">
                  <div class="col-lg-4 col-md-6 service">
                    <img alt="icon-1" src="<?php echo e(asset('assets/images/icons/icon-1.png')); ?>">
                    <h3>free resources</h3>
                    <p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the
                      day, going forward</p>
                  </div>
                  <div class="col-lg-4 col-md-6 service">
                    <img alt="icon-2" src="<?php echo e(asset('assets/images/icons/icon-2.png')); ?>">
                    <h3>multi-purpose</h3>
                    <p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the
                      day, going forward</p>
                  </div>
                  <div class="col-lg-4 col-md-12 service">
                    <img alt="icon-3" src="<?php echo e(asset('assets/images/icons/icon-3.png')); ?>">
                    <h3>fully responsive</h3>
                    <p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the
                      day, going forward</p>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </section>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('front.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>