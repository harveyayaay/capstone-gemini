<div>
  <div class="container pb-5">
    <div class="d-flex justify-content-center">
      <div class="d-flex justify-content-center col-lg-10 shadow p-3 bg-blue-900 text-white">
        <div class="pt-3">Make a schedule for <strong>{{date('F j, Y', strtotime($picked_date))}}</strong></div>
      </div>
    </div>
    <div class="d-flex justify-content-center">
      <div class="col-lg-10 shadow p-3">
        <div class="d-flex justify-content-end">
          <a href="/admin/schedule-management" class="form-control-sm col-lg-1 col-md-1 bg-blue-900 text-white text-center m-2" data-toggle="tooltip" data-placement="top" title="Go to Calendar Scheduler">
            <button><i class="fa fa-calendar" aria-hidden="true"></i></button>
          </a>
          
          <!-- <a href="/admin/schedule-management/view-schedule/{{$picked_date}}" class="form-control-sm col-lg-1 col-md-1 bg-success text-white text-center m-2" data-toggle="tooltip" data-placement="top" title="View Schedule">
            <button><i class="fa fa-eye" aria-hidden="true"></i></button>
          </a> -->
        </div>
        
    
        <div class="justify-content-center m-3">
          @include('flash-message')
          <table class="table">
            @forelse($scheduled_frontline as $frontline)
            <tr>
              <td>{{ $frontline->firstname }}</td>
              <td>
                <div class="row ml-3">
                  <div class="col">
                    @if($frontline->time == '18:00:00')
                      <input type="radio" wire:click="timeSelect({{$frontline->id}}, '18:00:00')" name="{{$frontline->id}}" class="form-check-input" checked="checked">
                    @else
                      <input type="radio" wire:click="timeSelect({{$frontline->id}}, '18:00:00')" name="{{$frontline->id}}" class="form-check-input">
                    @endif
                    <p>6PM</p>
                  </div>
                  <div class="col">
                    @if($frontline->time == '21:00:00')
                      <input type="radio" wire:click="timeSelect({{$frontline->id}}, '21:00:00')" name="{{$frontline->id}}" class="form-check-input" checked="checked">
                    @else
                      <input type="radio" wire:click="timeSelect({{$frontline->id}}, '21:00:00')" name="{{$frontline->id}}" class="form-check-input">
                    @endif
                    <p>9PM</p>
                  </div>
                  <div class="col">
                    @if($frontline->time == '00:00:00')
                      <input type="radio" wire:click="timeSelect({{$frontline->id}}, '00:00:00')" name="{{$frontline->id}}" class="form-check-input" checked="checked">
                    @else
                      <input type="radio" wire:click="timeSelect({{$frontline->id}}, '00:00:00')" name="{{$frontline->id}}" class="form-check-input">
                    @endif
                    <p>12MN</p>
                  </div>
                </div>
              </td>
              <td>
                <select id="" class="form-control form-control-sm" name="taskSelect" wire:model="taskSelected" wire:change="taskSelect({{$frontline->id}})" >
                  @foreach($task_lists as $tasks)
                    @if($taskSelected == $tasks->id)
                      <option selected value="{{$tasks->id}}">{{$tasks->title}}</option>
                    @else
                      <option selected value="{{$tasks->id}}">{{$tasks->title}}</option>
                    @endif
                  @endforeach
                </select>
              </td>
            </tr> 
                
            @empty
              <div class="d-flex justify-content-center m-3">
                  No Employee Schedule Available
              </div>
            @endforelse
          </table>
        </div>
        
        <div class="d-flex justify-content-end p-3">
          @if($schedListNull === true)
            <button class="form-control-sm bg-blue-900 text-white text-center" data-toggle="modal" data-target="#addEmployeeSchedule">Add Employee Schedule</button>
          @else
            <button class="form-control-sm bg-blue-900 text-white text-center" data-toggle="modal" data-target="#addEmployeeSchedule">Update Employee Schedule</button>
          @endif
        </div>

      </div>
    </div>
  </div>

  <div wire:ignore.self class="modal fade" id="addEmployeeSchedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content offset-6">
        <form wire:submit.prevent="submit">
          <div class="d-flex justify-content-center shadow p-3 bg-blue-900 text-white">
            Select Employees
          </div>
          <div class="modal-body">
            @forelse($frontline_list as $frontline)
              @if(in_array($frontline->id, $checkedFrontline))
                <div class="">
                  <input type="checkbox" value="{{$frontline->id}}" wire:click="frontlineSelect({{$frontline->id}})" checked="checked">
                  <label>{{$frontline->firstname.' '.$frontline->lastname}}</label>
                </div>
              @else
                <div class="">  
                  <input type="checkbox" value="{{$frontline->id}}" wire:click="frontlineSelect({{$frontline->id}})">
                  <label>{{$frontline->firstname.' '.$frontline->lastname}}</label>
                </div>
              @endif
            @empty
              <div class="">
                No Record Found. <a href="/admin/employee-management/add">Add Employee?</a>
              </div>
            @endforelse
          </div>
          <div class="d-flex justify-content-center p-3">
            @if($changes == true)
              <button class="form-control-sm bg-blue-900 col-12 text-white text-center" type="submit">Apply</button>
            @else
              <button class="form-control-sm bg-gray-500 col-12 text-white text-center" type="button">Apply</button>
            @endif
          </div>
        </form>
              
      </div>
    </div>
  </div>

  <!-- <div class="container">
    <div class="d-flex justify-content-center">
      <div class="d-flex justify-content-center col-lg-7 shadow p-3 bg-blue-900 text-white">
        <div class="pt-3">Schedule for <strong>{{date('F j, Y', strtotime($picked_date))}}</strong></div>
      </div>
    </div>
    <div class="d-flex justify-content-center">
      <div class="d-flex justify-content-center col-lg-7 shadow p-3">
        <table class="table table-bordered text-center bg-white">
          <tr class="">
            <td rowspan="2">Time</td>
            <td colspan="4">Tasks</td>
          </tr>
          <tr>
            <td>App</td>
            <td>Urgent</td>
            <td>Docu</td>
            <td>AMIE</td>
          </tr>
          <tr>
            <td>9-12</td>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
          </tr>
          <tr>
            <td>12-3</td>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
          </tr>
        </table>
      </div>
    </div>
  </div> -->
</div>
