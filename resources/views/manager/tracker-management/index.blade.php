@extends('layouts.app')
@section('title', 'Tracker Management ')
@section('caption', '(Caption..) ')
@section('content')
<div class="overflow-x">
  <table id="filtertable" class="table cust-datatable dataTable no-footer table-hover">
    <thead>
      <tr class="row">
          <th class="col-3">Task</th>
          <th class="col-2">Process Time</th>
          <th class="col-2">SLA</th>
          <th class="col-3">Level</th>
          <th class="col-2 text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
        <tr class="row">
          <td class="col-3">asdsad</td>
          <td class="col-2">asd</td>
          <td class="col-2">asd</td>
          <td class="col-3">asd</td>
          <td class="col-2 text-center">
            <div class="btn-group">
              <a class="btn btn-outline-light m-1" href="">
                <svg style="height: 20px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
              </a>
              <a class="btn btn-outline-light m-1" data-url="" href="#"data-toggle="modal" data-target="#delete-modal" class="btn btn-link" data-id="">
                <svg style="height: 20px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
              </a>
            </div>
          </td>
        </tr>   
    </tbody>
  </table>
</div>
@endsection