<?php
include "config.php";
include 'inofromation.php';
$db = new SQLite3('mysqlitedb.db');
include 'bot.php';


//سپس درخواست توکن را ارسال کنید

function request($method, $secret_id, $client_id)
{

    try {
        $ch = curl_init("https://dashboard.packpay.ir/" . $method);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, []);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $client_id . ":" . $secret_id);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
            )
        );
        $result = curl_exec($ch);
        return json_decode($result, true);
    } catch (Exception $ex) {
        return false;
    }
}

function refresh_token($token, $secret_id, $client_id)
{
    $data = [
        'grant_type' => 'refresh_token',
        'refresh_token' => $token
    ];
    $method = 'oauth/token?' . http_build_query($data);
    $result = request($method, $secret_id, $client_id);
    if (!array_key_exists('access_token', $result)) return false;
    return $result['access_token'];
}

function verify($request, $secret_id, $client_id)
{
    $method = 'developers/bank/api/v2/purchase/verify?' . http_build_query($request);
    return $response = request($method, $secret_id, $client_id);
}

/*
 * تایید بانک
 */
//دیافت توکن

$token = refresh_token($refresh_token, $secret_id, $client_id);
$reference_code = $_GET['reference_code']; //کد رفرنس دریافتی از طریق درخواست get
$data = [
    'access_token' => $token,
    'reference_code' => $reference_code,
];
$verify_result = verify($data, $secret_id, $client_id);
if ($verify_result['status'] == "0") {


    $results = $db->query("SELECT `chatid` FROM USERS WHERE refid = $reference_code");
    $row = $results->fetchArray();
    msg('sendMessage',array(chat_id=>$row['chatid'],text=>'بسته شما خریداری شد'));
    
    $results = $db->query("UPDATE USERS SET status=1 WHERE refid = $reference_code");

	 
} 


