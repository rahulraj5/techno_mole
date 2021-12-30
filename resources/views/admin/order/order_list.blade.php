@include('layouts.header')	
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
<div class="page-wrapper">
	<div class="page-content">
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Manage Order</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
						</li>
					</ol>
				</nav>
			</div>
		<!--	<div class="ms-auto">
				<div class="btn-group">
					<a href="{{url('add_coupon')}}"><button type="button" class="btn btn-primary">Add Coupon</button></a>
				</div>
			</div>-->
		</div>
		
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
		
		<div class="card">
			<div class="card-body">
					
				<div class="table-responsive">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>User Name</th>
								<th>Address</th>
								<th>Total Price</th>
								<th>Product MRP</th>
								<th>Payment Method</th>
								<th>Delivery Charge</th>
								<th>Coupon Discount</th>
								<th>Order Date</th>
								<th>Delivery Date</th>
								<!--<th>Action</th>-->
							</tr>
						</thead>
						<tbody>
							@if($orders)
								@foreach($orders as $row)
								<tr>
									<td>{{$row->user_id}}</td>
									<td>{{$row->address_id}}</td>
									<td>{{$row->total_price}}</td>
									<td>{{$row->total_products_mrp}}</td>
									<td>{{$row->payment_method}}</td>
									<td>{{$row->delivery_charge}}</td>
									<td>{{$row->coupon_discount	}}</td>
									<td>{{$row->order_date}}</td>
									<td>{{$row->delivery_date}}</td>
									<!--<td class="action_btn">
										<a href="{{url('edit_coupon/'.$row->coupon_id)}}"><i class="fadeIn animated bx bx-edit"></i></a>  
										<a href="{{url('delete_coupon/'.$row->coupon_id)}}" title="Delete"><i class="lni lni-trash"></i></a>                                 
									</td>-->
								</tr>
								@endforeach
							@endif
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@include('layouts.footer')
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
		<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
	<!--plugins-->
	
