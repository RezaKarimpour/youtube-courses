<?php
session_start();


class db
{
    private  $host = 'localhost';
    private $user = '';
    private $pass = '';
    private $dname = '';


    protected function  conncetion()
    {

        $db = new mysqli($this->host, $this->user, $this->pass, $this->dname);

        if ($db->connect_error) {
            die("error:" . $db->connect_error);
        } else {
            return $db;
        }
    }
    private function otp($text, $phone)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://sms.ersalak.com/webservice/v1rest/sendsms",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array(
                'username' => '',
                'password' => '',
                'Source' => '',
                'Message' => $text,
                'destination' => $phone
            ),
        ));
        $response = curl_exec($curl);
        var_dump($response);
        curl_close($curl);
    }
    public function addUser($name, $email, $phone, $pass)
    {
        $code = rand(1000, 9999);

        $sql = "INSERT INTO `user` (`name`,`email`,`phone`,`password`) Values ('$name', '$email','$phone', '$pass')";
        $this->conncetion()->query($sql);
        $sql2 = "INSERT INTO `otp` (`phone`,`code`) Values ('$phone','$code')";
        $this->conncetion()->query($sql2);
        $this->otp($code, $phone);
        $_SESSION['phone'] = $phone;
        $_SESSION['code'] = true;

        //        return true;
    }
    public  function otpcheck($c, $p)
    {
        $sql = "SELECT * FROM otp where phone = $p and code=$c ";
        $result = $this->conncetion()->query($sql);
        if ($result->num_rows > 0) {
            //            session_destroy();
            $_SESSION['login'] = true;
            header('location:panel.php');
            return true;
        } else {
            session_destroy();
            return false;
        }
    }


    public function checkLogin($username, $pass)
    {
        $sql = "SELECT * FROM `user` WHERE (`email` = '$username' or phone='$username') AND `password` = MD5(MD5($pass))";
        $result  =  $this->conncetion()->query($sql);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}

function check($n)
{
    return htmlspecialchars(trim($n));
}


$db = new db();

if (isset($_POST['signup'])) {
    $name = check($_POST['name']);
    $email = check($_POST['email']);
    $phone = check($_POST['phone']);
    $pass = $_POST['pass'];


    if ($db->addUser($name, $email, $phone, $pass)) {
        header('location:index.php');
    } else {
        echo 'error';
    }
}


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];

    if ($db->checkLogin($username, $pass)) {
        $_SESSION['login'] = true;
        header('location:panel.php');
    } else {
        $_SESSION['error'] = true;
        header('location:index.php');
    }
}

if (isset($_POST['codesubmit'])) {
    $code = $_POST['code'];
    $phone = $_SESSION['phone'];
    $db->otpcheck($code, $phone);
}
