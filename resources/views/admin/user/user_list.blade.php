@include('layouts.header')	
<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">User list</h6>
				<hr/>
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
										<th>User English Name</th>
										<th>User Arabic Name</th>
										<th>Eser Email</th>
										<th>Phone</th>
										<th>Device Type</th>
										<th>Verification Status</th>
										<th>Status</th>
										<th>Registration Date</th>
									</tr>
								</thead>
								<tbody>
                                    @if($users)
										@foreach($users as $row)
										<tr>
											<td>{{$row->user_name}}</td>
											<td>{{$row->ar_username}}</td>
											<td>{{$row->user_email}}</td>
											<td>{{$row->user_phone}}</td>
											<td>{{$row->device_type}}</td>
										@if($row->is_verified == 1)
											<td><center><span class="badge bg-success" center>Verified</span></center></td>
										@else
											<td><center><span class="badge bg-danger" center>Non-Verified</span></center></td>
										@endif
											<td class="action_btn"><center>
												@if($row->block == 1)
													<a href="{{url('user_unblock/'.$row->user_id)}}"><i class="btn btn-success">Active</i></a> 
												@else
													<a href="{{url('user_block/'.$row->user_id)}}"><i class="btn btn-danger" >Inactive</i></a> 
												@endif
											</center></td>
											<td>{{$row->reg_date}}</td>
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
	<!--plugins-->
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
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
