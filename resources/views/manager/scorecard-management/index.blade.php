@extends('layouts.app')
@section('title', 'Scorecard Management')
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

        <!-- Scorecard Tab -->
        <div class="tab-content">
          <div id="scorecard" class="tab-pane active"><br>
          <!-- Accordion Start -->
            <div class="accordion" id="accordionExample">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Collapsible Group Item #1
                    </button>
                  </h2>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                    <table class="table  table-hover table-sm">
                      <thead>
                        <tr class=" row text-center">
                          <th class="col">Metric</th>
                          <th class="col">Actual</th>
                          <th class="col">Goal</th>
                          <th class="col">Performance Percentage</th>
                          <th class="col">Score</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="row text-center">
                          <td class="col pt-3">Volume</td>
                          <td class="col pt-3">1009</td>
                          <td class="col pt-3">20012</td>
                          <td class="col pt-3">1009</td>
                          <td class="col pt-3">20012</td>
                        </tr> 
                        <tr class="row text-center">
                          <td class="col pt-3">Apt App</td>
                          <td class="col pt-3">1009</td>
                          <td class="col pt-3">20012</td>
                          <td class="col pt-3">1009</td>
                          <td class="col pt-3">20012</td> 
                        </tr> 
                        <tr class="row text-center">
                          <td class="col pt-3"><i>Average Score</i></td>
                          <td class="col pt-3"></td>
                          <td class="col pt-3"></td>
                          <td class="col pt-3"></td>
                          <td class="col pt-3"><i>0012</i></td>
                        </tr>   
                      </tbody>
                    </table>
                   </div>
                </div>
              </div>
            </div>
          <!-- /Accordion Start -->
          </div>
        <!-- /Scorecard Tab -->

        <!-- Metrics Tab  -->
        <div id="metrics" class="tab-pane fade"><br>
          <div class="offset-10 col-2 text-right pb-3">
            <a type='button' class="btn btn-block btn-primary" href="/admin/employee-management/add">Add Metric</a>
          </div>
          <!-- Accordion Start -->
          <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Collapsible Group Item #1
                  </button>
                </h2>
              </div>
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <table class="table  table-hover table-sm">
                    <thead>
                      <tr class=" row text-center">
                        <th class="col">Metric</th>
                        <th class="col">Actual</th>
                        <th class="col">Goal</th>
                        <th class="col">Performance Percentage</th>
                        <th class="col">Score</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="row text-center">
                        <td class="col pt-3">Volume</td>
                        <td class="col pt-3">1009</td>
                        <td class="col pt-3">20012</td>
                        <td class="col pt-3">1009</td>
                        <td class="col pt-3">20012</td>
                      </tr> 
                      <tr class="row text-center">
                        <td class="col pt-3">Apt App</td>
                        <td class="col pt-3">1009</td>
                        <td class="col pt-3">20012</td>
                        <td class="col pt-3">1009</td>
                        <td class="col pt-3">20012</td> 
                      </tr> 
                      <tr class="row text-center">
                        <td class="col pt-3"><i>Average Score</i></td>
                        <td class="col pt-3"></td>
                        <td class="col pt-3"></td>
                        <td class="col pt-3"></td>
                        <td class="col pt-3"><i>0012</i></td>
                      </tr>   
                    </tbody>
                  </table>
                  </div>
              </div>
            </div>
          </div>
          <!-- /Accordion Start -->
        </div>
        <!-- Metrics Tab  -->
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
