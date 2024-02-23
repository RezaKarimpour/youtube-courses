<?php

function payment($price, $name, $tell)
{
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

    function send_to_bank($request, $secret_id, $client_id)
    {
        $method = 'developers/bank/api/v2/purchase?' . http_build_query($request);
        return $response = request($method, $secret_id, $client_id);
    }


    include 'inofromation.php';


    //سپس درخواست توکن را ارسال کنید
    $token = refresh_token($refresh_token, $secret_id, $client_id);
    if (!$token) {
        //خطا در دریافت توکن رخ داده دوباره تلاش کنید یا پارامتر های ورودی را بررسی کنید
        echo "خطا در دریافت توکن";
        return; //your error
    }
    /*
         * ارسال به بانک
         */
    $data = [
        'access_token' => $token,
        'amount' => $price, //مبلغ به ریال
        'callback_url' => 'https://example.ir/verify.php', //آدرس بازگشت به سایت شما بعد از اتمام عملیات پرداخت
        'payer_id' => $tell, //فیلد اختیاری شماره تلفن پرداخت کننده
        'payer_name' => "$name",
        'verify_on_request' => true
    ];
    $send_to_bank_result = send_to_bank($data, $secret_id, $client_id);
    if ($send_to_bank_result['status'] == "0") {

        $reference_code = $send_to_bank_result['reference_code'];
        //کاربر را به آدرس زیر هدایت کنید
        //redirect user to this url
        return "https://dashboard.packpay.ir/bank/purchase/send/?RefId=${reference_code}";
        // header("location:$redirect_url");
    } else {
        //خطا رخ داده و این خطا را به صلاح دید خود هندل کنید
        echo $send_to_bank_result['message'];
        return;
    }
}
