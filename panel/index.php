<?php 

    require_once __DIR__ . '/../vendor/autoload.php';

    use App\Backend;

    $app = new Backend();

    $app->get_header('backend');

    $app->view('backend.dashboard.dashboard');

    $app->get_footer('backend');