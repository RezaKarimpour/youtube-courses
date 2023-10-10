<?php
/* 
developer : Reza Karimpour
course playlist : https://www.youtube.com/playlist?list=PL5GIwh73N-unbhExotu7MWtgyeBRVSB0Y
instagram : https://instagram.com/rezakarimpou.pro
*/

define ('BOT_TOKEN','your-token-bot');
define ('API_URL','https://api.telegram.org/bot'.BOT_TOKEN.'/');
// define('CHANNEL_ID','');
// define('ADMIN_ID','');
 ////////////////////////////

function msg($method,$parm){
    if(!$parm){
        $parm = array();
    }
    $parm["method"] = $method;
    $handle = curl_init(API_URL);
    curl_setopt($handle,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($handle,CURLOPT_CONNECTTIMEOUT,10);
    curl_setopt($handle,CURLOPT_TIMEOUT,60);
    curl_setopt($handle,CURLOPT_POSTFIELDS,json_encode($parm));
    curl_setopt($handle,CURLOPT_HTTPHEADER,array("Content-Type:application/json"));
    $result = curl_exec($handle);
    return $result;
}