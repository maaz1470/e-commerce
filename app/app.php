<?php

namespace App;
use App\Database\DB;
class App extends \App\Config
{
    public $connect;
    public function __construct(){
        new Config();
        $db = new DB();
        $this->connect = $db->connect;
        
        

    }
    public function view(string $resource)
    {
        $dir = __DIR__ . '/../resource/' . str_replace('.', '/', $resource) . '.php';
        require_once($dir);
    }

    public function asset(string $dir = '/'){
        $dir = $this->home_url() . '/public/' . $dir;
        echo $dir;
    }

    public function get_header(string $type = 'front-end',string $dir = null){
         
        if($type == 'front-end'){
            $direction = $dir ?? './resource/front-end/inc/header.php';
        }elseif($type == 'backend'){
            $direction = $dir ?? '/resource/backend/inc/header.php';
        }else{
            $direction = null;
        }
        
        require_once __DIR__ . '/../' . $direction;
    }

    public function get_footer(string $type = 'front-end',string $dir = null){
        if($type == 'front-end'){
            $direction = $dir ?? './resource/front-end/inc/footer.php';
        }elseif($type == 'backend'){
            $direction = $dir ?? '/resource/backend/inc/footer.php';
        }else{
            $direction = null;
        }
        
        require_once __DIR__  . '/../' . $direction;
    }

    public function inc(string $dir,string $default = __DIR__ . '/../resource/'){
        $path = $default . $dir;
        include $path;
    }





}