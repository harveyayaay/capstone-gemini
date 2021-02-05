@extends('layouts.app')
@section('title', 'Tracker Management')
@section('caption', '(Caption..)')
@section('content')

<div class="">
  <div class="d-flex justify-content-end text-center m-3">
    <a href="/admin/tracker-management/add" class="form-control-sm col-lg-2 col-md-2 bg-blue-900 text-white mb-2">
      <button>Add Task</button>
    </a>
  </div>
  <div class="pt-2 pl-2 pb-1 bg-blue-900 text-white"><h6>Productive Tasks</h6></div>
  <div class="card-body shadow p-3 mb-5 bg-white rounded">
    <table class="table table-sm text-center table-hover ">
      <thead class="text-blue-800">
        <tr>
          <td>Task</td>
          <td>Process Time</td>
          <td>SLA</td>
          <td>Level</td>
          <td>Actions</td>
        </tr>
      </thead>
      <tbody class="text-gray-500">
        @forelse($prod as $key)
          @if($key->status == 'Active' && $key->type == 'Productive')
          <tr>
            <td>{{$key->title}}</td>
            <td>{{$key->process_time}}</td>
            <td>{{$key->sla}}</td>
            <td>{{$key->level}}</td>
            <td>
              <a class="m-1" href="/admin/tracker-management/edit/{{$key->id}}">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
              </a>
            </td>
          </tr> 
          @endif
        @empty
          <tr>
            <td colspan="9" class="p-4">No record found</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="pt-2 pl-2 pb-1 bg-blue-900 text-white"><h6>Non-Productive Tasks</h6></div>
  <div class="card-body shadow p-3 mb-5 bg-white rounded">

    <table class="table table-sm text-center">
      <thead class="">
        <tr>
          <td>Task</td>
          <td>Actions</td>
        </tr>
      </thead>
      <tbody>
        @forelse($non_prod as $key)
          @if($key->status == 'Active' && $key->type == 'Non-productive')
          <tr>
            <td>{{$key->title}}</td>
            <td>
              <a class="m-1" href="/admin/tracker-management/edit/{{$key->id}}">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
              </a>
            </td>
          </tr> 
          @endif
        @empty
          <tr>
            <td colspan="9" class="p-4">No record found</td>
          </tr>
        @endforelse
      </tbody>
    </table>
    @error('description')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
</div>

@endsection