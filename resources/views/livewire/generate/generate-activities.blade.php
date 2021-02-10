<div>
    {{-- In work, do what you enjoy. --}}
      <div class="d-flex justify-content-end mb-2">
        <input type="text" class="form-control-sm col-3 mr-auto" placeholder="-Filter Employee by Name-" name="search" wire:model="search">
        <div class="m-1"><b>Filter Date: </b></div>
        <input type="date" class="form-control-sm m-1 col-2" value="{{date('Y-m-d', strtotime(date('Y-m')))}}" name="date_from" wire:model="date_from">
        <input type="date" class="form-control-sm m-1 col-2" value="{{date('Y-m-d')}}"  name="date_to" wire:model="date_to"> 
        <!-- <input type="submit" class="form-control-sm col-1 btn-primary">  -->
      </div>
      <table class="table table-sm text-center">
        <thead class="bg-blue-900 text-white">
          <tr>
            <td>Date</td>
            <td>Type of Activity</td>
            <td>Case No.</td>
            <td>Date and Time Received</td>
            <td>Time Started</td>
            <td>Time Ended</td>
            <td>Hold Duration</td>
            <td>Process Duration</td>
            <td>Created by</td>
          </tr>
        </thead>
        <tbody>
        @forelse($data as $value)
          <tr>
            <td>{{date('Y-m-d', strtotime($value->current_date))}}</td>
            <td>{{$value->title}}</td>
            <td>{{$value->case_num}}</td>
            <td>{{$value->date_received}}</td>
            <td>{{$value->time_start}}</td>
            <td>{{$value->time_end}}</td>
            <td>{{$value->hold_duration}}</td>
            <td>{{$value->process_duration}}</td>
            <td>{{$value->firstname.' '.$value->lastname}}</td>
          </tr>
        @empty
          <tr>
            <td colspan="9" class="p-4">No record found</td>
          </tr>
        @endforelse 
        </tbody>
      </table>
      <div class="d-flex justify-content-start">
        <label for="field_title" class="col-form-label-sm">Total Count: {{$count}}</label>
      </div>
      <div class="d-flex justify-content-start">
        <!-- <label for="field_title" class="col-form-label-sm">Average Processing Time: {{$process_time}}</label> -->
      </div>
      <div class="d-flex justify-content-end text-center">
        @if($search == null)
          <a class="form-control-sm col-1 btn-success" href="{{ URL::to('generate-pdf-activity/'.$reference.'/'.$status.'/none/'.$date_from.'/'.$date_to) }}">
        @else
          <a class="form-control-sm col-1 btn-success" href="{{ URL::to('generate-pdf-activity/'.$reference.'/'.$status.'/'.$search.'/'.$date_from.'/'.$date_to) }}">
        @endif
          <button>Print</button>
        </a>
      </div>

</div>
