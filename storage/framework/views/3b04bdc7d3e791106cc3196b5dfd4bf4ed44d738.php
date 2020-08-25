<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="_token" content="<?php echo csrf_token(); ?>" />
<title>Trivia SMS</title>
<?php echo $__env->make('administracao.includes.estilos', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('estilos'); ?>
</head>
<body>
<input type="text" id="Url_geral" value="<?php echo e(url('')); ?>" name="" hidden="">
<div class="main-wrapper">
<!-- partial:../../partials/_sidebar.html -->
<?php echo $__env->make('administracao.includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- partial -->
<div class="page-wrapper">
<!-- partial:../../partials/_navbar.html -->
<?php echo $__env->make('administracao.includes.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- partial -->
<div class="page-content">
<?php echo $__env->yieldContent('conteudo'); ?>

<!-- partial:../../partials/_footer.html -->
<?php echo $__env->make('administracao.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- partial -->
</div>
</div>
<?php echo $__env->make('administracao.includes.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('script'); ?>
</body>
</html>