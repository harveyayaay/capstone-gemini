<div>
  @if($data_stored === false)
    <div class="pt-2 pl-2 pb-1 mt-5 bg-blue-900 text-white"><h6>Add Employee</h6></div>
    <form wire:submit.prevent="submit">
      <div class="card">
        <div class="card-body">
            @csrf
            <div class="d-flex row col-lg-12">
              <!-- LEFT COLUMN  -->
              <div class="p-2 flex-fill row col-lg-6">
                <label for="firstname" class="col-sm-12 col-form-label">First Name</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="firstname" id="firstname" wire:model="firstname" required>
                </div>
                <label for="lastname" class="col-sm-12 col-form-label">Last Name</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="lastname" id="lastname" wire:model="lastname" required>
                </div>
                <label for="email" class="col-sm-12 col-form-label">Email <span class="error text-danger text-monospace">{{ $email_error_message }}</span> @error('email') <span class="error text-danger text-monospace">({{ $message }})</span> @enderror</label>
                <div class="col-sm-12">
                  <input type="text" wire:model="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <!-- RIGHT COLUMN  -->
              <div class="p-2 flex-fill row col-lg-6">
                <label for="contact" class="col-sm-12 col-form-label">Contact Number <span class="error text-danger text-monospace">{{ $contact_error_message }}</span> @error('contact') <span class="error text-danger text-monospace">({{ $message }})</span> @enderror </label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="contact" id="contact" wire:model="contact" required>
                </div>
                <label for="hiredate" class="col-sm-12 col-form-label">Hire Date</label>
                <div class="col-sm-12">
                  <!-- <input type="date" id="datePickerId"  class="form-control" name="hiredate" required/> -->
                  <input type="date" id="hiredate"  class="form-control" name="hiredate" max="{{date('Y-m-d')}}" wire:model="hiredate" required/>
                </div>
                <label for="position" class="col-sm-12 col-form-label">Position</label>
                <div class="col-sm-12">
                  <select name="position" id="position" class="form-control" wire:model="position">
                    <option selected>Frontliner</option>
                    <option>Supervisor</option>
                  </select>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end text-center m-3">
          <button type="submit" class="form-control-sm col-lg-2 col-md-2 mt-2 bg-blue-900 text-white mb-2">Save</button>
        </div>
      </div>
    </form>
  @else
  <div class="d-flex justify-content-center">
    <div class="card col-4 p-3">
      <p class="font-weight-bold text-blue-900">Employee Added!</p>
      <div class="card col-12 p-3">
        <div>
          <p class="font-weight-bold">Here's the New Added Employee's Account Information.</p>
        </div>
        <table class="table table-borderless">
          <tr>
            <td>Username: </td>
            <td><i>{{$username}}</i></td>
          </tr>
          <tr>
            <td>Default Password: </td>
            <td><i>{{$password}}</i></td>
          </tr>
        </table>
      </div>
        <div class="d-flex justify-content-end text-center mt-1">
          <a href="/admin/employee-management" class="form-control-sm col-lg-2 col-md-2 mt-2 bg-blue-900 text-white mb-2">
            <button type="submit">Done</button>
          </a>
        </div>
    </div>
  </div>
  @endif
</div>


