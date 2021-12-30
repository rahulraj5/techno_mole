<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<!--end breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Stock List</div>
					
				</div>

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
										<th>Product Name</th>
										<th>Update Stock</th> 
										
									</tr>
								</thead>
								<tbody>
								<?php if($store): ?>
									<?php $__currentLoopData = $store; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    
									<tr>
										<td><?php echo e($row->name); ?></td>
										<td>
											<form class="row g-3" action="<?php echo e(url('stock_update')); ?>" method="post">
											<?php echo e(csrf_field()); ?>

											<div class="col-md-8">
												<input type="hidden" name="varient_id" value="<?php echo e($row->varient_id); ?>">
												<input type="text" class="form-control" name="stock" <?php if($row->stock == ""){ ?> value="0" <?php }else{ ?> value="<?php echo e($row->stock); ?>" <?php }  ?> required>
											</div>
											<div class="col-md-2">
												<button type="submit" class="btn btn-primary px-5"  class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Stock"><i class="fadeIn animated bx bx-plus"></i></button>
											</div>
											</form>
										</td>
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
