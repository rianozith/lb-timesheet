<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-body">
				{!! Form::open(['route' => ['task-detail.update', $taskDetail->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}
					<div class="form-group">
		            <label class="control-label col-sm-2" for="category">Category</label>
		            <div class="col-sm-10">
		              {!! Form::select('category', $categories, $taskDetail->category_id, ['class' => 'form-control']) !!}
		            </div>
		         </div>
		         <div class="form-group">
		            <label class="control-label col-sm-2" for="time">Time</label>
		            <div class="col-sm-10">
		              <input type="number" class="form-control" name="time" id="time" value="{{$taskDetail->time}}" placeholder="Enter Time">
		            </div>
		         </div>
		         <div class="form-group">
		            <label class="control-label col-sm-2" for="total_task">Total Task</label>
		            <div class="col-sm-10">
		              	<input type="number" class="form-control" name="total_task" id="total_task" value="{{$taskDetail->total_task}}" 	placeholder="Enter Total Task">
		            </div>
		         </div>
		         <div class="form-group">
		            <label class="control-label col-sm-2" for="total_task"></label>
		            <div class="col-sm-10">
		              	<button class="btn btn-primary" type="submit">Update</button>
		            </div>
		         </div>
		      {!! Form::close() !!}
				
			</div>
		</div>
	</div>
</body>
</html>