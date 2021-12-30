<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Manage Category</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="<?php echo e(url('/manage_category')); ?>"><i class="bx bx-home-alt"></i></a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit Category</li>
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
							<h5 class="mb-0 text-primary">Edit Category</h5>
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
						<form class="row g-3" action="<?php echo e(url('update_category')); ?>" method="post" enctype="multipart/form-data">
						<?php echo e(csrf_field()); ?>

							<input type="hidden" name="category_id" value="<?php echo e($cat->id); ?>">
						
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">English Category Name</label>
								<input type="text" class="form-control"  name="encat_name" value="<?php echo e($cat->name); ?>">
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Arabic Category Name</label>
								<input type="text" class="form-control"  name="arcat_name" value="<?php echo e($cat->ar_name); ?>" style="text-align: right;">
							</div>
							<div class="col-md-6">
								<label for="inputEmail" class="form-label">Image</label><br>
								<input type="hidden" name="old_img" value="<?php echo e($cat->image); ?>">
								<input id="cat_img" type="file" name="cat_image">
								<?php if($cat->image): ?>
									<img src="<?php echo e(url('/').'/'.$cat->image); ?>" class="img-responsive img-circle img-1" style="width:100px;height:60px">
								<?php endif; ?>
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