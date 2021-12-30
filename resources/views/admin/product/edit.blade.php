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
						<li class="breadcrumb-item active" aria-current="page">Edit Product</li>
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
							<h5 class="mb-0 text-primary">Edit Product</h5>
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
						<form class="row g-3" action="{{url('update_product')}}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
							<input type="hidden" name="product_id" value="{{ $product->id }}">
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">English Product Name</label>
								<input type="text" class="form-control" name="en_productname" value="{{ $product->name }}" required>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Arabic Product Name</label>
								<input type="text" class="form-control" name="ar_productname" style="text-align: right;" value="{{ $product->ar_name }}" required>
							</div>
							<div class="col-md-6">
								<label for="inputState" class="form-label">Product Category</label>
								<select name="category" id="categoryes" class="form-select">
									<option value = "0" selected>Select category</option>
									@if($category)
										@foreach($category as $cat)
											<option value="{{$cat->id}}" <?php if($cat->id == $product->cat_id){ echo "selected"; } ?>>{{$cat->name}}</option>
										@endforeach
									@endif
									
								</select>
							</div>
							<div class="col-md-6">
								<label for="inputState" class="form-label">Product Sub Category</label>
								<select name="sub_category" id="sub_catid" class="form-select">
									<option value = "{{$product->sub_id}}" selected>{{$product->sc_name}}</option>
								</select>
							</div>
							<!--<div class="col-md-6">-->
							<!--	<label for="inputLastName" class="form-label">Product MRP</label>-->
							<!--	<input type="number" class="form-control" id="categoryname" name="mrp" value="{{ $product->mrp_price }}" required>-->
							<!--</div>-->
							<!--<div class="col-md-6">-->
							<!--	<label for="inputLastName" class="form-label">Product Price</label>-->
							<!--	<input type="number" class="form-control" id="categoryname" name="price" value="{{ $product->purchase_price }}" required>-->
							<!--</div>-->
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">English Description</label><br>
								<textarea id="mytextarea" name="en_description" cols="60" required>{{ $product->description }}</textarea>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Arabic Description</label><br>
								<textarea id="mytextarea" name="ar_description" cols="60" style="text-align: right;" required>{{ $product->ar_description }}</textarea>
							</div>
							<div class="col-md-6">
								<label for="inputLastName" class="form-label">English Information</label><br>
								<textarea id="summernote1" name="eng_info">{{ $product->product_info }}</textarea>
							</div>
							
							<div class="col-md-6">
							<label for="inputLastName" class="form-label">Arabic Information</label><br>
							<textarea id="summernote2" name="ar_info" style="text-align: right; margin-left: auto; background-color: transparent;">{{ $product->ar_product_info }}</textarea>
							</div>
							
							<div class="col-md-6">
								<label for="inputEmail" class="form-label">Product Main Image</label><br>
								<input type="hidden" name="oldmain_img" value="{{ $product->featured_img }}"> 
								<input id="cat_img" type="file" name="promain_image">
								<img class="icon_image"src="{{ url('/').'/'.$product->featured_img }}" style="width:100px;height:60px"/>
							</div>
							<div class="col-md-6">
								<label for="inputEmail" class="form-label">Product Other Image</label><br>
								<input type="hidden" name="old_img" value="{{ $product->photos }}"> 
								<input id="cat_img" type="file" name="product_image">
								<img class="icon_image"src="{{ url('/').'/'.$product->photos }}" style="width:100px;height:60px"/>
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

<script type='text/javascript'>
    jQuery(document).ready(function(){
        $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
    var base_url = '<?php echo url('/'); ?>';
    jQuery('#categoryes').change(function(){ 
        var cid = $(this).val();
        var token = $('input[name="_token"]').val();
        jQuery.ajax({
          url:base_url+'/get_subcategory',
          method: 'POST',
          data:{catid:cid,_token:token},
          success: function(result){
            $('#sub_catid').empty();
            $("#sub_catid").append('<option value=""> Select Subcategory </option>');
            if(result){
                $.each(result,function(i,items){
                     $('#sub_catid').append($("<option/>", {
                       value: items.id,
                       text: items.name
                    }));
                });
            }
          }});
    }); 
});  
</script>