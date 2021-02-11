@extends('layouts.app')
@section('title', 'Activity Tracker')
@section('caption', '(Caption..)')
@section('content')

@include('flash-message')
@if($countOngoing > 0)
  <div class="card">
    <div class="card-body"> 
      <p>Ongoing Activity</p>
      <table class="table table-sm text-center">
        <thead class="text-blue-900 font-weight-bold">
          <tr>
            <td>Task Name</td>
            <td>Case No.</td>
            <td>Date and Time Received</td>
            <td>Start Time</td>
            <td>Duration (Live Count)</td>
            <td>Actions</td>
          </tr>
        </thead>
        <tbody>
        @foreach($tasks as $data)
          <tr>
            <td class="pt-2">{{$data->title}}</td>
            <td class="pt-2">{{$data->case_num}}</td>
            <td class="pt-2">{{$data->date_received}}</td>
            <td class="pt-2">{{date('H:i:s',strtotime($data->time_start))}}</td>
            <td class="pt-2">Duration (Live Count)</td>
            <td class="d-flex flex-row justify-content-sm-around h-5">
              <form action="/supervisor/activity-tracker/update/{{$data->id}}/Hold" method="post">
                @csrf 
                <button type="submit" class="btn-link text-warning m-1 h-1">
                  <i class="fa fa-pause" aria-hidden="true"></i>
                  Hold
                </button>
              </form>
              <form action="/supervisor/activity-tracker/update/{{$data->id}}/Incomplete" method="post">
                @csrf 
                <button type="submit" class="btn-link text-danger m-1 h-1">
                  <i class="fa fa-times" aria-hidden="true"></i>
                  Incomplete
                </button>
              </form>
              <form action="/supervisor/activity-tracker/update/{{$data->id}}/Completed" method="post">
                @csrf
                <button type="submit" class="btn-link text-success m-1 h-1">
                  <i class="fa fa-check" aria-hidden="true"></i>
                  Complete
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

  @livewire('frontliner.add-activity')

  @if($countHold > 0)
    <!-- ON-HOLD ACTIVITIES  -->
    <div class="card mt-4">
      <div class="card-body"> 
        <p>On-Hold Activities</p>
        <table class="table table-sm text-center">
          <thead class="bg-info text-white">
            <tr>
              <th>Task Name</th>
              <th>Case No.</th>
              <th>Date and Time Received</th>
              <th>Start Time</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
          @forelse($tasks as $data)
            @if($data->status == 'Hold')
            <form action="/supervisor/activity-tracker/update/{{$data->id}}/Continue" method="post">
              @csrf
            <tr>
              <td class="pt-2">{{$data->title}}</td>
              <td class="pt-2">{{$data->case_num}}</td>
              <td class="pt-2">{{$data->date_received}}</td>
              <td class="pt-2">{{date('H:i:s',strtotime($data->time_start))}}</td>
              <td>
                <button type="submit" class="btn-link text-info m-1">
                  <i class="fa fa-play" aria-hidden="true"></i>
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
          <thead class="bg-blue-900 text-white">
            <tr>
              <th>Task Name</th>
              <th>Case_No.</th>
              <th>Date and Time Received</th>
              <th>Start Time</th>
              <th>End Time</th>
              <th>Hold Duration</th>
              <th>Process Duration</th>
            </tr>
          </thead>
          <tbody>
          @forelse($tasks as $data)
            @if($data->status == 'Completed')
            <tr>
              <td>{{$data->title}}</td>
              <td>{{$data->case_num}}</td>
              <td>{{$data->date_received}}</td>
              <td>{{date('H:i:s',strtotime($data->time_start))}}</td>
              <td>{{date('H:i:s',strtotime($data->time_end))}}</td>
              <td>{{$data->hold_duration}}</td>
              <td>{{$data->process_duration}}</td>
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

<script>
function isNumber(evt)
  {
     var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

     return true;
  }

</script>



@endsection
