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
    <link rel="stylesheet" href="{{ mix('css/custom.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- Modals -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.2.0/mdb.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

</head>
<body>
@livewireStyles
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

  @include('layouts.sidebar')
</div>
<!-- End vertical navbar -->

<div class="page-content p-5" id="content">
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars"></i><small class="text-uppercase font-weight-bold"></small></button>

  <!-- Demo content -->

  <h4 class="text-white">@yield('title')</h4>
  <p class="text-white mb-3">@yield('caption')</p> 
  <!-- <div class="separator"></div> -->
  <!-- Page content holder -->
  
    
      @yield('content')
    </div>
  </div>
  @include('layouts.modal.delete-modal')
  <!-- End page content -->
@yield('custom_js')
@stack('modals')
@livewireScripts
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="main.js"></script>
</body>
</html>

@section('custom_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
  (function(){
    $('#delete-modal').on('shown.bs.modal', function (e) {
      var btn = $(e.relatedTarget);
      var url = btn.data('url');
      $('#delete-form').attr('action', url)
    })
    $('#approval_status').on('change',function(){
      $this = $(this);
      if($this.val() == 'declined'){
        $('.approval-status-message').removeClass('d-none');
      }
      else{
        $('.approval-status-message').addClass('d-none');
      }
    });
    $('#approval_message').on('change',function(){
      $this = $(this);
      if($this.val() == 'other'){
        $('.custom-message').removeClass('d-none');
      }
      else{
        $('.custom-message').addClass('d-none');
      }
    })
  })();
  
  // To set mindate in enddate
  function customRange(input) 
  { 
  return {
          minDate: (input.id == "end_date" ? $("#start_date").datepicker("getDate") : new Date())
        }; 
  }

  // To set maxdate in startdate
  function customRangeStart(input) 
  { 
  return {
          maxDate:(input.id == "start_date" ? $("#end_date").datepicker("getDate") : null)
        }; 
  }

  $(document).ready(function() {

    $('#start_date').datepicker(
    {
        beforeShow: customRangeStart,
        maxDate: null,
        dateFormat: "yy-mm-dd",
        changeYear: true
    });

    $('#end_date').datepicker(
    {
        beforeShow: customRange,
        dateFormat: "yy-mm-dd",
        changeYear: true
    });
  });

</script>
@yield('inner_custom_js')
@endsection

