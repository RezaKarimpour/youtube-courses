<?php echo " <h1 style='direction:rtl;text-align:center;'> آموزش مقدماتی تا پیشرفته PHP8  با کانال یوتیوب Root One <br></h1>"; 


include 'jdf.php' ;
date_default_timezone_set("Asia/Tehran");

echo mktime(11,55,00,1,4,2012);
$r = mktime(11,55,00,1,4,2012);

echo "<br>".date("y-M-j - H:i",$r);

echo date("H:i");

if(checkdate(2002,29,3)){
    echo "<br> valid";
}

$date = 'july 21 2022';

echo  "<br>".strtotime('next friday');

echo date("Y-m-d")."<br>";
$r = explode('-',date("Y-m-d"));

var_dump($r);
echo gregorian_to_jalali($r[0],$r[1],$r[2],"/");
?>


<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RootOne</title>
</head>
<body>


</body>
</html>