 <div>
  <div class="card col mb-2">
    <div class="card-body"> 
      <div class="d-flex justify-content-end mb-2">
        <div class="form-control-sm mr-auto"><h6 class="bg-blue-900 p-2 rounded text-white">Overall MTD Volume</h6></div>
        <!-- <input type="submit" class="form-control-sm col-1 btn-primary">  -->
      </div>
      <canvas id="MTDTaskVolume" width="400" height="70"></canvas>
    </div>
  </div>
  <div class="row">
    <div class="card m-3 col-7">
      <div class="card-body">
        <table class="table table-sm ">
          <thead class="text-blue-900 font-weight-bold">
            <tr class="row bg-blue-900 text-white">
              <td class="col">Name of Frontliners</td>
              <td class="text-center col">Volume</td>
              <td class="text-center col">Average</td>
              <td class="text-center col">QA</td>
              <td class="text-center col">Escalation</td>
            </tr>
          </thead>
          <tbody class="text-gray-500">
          @foreach($list_users_prod as $value)
            <tr class="row">
              <td class="col bg-gray-100 text-dark">{{$value['firstname'].' '.$value['lastname']}}</td>
              <td class="text-center col bg-gray-200 text-dark">{{$value['volume']}}</td>
              <td class="text-center col bg-gray-200 text-dark">{{$value['average']}}</td>
              <td class="text-center col bg-gray-300 text-dark">{{$value['qa']}}</td>
              <td class="text-center col bg-gray-300 text-dark">{{$value['esc']}}</td>
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
            <tr class="bg-blue-900 text-white">
              <td>Frontliner Name</td>
              <td class="text-center">Ongoing Activity</td>
            </tr>
          </thead>
          <tbody class="text-gray-500">
          @forelse($list_users_ongoing as $value)
            <tr>
              <td class="bg-gray-100 text-dark">{{$value['firstname'].' '.$value['lastname']}}</td>
              <td class="bg-gray-200 text-dark text-center">{{$value['task_ongoing']}}</td>
            </tr>
          @empty
            <tr class="text-center">
              <td colspan="2" class="bg-gray-100 text-dark">No Ongoing Tasks Found</td>
            </tr>
          @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
<script>
    // MTD Volume
    var order = new Chart(document.getElementById('MTDTaskVolume').getContext('2d'), {
    type: "line",
    data: {
        labels: {!!json_encode($data_dates)!!},
        datasets: [{
            label: 'MTD Task Volume',
            data: {!!json_encode($data_volume)!!},
            backgroundColor: '#17a2b8',
            borderColor:'#17a2b8',
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
            label: 'Average Per Activity',
            data: {!!json_encode($user_count_vol1)!!},
            backgroundColor: '#007bbf',
            borderColor:'#17a2b8',
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

    
    var order = new Chart(document.getElementById('PerActivity2').getContext('2d'), {
    type: "bar",
    data: {
        labels: {!!json_encode($titles2)!!},
        datasets: [{
            label: 'Average Per Activity',
            data: {!!json_encode($user_count_vol2)!!},
            backgroundColor: '#17b2b8',
            borderColor:'#17a2b8',
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

    
    var order = new Chart(document.getElementById('PerActivity3').getContext('2d'), {
    type: "bar",
    data: {
        labels: {!!json_encode($titles3)!!},
        datasets: [{
            label: 'Average Per Activity',
            data: {!!json_encode($user_count_vol3)!!},
            backgroundColor: '#004cbf',
            borderColor:'#17a2b8',
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
  

    

  <!-- <div class="row">
    <div class="card m-3 col">
      <div class="card-body">
        <table class="table">
          <tr>
            <td>List of Frontline</td>
            <td>Application</td>
            <td>Urgent</td>
            <td>Docusign</td>
            <td>AMIE</td>
          </tr>
          @foreach($list_users_prod as $value)
            <tr>
              <td>{{$value['firstname'].' '.$value['lastname']}}</td>
              <td colspan="4">
                <canvas id="PerActivity{{$value['Canvas']}}" width="400" height="30"></canvas>
              </td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div> -->

</div>
