<?php

// https://dev.finexusgroup.com:10501/fnxc/portal/ws/walletEnquiry.action

require_once 'certDetails.php';

$sequenceNo = rand(1000000000000000, 9999999999999999);

//required paramaters
$params = array(
    "sequenceNo"=>$sequenceNo,
    "FI"=>"004665",
    "sourceSystem"=>"HCK",
    "userID"=>"60175398720",
    "signedMessage"=>""
);

//curl url
$endpoint = 'https://dev.finexusgroup.com:10501/fnxc/portal/ws/walletEnquiry.action';
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
    echo $decode['walletCurrentBalance'];
    if($decode['responseCode'] != 000000){
        // get error
        echo $decode['responseDescription'];
    }
}



// ewallet
// $sequenceNo = rand(1000000000000000, 9999999999999999);
// $param = array(
//     "sequenceNo"=>$sequenceNo,
//     "FI"=>"004665",
//     "sourceSystem"=>"HCK",
//     "userID"=>"60175398720",
//     "signedMessage"=>""
// );
// //curl url
// $chs = curl_init();
// $endpoints = 'https://dev.finexusgroup.com:10501/fnxc/portal/ws/walletEnquiry.action';
// $urls = $endpoints . '?' . http_build_query($param);
// curl_setopt($chs, CURLOPT_URL, $urls);
// $resp = curl_exec($chs);
// curl_close($chs);
// // output
// $decod = json_decode($resp, true);
// if($decod['responseCode'] != 000000){
//     // get error
//     $responseError = $decod['responseDescription'];
//     echo '<h1>'.$responseError.'</h1>';
// }else{
//     echo $decod['walletCurrentBalance'];
//     echo '
//     <h2 class="text-info">&dollar;'.$decod['walletCurrentBalance'].'</h1>
//     <h2 class="">Max Daily Top Up Count</h1>
//     <h2 class="text-info">&dollar;'.$decod['maxDailyTopUpCount'].'</h1>
//     <h3 class="float-end">2.3&percnt;</h1>';
// }