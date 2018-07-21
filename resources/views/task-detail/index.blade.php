@extends('layouts.dashboard')

@section('sub-header')
My Daily Task
@endsection

@section('content')

<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-body">
			<button class="btn btn-info" type="button" data-toggle="modal" data-target="#newTaskDetail">Tambah detail</button>
			@include('task-detail._modal-index')
		</div>
	</div>
</div>

<div class="col-md-12">
	<table class="table table-hover table-striped table-responsive">
		<thead>
			<tr>
				<td class="lb-table-task">No</td>
				<td class="lb-table-task">Date</td>
				<td class="lb-table-task">Category</td>
				<td class="lb-table-task">Time</td>
				<td class="lb-table-task">Total Task</td>
				<td class="lb-table-task">Total Time</td>
				<td class="lb-table-task">Action</td>
			</tr>
		</thead>
		<tbody>
			@forelse($details as $key => $detail)
			<tr>
				<td class="text-center">{{$key+1}}</td>
				<td class="text-center">{{$detail->date_idn}}</td>
				<td class="text-center">{{$detail->category->name}}</td>
				<td class="text-center">{{$detail->time}}</td>
				<td class="text-center">{{$detail->mytask}}</td>
				<td class="text-center">{{$detail->sub_total}}</td>
				<td class="text-center">
					<a class="btn btn-sm btn-warning" href="{{route('task-detail.edit', $detail->id)}}" title="" style="float: left;">edit</a>
					{{-- <button class="btn btn-sm btn-warning" type="button" data-toggle="modal" data-target="#editTaskDetail">Edit</button> --}}
					{!! Form::open(['route' => ['task-detail.destroy', $detail->id], 'method' => 'delete' ]) !!}
					<button class="btn btn-sm btn-danger" type="submit">Delete</button>
					{!! Form::close() !!}
				</td>
			</tr>
			@empty
			<tr>
				<td class="lb-table-empty" colspan="7" >Belum ada data</td>
			</tr>
			@endforelse
		</tbody>
	</table>
</div>
<div>
	<a class="btn btn-default" href="{{route('task-detail.index')}}" title="">Back</a>
</div>

@endsection

@push('css')
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<style type="text/css" media="screen">
		.lb-table-task{
			text-align: center;
			font-weight: bold;
		}
		.lb-table-empty{
			font-weight: bold;
			font-size: 20px;
			text-align: center;
		}
	</style>
@endpush

@push('js')
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript">
		$( function() {
		    $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
		} );

			
	</script>
@endpush