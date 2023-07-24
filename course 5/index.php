<?php
/* 
developer : Reza Karimpour
course playlist : https://www.youtube.com/playlist?list=PL5GIwh73N-unbhExotu7MWtgyeBRVSB0Y
instagram : https://instagram.com/rezakarimpou.pro
*/

require 'bot.php';

$contet = file_get_contents("php://input");
$update = json_decode($contet,true);
$chat_id = $update["message"]["chat"]["id"];
$text = $update["message"]['text'];
$msg_id = $update['message']['message_id'];
 $channel_id = '@rootonechannel';
$text2 = "https://youtube.com/@root_one";

$mp4="https://vod-progressive.akamaized.net/exp=1690179610~acl=%2Fvimeo-prod-skyfire-std-us%2F01%2F3395%2F22%2F566975655%2F2680618344.mp4~hmac=7aaab64a2d1ec6d09e0845401a4860c9fb3e10f3069dc6ec22f88e0c24bfe08a/vimeo-prod-skyfire-std-us/01/3395/22/566975655/2680618344.mp4?download=1&filename=pexels-yaroslav-shuraev-8464662+%28360p%29.mp4";
$img = "https://images.pexels.com/photos/8566472/pexels-photo-8566472.jpeg";
$mp3 = "https://dl6.songsara.net/FRE/1/End%20Of%20Silence%20-%20Permutations%20(2021)/01%20Zarathustra.mp3";


if ($text== "/start"){
    msg("sendMessage",array('parse_mode'=>'HTML','chat_id'=>$chat_id,'text'=>"  سلام به ربات root one  خوش امدید"."\n".$text2, 'disable_web_page_preview' =>  true, 'reply_to_message_id'=>$msg_id ));
}elseif ($text== "/amoozesh"){
    msg("sendPhoto",array('parse_mode'=>'HTML','chat_id'=>$chat_id,'photo'=>"https://cdn-icons-png.flaticon.com/512/4712/4712109.png",'has_spoiler'=> true , 'caption'=>"این عکس یک ربات است " ));
}elseif ($text == "/video" ){
    msg("sendVideo",array('chat_id'=>$chat_id , 'video'=>$mp4, 'caption' => "یه ویدیو از ربات برات فرستادم "));
}elseif ($text == "/audio" ){
    msg("sendChatAction",array('chat_id'=>$chat_id , 'action'=>'upload_voice'));
    msg("sendAudio",array('chat_id'=>$chat_id , 'audio'=>$mp3, 'caption' => "یه موزیک عالی برات فرستادم"));
}elseif ($text == "/doc" ){
    msg("sendChatAction",array('chat_id'=>$chat_id , 'action'=>'upload_document'));
    msg("sendDocument",array('chat_id'=>$chat_id , 'document'=>$img));
}elseif ($text == "/loc" ){
    msg("sendLocation",array('chat_id'=>$chat_id , 'latitude'=>7.5844339, 'longitude'=>51.07065));
} else {
    msg("sendMessage",array('chat_id'=>$chat_id,'text'=>" دستور نامعتبر است " ));
}

$r = msg("getChatMember",array('chat_id'=>$channel_id,'user_id'=>$chat_id ));
$r  = json_decode($r,true);
//msg("sendMessage",array('chat_id'=>$chat_id,'text'=>$r['result']['status'] ));
if($r['ok'] && $r['result']['status'] == 'member'){
    msg("sendMessage",array('chat_id'=>$chat_id,'text'=>"شما عضو کانال هستید" ));
}else{
    msg("sendMessage",array('chat_id'=>$chat_id,'text'=>"شما عضو کانال نیستد وارد کانال ما شوید \n ".$channel_id ));
}

?>