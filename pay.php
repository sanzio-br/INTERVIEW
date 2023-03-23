<?php

$url="http://www.tinypesa.com/api/v1/express/initialize";
$data = array(
    'amount' => 1,
    'msisdn' => '0113608188',
);
$headers = array(
   "Content-Type: application/x-www-form-urlencoded",
   "ApiKey: 63c503f2e3b5f"
);
$options = array(
    'http' => array(
        'header'  => $headers,
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);

$context  = stream_context_create($options);
$resp = file_get_contents($url, false, $context);
var_dump($resp);

?>
