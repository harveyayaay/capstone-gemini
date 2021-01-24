@extends('layouts.app')
@section('title', 'Activity Monitoring')
@section('caption', '(Caption..)')
@section('content')
<div class="card">
  <div class="card-body"> 
    <p>Add Activity</p>
    <form>
      <div class="form-row">
        <div class="col-4">
          <select name="" id="" class="form-control">
            <option>Application</option>
            <option>Urgent</option>
          </select>
        </div>
        <div class="col-3">
          <input type="text" class="form-control" placeholder="Enter Case No.">
        </div>
        <div class="col-3">
          <input type="text" class="form-control" placeholder="Enter Date and Time Received">
        </div>
        <div class="col-2">
          <input type="button" class="form-control btn btn-block btn-primary" value="Add Task">
        </div>
      </div>
    </form>
  </div>
</div>
@endsection