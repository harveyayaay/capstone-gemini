
<div class="card-body">
  <form wire:submit.prevent="generate">
    <div class="d-flex justify-content-end">

      
        <input type="date" class="d-flex m-1" value="{{date('Y-m-d',strtotime('-5 days',strtotime(date('Y-m-d'))))}}" max="{{date('Y-m-d')}}">
      
        <input type="date" class="d-flex m-1" value="{{date('Y-m-d')}}">
    
        <button type="submit" class="btn btn-primary d-flex m-1">Generate</button>
    </div>
    <div class="row 5-10 pr-3 pl-3">
      <table class="table table-hover table-sm text-center mt-3">
        <thead>
          <tr class="row">
            <th class="col-4">Parameter</th>
            <th class="col-4">Actual</th>
            <th class="col-4">Target</th>
          </tr>
        </thead>
        <tbody>
        @forelse($task_lists as $data)
          <tr class="row">
            <td class="col-4 pt-3">{{$data->title}}</td>
            <td class="col-4 pt-3">1009</td>
            <td class="col-4 pt-3">{{$data->process_time}}</td>
          </tr>
        @empty
        @endforelse
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
  </form>
</div>