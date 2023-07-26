<?php
require 'bot.php';

$contet = file_get_contents("php://input");
$update = json_decode($contet,true);
$chat_id = $update["message"]["chat"]["id"];
$text = $update["message"]['text'];
$msg_id = $update['message']['message_id'];
 $channel_id = '@rootonechannel';
$text2 = "https://youtube.com/@root_one";


$btn=array(
    'resize_keyboard'=>true,
    'keyboard'=>array(
        array("شعر","آموزش"),
        array("آموزش")
    ));
//$btn2=array(
//    'resize_keyboard'=>true,
//    'keyboard'=>array(
//        array("برگشت")
//    ));

$inline= array(
    'resize_keyboard'=>true,
    'inline_keyboard'=>array(
        array(
            array('text'=>'یوتیوب','url'=>$text2),array('text'=>'اینستاگرام','url'=>"https://instagram.com/rezakarimpour.pro"),array('text'=>'گیت هاب','url'=>$text2)
        ), array(
            array('text'=>'گوگل','url'=>"https://google.com")
        )
    )
);


msg("sendMessage",array("chat_id"=>$chat_id,'text'=>$text,'reply_markup'=>$inline));
msg("sendMessage",array("chat_id"=>$chat_id,'text'=>$text,'reply_markup'=>$btn));

//if( $text == "شعر"){
//    msg("sendMessage",array("chat_id"=>$chat_id,'text'=>"این یه شعر زیبا است",'reply_markup'=>$btn2));
//}elseif ($text == "برگشت"){
//    msg("sendMessage",array("chat_id"=>$chat_id,'text'=>"برگشت به منو اصلی ",'reply_markup'=>$btn));
//}

?>