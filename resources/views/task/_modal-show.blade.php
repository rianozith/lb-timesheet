<!-- Modal task new-->
  <div class="modal fade" id="newTaskDetail" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Task Detail</h4>
        </div>
        {!! Form::open(['route' => 'task-detail.store', 'method' => 'post', 'class' => 'form-horizontal']) !!}
        <div class="modal-body">
          {!! Form::hidden('task_id', $task_id, []) !!}

          <div class="form-group">
            <label class="control-label col-sm-2" for="date">Date</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="date" id="datepicker" placeholder="Enter date">
            </div>
          </div>
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
            <label class="control-label col-sm-2" for="mytask">Task</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="mytask" id="mytask" placeholder="Enter Total Task">
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





