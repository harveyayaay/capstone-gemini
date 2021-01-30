@extends('layouts.app')
@section('content')
<h4 class="text-white">Add Metric</h4>
<p class="text-white mb-3">(Caption..)</p>
<form action="#" method="POST">
  @csrf
  <div class="card ">
    <div class="card-body">
      <div class="container">
        <div class="row">
          <div class="col">
            <label for="inputPassword" class="col-form-label">Metric</label>
            <input type="text" class="form-control" name="field_title" id="field_title" value="{{$task_list_table->title ?? (old('title') ?? '') }}" required> 
          </div>
          <div class="col">
            <label for="inputPassword" class="col-form-label">Range Type</label>
            <select name="field_level" id="field_level" class="form-control">
              <option selected>Time</option>
              <option>Percentage</option>
            </select>
          </div>
          <div class="w-100"></div>
          <div class="col">
            <label for="inputPassword" class="col-form-label">Goal</label>
            <input type="text" class="form-control" name="field_title" id="field_title" value="{{$task_list_table->title ?? (old('title') ?? '') }}" required>
          </div>
          <div class="col">
            <label for="inputPassword" class="col-form-label">Reference</label>
            <select name="field_level" id="field_level" class="form-control">
              <option selected>All</option>
              <option>Application</option>
            </select>
          </div>
        </div>
      </div>
        <!-- <div class="offset-10 col-2 text-right">
            <input type="submit" value="{{Route::is('manager.tracker-management.add') ? 'Save' : 'Update'}}" class="btn btn-block btn-primary">
        </div> -->
    </div>
  </div>
  <div class="card mt-4">
    <div class="card-body">
      <div class="container">
        <div class="row mb-3 text-center">
          <div class="col">
            Performance Ranges
          </div>
          <div class="col">
            Ranges (From)
          </div>
          <div class="col">
            Ranges (To)
          </div>  
        </div>
        @for ($i = 0; $i < 5; $i++)
        <div class="row mb-3 text-center">
          <div class="col">
            3.0
          </div>
          <div class="col">
            <input type="text" class="form-control" name="field_title" required> 
          </div>
          <div class="col">
            <input type="text" class="form-control" name="field_title" required> 
          </div>
        </div>
        @endfor
      </div>
    </div>
  </div>
</form>
<div class="offset-10 col-2 text-right pt-3">
  <a type='button' class="btn btn-block btn-primary" href="#">Update Metric</a>
</div>

@endsection
