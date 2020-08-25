<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ Session::get('company_name') }} | {{ucfirst(trans("message.sidebar.$menu"))}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="_token" content="{!! csrf_token() !!}" />
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('public/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/bootstrap/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('public/bootstrap/css/ionicons.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('public/plugins/datatables/dataTables.bootstrap.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('public/plugins/select2/select2.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dist/css/skins/_all-skins.min.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('public/plugins/datepicker/datepicker3.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dist/css/jquery-ui.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}"
      type="text/css" />
    <link rel="stylesheet" href="{{ asset('public/dist/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dist/css/bootstrap-confirm-delete.css') }}">
    <link rel="stylesheet" href="{{ asset('public/toastr/toastr.min.css') }}">
    {{-- <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"> --}}
    <link rel='shortcut icon' href="{{URL::to('/')}}/favicon.ico" type='image/x-icon' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('public/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/daterangepicker.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('public/dist/css/daterangepicker.css') }}" />
     @yield('jscript')
    <style>
      /* html {
      zoom: 90%;
    }  */

      .table.table-bordered.dataTable {
        zoom: 0.8;
      }
      
        @page {
              size: auto;   /* auto is the initial value */
          margin: 0;  /* this affects the margin in the printer settings */
        }
      /* body { zoom: 90%; } */
    </style>
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper" id="app">
      <input type="text" id="Url_geral" value="{{url('')}}" name="" hidden="">
      <input type="text" id="envio_fuel" value="{{url("")}}" name="" hidden="">
      
      

      <!-- Content Wrapper. Contains page content -->
     
        @include('layouts.includes.notifications')

        @yield('content')
        <!-- /.content -->
     
      <!-- /.content-wrapper -->
     
      <!-- Control Sidebar -->
      @include('layouts.includes.sidebar_right')
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    @include('layouts.includes.script')
    @yield('js')
    <!-- js -->

    <script type="text/javascript" src="{{ asset('public/toastr/toastr.min.js') }}"></script>
   

    <script type="text/javascript">
      var SITE_URL = "{{URL::to('/')}}"; 
    </script>

    <script>
      @if(Session::has('message'))

    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
       }
     @endif
    </script>

  </body>

</html>