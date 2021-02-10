<div class="dropdown">
  <a class="" id="dropdownMenu2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="seen" wire:click="seen">
    <div class=" text-white text-center p-0 text-center">
      @if($count != null)
        <span class="badge badge-light notif-count bg-danger text-white rounded-circle">{{$count}}</span>
      @endif
    </div>
    <i class="fa fa-bell p-2 mr-2 text-blue-900" aria-hidden="true"></i>
  </a>
  <div>
    <div class="dropdown-menu dropdown-menu-right notif-container-div" aria-labelledby="dropdownMenu2">
      
      <div class="dropdown-header bg-gray-200">Notifications</div>
        @foreach($notifs as $notif)
        <!-- /frontliner/scorecard-management -->
          <div class="p-2 notif-div" role="button">
            <div class="ml-3 font-weight-bold text-blue-900 pb-3">{{$notif->message}}</div>
            <p class="ml-3 notif-dates">{{$notif->date}}</p>
          </div>
        @endforeach
      </div>
    </div>
  </div>
