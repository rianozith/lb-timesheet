@extends('layouts.dashboard')

@section('sub-header')
My Summary
@endsection

@section('export')
<a href="/task_export_excel" class="btn btn-info btn-sm" target="_blank">EXPORT TO EXCEL</a>
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
<style type="text/css" media="screen">
	
</style>
@endpush

@section('content')


<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-body">
			<button class="btn btn-info pull-right" type="button" data-toggle="modal" data-target="#newTask">Tambah Task</button>
			@include('task._modal-index')
		</div>
	</div>
</div>

<div class="col-md-12 col-xs-12">
	<table class="table table-hover table-striped table-responsive">
		<thead>
			<tr>
				<th class="text-center">#</th>
		        <th class="text-center">Period</th>
		        <th class="text-center hidden-xs">Total Task</th>
		        <th class="text-center hidden-xs">Total Time</th>
		        <th class="text-center hidden-xs">Grand Total</th>
		        <th class="text-center">Earnings</th>
		        <th class="text-center">Action</th>
			</tr>
		</thead>
		<tbody>
			@forelse($tasks as $key => $task)
			<tr>
				<td class="text-center">{{$key+1}}</td>
				<td class="text-center">{{$task->period_idn}}</td>
				<td class="text-center hidden-xs">{{$task->total_time}}</td>
				<td class="text-center hidden-xs">{{$task->total_task}}</td>
				<td class="text-center hidden-xs">{{$task->grand_total}}</td>
				<td class="text-center">${{$task->earning}}</td>
				<td class="text-center">
					
					{!! Form::open(['route' => ['task.destroy', $task->id], 'method' => 'delete']) !!}
					<a class="btn btn-sm btn-primary {{ count($task->details) < 1 ? '' : 'button-position'}}" href="{{route('task.show', $task->id)}}" title="" style="">Details</a>
					@if(count($task->details) < 1)
					<button class="btn btn-sm btn-danger delete-task" task-id="{{$task->id}}" type="submit">Delete</button>
					@endif
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
	<style type="text/css" media="screen">
		.ui-datepicker-calendar {
		   display: none;
	   }
	   .button-position{
	   	margin-left: -60px
	   }
	</style>
@endpush

@push('js')

	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript">
		$( function() {
		    $( "#datepicker" ).datepicker({
		    	changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'MM yy',
            onClose: function(dateText, inst) { 
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }
		    });
		} );
			
	</script>
	<script type="text/javascript">
		$('button.delete-task').click(function() {
		   event.preventDefault(); // prevent form submit
		   var taskId = $(this).attr("task-id");
			var form = event.target.form; // storing the form
			// var form = document.forms["deleteTaskForm"]; // storing the form
		    deleteTask(taskId, form);
		});
		
		function deleteTask(taskId, form) {

		    swal({
		      title: "Are you sure?", 
		      text: "Are you sure that you want to delete this?", 
		      icon: "warning",
		      buttons: true,
		      buttons: [true, 'Yes, delete it!'],
		      dangerMode: true,
		    })
		    .then((willDelete) => {
			  if (willDelete) {
			    // swal("Poof! Your record has been deleted!", {
			    //   icon: "success",
			    // });
			    form.submit();
			  } else {
			    swal("Your record is safe!");
			  }
			});
		}	
	</script>
@endpush