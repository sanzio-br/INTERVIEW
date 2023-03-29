<?php 
require 'dompdf/autoload.inc.php';
require('app/app.php');
use Dompdf\Dompdf;

if (isset($_GET['key'])){
    $id = $_GET['key'];
    $total = Data::get_user_transactions_totals($id);
    $g_totals = Data::get_all_transactions_totals();
    $transactions = Data::get_user_transactions($id);
}else{
    $transactions = Data::get_users_transactions();
}



// instantiate and use the dompdf class
$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->setDefaultFont('Courier');
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
$dompdf->stream('pdf.pdf',['Attachment'=>false]);