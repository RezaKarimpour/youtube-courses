<?php echo " <h1 style='direction:rtl;text-align:center;'> آموزش مقدماتی تا پیشرفته PHP8  با کانال یوتیوب Root One <br></h1>";










$db = new SQLite3('mysqlitedb.db');

// $db = new mysqli('localhost', 'root', '', 'university2');

// if ($db->connect_error) {
//     die("error:" . $db->connect_error);
// }


// $sql = "CREATE DATABASE university2";

// $result = $db->query($sql);

// if($result ===true){
//    echo  'sakhte shod';
// }else{

//     echo  'error:' .$db->error;
// }

// $sql = "CREATE TABLE student(
// id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// name VARCHAR(100) NOT NULL,
// eDate DATE,
// score FLOAT(20)
// )";

// $sql = "INSERT INTO student (name,eDate,score) VALUES ('reza','2024-10-01',14.5)
// ";

// $sql = "SELECT * FROM student WHERE name='reza1' ";

// $result = $db->query($sql);

// if ($result->num_rows > 0) {
//     $row = $result->fetch_assoc();
//     while ($row) {
//         echo "name : " . $row['name'] . "<br>";
//         echo "eDate : " . $row['eDate'] . "<br>";
//         echo "score : " . $row['score'] . "<br>";
//         $row = $result->fetch_assoc();
//     }
// } else {
//     echo 'hichi nist';
// }



// $sql = "DELETE FROM student WHERE name='reza' and ";
// $sql = "DELETE FROM student";
// $sql = "UPDATE student SET name='asghar' , score=16  WHERE name='ali' ";

// $result = $db->query($sql);

// if ($result === true) {
//     echo  'hazf shod';
// } else {

//     echo  'error:' . $db->error;
// }
// $db->close();
