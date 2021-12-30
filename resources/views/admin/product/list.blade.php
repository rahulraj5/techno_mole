@include('layouts.header')	
<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<div class="page-wrapper">
	<div class="page-content">
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Manage Product</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
						</li>
					</ol>
				</nav>
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
								<th>Product Name</th>
								<th>Product Arabic Name</th>
								<th>Category</th>
								<th>Image</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if($product)
								@foreach($product as $row)
								<tr>
									<td>{{$row->name}}</td>
									<td>{{$row->ar_name}}</td>
									<td>{{$row->cat_name}}</td>
									<td><img class="icon_image"src="{{ url('/'.$row->featured_img) }}" style="width:100px;height:60px;border-radius: 10px;"/></td>
									<td class="action_btn"><center>
												@if($row->status == 1)
													<a href="{{url('product_enable/'.$row->id)}}"><i class="btn btn-success">Active</i></a> 
												@else
													<a href="{{url('product_disable/'.$row->id)}}"><i class="btn btn-danger" >Inactive</i></a> 
												@endif
											</center></td>
									<td class="action_btn">
										<a href="{{url('edit_product/'.$row->id)}}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fadeIn animated bx bx-edit"></i></a> 
										<a href="{{url('manage_varient/'.$row->id)}}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Varient"><i class="fadeIn animated bx bx-layer"></i></a> 
										<a href="{{url('delete_product/'.$row->id)}}" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="lni lni-trash"></i></a>                                 
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
