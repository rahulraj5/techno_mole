@include('layouts.header')	
<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Manage Vendor</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="{{url('/manage_vendor')}}"><i class="bx bx-home-alt"></i></a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit Vendor</li>
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
							<h5 class="mb-0 text-primary">Edit Vendor</h5>
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
						<form class="row g-3" action="{{url('update_store')}}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
							<input type="hidden" name="store_id" value="{{ $store->store_id }}">
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Store English name</label>
								<input type="text" class="form-control" value="{{ $store->store_name }}" name="store_name" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Store Arabic name</label>
								<input type="text" class="form-control" id="categoryname" name="arstore_name" value="{{ $store->ar_storename }}" style="text-align: right;" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Employee English name</label>
								<input type="text" class="form-control" value="{{ $store->employee_name }}" name="emp_name" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Employee Arabic name</label>
								<input type="text" class="form-control" id="categoryname" name="aremp_name" style="text-align: right;" value="{{ $store->ar_employee_name }}" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Phone number</label>
								<input type="text" class="form-control" value="{{ $store->phone_number }}" name="number" required>
							</div>
							<div class="col-md-6">
								<label for="inputState" class="form-label">City</label>
								<select id="inputState" name="city" class="form-select">
									<option value = "0" selected>Select City</option>
									@if($city)
										@foreach($city as $cat)
											<option value="{{$cat->city_name}}" <?php if($cat->city_name == $store->city){echo 'selected="selected"';}?>>{{$cat->city_name}}</option>
										@endforeach
									@endif
								</select>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Email</label>
								<input type="email" class="form-control" value="{{ $store->email }}" name="email" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Password</label>
								<input type="password" class="form-control" value="{{ $store->password }}" name="password" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Range</label>
								<input type="text" class="form-control" value="{{ $store->del_range }}" name="range" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Share</label><br>
								<input type="text" class="form-control" value="{{ $store->admin_share }}" name="share" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">English Address</label><br>
								<textarea id="mytextarea" name="address" cols="63" required>{{ $store->address }}</textarea>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Arabic Address</label><br>
								<textarea id="mytextarea" name="araddress" cols="63" style="text-align: right;" required>{{ $store->ar_address }}</textarea>
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