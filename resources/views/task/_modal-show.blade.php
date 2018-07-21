<!-- Modal task new-->
  <div class="modal fade" id="newTaskDetail" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Task Detail Baru</h4>
        </div>
        {!! Form::open(['route' => 'task-detail.store', 'method' => 'post', 'class' => 'form-horizontal']) !!}
        <div class="modal-body">
          {!! Form::hidden('task_id', $task_id, []) !!}

          @include('task-detail._form')
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        {!! Form::close() !!}
      </div>
      
    </div>
  </div>





