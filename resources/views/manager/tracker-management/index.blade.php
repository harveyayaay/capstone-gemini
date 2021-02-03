@extends('layouts.app')
@section('title', 'Tracker Management')
@section('caption', '(Caption..)')
@section('content')
<div class="card">
  <div class="card-body">
    <div class="d-flex justify-content-end text-center">
      <a href="/admin/tracker-management/add" class="form-control-sm col-1 btn-primary mb-2">
        <button>Add Task</button>
      </a>
    </div>
    <p>Productive Tasks</p>
    <table class="table table-sm text-center">
      <thead class="bg-secondary text-white">
        <tr>
          <td>Task</td>
          <td>Process Time</td>
          <td>SLA</td>
          <td>Level</td>
          <td>Actions</td>
        </tr>
      </thead>
      <tbody>
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

    <p>Non-productive Tasks</p>
    <table class="table table-sm text-center">
      <thead class="bg-secondary text-white">
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