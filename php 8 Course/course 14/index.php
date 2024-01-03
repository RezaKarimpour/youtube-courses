<?php echo " <h1 style='direction:rtl;text-align:center;'> آموزش مقدماتی تا پیشرفته PHP8  با کانال یوتیوب Root One <br></h1>";

session_start();


$_SESSION['username'] = 'root one';






// setcookie('username','root_one',time()+(86400*20) ,'rootone.ir/login.php');

// echo "<pre>";
// var_dump($_COOKIE['username']);


// echo "</pre>";


// echo "welcome ".$_COOKIE['username'];
session_unset();
session_destroy();
echo "welcome ".$_SESSION['username'];

// unset($_COOKIE['username']);
// echo "welcome ".$_COOKIE['username'];
// $a= time()+(86400*30);

// echo  date("Y-m-d",$a);

?>


<!-- <html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RootOne</title>
</head>
<body> 

</body>
</html> -->

