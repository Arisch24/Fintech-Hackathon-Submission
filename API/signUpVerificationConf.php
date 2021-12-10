<?php

// =====================
// signUpVerificationConf
// ======================
// sequenceNo
// FI
// sourceSystem
// userID
// callFrom: ONBOARD
// messageReferenceNo
// OTP
// =====================

// https://dev.finexusgroup.com:10501/fnxc/portal/ws/signUpVerificationConf.action

require_once 'certDetails.php';

$sequenceNo = rand(1000000000000000, 9999999999999999);

//required paramaters
$params = array(
    "sequenceNo"=>$sequenceNo,
    "FI"=>"004665",
    "sourceSystem"=>"HCK",
    "userID"=>"60175398720",
    "callFrom"=>"ONBOARD",
    "messageReferenceNo"=>"ONBOARD-3f94e5d4-ed61-4529-a9de-e91e4b60e1a2",
    "OTP"=>"644484",
    "signedMessage"=>""
);

//curl url
$endpoint = 'https://dev.finexusgroup.com:10501/fnxc/portal/ws/signUpVerificationConf.action';
$url = $endpoint . '?' . http_build_query($params);

curl_setopt($ch, CURLOPT_URL, $url);

$resp = curl_exec($ch);

curl_close($ch);

//if error output it
if($error = curl_error($ch)){
    echo 'Error: ' . $error . '<br>';
    echo 'Error Code: ' . curl_errno($ch) . '<br>';
}else{
    $decode = json_decode($resp, true);
    print_r($decode) . '<br>';
}


?>