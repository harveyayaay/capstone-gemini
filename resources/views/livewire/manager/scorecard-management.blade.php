<div>
  <div class="card mt-3">
    <div class="card-body">
        <div class="row">
          <div class="d-flex justify-content-center col">
            @if($page == 1)
              <span class="rounded-circle bg-blue-900 h-4 w-4"><h1 class="text-center text-white p-2">1</h1></span>
            @else
              <span class="rounded-circle bg-secondary h-4 w-4"><h1 class="text-center text-white p-2">1</h1></span>
            @endif
          </div>
          <div class="d-flex justify-content-center col">
            @if($page == 2)
              <span class="rounded-circle bg-blue-900 h-4 w-4"><h1 class="text-center text-white p-2">2</h1></span>
            @else
              <span class="rounded-circle bg-secondary h-4 w-4"><h1 class="text-center text-white p-2">2</h1></span>
            @endif
          </div>
          <div class="d-flex justify-content-center col">
            @if($page == 3)
              <span class="rounded-circle bg-blue-900 h-4 w-4"><h1 class="text-center text-white p-2">3</h1></span>
            @else
              <span class="rounded-circle bg-secondary h-4 w-4"><h1 class="text-center text-white p-2">3</h1></span>
            @endif
          </div>
        </div>
    </div>
  </div>
  <div class="card mt-3">
    <div class="card-body bg-blue-900">
      <div class="container">
        <div class="card">
          <div class="card-body">
          @if($page == 1)
            <label for="metric" class="col-form-label-sm">Metric</label>
            <input type="text" class="form-control form-control-sm" id="metric" name="title" wire:model="title"  required> 

            <label for="inputPassword" class="col-form-label-sm">Range Type</label>
            <select name="type" class="form-control form-control-sm" name="type" wire:model="type">
              <option selected>Time</option>
              <option>Volume</option>
            </select>

            <label for="goal" class="col-form-label-sm">Goal</label>

            <input type="text" class="form-control form-control-sm" name="samplegoal" wire:model="samplegoal" required>
            <label for="inputPassword" class="col-form-label-sm">Reference</label>
            <select id="reference" name="reference" wire:model="reference"  class="form-control form-control-sm">
              <option selected>All</option>
            </select>
            
            <div class="d-flex justify-content-end text-center m-3">
              @if($next == true)
                <button wire:click="next" type="button" class="form-control-sm col-lg-2 col-md-2 mt-2 bg-blue-900 text-white mb-2">Next</button>
              @else
                <button wire:click="next" type="button" class="form-control-sm col-lg-2 col-md-2 mt-2 bg-secondary text-white mb-2" disabled>Next</button>
              @endif
            </div>
          @elseif($page == 2)
            <div class="d-flex justify-content-center">
              <table class="table table-sm table-borderless d-flex justify-content-center">
                <tr>
                  <td><label for="metric" class="col-form-label-sm col">3.0</label></td>
                  <td><input type="text" class="form-control form-control-sm col" id="metric" name="percentage1" wire:model="percentage1"  required></td>
                </tr>
                <tr>
                  <td><label for="metric" class="col-form-label-sm col">2.5</label></td>
                  <td><input type="text" class="form-control form-control-sm col" id="metric" name="percentage2" wire:model="percentage2"  required></td>
                </tr>
                <tr>
                  <td><label for="metric" class="col-form-label-sm col">2.0</label></td>
                  <td><input type="text" class="form-control form-control-sm col" id="metric" name="percentage3" wire:model="percentage3"  required></td>
                </tr>
                <tr>
                  <td><label for="metric" class="col-form-label-sm col">1.5</label></td>
                  <td><input type="text" class="form-control form-control-sm col" id="metric" name="percentage4" wire:model="percentage4"  required></td>
                </tr>
                <tr>
                  <td><label for="metric" class="col-form-label-sm col">1.0</label></td>
                  <td><input type="text" class="form-control form-control-sm col" id="metric" name="percentage5" wire:model="percentage5"  required></td>
                </tr>
              </table>
            </div>
            <div class="d-flex justify-content-end text-center m-3">
              <button wire:click="prev" type="button" class="form-control-sm col-lg-2 col-md-2 mt-2 bg-secondary text-white mb-2">Prev</button>
              <button wire:click="next" type="button" class="form-control-sm col-lg-2 col-md-2 mt-2 bg-blue-900 text-white mb-2">Next</button>
            </div>
              <!-- <input type="button" class="form-control-sm col-lg-2 col-md-2 mt-2 bg-secondary text-white mb-2" value="Next" disabled> -->
         
          @elseif($page == 3)
            <table class="table table-sm">
              <tr>
                <td>Ranges</td>
                <td>From</td>
                <td>To</td>
              </tr>
              @foreach($performance_ranges_display as $display)
                @if($type == "Time")
                <tr>
                  <td>{{$display['range']}}</td>
                  <td>{{$display['from']}}</td>
                  <td>{{$display['to']}}</td>
                </tr>
                @else
                <tr>
                  <td>{{$display['range']}}</td>
                  <td>{{$display['from']}}</td>
                  <td>{{$display['to']}}</td>
                </tr>
                @endif
              @endforeach
            </table>
            <div class="d-flex justify-content-end text-center m-3">
              <button wire:click="prev" type="button" class="form-control-sm col-lg-2 col-md-2 mt-2 bg-secondary text-white mb-2">Prev</button>
              <button wire:click="" type="button" class="form-control-sm col-lg-2 col-md-2 mt-2 bg-blue-900 text-white mb-2">Save</button>
              <!-- <input type="button" class="form-control-sm col-lg-2 col-md-2 mt-2 bg-secondary text-white mb-2" value="Next" disabled> -->
            </div>
          @endif  
          </div>
        </div>
      </div>
    </div>
  </div>
</div>







