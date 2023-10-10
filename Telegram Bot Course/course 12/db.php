<?php
class db {
/* 
developer : Reza Karimpour
course playlist : https://www.youtube.com/playlist?list=PL5GIwh73N-unbhExotu7MWtgyeBRVSB0Y
instagram : https://instagram.com/rezakarimpou.pro
*/
private $servername = "localhost";
private $username = "";
private $password = "";
private $dbname = "";


protected function connect()
{
$conn = new PDO('mysql:host='. $this->servername . ';dbname='. $this->dbname, $this->username, $this->password);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
return $conn;

}}
class data extends db {
    
     public function insertUser($userid){
         $sql ="INSERT INTO `user`(`userid`) VALUES (?)";
         $stmt=$this->connect()->prepare($sql);
         $stmt->execute([$userid]);
     }
     
          public function updatestatus($userid,$status){
         $sql ="UPDATE `user` SET `status`=? WHERE userid=?";
         $stmt=$this->connect()->prepare($sql);
         $stmt->execute([$status,$userid]);
     }
    public function selectStatus($userid){
         $sql ="SELECT `status` FROM `user` WHERE `userid`=?";
         $stmt=$this->connect()->prepare($sql);
         $stmt->execute([$userid]);
         $row = $stmt->fetch();
         return $row;
     }
     
          public function insertpro($text){
         $sql ="INSERT INTO `product`(`Lcode`) VALUES (?)";
         $stmt=$this->connect()->prepare($sql);
         $stmt->execute([$text]);
     }
    public function GETL(){
         $sql ="SELECT * FROM `product` WHERE `status`=0 LIMIT 1";
         $stmt=$this->connect()->prepare($sql);
         $stmt->execute([]);
         $row = $stmt->fetch();
         return $row;
     }
     
               public function updatestatusL($lcode,$status){
         $sql ="UPDATE `product` SET `status`=? WHERE Lcode=?";
         $stmt=$this->connect()->prepare($sql);
         $stmt->execute([$status,$lcode]);
     }
}