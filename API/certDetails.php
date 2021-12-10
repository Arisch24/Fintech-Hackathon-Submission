<?php
//initialize curl
$ch = curl_init();
//certificate details
$certFile = 'C:\xampp\htdocs\Hackathon\API\file.crt.pem';
$certKey = 'C:\xampp\htdocs\Hackathon\API\file.key.pem';
$certPwd = 'Admin123';

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSLCERT, $certFile);
curl_setopt($ch, CURLOPT_SSLKEY, $certKey);
curl_setopt($ch, CURLOPT_SSLCERTPASSWD, $certPwd);
curl_setopt($ch, CURLOPT_SSLKEYPASSWD, $certPwd);
?>