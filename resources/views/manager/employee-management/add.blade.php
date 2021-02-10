@extends('layouts.app')
@section('content')
@section('title', 'Employee')
@section('caption', '(Caption..)')
<div class="pt-2 pl-2 pb-1 mt-5 bg-blue-900 text-white"><h6>Add Employee</h6></div>
<form action="/admin/employee-management/store" method="POST">
  <div class="card">
    <div class="card-body">
        @csrf
        <div class="d-flex row col-lg-12">
          <!-- LEFT COLUMN  -->
          <div class="p-2 flex-fill row col-lg-6">
            <label for="firstname" class="col-sm-12 col-form-label">First Name</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" name="firstname" id="firstname" required>
            </div>
            <label for="lastname" class="col-sm-12 col-form-label">Last Name</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" name="lastname" id="lastname" required>
            </div>
            <label for="email" class="col-sm-12 col-form-label">Email</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" name="email" id="email" required>
            </div>
          </div>
          <!-- RIGHT COLUMN  -->
          <div class="p-2 flex-fill row col-lg-6">
            <label for="contact" class="col-sm-12 col-form-label">Contact Number</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" name="contact" id="contact" required>
            </div>
            <label for="hiredate" class="col-sm-12 col-form-label">Hire Date</label>
            <div class="col-sm-12">
              <input type="date" class="form-control" name="hiredate" id="hiredate" required>
            </div>
            <label for="position" class="col-sm-12 col-form-label">Position</label>
            <div class="col-sm-12">
              <select name="position" id="position" class="form-control">
                <option selected>Frontliner</option>
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
          <!-- </div>
          <div class="d-flex justify-content-end text-center m-3">
              <input type="submit" value="Save" class="form-control-sm col-1 mt-2 bg-blue-900 text-white mb-2">
          </div> -->

        </div>
    </div>
    <div class="d-flex justify-content-end text-center m-3">
      <button type="submit" class="form-control-sm col-lg-2 col-md-2 mt-2 bg-blue-900 text-white mb-2">Save</button>
    </div>
  </div>
</form>

@endsection
