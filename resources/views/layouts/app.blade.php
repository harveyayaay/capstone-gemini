<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    @livewireStyles
</head>
<body>
 
<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center">
      <img loading="lazy" src="images/p-1.png" alt="..." width="80" height="80" class="mr-3 rounded-circle img-thumbnail shadow-sm">
      <div class="media-body">
        <h4 class="m-0">Olivia</h4>
        <p class="font-weight-normal text-muted mb-0">Web developer</p>
      </div>
    </div>
  </div>

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Dashboard</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="#" class="nav-link text-dark bg-light">
        <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
        Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark">
        <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
        Tracker Management
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark">
        <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
        Employee Management
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark">
        <i class="fa fa-picture-o mr-3 text-primary fa-fw"></i>
        Performance Management
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark">
        <i class="fa fa-picture-o mr-3 text-primary fa-fw"></i>
        Scheduling Management
      </a>
    </li>
  </ul>

  <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Charts</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="#" class="nav-link text-dark">
        <i class="fa fa-area-chart mr-3 text-primary fa-fw"></i>
        area charts
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark">
        <i class="fa fa-bar-chart mr-3 text-primary fa-fw"></i>
        bar charts
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark">
        <i class="fa fa-pie-chart mr-3 text-primary fa-fw"></i>
        pie charts
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark">
        <i class="fa fa-line-chart mr-3 text-primary fa-fw"></i>
        line charts
      </a>
    </li>
  </ul>
</div>
<!-- End vertical navbar -->


<!-- Page content holder -->
<div class="page-content p-5" id="content">
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

  <!-- Demo content -->
  <h2 class="display-4 text-white">Bootstrap vertical nav</h2>
  <p class="lead text-white mb-0">Build a fixed sidebar using Bootstrap 4 vertical navigation and media objects.</p> 
  <div class="separator"></div>
  <div class="text-white">

    <div class="overflow-x">
      <table style="width:100%;" id="filtertable" class="table cust-datatable dataTable no-footer">
        <thead>
          <tr>
            <th style="min-width:50px;">ID</th>
            <th style="min-width:150px;">Name</th>
            <th style="min-width:150px;">Mode</th>
            <th style="min-width:100px;">Event</th>
            <th style="min-width:100px;">Date</th>
            <th style="min-width:150px;">Status</th>
            <th style="min-width:150px;">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Dummy</td>
            <td><span class="mode mode_process">Processing</span></td>
            <td>Journey</td>
            <td>17-Apr-2020</td>
            <td><span class="mode mode_on">Active</span></td>
            <td>
              <div class="btn-group">
                <a class="dropdown-toggle dropdown_icon" data-toggle="dropdown">
                  <i class="fa fa-pencil-square-o"></i> 
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="#" target="_blank">
                        Dummy Details
                    </a>
                  </li>
                  <li>
                    <a href="#" target="_blank">
                        Dummy Details
                    </a>
                  </li>  
                  <li>
                    <a href="#" target="_blank">
                        Dummy Details
                    </a>
                  </li>  
                </ul>
              </div>
              <span class="actionCust">
                <a href="#"><i class="fa fa-line-chart"></i></a>
              </span>
              <div class="btn-group">
                <a class="dropdown-toggle dropdown_icon" data-toggle="dropdown">
                  <i class="fa fa-ellipsis-h"></i>
                </a>
                <ul class="dropdown-menu dropdown_more">
                  <li>
                    <a href="#" target="_black">
                      <i class="fa fa-clone"></i>Duplicate
                    </a>
                  </li>
                  <li>
                    <a href="#" target="_black">
                      <i class="fa fa-trash"></i> Delete
                    </a>
                  </li>
                  <li>
                    <a href="#" target="_black">
                      <i class="fa fa-list"></i>Activity</a>
                    </li>
                </ul>
              </div>
            </td>
          </tr>      
        </tbody>
      </table>
    </div>
  </div>


  <!-- <div class="row text-white">
    <div class="col-lg-7">
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
        dolor.
      </p> 
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
        dolor.
      </p>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
        dolor.
      </p>
    </div>
    <div class="col-lg-5">
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
        dolor.
      </p>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
        dolor.
      </p>
    </div>
  </div> -->

</div>
<!-- End demo content -->

@stack('modals')
@livewireScripts
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="main.js"></script>
</body>
</html>

