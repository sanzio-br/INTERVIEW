<?php
require('app/app.php');

ensure_user_is_authenticated();
header("Content-Type: application/json");

$stkCallbackResponse = file_get_contents('php://input');
$logFile = "stkTinypesaResponse.json";
$log = fopen($logFile, "a");
fwrite($log, $stkCallbackResponse);
fclose($log);

$callbackContent = json_decode($stkCallbackResponse);

$ResultCode = $callbackContent->Body->stkCallback->ResultCode;
$CheckoutRequestID = $callbackContent->Body->stkCallback->CheckoutRequestID;
$Amount = $callbackContent->Body->stkCallback->CallbackMetadata->Item[0]->Value;
$MpesaReceiptNumber = $callbackContent->Body->stkCallback->CallbackMetadata->Item[1]->Value;
$PhoneNumber = $callbackContent->Body->stkCallback->CallbackMetadata->Item[4]->Value;

if ($ResultCode == 0) {
    $id = $_SESSION['id'];
    Data::add_user_transactions($id,$CheckoutRequestID,$ResultCode,$amount,$MpesaReceiptNumber,$PhoneNumber);
}