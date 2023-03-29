<?php 
require 'dompdf/autoload.inc.php';
require('app/app.php');
use Dompdf\Dompdf;
use Dompdf\Options;

if (isset($_GET['key'])){
    $id = $_GET['key'];
    $get_total = Data::get_user_transactions_totals($id);
    $total = $get_total->{"SUM(amount)"};
    $transactions = Data::get_user_transactions($id);
}else{
    $transactions = Data::get_users_transactions();
    $get_totals= Data::get_all_transactions_totals();
    $total = $get_totals[0]->{"SUM(amount)"};
}

$options = new Options;
$options->setDefaultFont('Courier');

// instantiate and use the dompdf class
$dompdf = new Dompdf($options);

ob_start();
require('details_pdf.php');
$html =ob_get_contents();
ob_get_clean();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('Tujijenge transactions.pdf',['Attachment'=>false]);