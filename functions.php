<?php
function generateOTP($length = 6){
    return rand(pow(10, $length-1), pow(10,$length)-1);
}

// Simple email function
function sendEmail($to, $subject, $message){
    $headers = "From: no-reply@yourdomain.com\r\n";
    return mail($to, $subject, $message, $headers);
}

// Simple SMS function (simulation)
function sendSMS($number, $message){
    // Normally API call to SMS provider
    return true; 
}
?>