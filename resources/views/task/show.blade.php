@extends('layouts.dashboard')

@section('sub-header')
	{{ $task->period_idn }} 
@endsection

@section('content')

<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-body">
			<button class="btn btn-info" type="button" data-toggle="modal" data-target="#newTaskDetail">Tambah detail</button>
			@include('task._modal-show')
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
			@php $aDate = []; $num = 1; $row = []; $daily_time=0; $daily_task=0; $daily_total=0; @endphp
			@forelse($groupDate as $key => $details)
				@foreach($details as $detail)
				@php 
				$daily_time += $detail->time;
				$daily_task += $detail->mytask;
				$daily_total += $detail->sub_total;
				@endphp
				<tr>
					<td class="text-center">{{!in_array($detail->date, $aDate) ? $num : ''}}</td>
					<td class="text-center" style="{{\Carbon\Carbon::parse($detail->date)->format('F') == \Carbon\Carbon::parse($task->period)->format('F') ? '' : 'color:red'}}">
						@if(!in_array($detail->date, $aDate))
							{{ $detail->date_idn}}
						    @php $aDate[] = $detail->date; $num = $num+1; $row[] = $key;@endphp
						@endif
					</td>
					<td class="text-center">{{$detail->category->name}}</td>
					<td class="text-center">{{$detail->time}}</td>
					<td class="text-center">{{$detail->mytask}}</td>
					<td class="text-center">{{$detail->sub_total}}</td>
					<td class="text-center">
						{!! Form::open(['route' => ['task-detail.destroy', $detail->id], 'method' => 'delete', 'name' => 'deleteDetailForm' ]) !!}
						<a class="btn btn-sm btn-warning" href="{{route('task-detail.edit', $detail->id)}}" title="" style="">edit</a>
						<button class="btn btn-sm btn-danger delete-detail" detail-id="{{$detail->id}}" type="submit">Delete</button>
						{!! Form::close() !!}
					</td>
				</tr>
				
				@endforeach
				<tr style="background-color: lightgreen">
					<td colspan="3"></td>
					<td class="text-center" style="font-weight: bold;">{{$daily_time}}</td>
					<td class="text-center" style="font-weight: bold;">{{$daily_task}}</td>
					<td class="text-center" style="font-weight: bold;">{{$daily_total}}</td>
					<td></td>
				</tr>
			{{-- @forelse($details as $key => $detail)
			<tr>
				<td class="text-center">{{!in_array($detail->date, $aDate) ? $num : ''}}</td>
				<td class="text-center" style="{{\Carbon\Carbon::parse($detail->date)->format('F') == \Carbon\Carbon::parse($task->period)->format('F') ? '' : 'color:red'}}">
					@if(!in_array($detail->date, $aDate))
						{{ $detail->date_idn}}
					    @php $aDate[] = $detail->date; $num = $num+1; $row[] = $key;@endphp
					@endif
				</td>
				<td class="text-center">{{$detail->category->name}}</td>
				<td class="text-center">{{$detail->time}}</td>
				<td class="text-center">{{$detail->mytask}}</td>
				<td class="text-center">{{$detail->sub_total}}</td>
				<td class="text-center">
					{!! Form::open(['route' => ['task-detail.destroy', $detail->id], 'method' => 'delete', 'name' => 'deleteDetailForm' ]) !!}
					<a class="btn btn-sm btn-warning" href="{{route('task-detail.edit', $detail->id)}}" title="" style="">edit</a>
					<button class="btn btn-sm btn-danger delete-detail" detail-id="{{$detail->id}}" type="submit">Delete</button>
					{!! Form::close() !!}
				</td>
			</tr>
			@if(isset($details[$key+1]->date) and $detail->date != $details[$key+1]->date)
			<tr style="background-color: lightgreen">
				<td colspan="3"></td>
				<td class="text-center" style="font-weight: bold;">0</td>
				<td class="text-center" style="font-weight: bold;">0</td>
				<td class="text-center" style="font-weight: bold;">0</td>
				<td></td>
			</tr>
			@elseif(!isset($details[$key+1]->date))
			<tr style="background-color: lightgreen">
				<td colspan="3"></td>
				<td class="text-center" style="font-weight: bold;">0</td>
				<td class="text-center" style="font-weight: bold;">0</td>
				<td class="text-center" style="font-weight: bold;">0</td>
				<td></td>
			</tr>
			@endif --}}
			@empty
			<tr>
				<td class="lb-table-empty" colspan="7" >Belum ada data</td>
			</tr>
			@endforelse
		</tbody>
	</table>
</div>
<div>
	<a class="btn btn-default" href="{{route('task.index')}}" title="">Back</a>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript">
		$( function() {
		    $( "#datepicker" ).datepicker({
		    	// changeMonth: false,
		    	// changeYear: false,
		    	// stepMonths: 0,
		    	dateFormat: 'dd-mm-yy',
		    });
		} );

		$('button.delete-detail').click(function() {
		    event.preventDefault(); // prevent form submit
		    var detailId = $(this).attr("detail-id");
			var form = event.target.form; // storing the form
			// var form = document.forms["deleteDetailForm"]; // storing the form
		    deleteDetail(detailId, form);
		});
		
		function deleteDetail(detailId, form) {

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