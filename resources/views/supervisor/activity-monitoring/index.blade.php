@extends('layouts.app')
@section('title', 'Activity Monitoring')
@section('caption', '(Caption..)')
@section('content')
<div class="card">
  <div class="card-body"> 
    <p>Add Activity</p>
    <form>
      <div class="form-row">
        <div class="col-4">
          <select name="" id="" class="form-control">
            <option>Application</option>
            <option>Urgent</option>
          </select>
        </div>
        <div class="col-3">
          <input type="text" class="form-control" placeholder="Enter Case No.">
        </div>
        <div class="col-3">
          <input type="text" class="form-control" placeholder="Enter Date and Time Received">
        </div>
        <div class="col-2">
          <input type="button" class="form-control btn btn-block btn-primary" value="Add Task">
        </div>
      </div>
    </form>
  </div>
</div>

<div class="card mt-4">
  <div class="card-body"> 
    <p>Ongoing Activity</p>
    <table class="table   ">
      <thead>
        <tr class="row">
          <th class="col">Task Name</th>
          <th class="col">Client ID</th>
          <th class="col">Date and Time Received</th>
          <th class="col">Start Time</th>
          <th class="col">Duration (Live Count)</th>
          <th class="col text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr class="row">
          <td class="col pt-4">Task Name</td>
          <td class="col pt-4">Client ID</td>
          <td class="col pt-4">Date and Time Received</td>
          <td class="col pt-4">19:02:03</td>
          <td class="col pt-4">00:02:03</td>
          <td class="col text-center">
          <a class="btn btn-danger m-1" href="#">
            <svg style="height: 20px;" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
          </a>
          <a class="btn btn-success m-1" href="#">
            <svg style="height: 20px;" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
          </a>
          </td>
        </tbody>
      </tr>
    </table>
  </div>
</div>

<div class="card mt-4">
  <div class="card-body"> 
    <p>On-Hold Activity</p>
    <table class="table   ">
      <thead>
        <tr class="row">
          <th class="col">Task Name</th>
          <th class="col">Client ID</th>
          <th class="col">Date and Time Received</th>
          <th class="col">Start Time</th>
          <th class="col text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr class="row">
          <td class="col pt-4">Task Name</td>
          <td class="col pt-4">Client ID</td>
          <td class="col pt-4">Date and Time Received</td>
          <td class="col pt-4">19:02:03</td>
          <td class="col text-center">
            <a class="btn btn-info m-1" href="#">
              <svg style="height: 20px;" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </a>
          </td>
        </tbody>
      </tr>
    </table>
  </div>
</div>

<div class="card mt-4">
  <div class="card-body"> 
    <p>On-Hold Activity</p>
    <table class="table   ">
      <thead>
        <tr class="row">
          <th class="col">Task Name</th>
          <th class="col">Client ID</th>
          <th class="col">Date and Time Received</th>
          <th class="col">Start Time</th>
          <th class="col">End Time</th>
          <th class="col">Hold Duration</th>
          <th class="col">Process Duration</th>
        </tr>
      </thead>
      <tbody>
        <tr class="row">
          <td class="col pt-4">Task Name</td>
          <td class="col pt-4">Client ID</td>
          <td class="col pt-4">Date and Time Received</td>
          <td class="col pt-4">19:02:03</td>
          <td class="col pt-4">20:02:02</td>
          <td class="col pt-4">00:00:00</td>
          <td class="col pt-4">00:00:00</td>
        </tbody>
      </tr>
    </table>
  </div>
</div>
@endsection