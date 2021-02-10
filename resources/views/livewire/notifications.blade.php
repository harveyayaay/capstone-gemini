<div>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
  <div class="btn-group-vertical">
    @foreach($notifs as $notif)
      <!-- <div class="p-2" role="button">
        <p class="font weight-bold text-blue-900">{{$notif->message}}</p>
        <label class="h-6">{{$notif->date}}</label>
      </div> -->
     <button>{{$notif->date}}</button> 
    @endforeach
</div>
  </div>
</div>
