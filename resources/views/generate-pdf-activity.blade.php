<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generated PDF</title>
  <!-- BOOTSTRAP  -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div>
</div>
  <table class="table table-sm text-center table-bordered">
    <thead class="bg-secondary text-white">
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
    @forelse($tasks as $value)
      <tr>
        <td>{{date('Y-m-d', strtotime($value->current_date))}}</td>
        <td>{{$value->type}}</td>
        <td>{{$value->case_num}}</td>
        <td>{{$value->date_received}}</td>
        <td>{{$value->time_start}}</td>
        <td>{{$value->time_end}}</td>
        <td>{{$value->hold_duration}}</td>
        <td>{{$value->process_duration}}</td>
        <td>{{$value->empid}}</td>
      </tr>
    @empty
      <tr>
        <td colspan="9" class="p-4">No record found</td>
      </tr>
    @endforelse
    </tbody>
  </table>
</body>
</html>

