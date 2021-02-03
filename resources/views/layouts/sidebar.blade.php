@php
  $active          = 'rounded bg-primary text-white';
  $sub_link_active = 'rounded text-primary text-white';
@endphp


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

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Manager Navigation</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="#" class="nav-link text-dark bg-light">
        <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
        Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a href="/admin/tracker-management" class="nav-link text-dark">
        <i class="fa fa-address-card mr-3 text-primary fa- fw"></i>
        Tracker Management
      </a>
    </li>
    <li class="nav-item">
      <a href="/admin/employee-management" class="nav-link text-dark">
        <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
        Employee Management
      </a>
    </li>
    <li class="nav-item">
      <a href="/admin/scorecard-management" class="nav-link text-dark">
        <i class="fa fa-picture-o mr-3 text-primary fa-fw"></i>
        Scorecard Management
      </a>
    </li>
    <li class="nav-item">
      <a href="/admin/generate-report" class="nav-link text-dark">
        <i class="fa fa-picture-o mr-3 text-primary fa-fw"></i>
        Generate Report
      </a>
    </li>
    <li class="nav-item">
      <a href="/admin/productivity-report" class="nav-link text-dark">
        <i class="fa fa-picture-o mr-3 text-primary fa-fw"></i>
        Productivity Report
      </a>
    </li>
    <li class="nav-item">
      <a href="/admin/scorecard" class="nav-link text-dark">
        <i class="fa fa-picture-o mr-3 text-primary fa-fw"></i>
        Scorecard Report
      </a>
    </li>
  </ul>

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Supervisor Navigation</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="/supervisor" class="nav-link text-dark bg-light">
        <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
        Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a href="/supervisor/activity-tracker" class="nav-link text-dark">
        <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
        Activity Monitoring
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark">
        <i class="fa fa-picture-o mr-3 text-primary fa-fw"></i>
        Scorecard
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark">
        <i class="fa fa-picture-o mr-3 text-primary fa-fw"></i>
        Productivity Report
      </a>
    </li>
    <li class="nav-item">
      <a href="/supervisor/generate-report" class="nav-link text-dark">
        <i class="fa fa-picture-o mr-3 text-primary fa-fw"></i>
        Generate Report
      </a>
    </li>
  </ul>

  <!-- <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Charts</p>

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
  </ul> -->
</div>
<!-- End vertical navbar -->