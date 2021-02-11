@extends('layouts.app')
@section('content')
@section('title', 'Edit Settings')
@section('caption', '(Caption..)')


<!-- IMAGE UPLOAD  -->
<div class="d-flex justify-content-center">
  <div class="">
      @include('flash-message')
    <div class="pt-2 pl-2 pb-1 bg-blue-900 text-white"><h6>Edit Employee</h6></div>
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-center px-5">
            @livewire('file-upload-profile', ["userid" => $data['profile']->id])
          </div>
        </div>
      </div>
    </div>
  </div>

  @if(Auth::user()->position == 'Manager')
  <div class="pt-2 pl-2 pb-1 mt-5 bg-blue-900 text-white"><h6>Edit Employee</h6></div>
    <div class="card">
      <div class="card-body">
        <form action="/supervisor/settings/update/{{$data['profile']->id}}" method="POST">
          @csrf
          <div class="d-flex row col-lg-12">
            <!-- LEFT COLUMN  -->
            <div class="p-2 flex-fill row col-lg-6">
              <label for="firstname" class="col-sm-12 col-form-label">First Name</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" name="firstname" id="firstname" value="{{$data['profile']->firstname}}" required>
              </div>
              <label for="lastname" class="col-sm-12 col-form-label">Last Name</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" name="lastname" id="lastname" value="{{$data['profile']->lastname}}" required>
              </div>
            </div>
            <!-- RIGHT COLUMN  -->
            <div class="p-2 flex-fill row col-lg-6">
              <label for="contact" class="col-sm-12 col-form-label">Contact Number</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" name="contact" id="contact" value="{{$data['profile']->contact}}" required>
              </div>
              <label for="email" class="col-sm-12 col-form-label">Email</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" name="email" id="email" value="{{$data['profile']->email}}" required>
              </div>
              <!-- <label for="status" class="col-sm-12 col-form-label">Status</label>
              <div class="col-sm-12">
                <select name="field_level" id="field_level" class="form-control">
                  <option selected>Active</option>
                  <option>Inactive</option>
                </select>
              </div> -->
            </div>
          </div>
          <div class="d-flex justify-content-end text-center m-3">
            <button type="submit" class="form-control-sm col-lg-2 col-md-2 mt-2 bg-blue-900 text-white mb-2">Save</button>
          </div>
          
        </form>
      </div>
    </div>
  @endif
@endsection
