<div>
    <!-- Accordion Start -->
    @foreach($user_scorecard as $value)
    <form wire:submit.prevent="submit">
      <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header" id="heading{{$loop->iteration}}">
              <button class="btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse{{$loop->iteration}}">
                {{$value['name']}}
              </button>
          </div>
          <div id="collapse{{$loop->iteration}}" class="collapse" aria-labelledby="heading{{$loop->iteration}}" data-parent="#accordionExample">
            <div class="card-body">
              <div class="d-flex justify-content-end text-center">
                <button class="form-control-sm col-1 bg-blue-900 text-white mb-2" wire:click="saveEscQA({{ $value['id'] }})">Save Changes </button>
              </div>
              <table class="table table-hover table-sm">
                <thead class="bg-blue-900 text-white">
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
                    <td class="text-center">{{$val['percentages']}}%</td>
                    <td class="text-center">{{number_format($val['ranges'], 1, '.', '')}}</td>
                  </tr>
                @endforeach
                @foreach($value['qa'] as $val)
                  <tr>
                    <td>{{$val['titles']}}</td>
                    @if(Auth::user()->position == 'Supervisor')
                      <td class="text-center">
                        <input type="text" class="form-control form-control-sm" value="{{$val['actuals']}}" name="qa_actual" required>
                      </td>
                    @else
                      <td class="text-center">{{$val['actuals']}}</td>
                    @endif
                    <td class="text-center">{{$val['goals']}}</td>
                    <td class="text-center">{{$val['percentages']}}%</td>
                    <td class="text-center">{{number_format($val['ranges'], 1, '.', '')}}</td>
                  </tr>
                @endforeach
                @foreach($value['esc'] as $val)
                  <tr>
                    <td>{{$val['titles']}}</td>
                    @if(Auth::user()->position == 'Supervisor')
                      <td class="text-center">
                        <input type="text" class="form-control form-control-sm" value="{{$val['actuals']}}" name="esc_actual" required>
                      </td>
                    @else
                      <td class="text-center">{{$val['actuals']}}</td>
                    @endif
                    <td class="text-center">{{$val['goals']}}</td>
                    <td colspan="2"></td>
                  </tr>
                @endforeach
                  <!-- <tr>
                    <td>Quality Assurance</td>
                    <td class="text-center">
                      <input type="text" class="form-control form-control-sm" value="0" required>
                      
                    </td>
                    <td class="text-center">
                      <input type="text" class="form-control form-control-sm" value="100" required>
                      
                    </td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                  </tr> -->
                  <tr>
                    <td class="font-weight-bold text-blue-900">OVERALL SCORE</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-center font-weight-bold text-blue-900">{{number_format($value['overall'], 1, '.', '')}}</td>
                  </tr>
                </tbody>
              </table>
              </div>
          </div>
        </div>
      </div>
    @endforeach
    </form>
    <!-- /Accordion Start -->
</div>
