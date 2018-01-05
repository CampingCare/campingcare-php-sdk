<?php

include_once($_SERVER['DOCUMENT_ROOT']. '/autoloader.php');

$campingcare = new campingcare_api ;
$campingcare->set_api_key('YOUR API KEY');

// GET CALCULATE PRICE
try{

   $data = array();
   $data["arrival"] = "2018-04-10"; // set arrival date YYYY-MM-DD
   $data["departure"] = "2018-04-16"; // set arrival date YYYY-MM-DD
   $data["persons"] = 3; // set number of persons

    $accommodation_price = $campingcare->get_calculate_price(33, $data);

    echo "Calculated Price";
    echo "<pre>";
    echo json_encode($accommodation_price, JSON_PRETTY_PRINT);
    echo "</pre>";

}catch(Exception $e){
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}
