<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css">

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
</head>
<body>
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<button class="btn btn-info" type="button" data-toggle="modal" data-target="#newTaskDetail">Tambah detail</button>
					@include('task.show-modal')
				</div>
			</div>
		</div>

		<div class="col-md-12">
			<table class="table table-hover table-striped table-responsive">
				<thead>
					<tr>
						<td class="lb-table-task">No</td>
						<td class="lb-table-task">category</td>
						<td class="lb-table-task">time</td>
						<td class="lb-table-task">total task</td>
						<td class="lb-table-task">total time</td>
						<td class="lb-table-task">Action</td>
					</tr>
				</thead>
				<tbody>
					@forelse($details as $key => $detail)
					<tr>
						<td class="text-center">{{$key+1}}</td>
						<td class="text-center">{{$detail->human_category}}</td>
						<td class="text-center">{{$detail->time}}</td>
						<td class="text-center">{{$detail->total_task}}</td>
						<td class="text-center">{{$detail->total_time}}</td>
						<td class="text-center">
							<a class="btn btn-sm btn-warning" href="{{route('task.edit', $detail->id)}}" title="" style="float: left;">edit</a>
							{{-- <button class="btn btn-sm btn-warning" type="button" data-toggle="modal" data-target="#editTaskDetail">Edit</button> --}}
							{!! Form::open(['route' => ['task-detail.destroy', $detail->id], 'method' => 'delete' ]) !!}
							<button class="btn btn-sm btn-danger" type="submit">Delete</button>
							{!! Form::close() !!}
						</td>
					</tr>
					@empty
					<tr>
						<td class="lb-table-empty" colspan="6" >Belum ada data</td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>
		<div>
			<a class="btn btn-default" href="{{route('task.index')}}" title="">Back</a>
		</div>
		
	</div> {{-- end container --}}

	
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js" type="text/javascript" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>