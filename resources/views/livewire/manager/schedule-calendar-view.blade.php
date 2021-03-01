<div>
  <div class="container d-flex justify-content-center">
    <div class="d-flex justify-content-center col-lg-12 shadow bg-blue-900 text-white">
      <div class="p-3">{{date('F d, Y', strtotime($picked_date))}}</div>
    </div>
  </div>
  <div class="container d-flex justify-content-center">
    <div class="d-flex justify-content-center col-lg-12 shadow bg-white">
      <table class="table table-bordered text-center">
        <tr>
          <td rowspan="2">Start Time</td>
          <td colspan="{{$task_lists_count}}">Tasks</td>
        </tr>
        <tr>
          @forelse($task_lists as $tasks)
            <td>{{$tasks->title}}</td>
          @empty
          @endforelse
        </tr>
        <tr>
          <td>6PM</td>
          @foreach($task_lists as $tasks)
            @foreach($sched_display as $sched)
              @if($sched['time'] == '18:00:00' && $sched['task_id'] == $tasks->id)
                <td>{{$sched['sched_fname'].' '.$sched['sched_lname']}}</td>
              @endif
            @endforeach
          @endforeach
        </tr>
        <tr>
          <td>9PM</td>
          @foreach($task_lists as $tasks)
            @foreach($sched_display as $sched)
              @if($sched['time'] == '21:00:00' && $sched['task_id'] == $tasks->id)
                <td>{{$sched['sched_fname'].' '.$sched['sched_lname']}}</td>
              @endif
            @endforeach
          @endforeach
        </tr>
        <tr>
          <td>12MN</td>
          @foreach($task_lists as $tasks)
            @foreach($sched_display as $sched)
              @if($sched['time'] == '00:00:00' && $sched['task_id'] == $tasks->id)
                <td>{{$sched['sched_fname'].' '.$sched['sched_lname']}}</td>
              @endif
            @endforeach
          @endforeach
        </tr>
      </table>
    </div>
  </div>
</div>
