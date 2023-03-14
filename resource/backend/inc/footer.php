<?php 
    use App\Backend;
    $app = new Backend();
?>
</div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Upzet.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">
            
                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="<?php $app->asset('backend/'); ?>images/layouts/layout-1.png" class="img-thumbnail" alt="layout-1">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="<?php $app->asset('backend/'); ?>images/layouts/layout-2.png" class="img-thumbnail" alt="layout-2">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="<?php $app->asset('backend/'); ?>css/bootstrap-dark.min.css" data-appStyle="<?php $app->asset('backend/'); ?>css/app-dark.min.css">
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="<?php $app->asset('backend/'); ?>images/layouts/layout-3.png" class="img-thumbnail" alt="layout-3">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch" data-appStyle="<?php $app->asset('backend/'); ?>css/app-rtl.min.css">
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

            
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="<?php $app->asset('backend/'); ?>libs/jquery/jquery.min.js"></script>
        <script src="<?php $app->asset('backend/'); ?>libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php $app->asset('backend/'); ?>libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php $app->asset('backend/'); ?>libs/simplebar/simplebar.min.js"></script>
        <script src="<?php $app->asset('backend/'); ?>libs/node-waves/waves.min.js"></script>

        <!-- apexcharts js -->
        <script src="<?php $app->asset('backend/'); ?>libs/apexcharts/apexcharts.min.js"></script>

        <!-- jquery.vectormap map -->
        <script src="<?php $app->asset('backend/'); ?>libs/jqvmap/jquery.vmap.min.js"></script>
        <script src="<?php $app->asset('backend/'); ?>libs/jqvmap/maps/jquery.vmap.usa.js"></script>

        <script src="<?php $app->asset('backend/'); ?>js/pages/dashboard.init.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
        <script>
            !function(n){"use strict";function s(){for(var e=document.getElementById("topnav-menu-content").getElementsByTagName("a"),t=0,n=e.length;t<n;t++)"nav-item dropdown active"===e[t].parentElement.getAttribute("class")&&(e[t].parentElement.classList.remove("active"),e[t].nextElementSibling.classList.remove("show"))}function t(e){1==n("#light-mode-switch").prop("checked")&&"light-mode-switch"===e?(n("html").removeAttr("dir"),n("#dark-mode-switch").prop("checked",!1),n("#rtl-mode-switch").prop("checked",!1),n("#bootstrap-style").attr("href","<?php $app->asset('backend/'); ?>css/bootstrap.min.css"),n("#app-style").attr("href","<?php $app->asset('backend/'); ?>css/app.min.css"),sessionStorage.setItem("is_visited","light-mode-switch")):1==n("#dark-mode-switch").prop("checked")&&"dark-mode-switch"===e?(n("html").removeAttr("dir"),n("#light-mode-switch").prop("checked",!1),n("#rtl-mode-switch").prop("checked",!1),n("#bootstrap-style").attr("href","<?php $app->asset('backend/'); ?>css/bootstrap-dark.min.css"),n("#app-style").attr("href","<?php $app->asset('backend/'); ?>css/app-dark.min.css"),sessionStorage.setItem("is_visited","dark-mode-switch")):1==n("#rtl-mode-switch").prop("checked")&&"rtl-mode-switch"===e&&(n("#light-mode-switch").prop("checked",!1),n("#dark-mode-switch").prop("checked",!1),n("#bootstrap-style").attr("href","<?php $app->asset('backend/'); ?>css/bootstrap-rtl.min.css"),n("#app-style").attr("href","<?php $app->asset('backend/'); ?>css/app-rtl.min.css"),n("html").attr("dir","rtl"),sessionStorage.setItem("is_visited","rtl-mode-switch"))}function e(){document.webkitIsFullScreen||document.mozFullScreen||document.msFullscreenElement||(console.log("pressed"),n("body").removeClass("fullscreen-enable"))}var a;n("#side-menu").metisMenu(),n("#vertical-menu-btn").on("click",function(e){e.preventDefault(),n("body").toggleClass("sidebar-enable"),992<=n(window).width()?n("body").toggleClass("vertical-collpsed"):n("body").removeClass("vertical-collpsed")}),n("body,html").click(function(e){var t=n("#vertical-menu-btn");t.is(e.target)||0!==t.has(e.target).length||e.target.closest("div.vertical-menu")||n("body").removeClass("sidebar-enable")}),n("#sidebar-menu a").each(function(){var e=window.location.href.split(/[?#]/)[0];this.href==e&&(n(this).addClass("active"),n(this).parent().addClass("mm-active"),n(this).parent().parent().addClass("mm-show"),n(this).parent().parent().prev().addClass("mm-active"),n(this).parent().parent().parent().addClass("mm-active"),n(this).parent().parent().parent().parent().addClass("mm-show"),n(this).parent().parent().parent().parent().parent().addClass("mm-active"))}),n(".navbar-nav a").each(function(){var e=window.location.href.split(/[?#]/)[0];this.href==e&&(n(this).addClass("active"),n(this).parent().addClass("active"),n(this).parent().parent().addClass("active"),n(this).parent().parent().parent().addClass("active"),n(this).parent().parent().parent().parent().addClass("active"),n(this).parent().parent().parent().parent().parent().addClass("active"))}),n(document).ready(function(){var e;0<n("#sidebar-menu").length&&0<n("#sidebar-menu .mm-active .active").length&&(300<(e=n("#sidebar-menu .mm-active .active").offset().top)&&(e-=300,n(".vertical-menu .simplebar-content-wrapper").animate({scrollTop:e},"slow")))}),n('[data-toggle="fullscreen"]').on("click",function(e){e.preventDefault(),n("body").toggleClass("fullscreen-enable"),document.fullscreenElement||document.mozFullScreenElement||document.webkitFullscreenElement?document.cancelFullScreen?document.cancelFullScreen():document.mozCancelFullScreen?document.mozCancelFullScreen():document.webkitCancelFullScreen&&document.webkitCancelFullScreen():document.documentElement.requestFullscreen?document.documentElement.requestFullscreen():document.documentElement.mozRequestFullScreen?document.documentElement.mozRequestFullScreen():document.documentElement.webkitRequestFullscreen&&document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT)}),document.addEventListener("fullscreenchange",e),document.addEventListener("webkitfullscreenchange",e),document.addEventListener("mozfullscreenchange",e),n(".right-bar-toggle").on("click",function(e){n("body").toggleClass("right-bar-enabled")}),n(document).on("click","body",function(e){0<n(e.target).closest(".right-bar-toggle, .right-bar").length||n("body").removeClass("right-bar-enabled")}),function(){if(document.getElementById("topnav-menu-content")){for(var e=document.getElementById("topnav-menu-content").getElementsByTagName("a"),t=0,n=e.length;t<n;t++)e[t].onclick=function(e){"#"===e.target.getAttribute("href")&&(e.target.parentElement.classList.toggle("active"),e.target.nextElementSibling.classList.toggle("show"))};window.addEventListener("resize",s)}}(),[].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function(e){return new bootstrap.Tooltip(e)}),[].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map(function(e){return new bootstrap.Popover(e)}),n(window).on("load",function(){n("#status").fadeOut(),n("#preloader").delay(350).fadeOut("slow")}),window.sessionStorage&&((a=sessionStorage.getItem("is_visited"))?(n(".right-bar input:checkbox").prop("checked",!1),n("#"+a).prop("checked",!0),t(a)):sessionStorage.setItem("is_visited","light-mode-switch")),n("#light-mode-switch, #dark-mode-switch, #rtl-mode-switch").on("change",function(e){t(e.target.id)}),Waves.init()}(jQuery);
        </script>

    </body>
</html>
