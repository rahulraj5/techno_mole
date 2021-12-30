@include('layouts.header')	
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
<div class="page-wrapper">
	<div class="page-content">
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Manage Primary Banner</div>
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
					<a href="{{url('add_primary_banner')}}"><button type="button" class="btn btn-primary">Add Banner</button></a>
					
				</div>
			</div>
		</div>		
		
		<div class="card">
			<div class="card-body">
					
				<div class="table-responsive">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>Slider Name</th>
								<th>Banner Image</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if($banner)
								@foreach($banner as $row)
								<tr>
									<td>{{$row->banner_name}}</td>
									<td><img class="icon_image"src="{{ url('/'.$row->banner_image) }}" style="width:100px;height:60px"/></td>
									<td class="action_btn"><center>
												@if($row->status == 1)
													<a href="{{url('pbanner_enable/'.$row->banner_id)}}"><i class="btn btn-success">Active</i></a> 
												@else
													<a href="{{url('pbanner_disable/'.$row->banner_id)}}"><i class="btn btn-danger" >Inactive</i></a> 
												@endif
											</center></td>
									<td class="action_btn">
										<a href="{{url('edit_primary_banner/'.$row->banner_id)}}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fadeIn animated bx bx-edit"></i></a>  
										<a href="{{url('delete_primary_banner/'.$row->banner_id)}}" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="lni lni-trash"></i></a>                                 
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
	
