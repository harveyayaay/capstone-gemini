<div>
  <div class="dropdown-menu dropdown-menu-right notif-container-div" aria-labelledby="dropdownMenu2">
    
  <div class="dropdown-header bg-gray-200">Notifications</div>
    <!-- <div class="btn-group-vertical  "> -->
      @foreach($notifs as $notif)
        <div class="p-2 notif-div" role="button">
          <div class="ml-3 font-weight-bold text-blue-900 pb-3">{{$notif->message}}</div>
          <p class="ml-3 notif-dates">{{$notif->date}}</p>
        </div>
      @endforeach
    <!-- </div> -->
  </div>
</div>
