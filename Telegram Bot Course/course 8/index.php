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
$text = $update["message"]['text'];
$msg_id = $update['message']['message_id'];

}elseif(isset($update['callback_query'])){

    $call_id= $update['callback_query']['id'];
    $data= $update['callback_query']['data'];
    $chat_id = $update['callback_query']['from']['id'];
    $message_id = $update['callback_query']['message']['message_id'];
    $message = $update['callback_query']['message']['text'];

}

//join channel 
// inline keyboad like va dislike 
// daryaft ax ba cation va ersal be kanal 

$likecount  = 0 ;
$dislikecount = 0;

$join = array( 'inline_keyboard'=>array(
array(
    array('text'=>"عضویت در کانال" ,'url'=>"https://t.me/".$channel_id )
))
);
$like =array( 'inline_keyboard'=>array(
    array(
        array('text'=>"❤".$likecount ,'callback_data'=>"like" ),  array('text'=>"👎".$dislikecount ,'callback_data'=>"dislike" )
    ))
    );


$r = msg("getChatMember",array("chat_id"=>"@".$channel_id,'user_id'=>$chat_id));
$r =json_decode($r,true);

if($r['ok'] & ($r['result']['status']=="member" || $r['result']['status']=="creator" )){
        if($r['result']['status']=="creator"){
            msg("sendPhoto",array('chat_id'=>"@".$channel_id,'photo'=>$update['message']['photo'][1]['file_id'],'reply_markup'=>$like ));
        }        else{
            msg("sendMessage",array('chat_id'=>$chat_id,'text'=>"شما ادمین یا یازنده کانال نیستید نمیتونید پیام ارسال کنید !"));
        }

            if($data=='like'){
               $likecount++;
                msg("sendMessage",array('chat_id'=>$chat_id,'text'=> "تعداد لایک : ".$likecount ));
            }elseif($data=='dislike'){
                $dislikecount++;
                msg("sendMessage",array('chat_id'=>$chat_id,'text'=> "تعداد دیسلایک : ".$dislikecount ));
            }


}else{

    msg("sendMessage",array('chat_id'=>$chat_id,'text'=> "شما عضو کانال نیستید",'reply_markup'=>$join ));
}

 


?>