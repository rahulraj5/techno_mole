<!doctype html>
<html lang="en">
	
<!-- Mirrored from bootstrap.gallery/unipro/v1-x/01-design-blue/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Jul 2021 05:35:09 GMT -->
<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="UniPro App">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="img/ihavelogo1.png" />

		<!-- Title -->
		<title>I Have</title>


		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="<?php echo e(asset('public/css/bootstrap.min.css')); ?>">
		
		<!-- Main css -->
		<link rel="stylesheet" href="<?php echo e(asset('public/css/main.css')); ?>">


		<!-- *************
			************ Vendor Css Files *************
		************ -->

	</head>
	<body class="authentication">

		<!-- Loading wrapper start -->
		<div id="loading-wrapper">
			<div class="spinner-border"></div>
			Loading...
		</div>
		<!-- Loading wrapper end -->

		<!-- *************
			************ Login container start *************
		************* -->
		<div class="login-container">

			<div class="container-fluid h-100">

			<!-- Row start -->
			<div class="row g-0 h-100">
				<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
					
				</div>
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="login-wrapper">
						<form action="<?php echo e(route('adminLoginCheck')); ?>" method="post">
						    <?php echo e(csrf_field()); ?>

							<div class="login-screen">
								<div class="login-body">
									<a href="crm.html" class="login-logo">
										<img src="<?php echo e(asset('public/img/ihavelogo1.png')); ?>" alt="iChat">
									</a>
									<?php if(session()->has('success')): ?>
                                    <div class="alert alert-success">
                                    <?php if(is_array(session()->get('success'))): ?>
                                            <ul>
                                                <?php $__currentLoopData = session()->get('success'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($message); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                            <?php else: ?>
                                                <?php echo e(session()->get('success')); ?>

                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                     <?php if(count($errors) > 0): ?>
                                      <?php if($errors->any()): ?>
                                        <div class="alert alert-danger" role="alert">
                                          <?php echo e($errors->first()); ?>

                                          
                                        </div>
                                      <?php endif; ?>
                                    <?php endif; ?>
									<h6>Welcome back,<br>Please login to your account.</h6>
									<div class="field-wrapper">
										<input type="email" name="email" required autofocus>
										<div class="field-placeholder">Email ID</div>
									</div>
									<div class="field-wrapper mb-3">
										<input type="password" required name="password">
										<div class="field-placeholder">Password</div>
									</div>
									<div class="actions">
										<a href="index.html">Forgot password?</a>
										<a href="index.html" class="login_btn_style">
											<button type="submit" class="btn btn-primary">Login</button>
										</a>
										
									</div>
								</div>
								<!-- <div class="login-footer">
									<span class="additional-link">No Account? <a href="signup.html" class="btn btn-light">Sign Up</a></span>
								</div> -->
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Row end -->
		
			</div>
		</div>
		<!-- *************
			************ Login container end *************
		************* -->

		<!-- *************
			************ Required JavaScript Files *************
		************* -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="<?php echo e(asset('public/js/jquery.min.js')); ?>"></script>
		<script src="<?php echo e(asset('public/js/bootstrap.bundle.min.js')); ?>"></script>
		<script src="<?php echo e(asset('public/js/modernizr.js')); ?>"></script>
		<script src="<?php echo e(asset('public/js/moment.js')); ?>"></script>
		
		<!-- *************
			************ Vendor Js Files *************
		************* -->

		<!-- Main Js Required -->
		<script src="<?php echo e(asset('public/js/main.js')); ?>"></script>

	</body>

<!-- Mirrored from bootstrap.gallery/unipro/v1-x/01-design-blue/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Jul 2021 05:35:09 GMT -->
</html>