<?php echo " <h1 style='direction:rtl;text-align:center;'> آموزش مقدماتی تا پیشرفته PHP8  با کانال یوتیوب Root One <br></h1>";

// header("X-My-header: version 2.1");

// var_dump(headers_list());

// header("Location: https://rootone.ir");

// header("refresh:10;url=https://rootone.ir")


// header("Content-Type: text/html; charset=utf-8");
// header("Content-Type: multipart/form-data; boundary=something");


// '{ "name":"rootone" ,
//    "lastname":"reza" ,
//     "age": 25 ,
//     "email":"root@gmail.com"}
//     }'

$info = array("fname"=> "reza", "channleName"=>"rootone" , "age"=>25 );

$user = json_encode($info);

file_put_contents("user.json",$user);


$file = file_get_contents("user.json");


echo "<pre>";
var_dump(json_decode($file,true));
echo "</pre>";

// echo "<pre>";
// var_dump(json_encode($info));
// echo "</pre>";

// $info = '{"fname":"reza","channleName":"rootone","age":25}';
// echo "<pre>";
// var_dump(json_decode($info));
// echo "</pre>";

// $js = '["reza","rootone","25"]';
// echo "---------------<pre>";
// var_dump(json_decode($js));
// echo "</pre>";

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

