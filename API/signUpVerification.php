<?php

// =====================
// signUpVerification
// ======================
// sequenceNo
// FI
// sourceSystem
// userID
// nationality
// signedMessage
// =====================

require_once 'certDetails.php';

$sequenceNo = rand(1000000000000000, 9999999999999999);

//required paramaters
$params = array(
    "sequenceNo"=>$sequenceNo,
    "FI"=>"004665",
    "sourceSystem"=>"HCK",
    "userID"=>"",
    "nationality"=>"MY",
    "signedMessage"=>""
);

//curl url
$endpoint = 'https://dev.finexusgroup.com:10501/fnxc/portal/ws/signUpVerification.action';
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
    print_r($decode);   
    if($decode['responseCode'] != 000000){
        // get error
        echo $decode['responseDescription'];
    }
}


?>