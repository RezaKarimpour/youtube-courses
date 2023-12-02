<?php
function validate($user,$pass){
    if($user == 'admin' && $pass== 1234){
        echo  "<h1 style='color:green;'>welcome $user</h1>";
    }else{
        echo "<h1 style='color:red;'>error</h1>";
      }
}
// function validate($user,$pass){
//     if($user == 'admin' && $pass== 1234){
//         return true;
//     }else{
//         return false;
//     }
// }

// function welcome($user){
//     echo "<h1 style='color:green;'>welcome $user</h1>";
// }

// function fail() {
    
//     echo "<h1 style='color:red;'>error</h1>";
// }
$user = $_POST['user'];
$pass = $_POST['pass'];

// if(validate($user,$pass)){
//     welcome($user);
// }else{
//     fail();
// }



validate($user,$pass);