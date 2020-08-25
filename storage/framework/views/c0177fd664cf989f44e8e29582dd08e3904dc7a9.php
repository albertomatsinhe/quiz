<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login </title>
	<!-- core:css -->
	<link rel="stylesheet" href="<?php echo e(asset('public/template/assets/vendors/core/core.css')); ?>">


	<!-- endinject -->
 	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="<?php echo e(asset('public/template/assets/fonts/feather-font/css/iconfont.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/template/assets/vendors/flag-icon-css/css/flag-icon.min.css')); ?>">
	<!-- endinject -->
  <!-- Layout styles -->  
	<link rel="stylesheet" href="<?php echo e(asset('public/template/assets/css/demo_1/style.css')); ?>">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="<?php echo e(asset('public/template/assets/images/favicon.png')); ?>" />
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                <div class="col-md-4 pr-md-0">
                  <div class="auth-left-wrapper">

                  </div>
                </div>
                <div class="col-md-8 pl-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo d-block mb-2">Trivia<span>SMS</span></a>
                    <h5 class="text-muted font-weight-normal mb-4">coloque os dados para acesso</h5>
                    <form action="<?php echo e(url('/authenticate')); ?>" method="post">
                          <?php echo csrf_field(); ?>

                     <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" placeholder="Password">
                      </div>
                      <?php /*<div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input">
                          Remember me
                        </label>
                      </div>*/ ?>
                      <div class="mt-3">
                     
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>   

                          <?php if(count($errors) > 0): ?>
                          <div class="alert alert-danger">
                                 <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                   <ul>
                                    <?php foreach($errors->all() as $error): ?>
                                            <li><?php echo e($error); ?></li>
                                    <?php endforeach; ?>
                                  </ul>
                          </div>
                          <?php endif; ?>

                      </div>
                     
                    </form>
                  </div>
                </div>
              </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- core:js -->
	<script src="<?php echo e(asset('public/template/assets/vendors/core/core.js')); ?>"></script>
	<!-- endinject -->
  <!-- plugin js for this page -->
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="<?php echo e(asset('public/template/assets/vendors/feather-icons/feather.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/template/assets/js/template.js')); ?>"></script>
	<!-- endinject -->
  <!-- custom js for this page -->
	<!-- end custom js for this page -->
</body>
</html>