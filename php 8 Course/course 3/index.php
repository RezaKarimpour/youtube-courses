<?php
/* 
developer : Reza Karimpour
course playlist : https://www.youtube.com/playlist?list=PL5GIwh73N-umSg25tL0k-GLUtMKFy0ykI
instagram : https://instagram.com/rezakarimpou.pro
*/
define("PI",3.14);

echo abs(-15.56) . "<br>";
echo rand(). "<br>";
echo rand(10,50). "<br>";
echo sqrt(121). "<br>";
echo floor(PI). "<br>";
echo ceil(PI). "<br>";
echo pow(PI,2). "<br>";
echo min(15, 10 , 3). "<br>";
echo max(15, 10 , 3). "<br>";

///////////////////////////
$text = "welcome to php 8";
 echo strlen($text)."<br>";
 echo str_word_count($text)."<br>";
 echo strrev($text)."<br>";
//  var_dump(strpos($text,'reza'));
 echo strpos($text,'to')."<br>";
 echo str_contains($text,'to')."<br>";
 echo str_ends_with($text,'8')."<br>";
 echo str_starts_with($text,'w')."<br>";

 $a =1;
 $b=2;
 echo $a.=$b;
?>