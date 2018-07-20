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

          <div class="form-group">
            <label class="control-label col-sm-2" for="category">Category</label>
            <div class="col-sm-10">
              {!! Form::select('category', $categories, null, ['class' => 'form-control']) !!}
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="time">Time</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="time" id="time" placeholder="Enter Time">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="total_task">Total Task</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="total_task" id="total_task" placeholder="Enter Total Task">
            </div>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        {!! Form::close() !!}
      </div>
      
    </div>
  </div>





