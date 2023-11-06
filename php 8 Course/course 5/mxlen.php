<?php
 $sting1 = $_POST['str1'];
 $sting2 =$_POST['str2'];
 $len1 = strlen($sting1);
 $len2 = strlen($sting2);

    echo "STRING 1 :  $sting1 <br> STRING 2 : $sting2 <br>";
    echo "max length:" . max($len1,$len2);

?>