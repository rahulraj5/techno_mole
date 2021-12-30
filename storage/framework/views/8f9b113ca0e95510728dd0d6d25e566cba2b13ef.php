<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
<link href="<?php echo e(asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')); ?>" rel="stylesheet" />
<div class="page-wrapper">
	<div class="page-content">
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Manage City</div>
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
					<a href="<?php echo e(url('add_city')); ?>"><button type="button" class="btn btn-primary">Add City</button></a>
					
				</div>
			</div>
		</div>
		
		<div class="card">
			<div class="card-body">
					
				<div class="table-responsive">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>City Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php if($city): ?>
								<?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($row->city_name); ?></td>
									<td class="action_btn">
										<a href="<?php echo e(url('edit_city/'.$row->city_id)); ?>" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fadeIn animated bx bx-edit"></i></a>  
										<a href="<?php echo e(url('delete_city/'.$row->city_id)); ?>" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="lni lni-trash"></i></a>                                 
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
	
