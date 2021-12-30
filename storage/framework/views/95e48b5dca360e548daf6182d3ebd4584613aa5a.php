<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Manage Coupon</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="<?php echo e(url('/manage_coupon')); ?>"><i class="bx bx-home-alt"></i></a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit Coupon</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 mx-auto">
				<hr/>
				<div class="card border-top border-0 border-4 border-primary">
					<div class="card-body p-5">
						<div class="card-title d-flex align-items-center">
							<div><i class="font-22 text-primary"></i>
							</div>
							<h5 class="mb-0 text-primary">Edit Coupon</h5>
						</div>
						<hr>
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
						<form class="row g-3" action="<?php echo e(url('update_coupon')); ?>" method="post" enctype="multipart/form-data">
						<?php echo e(csrf_field()); ?>

							<input type="hidden" name="coupon_id" value="<?php echo e($coupon_id); ?>">
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Coupon English Name</label>
								<input type="text" class="form-control" name="coupon_name" value="<?php echo e($coupon->coupon_name); ?>" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Coupon Arabic Name</label>
								<input type="text" class="form-control" name="arcoupon_name" style="text-align: right;" value="<?php echo e($coupon->ar_couponname); ?>" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Coupon Code</label>
								<input type="text" class="form-control" name="coupon_code" value="<?php echo e($coupon->coupon_code); ?>" required>
							</div>
							
							<div class="col-md-6">
								<label class="form-label">Valid From</label>
								<input class="result form-control" type="text" name="valid_from" value="<?php echo e($coupon->start_date); ?>" id="date-time-from1"  data-dtp="dtp_nr8Un" required>
							</div>
							
							<div class="col-md-6">
								<label class="form-label">Valid To</label>
								<input class="result form-control" type="text" name="valid_to" value="<?php echo e($coupon->end_date); ?>" id="date-time-to1" data-dtp="dtp_nr8Un" required>
							</div>
							
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Cart value</label>
								<input type="text" class="form-control" name="cart_value" value="<?php echo e($coupon->cart_value); ?>" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Coupon Restriction</label>
								<input type="number" class="form-control" name="restriction" value="<?php echo e($coupon->uses_restriction); ?>" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Coupon Type</label>
								<input type="text" class="form-control" name="coupon_type" value="<?php echo e($coupon->type); ?>" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Coupon English Description</label><br>
								<textarea id="mytextarea" name="coupon_desc" cols="50" required><?php echo e($coupon->coupon_description); ?></textarea>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Coupon Arabic Description</label><br>
								<textarea id="mytextarea" name="arcoupon_desc" cols="64" style="text-align: right;" required><?php echo e($coupon->ar_coupondescription); ?></textarea>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Coupon Image</label><br>
								<input id="cat_img" type="hidden" name="old_coupon_image" value="<?php echo e($coupon->coupon_img); ?>">
								<input id="cat_img" type="file" name="coupon_image">
								<img class="icon_image" src="<?php echo e(url('/').'/'.$coupon->coupon_img); ?>" style="width:100px;height:60px"/>
							</div>
							<div class="col-12">
								<button type="submit" class="btn btn-primary px-5">Update</button>
							</div>
						</form>
					</div>
				</div>						
			</div>
		</div>
	</div>
</div>
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script type="text/javascript">
		$(function () {
			$('#date-time-from1').bootstrapMaterialDatePicker({
				format: 'YYYY-MM-DD HH:mm'
			});
			$('#date').bootstrapMaterialDatePicker({
				time: false
			});
			$('#time').bootstrapMaterialDatePicker({
				date: false,
				format: 'HH:mm'
			});
		});
	</script>
	<script type="text/javascript">
		$(function () {
			$('#date-time-to1').bootstrapMaterialDatePicker({
				format: 'YYYY-MM-DD HH:mm'
			});
			$('#date').bootstrapMaterialDatePicker({
				time: false
			});
			$('#time').bootstrapMaterialDatePicker({
				date: false,
				format: 'HH:mm'
			});
		});
	</script>