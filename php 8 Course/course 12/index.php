<?php echo " <h1 style='direction:rtl;text-align:center;'> آموزش مقدماتی تا پیشرفته PHP8  با کانال یوتیوب Root One <br></h1>"; 




echo trim(htmlspecialchars($_GET['text']));

var_dump(ctype_alpha($_GET['text']));
var_dump(ctype_digit($_GET['text']));

if(!preg_match('/^[a-z0-9]*$/',$_GET['text'])){
    echo 'error';
}

// تابعی بنویسید که فرمت درستی url را بررسی کند 
$email = $_GET['email'];

$email = filter_var($email,FILTER_SANITIZE_EMAIL);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "error";
}

?>


<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RootOne</title>
</head>
<body>
<form method="GET">
   <input type="text" name="email" >
    <input type="submit" value="submit">
</form>

</body>
</html>