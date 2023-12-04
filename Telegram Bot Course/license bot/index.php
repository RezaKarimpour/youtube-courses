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
$gpID = -40516930188;

$success == 0;
$faild = 0;


if(isset($update['message'])){
    
$chat_id = $update["message"]["chat"]["id"];
$user_id = $update["message"]["from"]["id"];
$text = $update["message"]['text'];
$msg_id = $update['message']['message_id'];
$url = $update['message']['entities'][0]['type'];
$FrwFromId = $update["message"]["reply_to_message"]["forward_from"]['id'];


}elseif(isset($update['callback_query'])){

    $call_id= $update['callback_query']['id'];
    $data= $update['callback_query']['data'];
    $chat_id = $update['callback_query']['from']['id'];
    $message_id = $update['callback_query']['message']['message_id'];
    $message = $update['callback_query']['message']['text'];

}
$status = $db->selectStatus($chat_id);

// msg('sendMessage',array(chat_id=>$gpID,text=>$content));

$d = getDollar(); 
$d = str_replace(",","",$d); 
$d = (int)$d ;
$w10 = $d * 2 ;

$UserBtn=array('resize_keyboard' =>true,"inline_keyboard"=>array(array(array('text'=>"لایسنس ویندوز ",'callback_data'=>"w1"),array('text'=>"لایسنس انتی ویروس ",'callback_data'=>"a1")),array(array('text'=>"لایسنس بازی ",'callback_data'=>"g1"),array('text'=>"افزایش شارژ",'callback_data'=>"addcharge"))));
$price=array('resize_keyboard' =>true,"inline_keyboard"=>array(array(array('text'=>"10 روز $w10",'callback_data'=>"w10"),array('text'=>"1 ماهه - 100 تومان",'callback_data'=>"w100"))));
$btuser=array('resize_keyboard' =>true,"inline_keyboard"=>array(array(array('text'=>"ورود به پروفایل کاربر",'url'=>"tg://user?id=$chat_id"))));
if($text == "/shop"){
    msg('sendMessage',array(chat_id=>$chat_id,text=>"چه لایسنسی نیاز داری؟",reply_markup=>$UserBtn));
}elseif($text == '/sup'){
    msg('sendMessage',array(chat_id=>$chat_id,text=>"هر انتقاد یا پیشنهادی داری بفرست ادمین بزودی پاسختو میده "));
    $db->updatestatus($chat_id,7);
}
if($status['status'] == 7){
     msg('forwardMessage',array(chat_id=>$gpID,message_id=>$msg_id,from_chat_id=>$user_id));
     msg('sendMessage',array(chat_id=>$chat_id,text=>"پیامت ارسال شد"));
      $db->updatestatus($chat_id,0);
      
}

if($data == "w1"){
    msg('editMessageText',array(chat_id=>$chat_id,message_id=>$message_id,text=>"چند روزه میخوای ؟",reply_markup=>$price));
}
if($data == "addcharge"){
  msg('sendMessage',array(chat_id=>$chat_id,text=>"
    مبلغ شارژ کیف پول رو به شماره کارت 123456 واریش کنید و رسید واریزی رو ارسال کنید 
  "
  ));
  $db->updatestatus($chat_id,2);
}
if($status['status'] == 2){
    msg('forwardMessage',array(chat_id=>$gpID,message_id=>$msg_id,from_chat_id=>$user_id));
    msg('sendMessage',array(chat_id=>$chat_id,text=>"نهایت تا یک ساعت دیگه کیف پول شما شارز خواهد شد   "));
        msg('sendMessage',array(chat_id=>$gpID,text=>"☝ \n $chat_id " , reply_markup=>$btuser));

    $db->updatestatus($chat_id,0);
}

if($data == "w10"){

    $wallet = $db->UserInformation($chat_id);
    
    if($w10 < $wallet['charge']){
         $getL =$db->GETL();
        // if($getL != false){
                       
        msg('sendMessage',array(chat_id=>$chat_id,text=>$getL['Lcode'] . "\n لایسنس ویندوز ☝" ));
        $db->updatestatusL($getL['Lcode'],1);
        $finduser = $db->UserInformation($chat_id);
        $finalcharge  = $finduser['charge'] - $w10;
        $db->updateCharge($chat_id,$finalcharge); 
        
        // }else{
        //     msg('sendMessage',array(chat_id=>$chat_id,text=>"لایسنس نداریم "));
        // }

    }else{
        msg('answerCallbackQuery',array(callback_query_id=>$call_id,text=>"شارژ نداری",show_alert=>true));
    }
    
}

///////////////panel admin/////////////////
$btn= array('resize_keyboard' =>true,"inline_keyboard"=>array(array(array('text'=>"افزودن محصول",'callback_data'=>"add"),array('text'=>"شارژ کاربر",'callback_data'=>"charge")),array(array('text'=>"ارسال پیام ",'callback_data'=>"sendall"))));
if($text == "/start"){
     msg('sendMessage',array(chat_id=>$chat_id,text=>"سلام خوش اومدی برای خرید لایسنس از دستور /shop  استفاده کن 😎"));
     $db->insertUser($chat_id);
}


if($chat_id == $gpID){
     if($FrwFromId != null){
          msg('sendMessage',array(chat_id=>$FrwFromId,text=>$text ."\n این پیام توسط ادمین ارسال شده "));
      }
    
    //  if($text=='x'){
    //       msg('sendMessage',array(chat_id=>$gpID,text=>$FrwFromId));
    //       msg('sendMessage',array(chat_id=>$gpID,text=>$content));
    //   }
    
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

if($data== "charge"){
    $db->updatestatus(ADMINID,5);
    msg('sendMessage',array(chat_id=>$chat_id,text=>" یوزر ایدی و مبلغ شارژ رو برام بفرست \n به عنوان مثال  12345-1000  "));
}
 $ex = explode("-",$text);
if($status['status'] == 5 && is_numeric($ex[0]) && is_numeric($ex[1])){
   
    $finduser = $db->UserInformation($ex[0]);
    $finalcharge  = $finduser['charge'] + $ex[1];
    $db->updateCharge($ex[0],$finalcharge); 
    $db->updatestatus(ADMINID,0);
    msg('sendMessage',array(chat_id=>$chat_id,text=>'user sharzh shod '));
    msg('sendMessage',array(chat_id=>$ex[0],text=>"سلام $finalcharge موجودی شما :"));
}
if($data == "sendall"){
    $db->updatestatus(ADMINID,6);
        msg('sendMessage',array(chat_id=>$chat_id,text=>'متن پیامتو بفرست'));

}
if($status['status'] == 6){
        foreach($db->selectalluser() as $findUser){
              $result  = msg('sendMessage',array('chat_id'=>$findUser['userid'],'text'=>$text));
              $result = json_decode($result,true);
              if($result['ok']==false){
                  $faild ++;
              }else{
                  $success++;
              }
        }
        
          msg('sendMessage',array(chat_id=>ADMINID,text=>" پیام های موفق : $success \n پیام های نموفق :$faild"));
        $db->updatestatus(ADMINID,0);
}

}


?>