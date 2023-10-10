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

$js='{"can_send_messages":"false"}';

if($url == 'url' && $user_id != ADMIN_ID){
    msg("deleteMessage",array('chat_id'=>$chat_id,'message_id'=>$msg_id));
}elseif($user_id == ADMIN_ID && $text == '/ban'){
     msg("banChatMember",array('chat_id'=>$chat_id,'user_id'=>$rep_user_id));
}elseif($user_id == ADMIN_ID && $text == '/pin'){
       msg("pinChatMessage",array('chat_id'=>$chat_id,'message_id'=>$rep_msg_id));
}elseif($user_id == ADMIN_ID && $text == '/sokot'){
  
    msg("banChatSenderChat",array('chat_id'=>$chat_id,'sender_chat_id'=>$rep_user_id));
}
elseif($user_id == ADMIN_ID && $text == '/hazf'){
    msg("deleteMessage",array('chat_id'=>$chat_id,'message_id'=>$rep_msg_id));
}
if($newmember != null){
    msg("sendMessage",array('chat_id'=>$chat_id,'user_id'=>$newmember . "خوش اومدی"));
}elseif($leftchat != null){
    msg("sendMessage",array('chat_id'=>$chat_id,'text'=>$leftchat . "خوشگذشت :)"));
}


?>