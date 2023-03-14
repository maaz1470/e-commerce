<?php
namespace App;

use App\App;
use App\Database\DB;
use PDO;

class Backend extends App
{
    public $connect;
    private $admin_id;
    public function __construct()
    {
        new App();
        $db = new DB();
        $this->connect = $db->connect;
        $admin = $this->connect->prepare("SELECT id FROM admins");
        $admin->execute();
        $admins = $admin->fetchAll();
        $admins = count($admins);
        $admins >= 1 && ($_SERVER['REQUEST_URI'] == $this->register_panel) ? isset($_SERVER['HTTP_REFERER']) ? header('Location: ' . $_SERVER['HTTP_REFERER']) : header('Location: ' . $this->login_panel) : true;

        $admins == 0 && ($_SERVER['REQUEST_URI'] == $this->login_panel) ? header('Location: ' . $this->register_panel) : true;

        if (isset($_COOKIE['client'])) {
            $json_decode = json_decode($_COOKIE['client']);
            $this->admin_id = $json_decode->i;
        } elseif (isset($_SESSION['admin_id'])) {
            $json_decode = json_decode($_SESSION['admin_id']);
            $this->admin_id = $json_decode->i;
        } else {
            $this->admin_id = null;
        }

        if ($this->admin_id && (isset($_COOKIE['client']) || isset($_SESSION['admin_id']))) {
            $admin = $this->connect->prepare("SELECT * FROM admins WHERE id=:id");
            $admin->bindParam(':id', $this->admin_id, PDO::PARAM_INT);
            $admin->execute();
            $single_admin = $admin->fetchAll();
            if (count($single_admin) >= 1) {
                if ($_SERVER['REQUEST_URI'] == $this->login_panel) {
                    $this->redirect($this->panel_url);
                }
            } else {
                unset($_SESSION['admin_id']);
                setcookie('client', null, time() - 999999, '/');
                $this->redirect($this->login_panel);
            }
        } else {
            unset($_SESSION['admin_id']);
            setcookie('client', null, time() - 999999, '/');
            if ($_SERVER['REQUEST_URI'] != $this->login_panel) {
                $this->redirect($this->login_panel);
            }
        }



    }
    public function appSetup($request)
    {
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $username = $request->username;
        $email = $request->email;
        $password = password_hash($request->password, PASSWORD_BCRYPT);
        $total_admins = $this->connect->prepare("SELECT id FROM admins");
        $total_admins->execute();
        $total_admin = $total_admins->fetchAll();
        if (count($total_admin) == 0) {
            $admin = $this->connect->prepare("INSERT INTO admins(first_name,last_name,email,username,password) VALUES(:firstname,:lastname,:email,:username,:password)");
            $admin->bindParam(':firstname', $firstname, PDO::PARAM_STR);
            $admin->bindParam(':lastname', $lastname, PDO::PARAM_STR);
            $admin->bindParam(':email', $email, PDO::PARAM_STR);
            $admin->bindParam(':username', $username, PDO::PARAM_STR);
            $admin->bindParam(':password', $password, PDO::PARAM_STR);
            if ($admin->execute()) {
                echo json_encode(['success' => $this->success('You are successfully registered')]);
            } else {
                echo json_encode(['error' => $this->error()]);
            }
        } else {
            echo json_encode(['error' => 'User allready exist.']);
        }

        return null;

    }

    public function adminLogin($request)
    {
        $username = $request->username;
        $userpassword = $request->userpassword;
        $user = $this->connect->prepare("SELECT * FROM admins WHERE username=:username OR status=1");
        $user->bindParam(':username', $username, PDO::PARAM_STR);
        $user->execute();
        $username = $user->fetch(PDO::FETCH_OBJ);
        if ($username) {
            if (password_verify($userpassword, $username->password)) {
                if ($request->remember == 'on') {
                    setcookie('client', json_encode(['l' => password_hash(time(), PASSWORD_ARGON2I), 'i' => $username->id, 'u' => md5(time())]), time() + 999999999, '/');
                } else {
                    $_SESSION['admin_id'] = json_encode(['l' => password_hash(time(), PASSWORD_ARGON2I), 'i' => $username->id, 'u' => md5(time())]);
                }
                $this->redirect($this->panel_url);
            } else {
                $this->back();
            }
        } else {
            $this->back();
        }

    }

    protected function category_url($url)
    {
        $url = str_replace(' ', '-', $url);
        $find_url = $this->connect->prepare("SELECT id,url FROM categories WHERE url=:url");
        $find_url->bindParam(':url', $url, PDO::PARAM_STR);
        $find_url->execute();
        $count_url = $find_url->fetchAll();
        if (count($count_url) >= 1) {
            $url = $url . '-' . count($count_url);
        }
        return $url;
    }


    public function add_category($request)
    {



        if (isset($_FILES['category_image'])) {
            $ext = pathinfo($_FILES['category_image']['name'], PATHINFO_EXTENSION);
            $path = rand(100000, 100000000) . md5(time()) . '.' . $ext;
            $dir = $_SERVER['DOCUMENT_ROOT'] . '/public/' . 'image/category/' . $path;
            move_uploaded_file($_FILES['category_image']['tmp_name'], $dir);
        } else {
            $dir = null;
        }
        $name = $request->category_name;
        $url = $this->category_url($request->category_name);
        $status = $request->category_status;


        $categories = $this->connect->prepare("INSERT INTO categories(name,url,status,added_by) VALUES(:name,:url,:status,:added_by)");
        $categories->bindParam(':name', $name, PDO::PARAM_STR);

        $categories->bindParam(':status', $status, PDO::PARAM_INT);
        $categories->bindParam(':url', $url, PDO::PARAM_STR);
        $categories->bindParam(':added_by', $this->admin_id, PDO::PARAM_INT);
        if ($categories->execute()) {

        } else {

        }
    }
}