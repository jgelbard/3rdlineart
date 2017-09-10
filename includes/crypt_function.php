<?php
include ('includes/keys/key.php');
//encrypt

function encrypt ($string, $key){   
    $string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $string, MCRYPT_MODE_ECB)));
    return $string;
}

//decrypt

function decrypt ($string, $key){     
    $string = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, base64_decode($string), MCRYPT_MODE_ECB));    
    return $string;
}

function hasword ($string, $salt){
$string = crypt($string, '$1$'.$salt.'$');
    return $string;
}
?>