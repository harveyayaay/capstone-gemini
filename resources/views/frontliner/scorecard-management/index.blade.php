@extends('layouts.app')
@section('title', 'Scorecard')
@section('caption', '(Caption..)')
@section('content')

<div class="card mt-5">
  <div class="card-body">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#scorecard">Frontline Scorecard Information</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#metrics">Metrics</a>
      </li>
    </ul>

    <!-- Scorecard Tab -->
    <div class="tab-content">
      <div id="scorecard" class="tab-pane active"><br>
      <!-- Accordion Start -->
        @foreach($user_scorecard as $value)
          @if($value['id'] == Auth::user()->id)
            <table class="table table-hover table-sm">
              <thead class="text-blue-800">
                <tr>
                  <th>Metric</th>
                  <th class="text-center">Actual</th>
                  <th class="text-center">Goal</th> 
                  <th class="text-center">Performance Percentage</th>
                  <th class="text-center">Score</th>
                </tr>
              </thead>
              <tbody class="text-gray-500">
              @foreach($value['scorecard'] as $val)
                <tr>
                  <td>{{$val['titles']}}</td>
                  <td class="text-center">{{$val['actuals']}}</td>
                  <td class="text-center">{{$val['goals']}}</td>
                  <td class="text-center">95%</td>
                  <td class="text-center">3</td>
                </tr>
              @endforeach
                <tr>
                  <td>Quality Assurance</td>
                  <td class="text-center">
                    <!-- <input type="text" class="form-control form-control-sm" value="0" required> -->
                    0
                  </td>
                  <td class="text-center">
                    <!-- <input type="text" class="form-control form-control-sm" value="100" required> -->
                    0
                  </td>
                  <td class="text-center">0%</td>
                  <td class="text-center">0</td>
                </tr>
                <tr>
                  <td>Escalation</td>
                  <td class="text-center">
                    <!-- <input type="text" class="form-control form-control-sm" value="0" required> -->
                    0
                  </td>
                  <td class="text-center">
                    <!-- <input type="text" class="form-control form-control-sm" value="0" required> -->
                    0
                  </td>
                  <td class="text-center">100%</td>
                  <td class="text-center">3</td>
                </tr>
                <tr>
                  <td class="font-weight-bold text-blue-900">OVERALL SCORE</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td class="text-center font-weight-bold text-blue-900">2.4</td>
                </tr>
              </tbody>
            </table>
          @endif
        @endforeach
      <!-- /Accordion Start -->
      </div>
    <!-- /Scorecard Tab -->

    <!-- Metrics Tab  -->
    <div id="metrics" class="tab-pane fade"><br>
      <!-- <div class="d-flex justify-content-end text-center">
        <a href="/admin/scorecard-management/add" class="form-control-sm col-1 bg-blue-900 text-white mb-2">
          <button>Add Metric</button>
        </a>
      </div> -->
      <!-- Accordion Start -->

      @foreach($records as $value => $key)
        <div class="accordion" id="accordionExample">
          <div class="card">
            <div class="card-header" id="heading{{$loop->iteration}}">
              <button class="btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse{{$loop->iteration}}">
                {{$key['metric_record']->title}}
              </button>
            </div>
            <div id="collapse{{$loop->iteration}}" class="collapse row" aria-labelledby="heading{{$loop->iteration}}" data-parent="#accordionExample">

              <div class="col-5">
                <div class="card-body">
                  <div class="container">
                    
                    <p>Metric Type: {{$key['metric_record']->type}}</p>
                    <p>Metric Goal: {{$key['metric_record']->goal}}</p>
                  </div>
                </div>
              </div>
              <div class="col-7">
                <table class="table  table-hover table-sm">
                  <thead>
                    <tr>
                      <td>Ranges</td>
                      <td>From</td>
                      <td>To</td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($key['perf_record'] as $value2 => $key2)
                      <tr>
                        <td>{{$key2->range}}</td>
                        <td>{{$key2->from}}</td>
                        <td>{{$key2->to}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
            </div>
          </div>
        </div>
      @endforeach
      <!-- /Accordion Start -->
    </div>
    <!-- Metrics Tab  -->
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
