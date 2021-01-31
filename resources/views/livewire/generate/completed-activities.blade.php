<div>
    {{-- In work, do what you enjoy. --}}
      <div class="d-flex justify-content-end mb-2">
        <input type="date" class="form-control-sm m-1 col-2" value="{{date('Y-m-d', strtotime(date('Y-m')))}}">
        <input type="date" class="form-control-sm m-1 col-2" value="{{date('Y-m-d')}}"> 
        <input type="submit" class="form-control-sm col-1 btn-primary"> 
      </div>
      <table class="table table-sm text-center">
        <thead>
          <tr>
            <th>Date</th>
            <th>Type of Activity</th>
            <th>Case No.</th>
            <th>Date and Time Received</th>
            <th>Time Started</th>
            <th>Time Ended</th>
            <th>Hold Duration</th>
            <th>Process Duration</th>
            <th>Created by</th>
          </tr>
        </thead>
        <tbody>
        @forelse($tasks as $value)
          <tr>
            <td>{{date('Y-m-d', strtotime($value->current_date))}}</td>
            <td>{{$value->type}}</td>
            <td>{{$value->case_num}}</td>
            <td>{{$value->date_received}}</td>
            <td>{{$value->time_start}}</td>
            <td>{{$value->time_end}}</td>
            <td>{{$value->process_duration}}</td>
            <td>{{$value->hold_duration}}</td>
            <td>{{$value->empid}}</td>
          </tr>
        @empty
        @endforelse
        </tbody>
      </table>
</div>
