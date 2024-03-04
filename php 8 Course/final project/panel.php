<?php
session_start();
if(isset($_SESSION['login'])){
    echo  'خوش اومدی';
}else{
    header('location:index.php');
}
?>

<a href="logout.php" target="_blank">خروج</a>