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
        <h1 class="h1 category-title breadcrumb-title"><?php if(Session::get('query')): ?>                
               <?php echo e(Session::get('query')); ?>  <?php endif; ?></h1>
              </nav>
    </div>
    
    <!-- ----------------contactpage----------- -->
    <section id="wrapper">
      <div id="content-wrapper" class="top-wrapper">
        <div class="container">
          <div class="row">
            <section id="main">
              <div class="contact-form-information">
                <div class="row">
                  <div class="contact-banner col-lg-6 col-md-12">
                    <div class="image-container">
                      <a href="javascript:void(0);">
                        <img
                        src="<?php echo e(asset('assets/images/contact-image.png')); ?>"
                        alt="contact-image">
                      </a>
                    </div>
                  </div>
                  <div class="information-container col-lg-6 col-md-12">
                    <div class="title-container">
                      <h3 class="heading">get in touch</h3>
                      <span class="subheading">We&#39;d Love to Hear From You, Lets Get In Touch!</span>
                    </div>
                    <div class="list-contact-info col-md-12 col-sm-12 col-xs-12">
                      <div class="contact_info_item col-md-6 col-sm-6 col-xs-6">
                       <h3>address</h3>
                       <p>Demo street</p>
                       <p>France</p>
                      </div>
                      <div class="contact_info_item col-md-6 col-sm-6 col-xs-6">
                        <h3>Phone</h3>
                        <p>+00 900 123456789</p>
                      </div>
                      <div class="contact_info_item col-md-6 col-sm-6 col-xs-6">
                        <h3>Email</h3>
                        <p>
                          <a href="#">
                            admin@gmail.com
                          </a> 
                        </p>
                      </div>
                      <div class="contact_info_item col-md-6 col-sm-6 col-xs-6">
                        <h3>additional Information</h3>
                        <p>We are open: Monday - Saturday, 10AM - 5PM and colsed on sunday sorry for that.</p>
                      </div>
                      <div class="contact_info_item block-social col-md-12 col-sm-12 col-xs-12">
                        <h3>Social</h3>
                        <ul class="social-inner">
                          <li class="facebook">
                            <a href="#" target="_blank">
                              <i class="fab fa-facebook-f"></i><span class="socialicon-label">Facebook</span>
                            </a>
                          </li>
                          <li class="twitter">
                            <a href="#" target="_blank">
                              <i class="fab fa-twitter"></i><span class="socialicon-label">Twitter</span>
                            </a>
                          </li>
                          <li class="rss">
                            <a href="#" target="_blank">
                              <i class="fa fa-rss"></i><span class="socialicon-label">Rss</span>
                            </a>
                          </li>
                          <li class="youtube">
                            <a href="#" target="_blank">
                              <i class="fab fa-youtube"></i><span class="socialicon-label">YouTube</span>
                            </a>
                          </li>
                          <li class="googleplus">
                            <a href="#" target="_blank">
                              <i class="fab fa-google-plus-g"></i><span class="socialicon-label">Google +</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
        <div class="contact-map clearfix">
          <div id="contact-map">
        
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1781246.09881752!2d46.41434154039245!3d29.31178458212835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fc5363fbeea51a1%3A0x74726bcd92d8edd2!2sKuwait!5e0!3m2!1sen!2sin!4v1626678997703!5m2!1sen!2sin" width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            
          </div>
        </div>
        <div class="container">
          <div class="contact-form-bottom">
            <div class="contact-form form-vertical">
              <div class="title-container">
                <h3 class="heading">leave us a message</h3>
                <span class="subheading">-good for nature, good for you-</span>
              </div>
              <section class="form-field">
                <form method="post" action="/msg" id="contact_form" class="contact-form">
                  @csrf
                  <div class="form-fields row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
                      <label for="ContactFormName" class="hidden control-label">Name</label>
                      <input type="text" id="ContactFormName" class="form-control" name="name" value="" placeholder="Name">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
                      <label for="ContactFormEmail" class="hidden">Email</label>
                      <input type="email" id="ContactFormEmail" class="form-control" name="email" autocapitalize="off" value="" placeholder="Email">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
                      <label for="ContactFormPhone" class="hidden">Phone</label>
                      <input type="text" id="ContactFormPhone" class="form-control" name="mobile" value="" placeholder="Phone">
                    </div>              
                    <div class="form-group-area col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                      <label for="ContactFormMessage" class="hidden">Message</label>
                      <textarea rows="10" id="ContactFormMessage" class="form-control" name="msg" placeholder="your message"></textarea>
                    </div>
                    <div class="submit-button col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <input class="btn btn-primary" name="submitMessage" value="Send" type="submit">
                    </div>
                  </div>
                </form>
              </section>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('front.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>