<?php echo " <h1 style='direction:rtl;text-align:center;'> آموزش مقدماتی تا پیشرفته PHP8  با کانال یوتیوب Root One <br></h1>"; 
if(isset($_POST['submit'])){
    $pro = $_POST['product'];

echo 'number of selected product: '.count($pro).'<br>';

echo "<b>selected product: </b> <br>";

foreach($pro as $val){
echo $val.' ';
}
}
?>


<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RootOne</title>
</head>
<body>
    <!-- <form  method="POST"  >
    <input type="checkbox" name="product[]" value="product1"> <h4>product1</h4>
    <input type="checkbox" name="product[]" value="product2"><h4>product2</h4>
    <input type="checkbox" name="product[]" value="product3"><h4>product3</h4>
    <input type="checkbox" name="product[]" value="product4"><h4>product4</h4>
    <input type="checkbox" name="product[]" value="product5"><h4>product5</h4>
    <input type="checkbox" name="product[]" value="product6"><h4>product6</h4>
    <input type="checkbox" name="product[]" value="product7"><h4>product7</h4>
    <input type="submit" value="submit" name="submit">
    </form> -->






</body>
</html>