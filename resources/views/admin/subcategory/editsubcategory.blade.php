@include('layouts.header')	
<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Manage Sub Category</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="{{url('/manage_subcategory')}}"><i class="bx bx-home-alt"></i></a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit Sub Category</li>
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
							<h5 class="mb-0 text-primary">Edit Sub Category</h5>
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
						<form class="row g-3" action="{{url('update_subcategory')}}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
							<input type="hidden" name="subcategory_id" value="{{ $subcat->id }}">
						
							<div class="col-md-6">
								<label for="inputState" class="form-label">Category Name</label>
								<select name="category" class="form-select">
									<option value = "0" selected>Select category</option>
									@if($category)
										@foreach($category as $cat)
											<option value="{{$cat->id}}" <?php if($cat->id == $subcat->category_id){ echo 'selected'; } ?> </option>{{$cat->name}}</option>
										@endforeach
									@endif
									
								</select>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Image</label>
								<input type="hidden" name="old_img" value="{{ $subcat->image }}">
								<input id="sub_cat_image" type="file" name="sub_cat_image">
								@if($subcat->image)
									<img src="{{url('/').'/'.$subcat->image }}" class="img-responsive img-circle img-1" style="width:100px;height:60px">
								@endif
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">English Sub Category Name</label>
								<input type="text" class="form-control"  name="ensubcat_name" value="{{ $subcat->name }}" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Arabic Sub Category Name</label>
								<input type="text" class="form-control"  name="arsubcat_name" style="text-align: right;" value="{{ $subcat->ar_name }}" required>
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
@include('layouts.footer')