<?php

include_once($_SERVER['DOCUMENT_ROOT']. '/autoloader.php');

$campingcare = new campingcare_api ;
$campingcare->set_api_key('YOUR API KEY');

// GET ACCOMMODATION PRICES
try {

	$accommodation_id = 1; // Accommodation id here

    $prices = $campingcare->get_prices($accommodation_id); 

    echo "Prices for accommodation";
    echo "<pre>";
    echo json_encode($prices, JSON_PRETTY_PRINT);
    echo "</pre>";

} catch (Exception $e) {
	echo "API call failed: " . htmlspecialchars($e->getMessage());
}