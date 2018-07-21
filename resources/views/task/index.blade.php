@extends('layouts.dashboard')

@section('sub-header')
My Summary
@endsection

@push('css')
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

@section('content')


<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-body">
			<button class="btn btn-info" type="button" data-toggle="modal" data-target="#newTask">Tambah Task</button>
			@include('task._modal-index')
		</div>
	</div>
</div>

<div class="col-md-12">
	<table class="table table-hover table-striped table-responsive">
		<thead>
			<tr>
				<th class="text-center">#</th>
		        <th class="text-center">Period</th>
		        <th class="text-center">Total Task</th>
		        <th class="text-center">Total Time</th>
		        <th class="text-center">Grand Total</th>
		        <th class="text-center">Earnings</th>
		        <th class="text-center">Action</th>
			</tr>
		</thead>
		<tbody>
			@forelse($tasks as $key => $task)
			<tr>
				<td class="text-center">{{$key+1}}</td>
				<td class="text-center">{{$task->period_idn}}</td>
				<td class="text-center">{{$task->total_time}}</td>
				<td class="text-center">{{$task->total_task}}</td>
				<td class="text-center">{{$task->grand_total}}</td>
				<td class="text-center">${{$task->earning}}</td>
				<td class="">
					<a class="btn btn-sm btn-primary" href="{{route('task.show', $task->id)}}" title="" style="float: left">Show</a>
					{!! Form::open(['route' => ['task.destroy', $task->id], 'method' => 'delete']) !!}
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

@endsection

@push('css')
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush

@push('js')
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript">
		$( function() {
		    $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
		} );

			
	</script>
@endpush