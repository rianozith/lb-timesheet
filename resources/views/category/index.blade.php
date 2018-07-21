@extends('layouts.dashboard')

@section('sub-header')
Category
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
								<button class="btn btn-sm btn-danger" type="submiy">Delete</button>

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

