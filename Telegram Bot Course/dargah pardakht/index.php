<?php
/* 
developer : Reza Karimpour
course playlist : https://www.youtube.com/playlist?list=PL5GIwh73N-unbhExotu7MWtgyeBRVSB0Y
instagram : https://instagram.com/rezakarimpou.pro
*/

$db = new SQLite3('mysqlitedb.db');

// $results = $db->query("DELETE FROM  USERS ");
// $results = $db->query("SELECT * FROM USERS");

require 'bot.php';
include 'Bank.php';


$content = file_get_contents("php://input");
$update = json_decode($content, true);
$channel_id = 'rootonechannel';
$utube = "https://youtube.com/@root_one";
$git = "https://github.com/RezaKarimpour";
$instagram = "https://instagram.com/rezakarimpour.pro";
$gpID = null;


if (isset($update['message'])) {

    $chat_id = $update["message"]["chat"]["id"];
    $user_id = $update["message"]["from"]["id"];
    $text = $update["message"]['text'];
    $msg_id = $update['message']['message_id'];
    $url = $update['message']['entities'][0]['type'];
    $FrwFromId = $update["message"]["reply_to_message"]["forward_from"]['id'];
} elseif (isset($update['callback_query'])) {

    $call_id = $update['callback_query']['id'];
    $data = $update['callback_query']['data'];
    $chat_id = $update['callback_query']['from']['id'];
    $message_id = $update['callback_query']['message']['message_id'];
    $message = $update['callback_query']['message']['text'];
}

// msg('sendMessage',array(chat_id=>$gpID,text=>$content));
$btnvip = array('resize_keyboard' => true, "inline_keyboard" => array(array(array('text' => "1000", 'callback_data' => "vip"), array('text' => "2000", 'callback_data' => "vip2"))));


if ($text == "/vip") {
    msg('sendMessage', array(chat_id => $chat_id, text => "baste 1000 tomani \n baste 2000 tomani", reply_markup => $btnvip));
}

if ($text == "/start") {

    msg('sendMessage', array(chat_id => $chat_id, text => "سلام به ربات rootOne خوش آومدی این ربات برای تست سورس کد های کانال  @rootcodes ساخته شده.
\n
کانال آموزشی روت وان : https://youtube.com/@root_one
"));
}


if ($data == 'vip2') {
    $paylink = payment(120000, $chat_id, '09101111111');
    $paybtn = array('resize_keyboard' => true, "inline_keyboard" => array(array(array('text' => "پرداخت 💰", 'url' => "$paylink"))));

    $r = explode('=', $paylink);
    //  msg('sendMessage',array(chat_id=>ADMINID,text=>$r[1]));

    $results = $db->query("INSERT INTO USERS ('chatid', 'refid') VALUES ($chat_id , $r[1] )");
    msg('sendMessage', array(chat_id => $chat_id, text => "لینک پرداخت 👇", reply_markup => $paybtn));
}
