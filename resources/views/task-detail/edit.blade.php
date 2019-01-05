@extends('layouts.dashboard')

@section('sub-header')
Edit
@endsection

@section('content')


<div class="panel panel-default">
	<div class="panel-body">
		{!! Form::open(['route' => ['task-detail.update', $taskDetail->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}
		<div class="form-group">
            <label class="control-label col-sm-2" for="date">Date</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="date" id="datepicker" value="{{$taskDetail->date}}" placeholder="Enter Time">
            </div>
        </div>
		<div class="form-group">
            <label class="control-label col-sm-2" for="category">Category</label>
            <div class="col-sm-10">
              {!! Form::select('category', $categories, $taskDetail->category_id, ['class' => 'form-control']) !!}
        	</div>
        </div>
         <div class="form-group">
            <label class="control-label col-sm-2" for="time">Time</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="time" id="time" value="{{$taskDetail->time}}" placeholder="Enter Time">
            </div>
         </div>
         <div class="form-group">
            <label class="control-label col-sm-2" for="mytask">Task</label>
            <div class="col-sm-10">
              	<input type="number" class="form-control" name="mytask" id="mytask" value="{{$taskDetail->mytask}}" 	placeholder="Enter Total Task">
            </div>
         </div>
         <div class="form-group">
            <label class="control-label col-sm-2" for="update"></label>
            <div class="col-sm-10">
              	<button class="btn btn-primary" type="submit">Update</button>
            	<a class="btn btn-default" href="{{route('task.show', $taskDetail->task_id)}}" title="">Back</a>
            </div>
         </div>
      {!! Form::close() !!}
		
	</div>
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