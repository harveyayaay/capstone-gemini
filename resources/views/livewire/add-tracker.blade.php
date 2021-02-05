<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="d-flex justify-content-end mb-3">
      <select name="tracker" wire:model="tracker" id="" class="form-control-sm col-3">
        <option selected value='Productive'>Productive</option>
        <option value='Non-productive'>Non-productive</option>
      </select>
    </div>
    @if($tracker == 'Productive')
        <div class="form-group-sm row">
          <label for="inputPassword" class="col-sm-2 col-form-label-sm">Activity Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm" name="field_title" id="field_title" required>
          </div>
        </div>
        <div class="form-group-sm row">
          <label for="inputPassword" class="col-sm-2 col-form-label-sm">Process Time</label>
          <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm" name="field_process_time" id="field_process_time" placeholder="hh:mm:ss" required>
          </div>
        </div>
        <div class="form-group-sm row">
          <label for="inputPassword" class="col-sm-2 col-form-label-sm">SLA</label>
          <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm" name="field_sla" id="field_sla" placeholder="hh:mm:ss" required>
          </div>
        </div>
        <div class="form-group-sm row">
          <label for="inputPassword" class="col-sm-2 col-form-label-sm">Level</label>
          <div class="col-sm-10">
            <select name="field_level" id="field_level" class="form-control form-control-sm">
              <option selected>Primary</option> 
              <option>Secondary</option>
            </select>
          </div>
        </div>
        <input type="text" name="field_type" id="field_type" value="Productive" hidden>
        <div class="d-flex justify-content-end text-center">
          <input type="submit" value="Save" class="form-control-sm col-1 mt-4 text-white bg-blue-900 mb-2">
        </div>
    @else
        <div class="form-group-sm row">
          <label for="inputPassword" class="col-sm-2 col-form-label-sm">Activity Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm" name="field_title" id="field_title" required>
          </div>
        </div>
        <input type="text" name="field_process_time" id="field_process_time" value="" hidden>
        <input type="text" name="field_sla" id="field_sla" value="" hidden>
        <input type="text" name="field_level" id="field_level" value="" hidden>
        <input type="text" name="field_type" id="field_type" value="Non-productive" hidden>
        <div class="d-flex justify-content-end text-center">
          <input type="submit" value="Save" class="form-control-sm col-1 btn-primary mb-2">
        </div>
    @endif
</div>
