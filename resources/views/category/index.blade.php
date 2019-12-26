@extends('layouts.dashboard')

@section('sub-header')
Category
@endsection

@section('export')
<!-- <button class="btn btn-sm btn-info">Export</button> -->
<a href="/category_export_excel" class="btn btn-info btn-sm" target="_blank">EXPORT TO EXCEL</a>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="col-md-6">
			{!! Form::open(['route' => 'category.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
			<div class="form-group">
	            <label class="control-label col-md-4" for="name">Category Name</label>
	            <div class="col-md-8">
	              {{-- <input type="text" name="name" placeholder="Input Category Name"> --}}
	              @include('category._form')
	              
	            </div>
	        </div>

	        <div class="form-group">
	        	<div class="col-md-8 col-md-offset-4">
	        		<button class="btn btn-primary" type="submit">Save</button>
	        	</div>
	        </div>

			{!! Form::close() !!}
		</div>
		<div class="col-md-6">
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Category Name</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						@forelse($categories as $num => $category)
						<tr>
							<td class="text-center">{{$num+1}}</td>
							<td class="text-center">{{$category->name}}</td>
							<td class="text-center">
								{!! Form::open(['route' => ['category.destroy', $category->id], 'method' => 'delete']) !!}
								<a class="btn btn-sm btn-warning" href="{{route('category.edit', $category->id)}}" title="">Edit</a>
								<button class="btn btn-sm btn-danger delete-category" category-id="{{$category->id}}" type="submit">Delete</button>

								{!! Form::close() !!}
							</td>
						</tr>
						@empty
						<tr>
							<td class="text-center" colspan="3">Belum Ada Category</td>
						</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection


@push('js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
	
	<script type="text/javascript">
		$('.delete-category').click(function(){
			event.preventDefault();
			// var form = event.target.form;
			var categoryId = $(this).attr("category-id");
			var form = event.target.form; // storing the form
			console.log(form);
			deleteCategory(form);
		});

		function deleteCategory(form, categoryId){
			swal({
				title: "Are you sure?", 
				text: "Are you sure that you want to delete this?", 
				icon: "warning",
				buttons: true,
				buttons: [true, 'Yes, delete it!'],
				dangerMode: true,
			}).then((willDelete) => {
				if (willDelete) {
			    form.submit();
			  } else {
			    swal("Action canceled!");
			  }
			});
		}	
	</script>
@endpush
