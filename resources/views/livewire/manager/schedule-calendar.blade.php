<div>
  <div class="container d-flex justify-content-center">
    <div class="d-flex justify-content-center col-lg-7 shadow bg-blue-900 text-white">
      <div class="pt-3">{{date('Y', strtotime($current_date))}}</div>
    </div>
  </div>
  <div class="container d-flex justify-content-center">
    <div class="card-body col-lg-7 shadow p-3 bg-blue-900 text-white">
      <div class="row">
        <div class="col-1 p-2 ml-2" wire:click="prev_month">
          <i class="fa fa-chevron-left" aria-hidden="true"></i>
        </div>
        <div class="col">
          <div class="col-sm-12">
            <select class="form-control" wire:model="month_picked">
              <option value='January'>January</option>
              <option value='February'>February</option>
              <option value='March'>March</option>
              <option value='April'>April</option>
              <option value='May'>May</option>
              <option value='June'>June</option>
              <option value='July'>July</option>
              <option value='August'>August</option>
              <option value='September'>September</option>
              <option value='October'>October</option>
              <option value='November'>November</option>
              <option value='December'>December</option>
            </select>
          </div>
        </div>
        <div class="col-1 p-2 mr-2" wire:click="next_month">
          <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </div>
      </div>
      </div>
    </div>
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
              <td></td>
            @endfor   

            @while($current_day_display <= $last_day_display)
              @if(date('l', strtotime($current_day_display)) === 'Sunday')
                </tr>
                <tr class="col bg-white text-dark">
              @endif

              <td><a href="/admin/schedule-management/add-schedule/{{$current_day_display}}" class="text-dark">{{date('d', strtotime($current_day_display))}}</a></td>
              <div class="d-none">{{$current_day_display = date('Y-m-d', strtotime('+1 day', strtotime(date($current_day_display))))}}<div>
            @endwhile

            @for($i = 0; $i < $set_last_day; $i++)
              <td></td>
            @endfor   
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
