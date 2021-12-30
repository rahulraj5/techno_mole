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
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
							<div class="stats-tile">
								<div class="sale-icon">
									<i class="icon-users"></i>
								</div>
								<div class="sale-details">
									<h2><?php echo e($total_customers); ?></h2>
									<p>Customers</p>
								</div>
								<div class="sale-graph">
									<div id="sparklineLine1"></div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
							<div class="stats-tile">
								<div class="sale-icon">
									<i class="icon-help-with-circle"></i>
								</div>
								<div class="sale-details">
									<h2><?php echo e($total_car_ads); ?></h2>
									<p>Car Ads</p>
								</div>
								<div class="sale-graph">
									<div id="sparklineLine2"></div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							<div class="stats-tile">
								<div class="sale-icon">
									<span class="icon-font_download ads_icon_size"></span>
								</div>
								<div class="sale-details">
									<h2><?php echo e($total_service_ads); ?></h2>
									<p>Service Ads</p>
								</div>
								<div class="sale-graph">
									<div id="sparklineLine3"></div>
								</div>
							</div>
						</div>
					</div>
					<!-- Row end -->



					<!-- Row start -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Recent Plan List</div>
									<div class="graph-day-selection" role="group">
										<button type="button" class="btn active">Export to Excel</button>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table products-table">
											<thead>
												<tr>
													<th>User Name</th>
													<th>Email</th>
													<th>Contact Number</th>
													<th>Plan</th>
													<th>Days Remaining</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
											    <?php $__currentLoopData = $recent_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td><?php echo e($recent_user->user_name); ?></td>
													<td><?php echo e($recent_user->user_email); ?></td>
													<td><?php echo e($recent_user->user_phone); ?></td>
													<td><?php echo e($recent_user->card_title); ?></td>
													<td><?php echo e(30 - $recent_user->time_diff); ?> Days</td>
													<?php if((30 - $recent_user->time_diff) > 0): ?>
													    <td><span class="badge bg-success">Running</span></td>
													<?php else: ?>
													    <td><span class="badge bg-danger">Expired</span></td>
													<?php endif; ?>

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

