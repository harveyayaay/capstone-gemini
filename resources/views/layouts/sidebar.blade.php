@php
  $active          = 'rounded bg-white text-white';
  $sub_link_active = 'rounded text-primary text-white';
@endphp

<!-- Vertical navbar -->
<div class="vertical-nav bg-blue-900 text-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-blue-900 shadow shadow-r">
    <div class="media d-flex align-items-center">
      <img loading="lazy" src="https://lh3.googleusercontent.com/proxy/j2eGnCWLhsMeLm8Hcn3of3ExBrPieP3lvI4qzASVHd-VPP9XaEas1D4nVBJ-wmzUJ9UjsQ7dRoTspvNz9a9H4xKlq0BJntBc8-AG12jcWI4Fp8i8oK9xnlKNhOB2SUVG40E" alt="..." width="80" height="80" class="mr-3 rounded-circle img-thumbnail shadow-sm">
      <div class="media-body">
        <h5 class="m-0">{{ Auth::user()->firstname.' '.Auth::user()->lastname}}</h5>
        @if(Auth::user()->position == "Manager")
          <p class="font-weight-normal text-white mb-0">Admin</p>
        @else
          <p class="font-weight-normal text-white mb-0">{{Auth::user()->position}}</p>
        @endif
      </div>
    </div>
  </div> 

  @if(Auth::user()->position == 'Manager')
    <p class="text-white font-weight-bold text-uppercase px-3 small pb-4 mb-0">Manager Navigation</p>

    <ul class="nav flex-column bg-blue-900 mb-0">
      <li class="nav-item">
        <a href="/dashboard" class="nav-link text-white p-0">
          <i class="fa fa-address-card mr-3 text-white fa-fw ml-3"></i>
            <label class="col-form-label-sm">Dashboard</label>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/tracker-management" class="nav-link text-white p-0">
          <i class="fa fa-address-card mr-3 text-white fa-fw ml-3"></i>
            <label class="col-form-label-sm">Tracker</label>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/employee-management" class="nav-link text-white p-0">
          <i class="fa fa-cubes mr-3 text-white fa-fw ml-3"></i>
            <label class="col-form-label-sm">Employee</label>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/scorecard-management" class="nav-link text-white p-0">
          <i class="fa fa-picture-o mr-3 text-white fa-fw ml-3"></i>
            <label class="col-form-label-sm">Scorecard</label>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/generate-report" class="nav-link text-white p-0">
          <i class="fa fa-picture-o mr-3 text-white fa-fw ml-3"></i>
            <label class="col-form-label-sm">Reports</label>
        </a>
      </li>
    </ul>
  @elseif(Auth::user()->position == 'Supervisor')
  <p class="text-white font-weight-bold text-uppercase px-3 small pb-4 mb-0">Supervisor Navigation</p>

  <ul class="nav flex-column bg-blue-900 mb-0">
    <li class="nav-item">
      <a href="/dashboard" class="nav-link text-white p-0">
        <i class="fa fa-address-card mr-3 text-white fa-fw ml-3"></i>
          <label class="col-form-label-sm">Dashboard</label>
      </a>
    </li>
    <li class="nav-item">
      <a href="/supervisor/activity-tracker" class="nav-link text-white p-0">
        <i class="fa fa-address-card mr-3 text-white fa-fw ml-3"></i>
          <label class="col-form-label-sm">Activity Tracker</label>
      </a>
    </li>
    <li class="nav-item">
      <a href="/supervisor/scorecard-management" class="nav-link text-white p-0">
        <i class="fa fa-picture-o mr-3 text-white fa-fw ml-3"></i>
          <label class="col-form-label-sm">Scorecard</label>
      </a>
    </li>
    <li class="nav-item">
      <a href="/supervisor/generate-report" class="nav-link text-white p-0">
        <i class="fa fa-picture-o mr-3 text-white fa-fw ml-3"></i>
          <label class="col-form-label-sm">Reports</label>
      </a>
    </li>
  </ul>
  @else
  <p class="text-white font-weight-bold text-uppercase px-3 small pb-4 mb-0">Frontliner Navigation</p>

  <ul class="nav flex-column bg-blue-900 mb-0">
    <li class="nav-item">
      <a href="/dashboard" class="nav-link text-white p-0">
        <i class="fa fa-address-card mr-3 text-white fa-fw ml-3"></i>
          <label class="col-form-label-sm">Dashboard</label>
      </a>
    </li>
    <li class="nav-item">
      <a href="/frontliner/activity-tracker" class="nav-link text-white p-0">
        <i class="fa fa-address-card mr-3 text-white fa-fw ml-3"></i>
          <label class="col-form-label-sm">Activity Tracker</label>
      </a>
    </li>
    <li class="nav-item">
      <a href="/frontliner/scorecard-management" class="nav-link text-white p-0">
        <i class="fa fa-picture-o mr-3 text-white fa-fw ml-3"></i>
          <label class="col-form-label-sm">Scorecard</label>
      </a>
    </li>
    <li class="nav-item">
      <a href="/frontliner/generate-report" class="nav-link text-white p-0">
        <i class="fa fa-picture-o mr-3 text-white fa-fw ml-3"></i>
          <label class="col-form-label-sm">Reports</label>
      </a>
    </li>
  </ul>
  @endif
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