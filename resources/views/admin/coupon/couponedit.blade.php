@include('layouts.header')
	
<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Manage Coupon</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="{{url('/manage_coupon')}}"><i class="bx bx-home-alt"></i></a></li>
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
						<form class="row g-3" action="{{url('update_coupon')}}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
							<input type="hidden" name="coupon_id" value="{{ $coupon_id }}">
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Coupon English Name</label>
								<input type="text" class="form-control" name="coupon_name" value="{{ $coupon->coupon_name }}" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Coupon Arabic Name</label>
								<input type="text" class="form-control" name="arcoupon_name" style="text-align: right;" value="{{ $coupon->ar_couponname }}" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Coupon Code</label>
								<input type="text" class="form-control" name="coupon_code" value="{{ $coupon->coupon_code }}" required>
							</div>
							
							<div class="col-md-6">
								<label class="form-label">Valid From</label>
								<input class="result form-control" type="text" name="valid_from" value="{{ $coupon->start_date }}" id="date-time-from1"  data-dtp="dtp_nr8Un" required>
							</div>
							
							<div class="col-md-6">
								<label class="form-label">Valid To</label>
								<input class="result form-control" type="text" name="valid_to" value="{{ $coupon->end_date }}" id="date-time-to1" data-dtp="dtp_nr8Un" required>
							</div>
							
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Cart value</label>
								<input type="text" class="form-control" name="cart_value" value="{{ $coupon->cart_value }}" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Coupon Restriction</label>
								<input type="number" class="form-control" name="restriction" value="{{ $coupon->uses_restriction }}" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Coupon Type</label>
								<input type="text" class="form-control" name="coupon_type" value="{{ $coupon->type }}" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Coupon English Description</label><br>
								<textarea id="mytextarea" name="coupon_desc" cols="50" required>{{ $coupon->coupon_description }}</textarea>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Coupon Arabic Description</label><br>
								<textarea id="mytextarea" name="arcoupon_desc" cols="64" style="text-align: right;" required>{{ $coupon->ar_coupondescription }}</textarea>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Coupon Image</label><br>
								<input id="cat_img" type="hidden" name="old_coupon_image" value="{{ $coupon->coupon_img }}">
								<input id="cat_img" type="file" name="coupon_image">
								<img class="icon_image" src="{{ url('/').'/'.$coupon->coupon_img }}" style="width:100px;height:60px"/>
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