<div>
  <div class="row">
    <div class="col-lg-8 col-sm-12 col-md-12">
    <div class="pt-2 pl-2 pb-1 mt-5 bg-blue-900 text-white"><h6>Add Metric</h6></div>
      <div class="card">
        <div class="card-body">

          <label for="metric" class="col-form-label-sm">Metric</label>
          <input type="text" class="form-control form-control-sm" id="metric" name="title" wire:model="title"  required> 

          <label for="inputPassword" class="col-form-label-sm">Range Type</label>
          <select name="type" class="form-control form-control-sm" name="type" wire:model="type">
            <option selected>Time</option>
            <option>Percentage</option>
          </select>

          <label for="goal" class="col-form-label-sm">Goal</label>
          @if($exceeds == true)
            <label for="goal" class="col-form-label-sm text-danger">(It must not exceed limit (24 hrs below allowed))</label>
          @elseif(Str::of($goal)->length() > 7 && $perf_ranges == false && $type = 'Time')
            <label for="goal" class="col-form-label-sm text-danger">(It must be in a proper format (hh:mm:ss))</label>
          @endif

          <input type="text" class="form-control form-control-sm" name="goal" wire:model="goal" required>
          <label for="inputPassword" class="col-form-label-sm">Reference</label>
          <select id="reference" name="reference" wire:model="reference"  class="form-control form-control-sm">
            <option selected>All</option>
            
            @foreach($references['task_lists'] as $value)
              <option>{{$value->title}}</option>
            @endforeach
          </select>
          
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-sm-12 col-md-12">
    <div class="pt-2 pl-2 pb-1 mt-5 bg-blue-900 text-white"><h6>Performance Ranges</h6></div>
      <div class="card">
        <div class="card-body">
          <div class="flex-fill">
            <table class="table">
              <tr class="bg-secondary text-white">
                <td>Ranges</td>
                <td>From</td>
                <td>To</td>
              </tr>
              <tr>
                <td>3.0</td>
                <td>{{$data_from_1}}</td>
                <td>{{$data_to_1}}</td>
              </tr>
              <tr>
                <td>2.5</td>
                <td>{{$data_from_2}}</td>
                <td>{{$data_to_2}}</td>
              </tr>
              <tr>
                <td>2.0</td>
                <td>{{$data_from_3}}</td>
                <td>{{$data_to_3}}</td>
              </tr>
              <tr>
                <td>1.5</td>
                <td>{{$data_from_3}}</td>
                <td>{{$data_to_4}}</td>
              </tr>
              <tr>
                <td>1.0</td>
                <td>{{$data_from_3}}</td>
                <td>{{$data_to_5}}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-end text-center m-3">
    @if($perf_ranges == 'true' && $title != null && $goal != null)
      <button wire:click="save" type="button" class="form-control-sm col-lg-2 col-md-2 mt-2 bg-blue-900 text-white mb-2">Add Metric</button>
    @else
      <input type="button" class="form-control-sm col-lg-2 col-md-2 mt-2 bg-secondary text-white mb-2" value="Add Metric" disabled>
    @endif
  </div>  
</div>


