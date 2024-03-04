<?php
session_start();


class db
{
    private  $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dname = 'school';


    protected function  conncetion()
    {

        $db = new mysqli($this->host, $this->user, $this->pass, $this->dname);

        if ($db->connect_error) {
            die("error:" . $db->connect_error);
        } else {
            return $db;
        }
    }

    public function add($name, $email, $pass)
    {
        $sql = "INSERT INTO `user`(`name`, `email`, `password`) VALUES ('$name','$email',MD5(MD5($pass)))";
        return $this->conncetion()->query($sql);
    }

    public function checkLogin($email , $pass)  {
        $sql = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = MD5(MD5($pass))";
        $result  =  $this->conncetion()->query($sql);
        if($result->num_rows > 0){
            return true;
        }else{
            return false;
        }

    }
}

function check($n){
   return htmlspecialchars(trim($n));
}


$db = new db();

if (isset($_POST['signup'])) {
    $name = check($_POST['name']);
    $email = check($_POST['email']);
    $pass = $_POST['pass'];


    // var_dump($db->add($name, $email, $pass));


    if ($db->add($name, $email, $pass)) {
        header('location:index.php');
    } else {
        echo 'error';
    }
}


if(isset($_POST['login'])){
    $email = $_POST['mail'];
    $pass = $_POST['password'];
    
        if($db->checkLogin($email,$pass)){
            $_SESSION['login']=true;
            header('location:panel.php');
        }else{
            $_SESSION['error']=true;
            header('location:index.php');
        }

    
}