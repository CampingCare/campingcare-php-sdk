<?php

include_once($_SERVER['DOCUMENT_ROOT']. '/autoloader.php');

$campingcare = new campingcare_api ;
$campingcare->set_api_key('YOUR API KEY');

// GET ACCOMMODATION
try {

	$id =  1; // Accommodation ID
	$accommodation = $campingcare->get_accommodation($id);

	echo "Data from a single Accommodation";
	echo "<pre>";
	echo json_encode($accommodation, JSON_PRETTY_PRINT);
	echo "</pre>";

} catch (Exception $e) {
	echo "API call failed: " . htmlspecialchars($e->getMessage());
}