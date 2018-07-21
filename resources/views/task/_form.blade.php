<div class="form-group">
  <label class="control-label col-sm-2" for="name">Periode</label>
  <div class="col-sm-10">
    {{-- <input type="text" class="form-control" name="period" id="datepicker" placeholder="Enter period"> --}}
    {!! Form::text('period', null, ['class' => 'form-control', 'id' => 'datepicker', 'placeholder' => 'Enter Period', 'required']) !!}
  </div>
</div>