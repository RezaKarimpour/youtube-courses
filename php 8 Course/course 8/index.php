<?php echo " <h1 style='direction:rtl;text-align:center;'> آموزش مقدماتی تا پیشرفته PHP8  با کانال یوتیوب Root One <br></h1>"; 

function sum($num1 ,$num2){
    // $x =2 ;
    // $y=3;
    $result =$num1+$num2;}
// sum();
//     if($result == 7){

//         return true;
//     }else{
//         return '7 nist';
//     }
// }

// function sum2($x ,$y):int{
//     return $x + $y;
// }

// function sum3(){
//         global $a,$b,$c,$d;
//         $c = $a+$b;
//         $d=12;
// }


// global var
// function test(){
//     global $d;
//     echo $d;

// }
// $a=1;
// $b=5 ;
// sum3();
// echo $c.'<br>';
// test();


// send email
$to = 'Rootone.ir@gmail.com' ; 
$subject = 'اموزش php' ; 
$msg = 'سلام چطوری ؟ مدونستی داخل کانال روت وان \n کلی دوره رایگان وجود داره ایدی کانالش @root_one' ;
$headers = 'From: Rootone.ir@gmail.com' . "\r\n";

if(mail($to,$subject,$msg,$headers)){
    echo 'success';
}else{
    echo 'error';
}

?>


<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RootOne</title>
</head>
<body>

    <!-- <form  method="POST"  action="loop.php">
    number: <input type="text" name="num">
    <input type="submit" value="submit" name="sub">
    </form> -->

        <h1><?php 
        var_dump(sum(3, 5));

    // $r = sum(2, 5) * 2;
    // echo $r;
        // echo sum2(2,3.5);

        ?></h1>

</body>
</html>

