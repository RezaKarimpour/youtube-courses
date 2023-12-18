<?php echo " <h1 style='direction:rtl;text-align:center;'> آموزش مقدماتی تا پیشرفته PHP8  با کانال یوتیوب Root One <br></h1>"; 


include '../jdf.php' ;

if (isset($_GET['submit'])){
$date =  $_GET['date'];
$date = explode("-",$date);

$r =   date('Y') - $date[0];

echo "$r <br>";
echo gregorian_to_jalali($date[0],$date[1],$date[2],"/");

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
   <input type="date" name="date" >
    <input type="submit" value="submit">
</form>

</body>
</html>