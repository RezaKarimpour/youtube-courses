<?php
/* 
developer : Reza Karimpour
course playlist : https://www.youtube.com/playlist?list=PL5GIwh73N-unbhExotu7MWtgyeBRVSB0Y
instagram : https://instagram.com/rezakarimpou.pro
*/
require 'bot.php';
require 'db.php';
$db = new data();

$content = file_get_contents("php://input");
$update = json_decode($content,true);
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

$status = $db->selectStatus($chat_id);

// msg('sendMessage',array(chat_id=>$chat_id,text=>$content));
$UserBtn=array('resize_keyboard' =>true,"inline_keyboard"=>array(array(array('text'=>"لایسنس ویندوز ",'callback_data'=>"w1"),array('text'=>"لایسنس انتی ویروس ",'callback_data'=>"a1")),array(array('text'=>"لایسنس بازی ",'callback_data'=>"g1"))));
$price=array('resize_keyboard' =>true,"inline_keyboard"=>array(array(array('text'=>"10 روز 10 تومان",'callback_data'=>"w10"),array('text'=>"1 ماهه - 100 تومان",'callback_data'=>"w100"))));

if($text == "/shop"){
    msg('sendMessage',array(chat_id=>$chat_id,text=>"چه لایسنسی نیاز داری؟",reply_markup=>$UserBtn));
}

if($data == "w1"){
    msg('editMessageText',array(chat_id=>$chat_id,message_id=>$message_id,text=>"چند روزه میخوای ؟",reply_markup=>$price));
}
if($data == "w100"){
  msg('sendMessage',array(chat_id=>$chat_id,text=>"به این شماره کارت واریز کنید و رسید را برای ربات ارسال کنید "));
  $db->updatestatus($chat_id,2);
}
if($status['status'] == 2){
    msg('forwardMessage',array(chat_id=>ADMINID,message_id=>$msg_id,from_chat_id=>$user_id));
    msg('sendMessage',array(chat_id=>$chat_id,text=>"یه ساعت دیگه لایسنس رو دریافت میکنی "));
    $db->updatestatus($chat_id,0);
}

if($data == "w10"){
    $getL =$db->GETL();
    msg('sendMessage',array(chat_id=>$chat_id,text=>$getL['Lcode'] . "\n لایسنس ویندوز ☝" ));
    $db->updatestatusL($getL['Lcode'],1);
}


///////////////panel admin/////////////////
$btn= array('resize_keyboard' =>true,"inline_keyboard"=>array(array(array('text'=>"افزودن محصول",'callback_data'=>"add"))));
if($text == "/start"){
     msg('sendMessage',array(chat_id=>$chat_id,text=>"سلام خوش اومدی برای خرید لایسنس از دستور /shop  استفاده کن 😎"));
     $db->insertUser($chat_id);
}
if($chat_id== ADMINID){
    
if( $text == "/panel"){
msg('sendMessage',array(chat_id=>$chat_id,text=>"سلام ادمین چه کاری از دستم بر میاد ؟",reply_markup=>$btn));
}

if($data== "add"){
    $db->updatestatus(ADMINID,1);
    msg('sendMessage',array(chat_id=>$chat_id,text=>"کد لایسنس رو بفرست "));
}

if($status['status'] == 1){
    $db->insertpro($text);
    msg('sendMessage',array(chat_id=>$chat_id,text=>"کد اضافه شد "));
    $db->updatestatus(ADMINID,0);
}
}



?>