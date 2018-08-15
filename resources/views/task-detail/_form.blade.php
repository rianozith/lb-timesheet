<div class="form-group">
  <label class="control-label col-sm-2" for="date">Date</label>
  <div class="col-sm-10">
    {{-- <input type="text" class="form-control" name="date" id="datepicker" placeholder="Enter date"> --}}
    {!! Form::text('date', null, ['class'=>"form-control", 'id'=>"datepicker", 'placeholder'=>"Enter date", 'required']) !!}
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2" for="category">Category</label>
  <div class="col-sm-10">
    {!! Form::select('category', $categories, null, ['class' => 'form-control', 'required']) !!}
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2" for="time">Time</label>
  <div class="col-sm-10">
    {{-- <input type="number" class="form-control" name="time" id="time" placeholder="Enter Time"> --}}
    {!! Form::text('time', null, ['class'=>"form-control", 'id'=>"time", 'placeholder'=>"Enter Time", 'required']) !!}
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2" for="mytask">Task</label>
  <div class="col-sm-10">
    {{-- <input type="number" class="form-control" name="mytask" id="mytask" placeholder="Enter Total Task"> --}}
    {!! Form::number('mytask', null, ['class'=>"form-control", 'id'=>"mytask", 'placeholder'=>"Enter Task", 'required']) !!}
  </div>
</div>