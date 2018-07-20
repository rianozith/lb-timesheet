<!-- Modal -->
  <div class="modal fade" id="newTask" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Task Baru</h4>
        </div>
        {!! Form::open(['route' => 'task.store', 'method' => 'post', 'class' => 'form-horizontal']) !!}
        <div class="modal-body">

          <div class="form-group">
            <label class="control-label col-sm-2" for="name">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="month">Bulan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="month" id="month" placeholder="Enter month">
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