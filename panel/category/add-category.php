<?php 

    require_once __DIR__ . '/../../vendor/autoload.php';


    use App\Backend;

    $app = new Backend();

    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) == 'XMLHttpRequest'){
        $app->add_category((object)$_POST);
        exit();
    }

    $app->get_header('backend');



    $app->view('backend.category.add-category');


    
    $app->get_footer('backend');