<?php

require_once(__DIR__ . '/inc/include.php');

# Redirect to login.php if user present
if ($auth->getUser()) {
  return header('Location: /');
} ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Authenticate</title>

  <!-- Custom fonts for this template-->
  <link href="<?=asset('/vendor/fontawesome-free/css/all.min.css', 'admin') ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=asset('css/sb-admin-2.min.css', 'admin') ?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center align-items-center min-vh-100">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background: url(<?=asset('/img/bg-login.jpg', 'admin') ?>) no-repeat center center;background-size: cover;"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" action="<?=base_url('auth.php') ?>" method="POST">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" <?=old('email') ?> name="email" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." />
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" <?=old('password') ?> name="password" id="exampleInputPassword" placeholder="Your password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" name="remember" value="true" <?php if(old('remember')) : ?><?php endif; ?> id="remember" />
                        <label class="custom-control-label" for="remember">Remember Me</label>
                      </div>
                    </div>
                    
                    <button class="btn btn-block btn-user btn-primary" type="submit">Login</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?=base_url('register.php') ?>">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=asset('vendor/jquery/jquery.min.js', 'admin') ?>"></script>
  <script src="<?=asset('vendor/bootstrap/js/bootstrap.bundle.min.js', 'admin') ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=asset('vendor/jquery-easing/jquery.easing.min.js', 'admin') ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=asset('js/sb-admin-2.min.js', 'admin') ?>"></script>

</body>

</html>