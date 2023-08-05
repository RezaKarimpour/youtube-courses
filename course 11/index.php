<?php
/* 
developer : Reza Karimpour
course playlist : https://www.youtube.com/playlist?list=PL5GIwh73N-unbhExotu7MWtgyeBRVSB0Y
instagram : https://instagram.com/rezakarimpou.pro
*/
require 'bot.php';

$contet = file_get_contents("php://input");
$update = json_decode($contet,true);
$channel_id = 'rootonechannel';
$utube = "https://youtube.com/@root_one";
$git= "https://github.com/RezaKarimpour";
$instagram="https://instagram.com/rezakarimpour.pro";


if(isset($update['message'])){
    
$chat_id = $update["message"]["chat"]["id"];
$user_id = $update["message"]["from"]["id"];
$text = $update["message"]['text'];
$msg_id = $update['message']['message_id'];
$url = $update['message']['entities'][0]['type'];
$newmember = $update['message']['new_chat_member']['first_name'];
$leftchat = $update['message']['left_chat_member']['first_name'];
$rep_user_id = $update["message"]["reply_to_message"]["from"]['id'];
$rep_msg_id = $update["message"]["reply_to_message"]["message_id"];

}elseif(isset($update['callback_query'])){

    $call_id= $update['callback_query']['id'];
    $data= $update['callback_query']['data'];
    $chat_id = $update['callback_query']['from']['id'];
    $message_id = $update['callback_query']['message']['message_id'];
    $message = $update['callback_query']['message']['text'];

}
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

 

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

if($text == "/link"){
    $url = "t.me/rootonebot?start=$chat_id";
    msg("sendMessage",array('chat_id'=>$chat_id,'text'=>$url));
}

// msg("sendMessage",array(chat_id=>$chat_id,text=>$text));

if($text == "/start"){
        $sql="INSERT INTO  zirmajmoe (user_id, user_id_invite) VALUES ($chat_id,0)";
        if($conn->exec($sql)){
            msg("sendMessage",array('chat_id'=>$chat_id,'text'=>"خوش امدی"));
        }

}else{
        $result= explode(" ",$text);
        $sql="INSERT INTO zirmajmoe (user_id, user_id_invite) VALUES ($chat_id,$result[1])";
        $conn->exec($sql);
        $sql2="SELECT COUNT(`user_id_invite`) FROM `zirmajmoe` WHERE `user_id_invite`=$chat_id";
        $countid  = $conn->exec($sql2);
        msg("sendMessage",array('chat_id'=>$chat_id,'text'=>" $countid"));
        if($countid <=10){
        msg("sendMessage",array('chat_id'=>$chat_id,'text'=>"8 نفر دیگه باید دعوت کنی "));
        exit();
        }

        // بقیه کد های ربات


}


?>