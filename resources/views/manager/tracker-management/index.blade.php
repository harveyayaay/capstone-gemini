@extends('layouts.app')
@section('title', 'Tracker Management')
@section('caption', '(Caption..)')
@section('content')
<div class="card">
  <div class="card-body">
    <div class="card-body">
      <div class="offset-10 col-2 text-right pb-3">
        <a type='button' class="btn btn-block btn-primary" href="{{route('manager.tracker-management.add')}}">Add Section</a>
      </div>
      <div class="row 5-10 pr-3 pl-3">
        <table class="table cust-datatable dataTable no-footer table-hover table-sm">
          <thead>
            <tr class="row">
              <th class="col-2">Task</th>
              <th class="col-3">Process Time</th>
              <th class="col-3">SLA</th>
              <th class="col-3">Level</th>
              <th class="col-1 text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($task_list_table as $key)
            <tr class="row">
              <td class="col-2 pt-3">{{$key->title}}</td>
              <td class="col-3 pt-3">{{$key->process_time}}</td>
              <td class="col-3 pt-3">{{$key->sla}}</td>
              <td class="col-3 pt-3">{{$key->level}}</td>
              <td class="col-1 text-center">
                <div class="btn-group">
                  <a class="btn btn-primary m-1" href="{{route('manager.tracker-management.edit', ['id' => $key->id])}}">
                    <svg style="height: 20px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                  </a>
                  <a class="btn btn-danger m-1" data-url="{{route('manager.tracker-management.destroy', ['id' => $key->id])}}" href="#" data-toggle="modal" data-target="#delete-modal" class="btn btn-link" data-id="">
                    <svg style="height: 20px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </a>
                </div>
              </td>
            </tr> 
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
    </div>
  </div>
</div>

@endsection