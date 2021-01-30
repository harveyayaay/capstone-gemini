@extends('layouts.app')
@section('title', 'Activity Monitoring')
@section('caption', '(Caption..)')
@section('content')

@if($countOngoing > 0)
  <div class="card mt-4">
    <div class="card-body"> 
      <p>Ongoing Activity</p>
      <table class="table table-sm text-center p-0">
        <thead>
          <tr class="row">
            <th class="col">Task Name</th>
            <th class="col">Case No.</th>
            <th class="col">Date and Time Received</th>
            <th class="col">Start Time</th>
            <th class="col">Duration (Live Count)</th>
            <th class="col text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($tasks as $data)
          <tr class="row">
            <td class="col pt-3">{{$data->type}}</td>
            <td class="col pt-3">{{$data->case_num}}</td>
            <td class="col pt-3">{{$data->date_received}}</td>
            <td class="col pt-3">{{date('H:i:s',strtotime($data->time_start))}}</td>
            <td class="col pt-3">Duration (Live Count)</td>
            <td class="col text-center">
            <form action="/supervisor/activity-tracker/update/{{$data->id}}/Hold" method="post">
            @csrf
            <button type="submit" class="btn btn-danger m-1">
              <svg style="height: 20px;" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </button>
            </form>
            <form action="/supervisor/activity-tracker/update/{{$data->id}}/End" method="post">
            @csrf
            <button type="submit" class="btn btn-success m-1">
              <svg style="height: 20px;" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
              </svg>
            </button>
            </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@else
 
  <!-- ADD ACTIVITY -->
  <form action="/supervisor/activity-tracker/store" method="post">
  @csrf
    <div class="card mt-4">
      <div class="card-body"> 
        <p>Add Activity</p>
          <div class="form-row">
            <div class="col-4">
              <select id="" class="form-control" name="type">
                <option>Application</option>
                <option>Urgent</option>
              </select>
            </div>
            <div class="col-3">
              <input type="text" class="form-control" placeholder="Enter Case No." name="case_num">
            </div>
            <div class="col-3">
              <input type="text" class="form-control" placeholder="Enter Date and Time Received" name="date_received">
            </div>
            <div class="col-2">
              <input type="submit" class="form-control btn btn-block btn-primary" value="Add Task" >
            </div>
          </div>
      </div>
    </div>
  </form>

  
  @if($countHold > 0)
    <!-- ON-HOLD ACTIVITIES  -->
    <div class="card mt-4">
      <div class="card-body"> 
        <p>On-Hold Activities</p>
        <table class="table table-sm text-center">
          <thead>
            <tr class="row">
              <th class="col">Task Name</th>
              <th class="col">Case No.</th>
              <th class="col">Date and Time Received</th>
              <th class="col">Start Time</th>
              <th class="col text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
          @forelse($tasks as $data)
            @if($data->status == 'Hold')
            <form action="/supervisor/activity-tracker/update/{{$data->id}}/Continue" method="post">
              @csrf
            <tr class="row">
              <td class="col pt-3">{{$data->status}}</td>
              <td class="col pt-3">{{$data->case_num}}</td>
              <td class="col pt-3">{{$data->date_received}}</td>
              <td class="col pt-3">{{date('H:i:s',strtotime($data->time_start))}}</td>
              <td class="col text-center">
                <button type="submit" class="btn btn-info m-1">
                  <svg style="height: 20px;" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                </button>
              </td>
            </tr>
            </form>
            @endif
          @empty
          @endforelse
          </tbody>
        </table>
      </div>
    </div>
  @endif
  <!-- endif for on-hold -->

  @if($countComplete > 0)
    <div class="card mt-4">
      <div class="card-body"> 
        <p>Completed Activities</p>
        <table class="table table-sm text-center">
          <thead>
            <tr class="row">
              <th class="col">Task Name</th>
              <th class="col">Case_No.</th>
              <th class="col">Date and Time Received</th>
              <th class="col">Start Time</th>
              <th class="col">End Time</th>
              <th class="col">Hold Duration</th>
              <th class="col">Process Duration</th>
            </tr>
          </thead>
          <tbody>
          @forelse($tasks as $data)
            @if($data->status == 'Completed')
            <tr class="row">
              <td class="col pt-3">{{$data->status}}</td>
              <td class="col pt-3">{{$data->case_num}}</td>
              <td class="col pt-3">{{$data->date_received}}</td>
              <td class="col pt-3">{{date('H:i:s',strtotime($data->time_start))}}</td>
              <td class="col pt-3">{{date('H:i:s',strtotime($data->time_end))}}</td>
              <td class="col pt-3">{{$data->hold_duration}}</td>
              <td class="col pt-3">{{$data->process_duration}}</td>
            </tbody>
          </tr>
          @endif
        @empty
        @endforelse
        </table>
      </div>
    </div>
  @endif
  <!-- endif for ongoing -->

@endif 
<!-- endif for ongoing -->




@endsection