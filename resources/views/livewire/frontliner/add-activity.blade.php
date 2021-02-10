<div>
  <!-- ADD ACTIVITY -->
  <form action="/supervisor/activity-tracker/store" method="post">
  @csrf
    <div class="card mt-4">
      <div class="card-body"> 
        <p>Add Activity</p>
          <div class="form-row">
            <div class="col-4">
              <select id="" class="form-control form-control-sm" name="type" wire:model="type">
              
              </select>
            </div>
            <div class="col-3">
              <input id="txtnum" maxlength="7" onkeypress="return isNumber(event)" max="7" class="form-control form-control-sm" type="text" name="case_num"  wire:model="case_num" placeholder="Enter Case No." >
            </div>
            <div class="col-3">
              <input type="text" class="form-control form-control-sm" placeholder="Enter Date and Time Received" name="date_received" wire:model="date_received">
            </div>
            <div class="col-2">
              <button type="button" class="form-control form-control-sm bg-primary text-white" data-toggle="modal" data-target="#add" name="add_btn" wire:click="add_btn">Add Task</button>
            </div>
          </div>
      </div>
    </div>
  </form>
  
  <!-- Modal -->
  <div  wire:ignore.self class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
            <table class="table table-sm table-borderless">
              <tr>
                <td>Activity Title:</td>
                <td>{{$type}}</td>
              </tr>
              <tr>
                <td>Case Number:</td>
                <td>{{$case_num}}</td>
              </tr>
              <tr>
                <td>Date and Time Received:</td>
                <td>{{$date_received}}</td>
              </tr>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="form-control form-control-sm bg-secondary text-white" data-dismiss="modal">Close</button>
          <button type="button" class="form-control form-control-sm bg-primary text-white">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>
