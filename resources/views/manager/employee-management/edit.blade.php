@extends('layouts.app')
@section('content')

<h4 class="text-white">Edit Employee</h4>
<p class="text-white mb-3">(Caption..)</p>
<!-- IMAGE UPLOAD  -->
<div class="d-flex justify-content-center mb-3">
  <div class="card col-lg-2">
    <div class="card-body">
      <div class="d-flex justify-content-center px-5">
        @livewire('file-upload', ["userid" => $data->id])
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-body">
    @livewire('deactivate-account', ["userid" => $data->id])
    <form action="/admin/employee-management/update/{{$data->id}}" method="POST">
      @csrf
      <div class="d-flex row col-lg-12">
        <!-- LEFT COLUMN  -->
        <div class="p-2 flex-fill row col-lg-6">
          <label for="firstname" class="col-sm-12 col-form-label">First Name</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" name="firstname" id="firstname" value="{{$data->firstname}}" required>
          </div>
          <label for="lastname" class="col-sm-12 col-form-label">Last Name</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" name="lastname" id="lastname" value="{{$data->lastname}}" required>
          </div>
          <label for="email" class="col-sm-12 col-form-label">Email</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" name="email" id="email" value="{{$data->email}}" required>
          </div>
        </div>
        <!-- RIGHT COLUMN  -->
        <div class="p-2 flex-fill row col-lg-6">
          <label for="contact" class="col-sm-12 col-form-label">Contact Number</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" name="contact" id="contact" value="{{$data->contact}}" required>
          </div>
          <label for="hiredate" class="col-sm-12 col-form-label">Hire Date</label>
          <div class="col-sm-12">
            <input type="date" class="form-control" name="hiredate" id="hiredate" value="{{$data->hiredate}}" required>
          </div>
          <label for="position" class="col-sm-12 col-form-label">Position</label>
          <div class="col-sm-12">
            <select name="position" id="position" class="form-control">
              <option selected hidden>{{$data->position}}</option>
              <option>Frontliner</option>
              <option>Supervisor</option>
            </select>
          </div>
          <!-- <label for="status" class="col-sm-12 col-form-label">Status</label>
          <div class="col-sm-12">
            <select name="field_level" id="field_level" class="form-control">
              <option selected>Active</option>
              <option>Inactive</option>
            </select>
          </div> -->
        </div>
        <div class="pt-8 flex-fill row col-lg-12">
            <input type="submit" value="Save" class="btn btn-primary col-lg-2 ml-auto">
        </div>
      </div>
      
    </form>
  </div>
</div>

@endsection
