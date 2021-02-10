
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <div class="dropdown">
              <a class="" id="dropdownMenu2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bell p-2 mr-2 text-blue-900" aria-hidden="true"></i>
              </a>
              @livewire('notifications')
            </div>
          </li>
          <li class="nav-item dropdown">
            <div class="dropdown">
              <a class="" id="dropdownMenu2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-caret-down p-2 mr-2 text-blue-900" aria-hidden="true"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                <div class="p-2" role="button">
                  <a href="/logout">Settings</a>
                </div>
                <div class="p-2" role="button">
                  <a href="/logout">Logout</a>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </nav>