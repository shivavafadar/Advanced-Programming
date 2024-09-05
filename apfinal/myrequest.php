<?php
$data = array("merchant_id" => "1344b5d4-0048-11e8-94db-005056a205be",
    "amount" => $_POST['Amount'],
    "callback_url" => "https://7ff4-168-119-235-167.ngrok-free.app//ProjectAP/myverify.php",
    "description" => "خرید تست",
    "metadata" => [ "email" => $_POST['Email'],"mobile"=>$_POST['Mobile']],
    );
$jsonData = json_encode($data);
$ch = curl_init('https://api.zarinpal.com/pg/v4/payment/request.json');
curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonData)
));
$result = curl_exec($ch);
$err = curl_error($ch);

$result = json_decode($result, true, JSON_PRETTY_PRINT);
curl_close($ch);
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    if (empty($result['errors'])) {
        if ($result['data']['code'] == 100) {
            echo "successsss";
            header('Location: https://www.zarinpal.com/pg/StartPay/' . $result['data']["authority"]);
        }
    } else {
         echo'Error Code: ' . $result['errors']['code'];
         echo'message: ' .  $result['errors']['message'];

    }
}
?>