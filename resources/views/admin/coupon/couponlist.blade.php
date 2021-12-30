@include('layouts.header')	
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
<div class="page-wrapper">
	<div class="page-content">
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Manage Coupon</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
						</li>
					</ol>
				</nav>
			</div>
			<div class="ms-auto">
				<div class="btn-group">
					<a href="{{url('add_coupon')}}"><button type="button" class="btn btn-primary">Add Coupon</button></a>
				</div>
			</div>
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
								<th>Coupon English Name</th>
								<th>Coupon Arabic Name</th>
								<th>Coupon Code</th>
								<th>Coupon English Description</th>
								<th>Coupon Arabic Description</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Coupon Amount</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if($coupon)
								@foreach($coupon as $row)
								<tr>
									<td>{{$row->coupon_name}}</td>
									<td>{{$row->ar_couponname}}</td>
									<td>{{$row->coupon_code}}</td>
									<td>{{$row->coupon_description}}</td>
									<td>{{$row->ar_coupondescription}}</td>
									<td>{{$row->start_date}}</td>
									<td>{{$row->end_date}}</td>
									<td>{{$row->amount}}</td>
									<td class="action_btn"><center>
												@if($row->status == 1)
													<a href="{{url('coupon_enable/'.$row->coupon_id)}}"><i class="btn btn-success">Active</i></a> 
												@else
													<a href="{{url('coupon_disable/'.$row->coupon_id)}}"><i class="btn btn-danger" >Inactive</i></a> 
												@endif
											</center></td>
									<td class="action_btn">
										<a href="{{url('edit_coupon/'.$row->coupon_id)}}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="bx bxs-edit me-2"></i></a>  
										<a href="{{url('delete_coupon/'.$row->coupon_id)}}" title="Delete" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="lni lni-trash"></i></a>                                 
									</td>
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
	
