<?php
// =====================
// custRegistration1
// ======================
// sequenceNo
// FI
// sourceSystem
// userID
// registrationRef
// password
// confirmPassword
// =====================

// https://dev.finexusgroup.com:10501/fnxc/portal/ws/custRegistration1.action

require_once 'certDetails.php';
require_once('../API/encrypt.php');

$sequenceNo = rand(1000000000000000, 9999999999999999);
// hex the password
$data = hex_password("12345678");

//required paramaters
$params = array(
    "sequenceNo"=>$sequenceNo,
    "FI"=>"004665",
    "sourceSystem"=>"HCK",
    "userID"=>"60175398720",
    "registrationRef"=>"ONBOARD",
    "password"=>$data,
    "confirmPassword"=>$data,
);

//curl url
$endpoint = 'https://dev.finexusgroup.com:10501/fnxc/portal/ws/custRegistration1.action';
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