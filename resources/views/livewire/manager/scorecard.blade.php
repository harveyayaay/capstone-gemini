<div class="card">
  <div class="card-body">
    <div class="card-body">
      <div class="pb-3 row justify-content-end">
        <div class="row">
          <div class="col-4 m-1">
            <input type="date" class="" value="{{date('Y-m-d',strtotime('-5 days',strtotime(date('Y-m-d'))))}}" max="{{date('Y-m-d')}}">
          </div>
          <div class="col-4 m-1">
            <input type="date" class="" value="{{date('Y-m-d')}}">
          </div>
          <div class="col-3 m-1">
            <button class="btn btn-block btn-primary pb-2">Generate</button>
          </div>
        </div>
      </div>
      <div class="row 5-10 pr-3 pl-3">
        <table class="table cust-datatable dataTable no-footer table-hover table-sm">
          <thead>
            <tr class="row text-center">
              <th class="col-4">Parameter</th>
              <th class="col-4">Actual</th>
              <th class="col-4">Target</th>
            </tr>
          </thead>
          <tbody>
            <tr class="row text-center">
              <td class="col-4 pt-3">Volume</td>
              <td class="col-4 pt-3">1009</td>
              <td class="col-4 pt-3">20012</td>
            </tr> 
            <tr class="row text-center">
              <td class="col-4 pt-3">Volume</td>
              <td class="col-4 pt-3">1009</td>
              <td class="col-4 pt-3">20012</td>
            </tr> 
            <tr class="row text-center">
              <td class="col-4 pt-3">Volume</td>
              <td class="col-4 pt-3">1009</td>
              <td class="col-4 pt-3">20012</td>
            </tr>   
          </tbody>
        </table>
        <div class="offset-10 col-2 text-right pt-3">
          <a type='button' class="btn btn-block btn-success" href="#">Print</a>
        </div>
        @error('description')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
  </div>
</div>