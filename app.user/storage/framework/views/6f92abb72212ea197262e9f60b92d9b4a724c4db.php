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
									<div class="card-title"><?php echo e($title); ?></div>
									<div class="graph-day-selection" role="group">
										<button type="button" class="btn active">Export to Excel</button>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table products-table">
											<thead>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Email</th>
													<th>Contact Number</th>
													<th>Device Type</th>
													<th>Status</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
											    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td><img width="70" height="70" src="images/profile/<?php echo e($user->user_image); ?>"></td>
													<td><?php echo e($user->user_name); ?></td>
													<td><?php echo e($user->user_email); ?></td>
													<td><?php echo e($user->user_phone); ?></td>
													<td><?php echo e($user->device_type); ?></td>
													<td>
													    <?php if($user->status == 1): ?>
														    <a href="changeStatus/user_id/<?php echo e($tbl_name); ?>/<?php echo e($user->user_id); ?>/0"><span class="badge bg-success">Active</span></a>
														<?php else: ?>
														    <a href="changeStatus/user_id/<?php echo e($tbl_name); ?>/<?php echo e($user->user_id); ?>/1"><span class="badge bg-danger">InActive</span></a>
														<?php endif; ?>
													
													</td>
													<td>
														<div class="actions">
															<a href="#" data-toggle="tooltip" data-placement="top"
																title="" data-original-title="Edit" class="table_icon_style">
																<button class="table_btn_style" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
																	<i class="icon-edit1 text-success"></i>
																</button>
																<!-- <i class="icon-edit1 text-success"></i> -->
																
															</a>

															<a href="delete/user_id/<?php echo e($tbl_name); ?>/<?php echo e($user->user_id); ?>" onclick="return confirm('Are you sure?')" data-toggle="tooltip" data-placement="top"
																title="" data-original-title="Delete" class="table_icon_style">
																<button class="table_btn_style" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
																	<i class="icon-x-circle text-danger"></i>
																</button>
																<!-- <i class="icon-x-circle text-danger"></i> -->
															</a>
															
														</div>
													</td>

												</tr>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Row end -->


				</div>
				<!-- Content wrapper end -->

				
	
	
	<?php echo $__env->make('admin.inc.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

