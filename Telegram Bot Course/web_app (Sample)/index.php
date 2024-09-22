<?php
/* 
developer : Reza Karimpour
course playlist : https://www.youtube.com/playlist?list=PL5GIwh73N-unbhExotu7MWtgyeBRVSB0Y
instagram : https://instagram.com/rezakarimpou.pro
*/
require 'bot.php';

$content = file_get_contents("php://input");
$update = json_decode($content,true);
$channel_id = 'rootcodes';
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



$like =array( 'inline_keyboard'=>array(
    array(
        array('text'=>"like",'callback_data'=>"like" ),  array('text'=>"url" ,'url'=>"https://rootone.ir" )
    ),
    array(
        array('text'=>'start game' , 'web_app'=>['url'=>'https://rootone.ir']),
        array('text'=>'start game' , 'web_app'=>['url'=>'https://papaapp.ir/bademjoon/game'])
        )
    ));



    if($text== '/start'){
            msg("sendMessage",array('chat_id'=>$chat_id,'text'=> "سلام به ربات آموزش ساخت ایرداپ بادمجون خوش اومدی ",'reply_markup'=>$like ));

    }
    
    msg("sendMessage",array('chat_id'=>$chat_id,'text'=>$content));


?>