<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Manage Offers</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="<?php echo e(url('/manage_offer')); ?>"><i class="bx bx-home-alt"></i></a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit Offers</li>
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
							<h5 class="mb-0 text-primary">Edit Offers</h5>
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
						<form class="row g-3" action="<?php echo e(url('update_deal')); ?>" method="post" enctype="multipart/form-data">
						<?php echo e(csrf_field()); ?>

							<input type="hidden" name="deal_id" value="<?php echo e($deal_p->deal_id); ?>" >
							<div class="col-md-6">
								<label for="inputState" class="form-label">Select Product</label>
								<select id="inputState" name="product_id" class="form-select">
									<option selected>Select Product</option>
									<?php if($product): ?>
										<?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($deals->id); ?>" <?php if($deals->id == $deal_p->product_id): ?> selected <?php endif; ?> ><?php echo e($deals->name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								</select>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Deal Price</label>
								<input type="text" class="form-control" name="deal_price" value="<?php echo e($deal_p->deal_price); ?>" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Valid From</label>
								<input type="datetime-local" class="form-control" name="valid_from" value="<?php echo e($deal_p->valid_from); ?>" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Valid To</label>
								<input type="datetime-local" class="form-control" name="valid_to" value="<?php echo e($deal_p->valid_to); ?>" required>
							</div>
							<div class="col-md-6">
								<label for="inputEmail" class="form-label">Product Offer Image</label><br>
								<input type="hidden" name="old_img" value="<?php echo e($deal_p->deal_img); ?>"> 
								<input id="cat_img" type="file" name="offer_image">
								<img class="icon_image"src="<?php echo e(url('/').'/'.$deal_p->deal_img); ?>" style="width:100px;height:60px"/>
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