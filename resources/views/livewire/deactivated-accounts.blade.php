<div class="d-flex justify-content-end">

  @foreach($datanga as $value)
    <div>{{$value->id}}</div>
  @endforeach


  <!-- @if($show_inactive_users == false)
  <form wire:submit.prevent="show">
    <button class="btn-link">View Deactivated Accounts</button>
  </form>
  @else
  <form wire:submit.prevent="hide">
    @foreach($inactive_users as $data)
    <div>{{$data}}</div> -->
      @dd($data)
    @endforeach
    <button class="btn-link">Hide Deactivated Accounts</button>
  </form>
  @endif -->
</div>