@extends('layouts.app')
@section('title', 'Employee')
@section('caption', '(Caption..)')
@section('content')
<div class="card mt-5">
  <div class="card-body">
    <div class="card-body">
      <div class="d-flex justify-content-end text-center m-3">
        <a  href="/admin/employee-management/add" class="form-control-sm col-lg-2 col-md-2 bg-blue-900 text-white mb-2">Add Employee</a>
      </div>
      @include('flash-message')
      <div class="row 5-10 pr-3 pl-3">
        <table class="table table-sm ">
          <thead>
            <tr class="row">
              <th class="col-1"></th>
              <th class="col-2">Name of Employee</th>
              <th class="col-2">Email</th>
              <th class="col-2">Contact</th>
              <th class="col-2">Hiredate</th>
              <th class="col-2">Position</th>
              <th class="col-1 text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
          @forelse($users as $data)
            @if($data->status == 'Active')
            <tr class="row">
              <td class="col-1 text-center">
                <img src="{{$data->profile_photo_path ? url('storage/'.$data->profile_photo_path) : url('storage/photos/ewydknl22fpMkbemK6epuFF4mYXJ695Fb2PuhLwl.png')}}"  class="rounded-circle shadow-sm  img-thumbnail img-fluid imgsize-sm">
              </td>
              <td class="col-2 pt-3">{{$data->firstname}} {{$data->lastname}}</td>
              <td class="col-2 pt-3">{{$data->email}}</td>
              <td class="col-2 pt-3">{{$data->contact}}</td>
              <td class="col-2 pt-3">{{$data->hiredate}}</td>
              <td class="col-2 pt-3">{{$data->position}}</td>
              <td class="col-1 text-center">
                <a class="btn btn-primary m-1" href="/admin/employee-management/edit/{{$data->id}}">
                  <svg style="height: 20px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                  </svg>
                </a>
              </td>
            </tr>  
            @endif
          @empty
          @endforelse
          </tbody>
        </table>
        @error('description')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <!-- <div class="d-flex justify-content-end">
      <button class="btn-link">View Deactivated Account</button>
    </div> -->
  </div>
</div>

@endsection