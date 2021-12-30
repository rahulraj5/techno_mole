<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<!--end breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3"><?php echo e($titles); ?></div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="<?php echo e(url('/manage_product')); ?>"><i class="bx bx-home-alt"></i></a>
								</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<a href="<?php echo e(url('add_varient/'.$id)); ?>"><button type="button" class="btn btn-primary">Add varient</button></a>
							
						</div>
					</div>
				</div>
				
				
				<div class="card">
					<div class="card-body">
							
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Image</th>
										<th>English Description</th>
										<th>Arabic Description</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    <?php if($product): ?>
										<?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><img class="icon_image"src="<?php echo e(url('/').'/'.$row->varient_image); ?>" style="width:100px;height:60px"/></td>
											<td><?php echo e($row->description); ?></td>
											<td><?php echo e($row->ar_description); ?></td>
											<td class="action_btn">
												<a href="<?php echo e(url('edit_varient/'.$row->varient_id)); ?>" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fadeIn animated bx bx-edit"></i></a>  
												<a href="<?php echo e(url('delete_varient/'.$row->varient_id)); ?>" class="btn btn-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="lni lni-trash"></i></a>                                 
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
	<!--plugins-->
	
