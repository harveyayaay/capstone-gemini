<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
</div>
 
    @if($scheduled_activity_null == true)
      <div class="card-body col bg-gray-400 text-white mb-3 p-2"> 
          <span class="text-dark font-weight-bold">No scheduled tasks today</span>
      </div>
    @else
      <div class="card-body col bg-gray-400 text-white mb-3 p-2"> 
        <span>Priority Task: </span><span class="text-blue-900 font-weight-bold ml-2">{{$task_display->title}}</span>
      </div>
    @endif
  <div class="card-body col bg-blue-900 text-white"> 
    Overall MTD Volume
  </div>
  <div class="card col mb-2">
    <div class="card-body"> 
      <canvas id="MTDTaskVolume" width="400" height="70"></canvas>
    </div>
  </div>

  <div class="row">
    <div class="card col-8 mb-2 m-3">
      <div class="card-body"> 
        <p class="text-blue-900 font-weight-bold">Your Overall MTD Volume</p> 
        <canvas id="UserMTDTaskVolume" width="400" height="100"></canvas>
      </div>
    </div>
    
    
    <div class="card col mb-2 m-3">
      <div class="card-body"> 
        <p class="text-blue-900 font-weight-bold p-0">Current Statistics</p> 
      </div>
      <div class="card-body">
        <table class="table">
          <tr>
            <td>Overall Volume</td>
          @foreach($list_users_prod as $value)
            <td>{{$value['volume']}}</td>
          @endforeach
          </tr>
          <tr>
            <td>Average Volume</td>
            <td>{{$value['average']}}%</td>
          </tr>
          <tr>
            <td>QA</td>
            <td>{{$qa ? $qa : '100'}}%</td>
          </tr>
          <tr>
            <td>Escalation</td>
            <td>{{$esc ? $esc : '0'}}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
<!-- 
  <div class="row">
    <div class="card m-3 col">
      <div class="card-body">
        <table class="table table-sm ">
          <thead class="text-blue-900 font-weight-bold">
            <tr>
              <td>Frontliner Name</td>
              <td class="text-center">Volume</td>
              <td class="text-center">Average</td>
            </tr>
          </thead>
          <tbody class="text-gray-500">
          @foreach($list_users_prod as $value)
            <tr>
              <td>{{$value['firstname'].' '.$value['lastname']}}</td>
              <td class="text-center">{{$value['volume']}}</td>
              <td class="text-center">{{$value['average']}}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="card m-3 col">
      <div class="card-body">
        <table class="table table-sm ">
          <thead class="text-blue-900 font-weight-bold">
            <tr>
              <td>Frontliner Name</td>
              <td class="text-center">QA</td>
              <td class="text-center">Escalations</td>
            </tr>
          </thead>
          <tbody class="text-gray-500">
          @foreach($list_users_prod as $value)
            <tr>
              <td>{{$value['firstname'].' '.$value['lastname']}}</td>
              <td class="text-center">100%</td>
              <td class="text-center">0</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="card m-3 col">
      <div class="card-body">
        <table class="table table-sm ">
          <thead class="text-blue-900 font-weight-bold">
            <tr>
              <td>Frontliner Name</td>
              <td class="text-center">Ongoing Activity</td>
              <td class="text-center">Duration</td>
            </tr>
          </thead>
          <tbody class="text-gray-500">
          @foreach($list_users_prod as $value)
            <tr>
              <td>{{$value['firstname'].' '.$value['lastname']}}</td>
              <td class="text-center">Application</td>
              <td class="text-center">{{$value['duration']}}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div> -->

  <div class="row">
    <div class="card m-3 col">
      <div class="card-body">
        <table class="table">
          <tr>
            <td class="font-weight-bold text-blue-900 text-center">Tasks Volume</td>
          </tr>
          @foreach($list_users_prod as $value)
            <tr>
              <td colspan="4">
                <canvas id="PerActivity{{$value['Canvas']}}" width="400" height="50"></canvas>
              </td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>

<script>
    // MTD Volume
    var order = new Chart(document.getElementById('MTDTaskVolume').getContext('2d'), {
    type: "line",
    data: {
        labels: {!!json_encode($mtd_task_dates)!!},
        datasets: [{
            label: 'MTD Task Volume',
            data: {!!json_encode($mtd_task_volume)!!},
            borderColor:'#007bff',
            borderWidth: 1
        }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
        }
    });

    
    // User MTD Volume
    var order = new Chart(document.getElementById('UserMTDTaskVolume').getContext('2d'), {
    type: "line",
    data: {
        labels: {!!json_encode($user_mtd_task_dates)!!},
        datasets: [{
            label: 'Your MTD Task Volume',
            data: {!!json_encode($user_mtd_task_volume)!!},
            borderColor:'#007bff',
            borderWidth: 1
        }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
        }
    });
    
    // List Per Activity
    var order = new Chart(document.getElementById('PerActivity1').getContext('2d'), {
    type: "bar",
    data: {
        labels: {!!json_encode($titles1)!!},
        datasets: [{
            label: 'Volume',
            data: {!!json_encode($user_count_vol1)!!},
            backgroundColor: '#007bbf',
            borderColor:'#007bbf',
            borderWidth: 1
        }]
      },
      options: {
          legends: {
            display: false
          },
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          },
        }
    });

</script>
