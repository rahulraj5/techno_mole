<?php echo $__env->make('admin.inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<!-- Page wrapper start -->
	<div class="page-wrapper">

	<!-- side bar -->
	
	<?php echo $__env->make('admin.inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<!-- *************
				************ Main container start *************
			************* -->
		

			<!-- Content wrapper scroll start -->
			<div class="content-wrapper-scroll">

				<!-- Content wrapper start -->
				<div class="content-wrapper">

					<!-- Row start -->
					<div class="row gutters">
					    <div class="col-lg-12">
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

                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                              <?php endif; ?>
                            <?php endif; ?>
                        </div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Add <?php echo e($title); ?></div>
									<div class="graph-day-selection" role="group">
										<a href="pushnotifications.html">
											<button type="button" class="btn active">
												<i class="icon-arrow-left"></i>
												Back to <?php echo e($title); ?>

											</button>
										</a>

									</div>
								</div>
								<div class="card-body">

                                <form action="" method="post" enctype="multipart/form-data">
                                   <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="tbl_name" value="<?php echo e($tbl_name); ?>">
                                    <input type="hidden" name="status" value="1">
									<div class="row gutters">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
														
											<div class="field-wrapper">
												<input class="form-control" type="text" name="name">
												<div class="field-placeholder">Name</div>
											</div>

										</div>
									</div>
									
									<div class="row gutters">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
														
											<div class="field-wrapper">
												<input type="file" class="form-control" name="image">
												<div class="field-placeholder">Image</div>
											</div>

										</div>
									</div>

										<!-- Row start -->
									<div class="row gutters">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
										    <button class="btn btn-primary" type="submit">Save</button>
									    </div>
									</div>
									
									</form>

								
										</div>
										
									</div>
									<!-- Row end -->


								</div>
							</div>
					<!-- Row end -->


				</div>
				<!-- Content wrapper end -->

				
	
	
	<?php echo $__env->make('admin.inc.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

