<?php 
    require_once __DIR__ . '/../vendor/autoload.php';
    use App\Backend;
    $app = new Backend();

    if(isset($_POST['login']) || isset($_SERVER['HTTP_X_REQUESTED_WITH']) == 'XMLHttpRequest'){
        $app->adminLogin((object)$_POST);
        exit();
    }
?>
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Login | Upzet - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php $app->asset('backend/');  ?>/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="<?php $app->asset('backend/');  ?>/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php $app->asset('backend/');  ?>/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php $app->asset('backend/');  ?>/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="bg-pattern">
        <div class="bg-overlay"></div>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="">
                                    <div class="text-center">
                                        <a href="index.html" class="">
                                            <img src="<?php $app->asset('backend/');  ?>/images/logo-dark.png" alt="" height="24" class="auth-logo logo-dark mx-auto">
                                            <img src="<?php $app->asset('backend/');  ?>/images/logo-light.png" alt="" height="24" class="auth-logo logo-light mx-auto">
                                        </a>
                                    </div>
                                    <!-- end row -->
                                    <h4 class="font-size-18 text-muted mt-2 text-center">Welcome Back !</h4>
                                    <p class="mb-5 text-center">Sign in to continue to Upzet.</p>
                                    <form class="form-horizontal" action="" method="POST">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label" for="username">Username</label>
                                                    <input name="username" type="text" class="form-control" id="username" placeholder="Enter username">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label" for="userpassword">Password</label>
                                                    <input name="userpassword" type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input name="remember" type="checkbox" class="form-check-input">
                                                            <label class="form-label" class="form-check-label" for="remember">Remember me</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-md-end mt-3 mt-md-0">
                                                            <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-grid mt-4">
                                                    <button name="login" id="login" class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->

        <!-- JAVASCRIPT -->
        <script src="<?php $app->asset('backend/');  ?>/libs/jquery/jquery.min.js"></script>
        <script src="<?php $app->asset('backend/');  ?>/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php $app->asset('backend/');  ?>/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php $app->asset('backend/');  ?>/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php $app->asset('backend/');  ?>/libs/node-waves/waves.min.js"></script>

        <script src="<?php $app->asset('backend/');  ?>/js/app.js"></script>
        <!-- <script>
            let username = document.getElementById('username');
            let userpassword = document.getElementById('userpassword');
            let remember = document.getElementById('remember');
            document.getElementById('login').addEventListener('click',(e) => {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: location.href,
                    data: {
                        username: username.value,
                        userpassword: userpassword.value,
                        remembeer: remember.checked
                    },
                    success: function (msg){
                        // let response = JSON.parse(msg)
                        console.log(msg)
                    }
                })
            })
        </script> -->
    </body>
</html>
