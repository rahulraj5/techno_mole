<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Manage Profile</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="<?php echo e(url('/home')); ?>"><i class="bx bx-home-alt"></i></a></li>
						<li class="breadcrumb-item active" aria-current="page">Update Profile</li>
					</ol>
				</nav>
			</div>
		</div>			
		<div class="row">
			<div class="col-xl-12 mx-auto">
				<hr/>
				<div class="card border-top border-0 border-4 border-primary">
					<div class="card-body p-5">
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
						<form class="row g-3" action="<?php echo e(url('profile_update')); ?>" method="post" enctype="multipart/form-data">
						<?php echo e(csrf_field()); ?>

							<input type="hidden" name="user_id" value="<?php echo e($users->id); ?>">
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">English Name</label>
								<input type="text" class="form-control" name="en_name" value="<?php echo e($users->name); ?>" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Arabic Name</label>
								<input type="text" class="form-control" name="ar_name" value="<?php echo e($users->ar_name); ?>" style="text-align: right;" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Email</label>
								<input type="email" class="form-control" name="email" value="<?php echo e($users->email); ?>" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Password</label>
								<input type="password" class="form-control" name="password" placeholder="Enter updated password" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Phone</label>
								<input type="text" class="form-control" name="phone" value="<?php echo e($users->phone_no); ?>" required>
							</div>
							<!--<div class="col-md-6">
								<label for="inputState" class="form-label">Gender</label>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="gender" value="Male" id="flexRadioDefault1" <?php if($users->gender == "Male"){echo 'checked';}?>>
									<label class="form-check-label" for="flexRadioDefault1">Male</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="gender" value="Female" id="flexRadioDefault1" <?php if($users->gender == "Female"){echo 'checked';}?>>
									<label class="form-check-label" for="flexRadioDefault1">Female</label>
								</div>
							</div>-->
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Profile Image</label>
								<input type="hidden" name="old_pro_image" value="<?php echo e($users->image); ?>">
								<input id="cat_img" type="file" name="pro_image"><br>
								<img class="icon_image"src="<?php echo e(url('/').'/'.$users->image); ?>" style="width:100px;height:60px"/>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Logo</label><br>
								<input type="hidden" name="old_logo_image" value="<?php echo e($users->logo); ?>">
								<input id="cat_img" type="file" name="logo_image"><br>
								<img class="icon_image"src="<?php echo e(url('/').'/'.$users->logo); ?>" style="width:100px;height:60px"/>
							</div>
							
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Fev Icon</label><br>
								<input type="hidden" name="old_fev_image" value="<?php echo e($users->fev_icon); ?>">
								<input id="cat_img" type="file" name="fev_image"><br>
								<img class="icon_image"src="<?php echo e(url('/').'/'.$users->fev_icon); ?>" style="width:100px;height:60px"/>
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