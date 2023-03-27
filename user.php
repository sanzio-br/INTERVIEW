<?php
session_start();
require('app/app.php');

ensure_user_is_authenticated();
if (is_post()) {
    $amount = $_POST['amount']; //Amount to transact 
    $phone = $_POST['phone']; // Phone number paying
    
    $Account_no = '1287280544'; // Enter account number optional
    $url = 'https://tinypesa.com/api/v1/express/initialize';
    $data = array(
        'amount' => 1,
        'msisdn' => "0702944323",
        'account_no'=>$Account_no
    );
    $headers = array(
        'Content-Type: application/x-www-form-urlencoded',
        'ApiKey: dk4xwwRFEda' // Replace with your api key
     );
    $info = http_build_query($data);
    
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $info);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $resp = curl_exec($curl);
    $msg_resp = json_decode($resp);
    
    
    if ($msg_resp ->success == 'true') {
        echo "WAIT FOR  STK POP UP🔥";
      } else {
        echo "Transaction Failed";
       
      }
};

$total = Data::get_user_transactions_totals($_SESSION['id']);
$g_totals = Data::get_all_transactions_totals();
$transactions = Data::get_user_transactions($_SESSION['id']);
// var_dump($transactions);
$view_bag =[
    'title' =>'user' ,
    'user'=> $_SESSION['name'],
    'total'=> $total->{"SUM(amount)"},
    'g_total'=> $g_totals[0]->{"SUM(amount)"}
];

view('user', $transactions);