<?php class db {

private $servername = "localhost";
private $username = "papaapp_rootonebot";
private $password = "vB?AFG4.Q7x@";
private $dbname = "papaapp_rootone";


protected function connect()
{
$conn = new PDO('mysql:host='. $this->servername . ';dbname='. $this->dbname, $this->username, $this->password);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
return $conn;

}}
class data extends db {
    public function insertUserInfo($userid,$user_inv){
        if($user_inv == NULL){
        $sql = "insert into users(user_id)VALUES (?)";
        $stmt = $this-> connect()->prepare($sql);
        $check = $stmt -> execute([$userid]);
        if($check){
            return true;
        }else{
            return false;
            }
        }else{
        $sql = "insert into users(user_id,user_invite)VALUES (?,?)";
        $stmt = $this-> connect()->prepare($sql);
        $check = $stmt -> execute([$userid,$user_inv]);
        if($check){
            return true;
        }else{
            return false;
            }
        }
    }
    public function chargeWallet($userid){
        // inja bayad user id ro begarde peyda kone toye data base bad meghdare sharzhesh ro +  100 kone
        $select = "SELECT `wallet` FROM `users` WHERE `user_id`=?";
        $stmt = $this->connect()->prepare($select);
        $stmt ->execute([$userid]);
        $row = $stmt->fetch();
        $charge= $row['wallet']+100;
        $sql = "UPDATE `users` SET `wallet`='$charge' WHERE `user_id`=?";
        $stmt2 = $this->connect()->prepare($sql);
        $stmt2 ->execute([$userid]);
        return true;
    }
    public function checkLink($userid,$userInvId){
        if($userInvId == NULL){
        $sql = "select user_id,user_invite from users where user_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt ->execute([$userid]);
        $row = $stmt->rowCount();
        if ($row >=1){
            return true;
        }else{
            return false;
        }
        }else{
        $sql = "select user_id,user_invite from users where user_id=? and user_invite=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt ->execute([$userid,$userInvId]);
        $row = $stmt->rowCount();
        if ($row >=1){
            return true;
        }else{
            return false;
        }
        }
    }   
    public function vip($userid,$date){
        $sql = "UPDATE `users` SET `level`='vip' , `expireVIP`=$date  WHERE `user_id`=?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt ->execute([$userid]);
         
    }
    public function checkVipUser($userid){
            $sql = "SELECT `level` FROM `users` WHERE `user_id`=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt ->execute([$userid]);
            $row = $stmt->fetch();
            if($row['level']=='vip'){
                return true;
            }else{
                return false;
            }
        }
    public function checkVipeExpire(){
        $sql = "SELECT `user_id`, `expireVIP` FROM `users` WHERE `level`='vip'";
        $stmt = $this->connect()->prepare($sql);
        $stmt ->execute();
        $row = $stmt->fetchAll();
        foreach($row as $b){
            if(empty($b['expireVIP'])){
                continue;
            }else{
               $ex =strtotime($b['expireVIP']);
               $today = time();
               if( $ex < $today){
                   include_once 'bot.php' ;
                   $vipUserId = $b['user_id'];
                   $sqlUp = "UPDATE `users` SET `level`='free',expireVIP='' WHERE `user_id`=?";
                   $stmt = $this->connect()->prepare($sqlUp);
                   $stmt ->execute([$vipUserId]);
                   msg('sendMessage',array(chat_id=>"$vipUserId",text=>"اشتراک ویژه شما به پایان رسید در صورت تمایل مجددا اشتراک خود را تمدید کنید \n /vip"));
               }
            }
        }
        
    }
        public function updateStats($userid,$state){
        $sql = "update users set status=$state where user_id=? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt ->execute([$userid]);
    }
    public function status($userid){
        $select = "SELECT `status` FROM `users` WHERE `user_id`=?";
        $stmt = $this->connect()->prepare($select);
        $stmt ->execute([$userid]);
        $row = $stmt->fetch();
        return $row;
    }
     public function updatestatusPost($status){
        $sql = "update product set status=$status where status=? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt ->execute(["done"]);
    }
         public function checkStatusPro($status){
        $sql = "SELECT status from product where status=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt ->execute([$status]);
        $row = $stmt->rowCount();
        if ($row >=1){
            return true;
        }else{
            return false;
        }
    }
        public function createPost($code,$status){
        $sql = "insert into product(product_code,status)VALUES(?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt ->execute([$code,$status]);
    }
    public function updatePostDL($maxdl,$status){
        $sql = "update product set dl_max=$maxdl ,status='m' where status=? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt ->execute([$status]);
    }
        public function updatePostPrice($price,$status){
        $sql = "update product set price=$price ,status='d' where status=? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt ->execute([$status]);
    }
        public function updatePostFile($fileid,$caption,$status){
        $sql = "UPDATE `product` SET `file_id`='$fileid',`text`='$caption',`status`='done' WHERE `status`=? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt ->execute([$status]);
    }
    public function lastSource(){
        $sql = "SELECT * FROM product ORDER BY ID DESC LIMIT 1";
        $stmt = $this->connect()->prepare($sql);
        $stmt ->execute();
        $row = $stmt->fetch();
        return $row;
    }
    public function countUsers(){
        $sql = "SELECT COUNT(*) FROM users";
        $stmt = $this-> connect()->prepare($sql);
        $stmt -> execute();
        $row = $stmt->fetch();
        $sql1 = "SELECT COUNT(*) FROM users where level='vip'";
        $stmt1 = $this-> connect()->prepare($sql1);
        $stmt1 -> execute();
        $row1 = $stmt1->fetch();
        $sql2 = "SELECT COUNT(*) FROM users where level='free'";
        $stmt2 = $this-> connect()->prepare($sql2);
        $stmt2 -> execute();
        $row2 = $stmt2->fetch();
        return $row['COUNT(*)']."-".$row1['COUNT(*)']."-".$row2['COUNT(*)'];
    }
    public function insertGitLog($userid,$charge,$status){
            if($status==1){
                $sql = "insert into gift_log (user_id,charge,status)VALUES(?,?,?)";
                $stmt = $this->connect()->prepare($sql);
                $stmt ->execute(['0','0',$status]);
                
            }elseif($status==2){
                $sql = "UPDATE `gift_log` SET `user_id`=$userid ,`status`=$status WHERE `status`=?";
                $stmt = $this->connect()->prepare($sql);
                $stmt ->execute(['1']); 
            }elseif($status==3){
                $sql = "UPDATE `gift_log` SET `charge`=$charge ,`status`=$status WHERE `status`=?";
                $stmt = $this->connect()->prepare($sql);
                $stmt ->execute(['2']); 
            }elseif($status==4){
                $sql = "UPDATE `gift_log` SET `status`=$status WHERE `status`=?";
                $stmt = $this->connect()->prepare($sql);
                $stmt ->execute(['2']); 
            }

    }
    public function checkLogGift($status){
         $sql = "SELECT user_id , status FROM gift_log WHERE status=?";
        $stmt = $this-> connect()->prepare($sql);
        $stmt -> execute([$status]);
        $row2 = $stmt->fetch();
        $row = $stmt->rowCount();
        if ($row >=1){
            return $row2;
        }else{
            return false;
        }
        
    }
    public function chargeGiftWallet($userid,$charge){
        $sql="UPDATE users SET wallet=? WHERE user_id=?";
        $stmt=$this->connect()->prepare($sql);
        $check = $stmt->execute([$charge,$userid]);
        if($check){
            return true;
        }else{
            return false;
        }
    }
}
