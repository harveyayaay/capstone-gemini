<div>
  <div class="container pb-5">
    <div class="d-flex justify-content-center">
      <div class="d-flex justify-content-center col-lg-5 shadow p-3 bg-blue-900 text-white">
        <div class="pt-3">Make a schedule for <strong>{{date('F j, Y', strtotime($picked_date))}}</strong></div>
      </div>
    </div>
    <div class="d-flex justify-content-center">
      <div class="d-flex justify-content-center col-lg-5 shadow p-3">

      </div>
    </div>
  </div>

  <div class="container pb-5">
    <div class="d-flex justify-content-center">
      <div class="d-flex justify-content-center col-lg-4 shadow p-3 bg-blue-900 text-white">
        <div class="pt-3">Select Employees</strong></div>
      </div>
    </div>
    <div class="d-flex justify-content-center">
      <div class="d-flex justify-content-center col-lg-4 shadow p-3">

      </div>
    </div>
  </div>

  <div class="container">
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
  </div>
</div>
