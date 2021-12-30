<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Manage Secondary Banner</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="<?php echo e(url('/secondary_banner')); ?>"><i class="bx bx-home-alt"></i></a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit Secondary Banner</li>
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
							<h5 class="mb-0 text-primary">Edit Secondary Banner</h5>
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
						<form class="row g-3" action="<?php echo e(url('update_secondary_banner')); ?>" method="post" enctype="multipart/form-data">
						<?php echo e(csrf_field()); ?>

							<input type="hidden" name="banner_id" value="<?php echo e($banner->sec_banner_id); ?>" >
				
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Slider Name</label>
								<input type="text" class="form-control" name="banner" value="<?php echo e($banner->banner_name); ?>" required>
							</div>
							<div class="col-md-6">
								<label for="inputEmail" class="form-label">Image</label><br>
								<input type="hidden" name="old_image" value="<?php echo e($banner->banner_image); ?>" >
								<input id="cat_img" type="file" name="image">
								<img class="icon_image"src="<?php echo e(url('/').'/'.$banner->banner_image); ?>" style="width:100px;height:60px"/>
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