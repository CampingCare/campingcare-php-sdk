<?php

include_once($_SERVER['DOCUMENT_ROOT']. '/autoloader.php');

$campingcare = new campingcare_api ;
$campingcare->set_api_key('YOUR API KEY');

// GET RESERVATIONS
try {

   $data = array();
   $data["arrival"] = "2017-01-01"; // date YYYY-MM-DD
   $data["departure"] = "2018-12-31";  // date YYYY-MM-DD

    $reservations = $campingcare->get_reservations($data); 

    echo "Get reservations between dates";
    echo "<pre>";
    echo json_encode($reservations, JSON_PRETTY_PRINT);
    echo "</pre>";

} catch (Exception $e) {
	echo "API call failed: " . htmlspecialchars($e->getMessage());
}