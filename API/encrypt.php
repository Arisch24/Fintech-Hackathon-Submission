<?php

function hex_password($plaintext){
    include('../Crypt/RSA.php');
    $public_key = require_once('../API/public_key.php');
    $rsa = new Crypt_RSA();
    $rsa->loadKey($public_key);
    $plaintext = new Math_BigInteger('aaaaaa');
    echo $rsa->_exponentiate($plaintext)->toBytes();
    $data = base64_encode($rsa);
    echo $data;
    return $data;
}