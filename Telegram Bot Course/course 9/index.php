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


}elseif(isset($update['callback_query'])){

    $call_id= $update['callback_query']['id'];
    $data= $update['callback_query']['data'];
    $chat_id = $update['callback_query']['from']['id'];
    $message_id = $update['callback_query']['message']['message_id'];
    $message = $update['callback_query']['message']['text'];

}



if($url == 'url' && $user_id != "5906070720"){
    msg("deleteMessage",array('chat_id'=>$chat_id,'message_id'=>$msg_id));
}elseif($user_id == "5906070720" && $text == '/ban'){
    $user_ban_id = $update["message"]["reply_to_message"]["from"]['id'];
    msg("banChatMember",array('chat_id'=>$chat_id,'user_id'=>$user_ban_id));
}


?>