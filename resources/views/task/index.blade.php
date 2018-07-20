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
					<button class="btn btn-info" type="button" data-toggle="modal" data-target="#newTask">Tambah Task</button>
					@include('task.index-modal')
				</div>
			</div>
		</div>

		<div class="col-md-12">
			<table class="table table-hover table-striped table-responsive">
				<thead>
					<tr>
						<td class="lb-table-task">No</td>
						<td class="lb-table-task">Nama</td>
						<td class="lb-table-task">Bulan</td>
						<td class="lb-table-task">Action</td>
					</tr>
				</thead>
				<tbody>
					@forelse($tasks as $key => $task)
					<tr>
						<td class="text-center">{{$key+1}}</td>
						<td class="text-center">{{$task->name}}</td>
						<td class="text-center">{{$task->month}}</td>
						<td class="">
							<a class="btn btn-sm btn-primary" href="{{route('task.show', $task->id)}}" title="" style="float: left">Lihat</a>
							{!! Form::open(['route' => ['task.destroy', $task->id], 'method' => 'delete']) !!}
							<button class="btn btn-sm btn-danger" type="submit">Delete</button>
							{!! Form::close() !!}
						</td>
					</tr>
					@empty
					<tr>
						<td class="lb-table-empty" colspan="4" >Belum ada data</td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>
		
	</div> {{-- end container --}}

	
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js" type="text/javascript" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>