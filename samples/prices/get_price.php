<?php

include_once($_SERVER['DOCUMENT_ROOT']. '/autoloader.php');

$campingcare = new campingcare_api ;
$campingcare->set_api_key('YOUR API KEY');

// GET ACCOMMODATIO PRICE
try{

	$price_id =  1; // price id here

    $single_price = $campingcare->get_price($price_id); 

    echo "Single Price for accommodation";
    echo "<pre>";
    echo json_encode($single_price, JSON_PRETTY_PRINT);
    echo "</pre>";

}catch(Exception $e){
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}