<?php
/* 
developer : Reza Karimpour
course playlist : https://www.youtube.com/playlist?list=PL5GIwh73N-unbhExotu7MWtgyeBRVSB0Y
instagram : https://instagram.com/rezakarimpou.pro
*/
// $a = rand(10000,100000);
// $b = rand(10000,100000);
// $c = rand(10000,100000);

// echo "generate number : $a , $b , $c <br>";
// $mx = max($a,$b,$c);
// echo "max:".$mx , "<br>";

// $mx_str= (string)$mx;
// $mx_str=str_replace('1','0',$mx_str);
// $mx_str=str_replace('2','0',$mx_str);

// echo "replace 1,2 with 0 : $mx_str";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RootOne</title>
</head>
<body>
    <form action="car.php" method="POST">
        <h2>select car</h2>
        type: <select name="type">
            <option value="bmw">bmw</option>
            <option value="benz">benz</option>
            <option value="peride">peride</option>
        </select><br>
        color: <input type="text" name="color"><br>
        <input type="submit" value="submit">
    </form>

    <br>

</body>
</html>