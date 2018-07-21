@extends('layouts.dashboard')

@section('sub-header')
Category Edit
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="col-md-6">
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Category Name</th>
						</tr>
					</thead>
					<tbody>
						@forelse($categories as $num => $category)
						<tr>
							<td>{{$num+1}}</td>
							<td>{{$category->name}}}</td>
						</tr>
						@empty
						<tr>
							<td colspan="2">Belum Ada Category</td>
						</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-md-6">
			{!! Form::open(['route' => ['category.update', $category->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
			<div class="form-group">
	            <label class="control-label col-md-4" for="name">Category Name</label>
	            <div class="col-md-8">
	              {!! Form::text('name', $category->name, []) !!}
	            </div>
	        </div>

	        <div class="form-group">
	        	<div class="col-md-8 col-md-offset-4">
	        		<button class="btn btn-info" type="submit">Update</button>
	        	</div>
	        </div>

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection