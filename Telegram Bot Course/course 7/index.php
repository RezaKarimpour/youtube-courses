<?php
require 'bot.php';

$contet = file_get_contents("php://input");
$update = json_decode($contet,true);
$channel_id = '@rootonechannel';
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



$inline2=array(
    'resize_keyboard'=>true,
    'inline_keyboard'=>array(
        array(array('text'=>'back ','callback_data'=>"back"))

    )
);

$inline= array(
    'resize_keyboard'=>true,
    'inline_keyboard'=>array(
        array(
            array('text'=>'youtube','url'=>$utube),array('text'=>'instagram','url'=>$instagram),array('text'=>' github','url'=>$git)
        ), array(
            array('text'=>'wellcome','callback_data'=>"wellcome"),array('text'=>'change','callback_data'=>"change")
        )
    )
);


if($data == "wellcome"){
       msg("answerCallbackQuery",array('callback_query_id'=>$call_id,'text'=>"salam",'show_alert'=>false));

}elseif($data == "change"){
      msg("editMessageText",array('chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"chi lazem dari?",'reply_markup'=>$inline2));
}elseif($data == "back"){
      msg("editMessageText",array('chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"salam chetory",'reply_markup'=>$inline));
}



msg("sendMessage",array("chat_id"=>$chat_id,'text'=>"salam chetory ", 'reply_markup'=>$inline));



?>