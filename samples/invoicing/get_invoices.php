<?php

include_once($_SERVER['DOCUMENT_ROOT']. '/autoloader.php');

$campingcare = new campingcare_api ;
$campingcare->set_api_key('YOUR API KEY');

// GET INVOICES
try{

	$data = array();
	$data["start_date"] = "2017-01-01"; // start invoice create date: YYYY-MM-DD
	$data["end_date"] = "2018-12-31"; // end invoice create date: YYYY-MM-DD

	$invoices= $campingcare->get_invoices($data);

    echo "Invoices";
    echo "<pre>";
    echo json_encode($invoices, JSON_PRETTY_PRINT);
    echo "</pre>";

}catch(Exception $e){
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}