<?php 
    require_once __DIR__ . '/../vendor/autoload.php';
    use App\Backend;
    $app = new Backend();

    if(isset($_POST['register']) || isset($_SERVER['HTTP_X_REQUESTED_WITH']) == 'XMLHttpRequest'){
        $app->appSetup((object)$_POST);
        exit();
    }
?>
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Setup</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php $app->asset('backend/'); ?>images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="<?php $app->asset('backend/'); ?>css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php $app->asset('backend/'); ?>css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php $app->asset('backend/'); ?>css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="bg-pattern">
        <div class="bg-overlay"></div>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <a href="index.html" class="">
                                        <img src="<?php $app->asset('backend/'); ?>images/logo-dark.png" alt="" height="24" class="auth-logo logo-dark mx-auto">
                                        <img src="<?php $app->asset('backend/'); ?>images/logo-light.png" alt="" height="24" class="auth-logo logo-light mx-auto">
                                    </a>
                                </div>
                                
                                <h4 class="font-size-18 text-muted text-center mt-2">Free Register</h4>
                                <p class="text-muted text-center mb-4">Get your free Upzet account now.</p>
                                <form class="form-horizontal" action="" method="post">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="firstname">First Name</label>
                                                <input name="firstname" type="text" class="form-control" id="firstname" placeholder="Enter first name">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label" for="lastname">Last Name</label>
                                                <input name="lastname" type="text" class="form-control" id="lastname" placeholder="Enter last name">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label" for="username">Username</label>
                                                <input name="username" type="text" class="form-control" id="username" placeholder="Enter username">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label" for="useremail">Email</label>
                                                <input name="email" type="email" class="form-control" id="useremail" placeholder="Enter email">        
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label" for="userpassword">Password</label>
                                                <input name="password" type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="term-conditionCheck">
                                                <label class="form-check-label fw-normal" for="term-conditionCheck">I accept <a href="#" class="text-primary">Terms and Conditions</a></label>
                                            </div>
                                            <div class="d-grid mt-4">
                                                <button name="register" class="btn btn-primary waves-effect waves-light" type="submit" id="register">Register</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p class="text-white-50">Already have an account ?<a href="auth-login.html" class="fw-medium text-primary"> Login </a> </p>
                            <p class="text-white-50">© <script>document.write(new Date().getFullYear())</script> Upzet. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->

        <!-- JAVASCRIPT -->
        <script src="<?php $app->asset('backend/'); ?>libs/jquery/jquery.min.js"></script>
        <script src="<?php $app->asset('backend/'); ?>libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php $app->asset('backend/'); ?>libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php $app->asset('backend/'); ?>libs/simplebar/simplebar.min.js"></script>
        <script src="<?php $app->asset('backend/'); ?>libs/node-waves/waves.min.js"></script>

        <script>
            !function(n){"use strict";function s(){for(var e=document.getElementById("topnav-menu-content").getElementsByTagName("a"),t=0,n=e.length;t<n;t++)"nav-item dropdown active"===e[t].parentElement.getAttribute("class")&&(e[t].parentElement.classList.remove("active"),e[t].nextElementSibling.classList.remove("show"))}function t(e){1==n("#light-mode-switch").prop("checked")&&"light-mode-switch"===e?(n("html").removeAttr("dir"),n("#dark-mode-switch").prop("checked",!1),n("#rtl-mode-switch").prop("checked",!1),n("#bootstrap-style").attr("href","{{ asset('/') }}backend/css/bootstrap.min.css"),n("#app-style").attr("href","{{ asset('/') }}backend/css/app.min.css"),sessionStorage.setItem("is_visited","light-mode-switch")):1==n("#dark-mode-switch").prop("checked")&&"dark-mode-switch"===e?(n("html").removeAttr("dir"),n("#light-mode-switch").prop("checked",!1),n("#rtl-mode-switch").prop("checked",!1),n("#bootstrap-style").attr("href","{{ asset('/') }}backend/css/bootstrap-dark.min.css"),n("#app-style").attr("href","{{ asset('/') }}backend/css/app-dark.min.css"),sessionStorage.setItem("is_visited","dark-mode-switch")):1==n("#rtl-mode-switch").prop("checked")&&"rtl-mode-switch"===e&&(n("#light-mode-switch").prop("checked",!1),n("#dark-mode-switch").prop("checked",!1),n("#bootstrap-style").attr("href","{{ asset('/') }}backend/css/bootstrap-rtl.min.css"),n("#app-style").attr("href","{{ asset('/') }}backend/css/app-rtl.min.css"),n("html").attr("dir","rtl"),sessionStorage.setItem("is_visited","rtl-mode-switch"))}function e(){document.webkitIsFullScreen||document.mozFullScreen||document.msFullscreenElement||(console.log("pressed"),n("body").removeClass("fullscreen-enable"))}var a;n("#side-menu").metisMenu(),n("#vertical-menu-btn").on("click",function(e){e.preventDefault(),n("body").toggleClass("sidebar-enable"),992<=n(window).width()?n("body").toggleClass("vertical-collpsed"):n("body").removeClass("vertical-collpsed")}),n("body,html").click(function(e){var t=n("#vertical-menu-btn");t.is(e.target)||0!==t.has(e.target).length||e.target.closest("div.vertical-menu")||n("body").removeClass("sidebar-enable")}),n("#sidebar-menu a").each(function(){var e=window.location.href.split(/[?#]/)[0];this.href==e&&(n(this).addClass("active"),n(this).parent().addClass("mm-active"),n(this).parent().parent().addClass("mm-show"),n(this).parent().parent().prev().addClass("mm-active"),n(this).parent().parent().parent().addClass("mm-active"),n(this).parent().parent().parent().parent().addClass("mm-show"),n(this).parent().parent().parent().parent().parent().addClass("mm-active"))}),n(".navbar-nav a").each(function(){var e=window.location.href.split(/[?#]/)[0];this.href==e&&(n(this).addClass("active"),n(this).parent().addClass("active"),n(this).parent().parent().addClass("active"),n(this).parent().parent().parent().addClass("active"),n(this).parent().parent().parent().parent().addClass("active"),n(this).parent().parent().parent().parent().parent().addClass("active"))}),n(document).ready(function(){var e;0<n("#sidebar-menu").length&&0<n("#sidebar-menu .mm-active .active").length&&(300<(e=n("#sidebar-menu .mm-active .active").offset().top)&&(e-=300,n(".vertical-menu .simplebar-content-wrapper").animate({scrollTop:e},"slow")))}),n('[data-toggle="fullscreen"]').on("click",function(e){e.preventDefault(),n("body").toggleClass("fullscreen-enable"),document.fullscreenElement||document.mozFullScreenElement||document.webkitFullscreenElement?document.cancelFullScreen?document.cancelFullScreen():document.mozCancelFullScreen?document.mozCancelFullScreen():document.webkitCancelFullScreen&&document.webkitCancelFullScreen():document.documentElement.requestFullscreen?document.documentElement.requestFullscreen():document.documentElement.mozRequestFullScreen?document.documentElement.mozRequestFullScreen():document.documentElement.webkitRequestFullscreen&&document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT)}),document.addEventListener("fullscreenchange",e),document.addEventListener("webkitfullscreenchange",e),document.addEventListener("mozfullscreenchange",e),n(".right-bar-toggle").on("click",function(e){n("body").toggleClass("right-bar-enabled")}),n(document).on("click","body",function(e){0<n(e.target).closest(".right-bar-toggle, .right-bar").length||n("body").removeClass("right-bar-enabled")}),function(){if(document.getElementById("topnav-menu-content")){for(var e=document.getElementById("topnav-menu-content").getElementsByTagName("a"),t=0,n=e.length;t<n;t++)e[t].onclick=function(e){"#"===e.target.getAttribute("href")&&(e.target.parentElement.classList.toggle("active"),e.target.nextElementSibling.classList.toggle("show"))};window.addEventListener("resize",s)}}(),[].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function(e){return new bootstrap.Tooltip(e)}),[].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map(function(e){return new bootstrap.Popover(e)}),n(window).on("load",function(){n("#status").fadeOut(),n("#preloader").delay(350).fadeOut("slow")}),window.sessionStorage&&((a=sessionStorage.getItem("is_visited"))?(n(".right-bar input:checkbox").prop("checked",!1),n("#"+a).prop("checked",!0),t(a)):sessionStorage.setItem("is_visited","light-mode-switch")),n("#light-mode-switch, #dark-mode-switch, #rtl-mode-switch").on("change",function(e){t(e.target.id)}),Waves.init()}(jQuery);
        </script>

        <script>
            let firstname = document.getElementById('firstname');
            let lastname = document.getElementById('lastname');
            let email = document.getElementById('useremail');
            let username = document.getElementById('username');
            let password = document.getElementById('userpassword')
            document.getElementById('register').addEventListener('click',(e) => {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: location.href,
                    data: {
                        firstname: firstname.value,
                        lastname: lastname.value,
                        email: email.value,
                        username: username.value,
                        password: password.value
                    },
                    success: function (msg){
                        let response = JSON.parse(msg);
                        setTimeout(() => {
                            location.href = './login.php';
                        }, 2000);
                    },
                    error: function (msg){
                        console.log(msg)
                    }
                })
            })
        </script>

    </body>
</html>
