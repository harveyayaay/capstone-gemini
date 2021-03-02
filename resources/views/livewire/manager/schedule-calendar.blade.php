<div>
  <div class="container d-flex justify-content-center">
    <div class="d-flex justify-content-center col-lg-7 shadow bg-blue-900 text-white">
    </div>
  </div>
  <div class="container d-flex justify-content-center">
    <div class="card-body col-lg-7 shadow p-3 bg-blue-900 text-white">
      <div class="row">
        <div class="col-1 p-2 ml-2" wire:click="prev_month">
          <i class="fa fa-chevron-left" aria-hidden="true"></i>
        </div>
        <div class="col">
          <div class="col-sm-12 d-flex justify-content-center pt-2">
            <div class="">{{date('F Y', strtotime($current_date))}}</div>
          </div>
        </div>
        <div class="col-1 p-2 mr-2" wire:click="next_month">
          <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </div>
      </div>
      </div>
    </div>
    @if(date('Y-m-d', strtotime($current_date)) < date('Y', strtotime('+1 year')))
      <div class="container d-flex justify-content-center">
          <div class="card-body col-lg-7 shadow p-3 mb-5 ">
            <table class="table table-bordered">
              <tr class="bg-blue-900 text-white">
                <td>Sun</td>
                <td>Mon</td>
                <td>Tue</td>
                <td>Wed</td>
                <td>Thu</td>
                <td>Fri</td>
                <td>Sat</td>
              </tr>

              <tr class="col bg-white text-dark">

              @for($i = 0; $i < $set_initial_day; $i++)
                @if(date('Y-m-d', strtotime($current_date)) <= date('Y-m-d'))
                  <td class="bg-secondary"></td>
                @else
                  <td></td>
                @endif
              @endfor   

            @if(date('Y-m-d', strtotime($current_date)) > date('Y', strtotime('+1 year')))
              <!-- @while($current_day_display <= $last_day_display)
                @if(date('l', strtotime($current_day_display)) === 'Sunday')
                  </tr>
                  <tr class="col bg-white text-dark">
                @endif

                @if($current_day_display < date('Y-m-d') || date('Y-m-d', strtotime($current_date)) < date('Y-m-d'))
                  <td class="bg-secondary"><div class="text-dark">{{date('d', strtotime($current_day_display))}}</div></td>
                @else
                  <td><a href="/admin/schedule-management/add-schedule/{{$current_day_display}}" class="text-blue-900 font-weight-bold">{{date('d', strtotime($current_day_display))}}</a></td>
                @endif
                <div class="d-none">{{$current_day_display = date('Y-m-d', strtotime('+1 day', strtotime(date($current_day_display))))}}<div>
              @endwhile -->
            @else
              @while($current_day_display <= $last_day_display)
                @if(date('l', strtotime($current_day_display)) === 'Sunday')
                  </tr>
                  <tr class="col bg-white text-dark">
                @endif

                @if($current_day_display < date('Y-m-d') || date('Y-m-d', strtotime($current_date)) < date('Y-m-d'))
                  <td class="bg-secondary"><div class="text-dark">{{date('d', strtotime($current_day_display))}}</div></td>
                @else
                  <td><a href="/admin/schedule-management/add-schedule/{{$current_day_display}}" class="text-blue-900 font-weight-bold">{{date('d', strtotime($current_day_display))}}</a></td>
                @endif
                <div class="d-none">{{$current_day_display = date('Y-m-d', strtotime('+1 day', strtotime(date($current_day_display))))}}<div>
              @endwhile
            @endif
              @for($i = 0; $i < $set_last_day; $i++)
                @if(date('Y-m-d', strtotime($current_date)) < date('Y-m-d'))
                  <td class="bg-secondary"></td>
                @else
                  <td></td>
                @endif
              @endfor   
              </tr>
            </table>
          </div>
        </div>
      </div>
    @else
      <div class="container d-flex justify-content-center">
        <div class="card-body col-lg-7 shadow p-3 mb-5 text-center">
          Can't show preview for now.
        </div>
      </div>
    @endif
  </div>
</div>
