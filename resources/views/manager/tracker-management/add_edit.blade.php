@extends('layouts.app')
@section('content')
<h4 class="text-white">{{Route::is('admin.settings.about-us.add') ? 'Add' : 'Edit'}} Tracker</h4>
<p class="text-white mb-3">(Caption..)</p>
<div class="card">
  <div class="card-body">
    @if($task_list_table ?? '')
      <form action="{{route('manager.tracker-management.update',['id'=>$task_list_table->id])}}" method="POST">
    @else
      <form action="{{route('manager.tracker-management.store')}}" method="POST">
    @endif

    
    @csrf
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Activity Title</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="field_title" id="field_title" value="{{$task_list_table->title ?? (old('title') ?? '') }}" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Process Time</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="field_process_time" id="field_process_time" placeholder="hh:mm:ss" value="{{$task_list_table->process_time ?? (old('process_time') ?? '') }}" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">SLA</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="field_sla" id="field_sla" placeholder="hh:mm:ss" value="{{$task_list_table->sla ?? (old('sla') ?? '') }}" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Level</label>
        <div class="col-sm-10">
          <select name="field_level" id="field_level" class="form-control">
            <option selected>Primary</option>
            <option>Secondary</option>
          </select>
        </div>
      </div>
      <div class="offset-10 col-2 text-right">
          <input type="submit" value="{{Route::is('manager.tracker-management.add') ? 'Save' : 'Update'}}" class="btn btn-block btn-primary">
      </div>
    </form>
  </div>
</div>

@endsection
