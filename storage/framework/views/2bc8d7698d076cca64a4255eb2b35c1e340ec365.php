<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">User list</h6>
				<hr/>
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
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>User English Name</th>
										<th>User Arabic Name</th>
										<th>Eser Email</th>
										<th>Phone</th>
										<th>Device Type</th>
										<th>Verification Status</th>
										<th>Status</th>
										<th>Registration Date</th>
									</tr>
								</thead>
								<tbody>
                                    <?php if($users): ?>
										<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e($row->user_name); ?></td>
											<td><?php echo e($row->ar_username); ?></td>
											<td><?php echo e($row->user_email); ?></td>
											<td><?php echo e($row->user_phone); ?></td>
											<td><?php echo e($row->device_type); ?></td>
										<?php if($row->is_verified == 1): ?>
											<td><center><span class="badge bg-success" center>Verified</span></center></td>
										<?php else: ?>
											<td><center><span class="badge bg-danger" center>Non-Verified</span></center></td>
										<?php endif; ?>
											<td class="action_btn"><center>
												<?php if($row->block == 1): ?>
													<a href="<?php echo e(url('user_unblock/'.$row->user_id)); ?>"><i class="btn btn-success">Active</i></a> 
												<?php else: ?>
													<a href="<?php echo e(url('user_block/'.$row->user_id)); ?>"><i class="btn btn-danger" >Inactive</i></a> 
												<?php endif; ?>
											</center></td>
											<td><?php echo e($row->reg_date); ?></td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<!--plugins-->
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
