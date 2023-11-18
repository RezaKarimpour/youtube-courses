<?php echo " <h1 style='direction:rtl;text-align:center;'> آموزش مقدماتی تا پیشرفته PHP8  با کانال یوتیوب Root One <br></h1>"; 

//while
//for
// do while 
//foreach


////////////////while
// $x = 50;
// while($x>=1){
// if($x%2==0){
//     echo $x. " ";
// } 
//     $x--;
// }
////////////////do while
// $y=1;
// do{
// echo $y;
// $y++;
// }while($y>=10);
////////////////for

// for($x=1;$x<=10;$x++){
//     for($y=1;$y<=10;$y++){
//         echo '('.$x.'*'.$y.'='.$x*$y.')'.' ';
//     }
//     echo "<br>";

// }
for($x=1;$x<=10;$x++){
    // echo '*';
    // if($x ==5){
    //     break;
    // }
    if($x==2){
        continue;
    }
    echo $x;

}

?>


<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RootOne</title>
</head>
<body>

    <!-- <form  method="POST" >
    username: <input type="text" name="user">
    number: <input type="text" name="num">
    <input type="submit" value="ثبت نام" name="register">
    </form> -->

</body>
</html>