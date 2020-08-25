<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="_token" content="{!! csrf_token() !!}" />
<title>Trivia SMS</title>
@include('administracao.includes.estilos')
@yield('estilos')
</head>
<body>
<input type="text" id="Url_geral" value="{{url('')}}" name="" hidden="">
<div class="main-wrapper">
<!-- partial:../../partials/_sidebar.html -->
@include('administracao.includes.sidebar')
<!-- partial -->
<div class="page-wrapper">
<!-- partial:../../partials/_navbar.html -->
@include('administracao.includes.navbar')
<!-- partial -->
<div class="page-content">
@yield('conteudo')

<!-- partial:../../partials/_footer.html -->
@include('administracao.includes.footer')
<!-- partial -->
</div>
</div>
@include('administracao.includes.script')
@yield('script')
</body>
</html>