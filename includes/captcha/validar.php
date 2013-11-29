<?php
session_start();
//require_once('recaptchalib.php');

// Get a key from https://www.google.com/recaptcha/admin/create
//$publickey = "6LdHN-kSAAAAAHhma8Rk99WK5HFKC3zcfS446kkr";
//$privatekey = "6LdHN-kSAAAAABaCjr1RcRcGdq_LkeRcR-r85bud";
//$resp = null;
//$error = null;
$isValidCaptcha = false;
$captchaCode = $_POST["captchacode"];
if (!empty($captchaCode)) {
        if( isset( $_SESSION['random_number'] ) && !empty( $_SESSION['random_number'] ) ){
            $codigoCaptcha = $_SESSION['random_number'];
            if( $codigoCaptcha == $captchaCode ){
                $isValidCaptcha = true;
            }
            $error = $codigoCaptcha;
        }
		if($isValidCaptcha==true){
		                   echo "ok";
		}else{
		                   echo "error";
		}
}

?>