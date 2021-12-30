@include('layouts.header')	
<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Manage Product</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="{{url('/manage_product')}}"><i class="bx bx-home-alt"></i></a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit Varient</li>
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
							<h5 class="mb-0 text-primary">Edit Varient</h5>
						</div>
						<hr>
						@if (session()->has('success'))
							<div class="alert alert-success">
								@if(is_array(session()->get('success')))
									<ul>
										@foreach (session()->get('success') as $message)
											<li>{{ $message }}</li>
										@endforeach
									</ul>
								@else
										{{ session()->get('success') }}
								@endif
							</div>
						@endif
						@if (count($errors) > 0)
							@if($errors->any())
								<div class="alert alert-danger" role="alert">
									{{$errors->first()}}
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
									</button>
								</div>
							@endif
						@endif
						<form class="row g-3" action="{{url('update_varient')}}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
							<input type="hidden" name="vid" value="{{ $varient_id }}" >
							<input type="hidden" name="pid" value="{{ $product->product_id }}" >
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">MRP</label>
								<input type="text" class="form-control" step="0.01" id="categoryname" name="mrp" value="{{ $product->mrp }}" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Price</label>
								<input type="text" class="form-control" step="0.01" id="categoryname" name="price" value="{{ $product->price }}" required>
							</div>
							<?php $colors = explode(',',$product->color);  ?>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Color</label><br>
								<input class="form-check-input" type="checkbox" value="1" name="color[]" id="flexCheckDefault" <?php foreach($colors as $c){ if($c == 1){echo 'checked';}}?>>
								<label class="form-check-label" for="flexCheckDefault">Red</label>
								<input class="form-check-input" type="checkbox" value="2" name="color[]" id="flexCheckDefault"<?php foreach($colors as $c){ if($c == 2){echo 'checked';}}?>>
								<label class="form-check-label" for="flexCheckDefault">White</label>
								<input class="form-check-input" type="checkbox" value="3" name="color[]" id="flexCheckDefault" <?php foreach($colors as $c){ if($c == 3){echo 'checked';}}?>>
								<label class="form-check-label" for="flexCheckDefault">Blue</label>
								<input class="form-check-input" type="checkbox" value="4" name="color[]" id="flexCheckDefault" <?php foreach($colors as $c){ if($c == 4){echo 'checked';}}?>>
								<label class="form-check-label" for="flexCheckDefault">Black</label>
							</div>
						<?php $sizes = explode(',',$product->size);  ?>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Size</label><br>
								<input class="form-check-input" type="checkbox" value="1" name="size[]" id="flexCheckDefault" <?php foreach($sizes as $c){ if($c == 1){echo 'checked';}}?>>
								<label class="form-check-label" for="flexCheckDefault">L</label>
								<input class="form-check-input" type="checkbox" value="2" name="size[]" id="flexCheckDefault" <?php foreach($sizes as $c){ if($c == 2){echo 'checked';}}?>>
								<label class="form-check-label" for="flexCheckDefault">XL</label>
								<input class="form-check-input" type="checkbox" value="3" name="size[]" id="flexCheckDefault" <?php foreach($sizes as $c){ if($c == 3){echo 'checked';}}?>>
								<label class="form-check-label" for="flexCheckDefault">XXL</label>
								<input class="form-check-input" type="checkbox" value="4" name="size[]" id="flexCheckDefault" <?php foreach($sizes as $c){ if($c == 4){echo 'checked';}}?>>
								<label class="form-check-label" for="flexCheckDefault">M</label>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">English Description</label><br>
								<textarea id="mytextarea" name="endescription" cols="64" required>{{ $product->en_description }}</textarea>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Arabic Description</label><br>
								<textarea id="mytextarea" name="ardescription" cols="64" style="text-align: right;" required>{{ $product->ar_description }}</textarea>
							</div>
							<div class="col-md-6">
								<label for="inputEmail" class="form-label">Varient Image</label><br>
								<input id="cat_img" type="file" name="varient_image">
								<img class="icon_image"src="{{url('/').'/'.$product->varient_image }}" style="width:100px;height:60px"/>
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
@include('layouts.footer')