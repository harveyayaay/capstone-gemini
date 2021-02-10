<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generated PDF</title>
  <!-- BOOTSTRAP  -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- FONT AWESOME  -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->

</head>
<body>

<style>
  .h-1{
    height: 200px ;
  }
  .h-2{
    height: 150px ;
  }
  .h-3{
    height: 100px ;
  }
  .w-1{
    width:200px;
  }
  .w-2{
    width: 150px;
  }
  .w-3{
    width: 100px;
  }
  .m-1{
    padding: 20px;
  }
  .m-2{
    padding: 15px;
  }
  
</style>

  <div class="row text-center">
    <!-- <div class="col-sm-3">
      <img src="https://cdn2.iconfinder.com/data/icons/goodreads-1/512/goodreads-round-dark-1-512.png" alt="logo" height="200" width="200" class="h-3 w-3">
    </div> -->
    <div class="col-sm-12">
          <h3><strong>TEAM GEMINI</strong></h3>
          <p>{{date('F j',strtotime($from)).' - '.date('F j',strtotime($to))}}</p>
    </div>
  </div>

  <table class="table table-sm text-center table-bordered">
    <thead class="bg-dark text-white">
      <tr>
        <td>Date</td>
        <td>Type of Activity</td>
        <td>Case No.</td>
        <td>Date & Time Received</td>
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
  <!-- <div class="fixed-bottom"> -->
    <div class="ml-5 mt-4">Total Count: {{$total}}</div>
    <div class="ml-5 mt-4">Average Processed Time: {{$average}}</div>
    <div class="ml-5 mt-4">Printed on: {{date('F j, Y - H:i a')}}</div>
  <!-- </div> -->
</body>
</html>

