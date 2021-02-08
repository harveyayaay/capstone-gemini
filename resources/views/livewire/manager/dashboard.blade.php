 
  <div class="card col mb-2">
    <div class="card-body"> 
      Overall MTD Volume
      <canvas id="MTDTaskVolume" width="400" height="70"></canvas>
    </div>
  </div>

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
              <td class="text-center">Volume</td>
              <td class="text-center">Average</td>
            </tr>
          </thead>
          <tbody class="text-gray-500">
          @foreach($list_users_prod as $value)
            <tr>
              <td>{{$value['firstname'].' '.$value['lastname']}}</td>
              <td class="text-center">{{$value['volume']}}</td>
              <td>{{$value['average']}}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="row">
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

</script>
