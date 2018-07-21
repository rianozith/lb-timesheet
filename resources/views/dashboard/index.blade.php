@extends('layouts.dashboard')

@section('sub-header')
My Summary
@endsection

@section('content')
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Period</th>
        <th>Total Task</th>
        <th>Total Time</th>
        <th>Earnings</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1,001</td>
        <td>Lorem</td>
        <td>ipsum</td>
        <td>dolor</td>
        <td>sit</td>
        <td>
          <button class="btn btn-primary" type="button">Button</button>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

@endsection