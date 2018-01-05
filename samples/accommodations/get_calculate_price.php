<?php

include_once($_SERVER['DOCUMENT_ROOT']. '/autoloader.php');

$campingcare = new campingcare_api ;
$campingcare->set_api_key('YOUR API KEY');
//GET availability
try {

    $id =  1; // Accommodation ID

    $data = array();
    $data['arrival'] = "2018-06-10" ; //date YYYY-MM-DD
    $data['departure'] = "2018-06-17" ; //date YYYY-MM-DD

     $data["persons"] = "2"; // Number of persons for calcualtion

    $calculated_price = $campingcare->get_calculate_price($id, $data);

    echo "GET calculated price for a accommodation between dates";
    echo "<pre>";
    echo json_encode($calculated_price, JSON_PRETTY_PRINT);
    echo "</pre>";

} catch (Exception $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}