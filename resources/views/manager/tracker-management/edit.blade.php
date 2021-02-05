@extends('layouts.app')
@section('content')
<h4 class="text-white">Edit Tracker</h4>
<p class="text-white mb-3">(Caption..)</p>
<div class="card">
  <div class="card-body">
    <form action="/admin/tracker-management/update/{{$task_list_table->id}}" method="POST">
    @csrf
      <div class="form-group-sm row">
        <label for="field_title" class="col-sm-2 col-form-label-sm">Activity Title</label>
        <div class="col-sm-10">
          <input type="text" class=" form-control form-control-sm" name="field_title" id="field_title" value="{{$task_list_table->title}}" required>
        </div>
      </div>
      @if($task_list_table->type == 'Productive')
        <div class="form-group-sm row">
          <label for="field_process_time" class="col-sm-2 col-form-label-sm">Process Time</label>
          <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm" name="field_process_time" id="field_process_time" placeholder="hh:mm:ss" value="{{$task_list_table->process_time}}" required>
          </div>
        </div>
        <div class="form-group-sm row">
          <label for="field_sla" class="col-sm-2 col-form-label-sm">SLA</label>
          <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm" name="field_sla" id="field_sla" placeholder="hh:mm:ss" value="{{$task_list_table->sla}}" required>
          </div>
        </div>
        <div class="form-group-sm row">
          <label for="field_level" class="col-sm-2 col-form-label-sm">Level</label>
          <div class="col-sm-10">
            <select name="field_level" id="field_level" class="form-control form-control-sm">
              <option selected>Primary</option>
              <option>Secondary</option>
            </select>
          </div>
        </div>
      @endif
      <div class="form-group row">
        <label for="field_status" class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-10">
          <select name="field_status" id="field_status" class="form-control form-control-sm">
            <option selected>Active</option>
            <option>Inactive</option>
          </select>
        </div>
      </div>
      <div class="d-flex justify-content-end text-center">
        <input type="submit" value="Update" class="form-control-sm col-1 btn-primary mb-2">
      </div>
    </form>
  </div>
</div>
@endsection
