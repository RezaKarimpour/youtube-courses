<?php 

if(isset($_POST['login'])){
    $user = $_POST['user'];
    $password = $_POST['pass'];
    if(($user == 'admin' || $user=='ADMIN') && $password==000000){
     echo "welcome";
    }else{
        echo "error";
    }
}

