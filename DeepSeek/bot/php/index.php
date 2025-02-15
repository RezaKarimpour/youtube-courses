<?php

/* 
developer : Reza Karimpour
course playlist : https://www.youtube.com/playlist?list=PL5GIwh73N-unbhExotu7MWtgyeBRVSB0Y
instagram : https://instagram.com/rezakarimpou.pro
*/
require 'bot.php';

$content = file_get_contents("php://input");
$update = json_decode($content, true);
$chat_id = $update["message"]["chat"]["id"];
$text = $update["message"]['text'];
$msg_id = $update['message']['message_id'];



if ($text == "/start") {
    msg("sendMessage", array('parse_mode' => 'HTML', 'chat_id' => $chat_id, 'text' => "  سلام به ربات root one  خوش امدید" . "\n" . $text2, 'disable_web_page_preview' =>  true, 'reply_to_message_id' => $msg_id));
} else {
    $text = deep($text);
    msg("sendMessage", array('chat_id' => $chat_id, 'text' => "$text",));
}
