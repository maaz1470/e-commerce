<?php
namespace App;

class Config
{
    public $register_panel = '/admin/register.php';
    public $login_panel = '/admin/login.php';
    public $user_url = '/admin';
    public $panel_url = '/panel';
    public function __construct() {
        if(empty(session_id())){
            session_name('rh');
            session_start();
        }
        $db = new \App\Database\DB();
        $db->admins();
        $db->categories();
    }
    public function home_url()
    {
        $server_name = $_SERVER['SERVER_NAME'];
        $port = null;
        if ($server_name == ('localhost' || '127.0.0.1')) {
            $port = $_SERVER['SERVER_PORT'];
        }
        if (isset($_SERVER['HTTPS']) == 'on') {
            $protocall = 'https';
        } else {
            $protocall = 'http';
        }
        $url = $protocall . '://' . $server_name . ($port ? ':' . $port : null);
        return $url;
    }
    public function redirect($url){
        header('Location: ' . $url);
    }

    public function back(){
        if(isset($_SERVER['HTTP_REFERER'])){
            $url = $_SERVER['HTTP_REFERER'];
            header('Location: ' . $url);
        }else{
            return false;
        }
    }

    public function success(string $msg = null){
        return $msg ?? 'Data Successfully Saved';
    }
    public function error(string $msg = null){
        return $msg ?? 'Something went wrong. Please try again.';
    }
}