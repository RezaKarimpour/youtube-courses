<?php echo " <h1 style='direction:rtl;text-align:center;'> آموزش مقدماتی تا پیشرفته PHP8  با کانال یوتیوب Root One <br></h1>"; 
if(isset($_POST['register'])){
$user = $_POST['user'];
$num = $_POST['num'];

if(strlen($user)>=4 and strlen($user)<=10 && $user != 'admin'){
    $result = ($num%2==0)?'even':'odd';
    echo 'welcome '.$user."<br>";
    echo "$num:$result";
}else{
    if(strlen($user)<4){
        echo "error";
    }elseif(strlen($user)>10){
        echo "error";
    }else{
        echo "username is not allowed";
    }
}
}


?>


<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RootOne</title>
</head>
<body>

    <form  method="POST" >
    username: <input type="text" name="user">
    number: <input type="text" name="num">
    <input type="submit" value="ثبت نام" name="register">
    </form>

</body>
</html>