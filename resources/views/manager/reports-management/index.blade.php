@extends('layouts.app')
@section('title', 'Scheduling Management')
@section('caption', '(Caption..)')
@section('content')

<div class="card">
  <div class="card-body">
    <div class="card-body">
      <!-- <div class="offset-6 text-right pb-3">
        <input type="date" class="mr-3">
        <input type="date" class="mr-3">
        <button class="btn btn-primary col-2">Generate</button>
      </div> -->
      
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#scorecard">Employee Scorecard Information</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#metrics">Metrics</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div id="scorecard" class="tab-pane active"><br>
            <div id="accordion" class="myaccordion">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="d-flex align-items-center justify-content-between btn btn-link collapsed p-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                      Pas Aguilar
                    </button>
                  </h2>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <div class="row 5-10 pr-3 pl-3">
                      <table class="table cust-datatable dataTable no-footer table-hover table-sm">
                        <thead>
                          <tr class=" row text-center">
                            <th class="col-3">Metric</th>
                            <th class="col-2">Actual</th>
                            <th class="col-2">Goal</th>
                            <th class="col-2">Performance Percentage</th>
                            <th class="col-3">Score</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="row text-center">
                            <td class="col-3 pt-3">Volume</td>
                            <td class="col-2 pt-3">1009</td>
                            <td class="col-2 pt-3">20012</td>
                            <td class="col-2 pt-3">1009</td>
                            <td class="col-3 pt-3">20012</td>
                          </tr> 
                          <tr class="row text-center">
                            <td class="col-3 pt-3">Apt App</td>
                            <td class="col-2 pt-3">1009</td>
                            <td class="col-2 pt-3">20012</td>
                            <td class="col-2 pt-3">1009</td>
                            <td class="col-3 pt-3">20012</td> 
                          </tr> 
                          <tr class="row text-center">
                            <td class="col-3 pt-3"><i>Average Score</i></td>
                            <td class="col-2 pt-3"></td>
                            <td class="col-2 pt-3"></td>
                            <td class="col-2 pt-3"></td>
                            <td class="col-3 pt-3"><i>0012</i></td>
                          </tr>   
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="d-flex align-items-center justify-content-between btn btn-link collapsed p-0" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Pio Nicanor
                    </button>
                  </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    <table class="table cust-datatable dataTable no-footer table-hover table-sm">
                      <thead>
                        <tr class=" row text-center">
                          <th class="col-3">Metric</th>
                          <th class="col-2">Actual</th>
                          <th class="col-2">Goal</th>
                          <th class="col-2">Performance Percentage</th>
                          <th class="col-3">Score</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="row text-center">
                          <td class="col-3 pt-3">Volume</td>
                          <td class="col-2 pt-3">1009</td>
                          <td class="col-2 pt-3">20012</td>
                          <td class="col-2 pt-3">1009</td>
                          <td class="col-3 pt-3">20012</td>
                        </tr> 
                        <tr class="row text-center">
                          <td class="col-3 pt-3">Apt App</td>
                          <td class="col-2 pt-3">1009</td>
                          <td class="col-2 pt-3">20012</td>
                          <td class="col-2 pt-3">1009</td>
                          <td class="col-3 pt-3">20012</td> 
                        </tr> 
                        <tr class="row text-center">
                          <td class="col-3 pt-3"><i>Average Score</i></td>
                          <td class="col-2 pt-3"></td>
                          <td class="col-2 pt-3"></td>
                          <td class="col-2 pt-3"></td>
                          <td class="col-3 pt-3"><i>0012</i></td>
                        </tr>   
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="metrics" class="tab-pane fade"><br>
          
            <div class="myaccordion">
              <div class="offset-10 col-2 text-right pb-3">
                <a type='button' class="btn btn-block btn-primary" href="#">Add Metrics</a>
              </div>
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="d-flex align-items-center justify-content-between btn btn-link collapsed p-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                      Volume
                    </button>
                  </h2>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <div class="row 5-10 pr-3 pl-3">
                      <table class="table cust-datatable dataTable no-footer table-hover table-sm">
                        <thead>
                          <tr class=" row text-center">
                            <th class="col-3">Metric</th>
                            <th class="col-2">Actual</th>
                            <th class="col-2">Goal</th>
                            <th class="col-2">Performance Percentage</th>
                            <th class="col-3">Score</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="row text-center">
                            <td class="col-3 pt-3">Volume</td>
                            <td class="col-2 pt-3">1009</td>
                            <td class="col-2 pt-3">20012</td>
                            <td class="col-2 pt-3">1009</td>
                            <td class="col-3 pt-3">20012</td>
                          </tr> 
                          <tr class="row text-center">
                            <td class="col-3 pt-3">Apt App</td>
                            <td class="col-2 pt-3">1009</td>
                            <td class="col-2 pt-3">20012</td>
                            <td class="col-2 pt-3">1009</td>
                            <td class="col-3 pt-3">20012</td> 
                          </tr> 
                          <tr class="row text-center">
                            <td class="col-3 pt-3"><i>Average Score</i></td>
                            <td class="col-2 pt-3"></td>
                            <td class="col-2 pt-3"></td>
                            <td class="col-2 pt-3"></td>
                            <td class="col-3 pt-3"><i>0012</i></td>
                          </tr>   
                        </tbody>
                      </table>
                      <div class="offset-10 col-2 text-right pb-3">
                        <a type='button' class="btn btn-block btn-primary" href="#">Update Metric</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>




    </div>
  </div>
</div>
@endsection

@section('custom_js')
<script>
var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'))
triggerTabList.forEach(function (triggerEl) {
  var tabTrigger = new bootstrap.Tab(triggerEl)

  triggerEl.addEventListener('click', function (event) {
    event.preventDefault()
    tabTrigger.show()
  })
})
</script>

@endsection
