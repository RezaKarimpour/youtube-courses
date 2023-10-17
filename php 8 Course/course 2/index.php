<?php

///////// variables -متغییر ها /////////////
$a = 3; //عدد صحیح  int
$b = 2; 
$c = '2';  // رشته string 
$float=12.5; // عدد اعشاری  float
$sting = "RootOne"; // رشته string 
$bool = true; //درست و غلط یا متغییر منطقی boolean
$bool1 = false; // درست و غلط یا متغییر منطقیboolean
$array = array("reza",1,true,12.5); //ارایه array
// $object = new car(); // شئ object
$null = NULL; // خالی بودن null

/////////  نمایش مقادیر  /////////////
echo "your password : $password <br>";
print("RootOne");

///////// change type - تبدیل متغییر  /////////////
$a1= (string)$float ; // عدد اعشاری به رشته 
$a2= (int)$float ; // عدد اشاری به عدد صحیح 
$a3= (int)$c ; // رشته به عدد صحیح 

///////// Arithmetic operator - عملگرهای محاسباتی /////////////
$result1 = $a + $b; //جمع 
$result2 = $a - $b; //تفریق
$result3 = $a * $b;//ضرب
$result4 = $a / $b;// تقسم 
$result5 = $a % $b; // باقی مانده 
$result6 = $a ** $b; // توان 

///////// Assignment operators - عملگر های انتساب /////////////
$a += $b; //جمع 
$a -= $b; //تفریق
$a *= $b;//ضرب
$a /= $b;// تقسم 
$a %= $b; // باقی مانده 
$a **= $b; // توان 

///////// Precedence of operators////////////
/*
اولویت عملگر ها 
اولویت اول  : () , **
اولویت دوم : % , / , * 
اولویت سوم : -,+
*/ 
$r1 = $a + $b *2;  //output  7
$r1 = ($a + $b) *2; //output  10

///////// Comparison operators////////////

$result7 = $c == $b;  // تساوی
$result8 = $c === $b; // همسانی 
$result9 = $c != $b; // نا مساوی 
$result10 = $a >= $b; // کوچک تر مساوی 
$result11 = $a <= $b; // برزگ تر مساوی 
$result12 = $a > $b; //کوچک تر
$result13 = $a < $b; // بزرگ تر



var_dump($result);
/*
تمرین :
برنامه ای بنویسید که قیمت یک کالا را در متغییر  ذخیره کند
سپس کالا را با 10 درصد تخفیف چاپ کنید 
*/

?>