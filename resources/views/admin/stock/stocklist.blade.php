@include('layouts.header')	
<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<!--end breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Stock List</div>
					
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
										<th>Update Stock</th> 
										
									</tr>
								</thead>
								<tbody>
								@if($store)
									@foreach($store as $row)
	    
									<tr>
										<td>{{$row->name}}</td>
										<td>
											<form class="row g-3" action="{{url('stock_update')}}" method="post">
											{{ csrf_field() }}
											<div class="col-md-8">
												<input type="hidden" name="varient_id" value="{{ $row->varient_id }}">
												<input type="text" class="form-control" name="stock" <?php if($row->stock == ""){ ?> value="0" <?php }else{ ?> value="{{$row->stock}}" <?php }  ?> required>
											</div>
											<div class="col-md-2">
												<button type="submit" class="btn btn-primary px-5"  class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Stock"><i class="fadeIn animated bx bx-plus"></i></button>
											</div>
											</form>
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
