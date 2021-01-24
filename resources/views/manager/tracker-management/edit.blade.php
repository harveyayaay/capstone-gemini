@extends('layouts.app')
@section('content')
<h4 class="text-white">Edit Tracker</h4>
<p class="text-white mb-3">(Caption..)</p>
<div class="card">
  <div class="card-body">
    <form action="/admin/tracker-management/update/{{$task_list_table->id}}" method="POST">
    @csrf
      <div class="form-group row">
        <label for="field_title" class="col-sm-2 col-form-label">Activity Title</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="field_title" id="field_title" value="{{$task_list_table->title}}" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="field_process_time" class="col-sm-2 col-form-label">Process Time</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="field_process_time" id="field_process_time" placeholder="hh:mm:ss" value="{{$task_list_table->process_time}}" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="field_sla" class="col-sm-2 col-form-label">SLA</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="field_sla" id="field_sla" placeholder="hh:mm:ss" value="{{$task_list_table->sla}}" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="field_level" class="col-sm-2 col-form-label">Level</label>
        <div class="col-sm-10">
          <select name="field_level" id="field_level" class="form-control">
            <option selected>Primary</option>
            <option>Secondary</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="field_status" class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-10">
          <select name="field_status" id="field_status" class="form-control">
            <option selected>Active</option>
            <option>Inactive</option>
          </select>
        </div>
      </div>
      <div class="offset-10 col-2 text-right">
          <input type="submit" value="Save" class="btn btn-block btn-primary">
      </div>
    </form>
  </div>
</div>
@endsection