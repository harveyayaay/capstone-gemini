@extends('layouts.app')
@section('title', 'Tracker Management')
@section('caption', '(Caption..)')
@section('content')
<div class="card">
  <div class="card-body">
    <div class="card-body">
      <div class="offset-10 col-2 text-right pb-3">
        <a type='button' class="btn btn-block btn-primary" href="/admin/tracker-management/add">Add Section</a>
      </div>
      <div class="row 5-10 pr-3 pl-3">
        <table class="table table-hover table-center table-sm">
          <thead>
            <tr class="row">
              <th class="col">Task</th>
              <th class="col">Process Time</th>
              <th class="col">SLA</th>
              <th class="col">Level</th>
              <th class="col text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($task_list_table as $key)
              @if($key->status == 'Active')
              <tr class="row">
                <td class="col pt-3">{{$key->title}}</td>
                <td class="col pt-3">{{$key->process_time}}</td>
                <td class="col pt-3">{{$key->sla}}</td>
                <td class="col pt-3">{{$key->level}}</td>
                <td class="col text-center">
                  <a class="btn btn-primary m-1" href="/admin/tracker-management/edit/{{$key->id}}">
                    <svg style="height: 20px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                  </a>
                </td>
              </tr> 
              @endif
            @endforeach 
          </tbody>
        </table>
        @error('description')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
  </div>
</div>

@endsection