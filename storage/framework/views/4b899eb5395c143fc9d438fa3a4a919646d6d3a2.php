<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Manage Vendor</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="<?php echo e(url('/manage_vendor')); ?>"><i class="bx bx-home-alt"></i></a></li>
						<li class="breadcrumb-item active" aria-current="page">Add Vendor</li>
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
							<h5 class="mb-0 text-primary">Add Vendor</h5>
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
						<form class="row g-3" action="<?php echo e(url('store_add')); ?>" method="post" enctype="multipart/form-data">
						<?php echo e(csrf_field()); ?>

							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Store English name</label>
								<input type="text" class="form-control" id="categoryname" name="store_name" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Store Arabic name</label>
								<input type="text" class="form-control" id="categoryname" name="arstore_name" style="text-align: right;" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Employee English name</label>
								<input type="text" class="form-control" id="categoryname" name="emp_name" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Employee Arabic name</label>
								<input type="text" class="form-control" id="categoryname" name="aremp_name" style="text-align: right;" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Phone number</label>
								<input type="text" class="form-control" id="categoryname" name="number" required>
							</div>
							<div class="col-md-6">
								<label for="inputState" class="form-label">City</label>
								<select id="inputState" name="city" class="form-select">
									<option value = "0" selected>Select City</option>
									<?php if($city): ?>
										<?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($cat->city_name); ?>"><?php echo e($cat->city_name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								</select>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Email</label>
								<input type="email" class="form-control" name="email" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Password</label>
								<input type="password" class="form-control" name="password" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Range</label>
								<input type="text" class="form-control" name="range" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Share</label><br>
								<input type="text" class="form-control" name="share" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">English Address</label><br>
								<textarea id="mytextarea" name="address" cols="63" required></textarea>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Arabic Address</label><br>
								<textarea id="mytextarea" name="araddress" cols="63" style="text-align: right;" required></textarea>
							</div>
							<div class="col-12">
								<button type="submit" class="btn btn-primary px-5">Submit</button>
							</div>
						</form>
					</div>
				</div>						
			</div>
		</div>
	</div>
</div>
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>