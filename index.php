<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\App;

$app = new App();


define('APPLICATION_STATUS', true);

if (APPLICATION_STATUS) {
    $app->view('front-end.home.home');
} else {
    echo "Application Under Construction.";
}