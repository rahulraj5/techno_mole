<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Manage Product</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="<?php echo e(url('/manage_product')); ?>"><i class="bx bx-home-alt"></i></a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit Product</li>
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
							<h5 class="mb-0 text-primary">Edit Product</h5>
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
						<form class="row g-3" action="<?php echo e(url('update_product')); ?>" method="post" enctype="multipart/form-data">
						<?php echo e(csrf_field()); ?>

							<input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">English Product Name</label>
								<input type="text" class="form-control" name="en_productname" value="<?php echo e($product->name); ?>" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Arabic Product Name</label>
								<input type="text" class="form-control" name="ar_productname" style="text-align: right;" value="<?php echo e($product->ar_name); ?>" required>
							</div>
							<div class="col-md-6">
								<label for="inputState" class="form-label">Product Category</label>
								<select name="category" id="categoryes" class="form-select">
									<option value = "0" selected>Select category</option>
									<?php if($category): ?>
										<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($cat->id); ?>" <?php if($cat->id == $product->cat_id){ echo "selected"; } ?>><?php echo e($cat->name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
									
								</select>
							</div>
							<div class="col-md-6">
								<label for="inputState" class="form-label">Product Sub Category</label>
								<select name="sub_category" id="sub_catid" class="form-select">
									<option value = "<?php echo e($product->sub_id); ?>" selected><?php echo e($product->sc_name); ?></option>
								</select>
							</div>
							<!--<div class="col-md-6">-->
							<!--	<label for="inputLastName" class="form-label">Product MRP</label>-->
							<!--	<input type="number" class="form-control" id="categoryname" name="mrp" value="<?php echo e($product->mrp_price); ?>" required>-->
							<!--</div>-->
							<!--<div class="col-md-6">-->
							<!--	<label for="inputLastName" class="form-label">Product Price</label>-->
							<!--	<input type="number" class="form-control" id="categoryname" name="price" value="<?php echo e($product->purchase_price); ?>" required>-->
							<!--</div>-->
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">English Description</label><br>
								<textarea id="mytextarea" name="en_description" cols="60" required><?php echo e($product->description); ?></textarea>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Arabic Description</label><br>
								<textarea id="mytextarea" name="ar_description" cols="60" style="text-align: right;" required><?php echo e($product->ar_description); ?></textarea>
							</div>
							<div class="col-md-6">
								<label for="inputEmail" class="form-label">Product Main Image</label><br>
								<input type="hidden" name="oldmain_img" value="<?php echo e($product->featured_img); ?>"> 
								<input id="cat_img" type="file" name="promain_image">
								<img class="icon_image"src="<?php echo e(url('/').'/'.$product->featured_img); ?>" style="width:100px;height:60px"/>
							</div>
							<div class="col-md-6">
								<label for="inputEmail" class="form-label">Product Other Image</label><br>
								<input type="hidden" name="old_img" value="<?php echo e($product->photos); ?>"> 
								<input id="cat_img" type="file" name="product_image[]" multiple>
								<img class="icon_image"src="<?php echo e(url('/').'/'.$product->photos); ?>" style="width:100px;height:60px"/>
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

<script type='text/javascript'>
    jQuery(document).ready(function(){
        $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
    var base_url = '<?php echo url('/'); ?>';
    jQuery('#categoryes').change(function(){ 
        var cid = $(this).val();
        var token = $('input[name="_token"]').val();
        jQuery.ajax({
          url:base_url+'/get_subcategory',
          method: 'POST',
          data:{catid:cid,_token:token},
          success: function(result){
            $('#sub_catid').empty();
            $("#sub_catid").append('<option value=""> Select Subcategory </option>');
            if(result){
                $.each(result,function(i,items){
                     $('#sub_catid').append($("<option/>", {
                       value: items.id,
                       text: items.name
                    }));
                });
            }
          }});
    }); 
});  
</script>