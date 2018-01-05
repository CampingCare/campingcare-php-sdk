<?php

include_once($_SERVER['DOCUMENT_ROOT']. '/autoloader.php');

$campingcare = new campingcare_api ;
$campingcare->set_api_key('YOUR API KEY');

// CREATE RESERVATION
try{

    $data = array();

    $data["arrival"] = "2018-04-10";  // set start date YYYY-MM-DD
    $data["departure"] = "2018-04-12";  // set start date YYYY-MM-DD

    $data["status"] = "pending"; // set status

    $data["accommodation_id"] = 33;  // set accommodation id

    $data["first_name"] = "John"; // set contact information
    $data["last_name"] = "Doe"; // set contact information

    $data["persons"] = 2; // set number of persons


    //$data["age_table_input"] = "";
    //$data["discount_card"] = "";

    $created_reservation = $campingcare->create_reservation($data);
    echo "<pre>";
    echo json_encode($created_reservation, JSON_PRETTY_PRINT);
    echo "</pre>";


}catch(Exception $e){
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}
