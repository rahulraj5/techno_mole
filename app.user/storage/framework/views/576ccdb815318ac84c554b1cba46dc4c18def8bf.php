<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
<link href="<?php echo e(asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')); ?>" rel="stylesheet" />
<div class="page-wrapper">
	<div class="page-content">
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Manage Offers</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
						</li>
					</ol>
				</nav>
			</div>
			<div class="ms-auto">
				<div class="btn-group">
					<a href="<?php echo e(url('add_offer')); ?>"><button type="button" class="btn btn-primary">Add Offers</button></a>
					
				</div>
			</div>
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
								<th>Deal Price</th>
								<th>Valid From</th>
								<th>Valid To</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php if($deal_p): ?>
								<?php $__currentLoopData = $deal_p; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($row->name); ?></td>
									<td><?php echo e($row->deal_price); ?></td>
									<td><?php echo e($row->valid_from); ?></td>
									<td><?php echo e($row->valid_to); ?></td>
									<?php if($row->valid_to > $currentdate && $currentdate >= $row->valid_from): ?>
									<td><span class="text text-success">Ongoing</span></td>
									<?php endif; ?>
								<?php if($row->valid_to < $currentdate): ?>
									<td><span class="text text-danger">Expired</span></td>
								<?php endif; ?>
								<?php if($row->valid_from > $currentdate): ?>
									<td style="color:blue">Coming soon</td>
								<?php endif; ?>
									<td class="action_btn">
										<a href="<?php echo e(url('edit_offer/'.$row->deal_id)); ?>" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fadeIn animated bx bx-edit"></i></a>  
										<a href="<?php echo e(url('delete_offer/'.$row->deal_id)); ?>" title="Delete" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="lni lni-trash"></i></a>                                 
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
<script src="<?php echo e(asset('assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>"></script>
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
	<!--plugins-->
	
