<?php
session_start();
require('../app/app.php');
if(is_user_allowed($_SESSION['role'])){
    if (is_post()) {
        $amount = $_POST['amount']; //Amount to transact 
        $phone = $_POST['phone']; // Phone number paying
        
        $Account_no = '1287280544'; // Enter account number optional
        $url = 'https://tinypesa.com/api/v1/express/initialize';
        $data = array(
            'amount' => $amount,
            'msisdn' => $phone,
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
    $data = Data::get_users_transactions();
    // var_dump($transactions);
    $view_bag =[
        'title' =>'user' ,
        'user'=> $_SESSION['name'],
        'total'=> $total->{"SUM(amount)"},
        'g_total'=> $g_totals[0]->{"SUM(amount)"}
    ];
    view('index', $data);
}else{
    redirect('../index.php');
}
