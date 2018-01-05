<?php

include_once($_SERVER['DOCUMENT_ROOT']. '/autoloader.php');

$campingcare = new campingcare_api ;
$campingcare->set_api_key('YOUR API KEY');

//GET RESERVATION
try{

	$reservation_id = 33; // set your reservation id here

    $reservation = $campingcare->get_reservation($reservation_id);

    echo "Reservation";
    echo "<pre>";
    echo json_encode($reservation, JSON_PRETTY_PRINT);
    echo "</pre>";

}catch(Exception $e){
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}