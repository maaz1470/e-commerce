<?php
namespace App\Database;

use PDO;

class DB
{
    private $user;
    private $password;
    private $dbname;
    private $host;

    public $connect;

    public function __construct(string $user = 'root', string $password = '', string $host = 'localhost', string $dbname = 'e-commerce')
    {
        $this->user = $user;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->host = $host;
        $this->connect();
    }

    public function connect()
    {
        try {
            $sql = "mysql:host=$this->host;dbname=$this->dbname";
            if ($conn = new PDO($sql, $this->user, $this->password)) {
                return $this->connect = $conn;
            } else {
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (\PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function admins()
    {
        $this->connect->prepare("CREATE TABLE IF NOT EXISTS admins(
            id int(100) NOT NULL AUTO_INCREMENT,
            first_name varchar(255) NOT NULL,
            last_name varchar(255) NOT NULL,
            email varchar(100) NOT NULL,
            username varchar(100) NOT NULL,
            profile_pic varchar(100) NULL,
            roll tinyInt(1) NOT NULL DEFAULT 0,
            password varchar(255) NOT NULL,
            status tinyInt(1) DEFAULT 0,
            PRIMARY KEY(id),
            UNIQUE(email),
            UNIQUE(username)
        )")->execute();

    }

    public function categories(){
        $this->connect->prepare("CREATE TABLE IF NOT EXISTS categories(
            id int(100) NOT NULL AUTO_INCREMENT,
            name varchar(255) NOT NULL,
            url varchar(255) NOT NULL,
            category_image varchar(255) NULL,
            status tinyInt(1) NOT NULL DEFAULT 0,
            added_by int(100) NOT NULL,
            PRIMARY KEY(id),
            UNIQUE(url)
        )")->execute();
    }

}