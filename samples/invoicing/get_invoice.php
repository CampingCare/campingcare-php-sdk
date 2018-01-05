<?php

include_once($_SERVER['DOCUMENT_ROOT']. '/autoloader.php');

$campingcare = new campingcare_api ;
$campingcare->set_api_key('YOUR API KEY');

// GET INVOICE
try{

	$invoice_id = 321;

    $invoice= $campingcare->get_invoice($invoice_id);

    echo "Invoice";
    echo "<pre>";
    echo json_encode($invoice, JSON_PRETTY_PRINT);
    echo "</pre>";

}catch(Exception $e){
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}