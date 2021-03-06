<!DOCTYPE html>
<html>
<head>

  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> {{!empty($companyData->value) ? $companyData->value : '' }} |  Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ URL::asset('public/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('public/bootstrap/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('public/bootstrap/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('public/dist/css/AdminLTE.min_login.css') }}">     
    
<script type="text/javascript" src="{{ asset('public/js/jquery.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('public/js/moment.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('public/js/daterangepicker.min.js') }}"></script>  
<link rel="stylesheet" type="text/css" href="{{ asset('public/dist/css/daterangepicker.css') }}"/>   
  
 <!-- Iconsmind --> 
  <script language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ URL::asset('public/plugins/iCheck/square/blue.css') }}">
 
   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
   
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo"> 
          {{-- Logotipo vindo da tabela Preference --}}
   @if(!empty($logo->value)) 
    
   <img src='{{asset("public/images/".$logo->value)}}'  style="height:60%; width:60%">
@else
 <img src="{{asset('/images/blank-profile.png')}}" style="height:60%; width:60%">

@endif

  </div>
  
  <div class="">
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

	</div>


  <!-- /.login-logo -->
  
  @yield('content')
  <!-- /.login-box-body -->
</div>
<div class="login-logo">
  <h4 class="licenciado">Software N3 licenciado a :</h4>
    <a href="#"><b>{{!empty($companyData->value) ? $companyData->value : '' }}</b></a>
    <h6 class="licenciado"><b>Version </b>{{!empty($version->value) ? $version->value : '' }} </h6>
  </div>

<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="{{ URL::asset('public/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ URL::asset('public/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ URL::asset('public/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>


