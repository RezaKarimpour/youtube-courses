<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rootone</title>
</head>
<body>
<table>
<tr>
    <?php
        $x=$_POST['num'];
        for($i=1;$i<=$x;$i++)
        echo '<td style="padding:10px">'.$i.'</td>';
    ?>
</tr>

</table>    


</body>
</html>