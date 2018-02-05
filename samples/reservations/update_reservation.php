<?php

include_once($_SERVER['DOCUMENT_ROOT']. '/autoloader.php');

$campingcare = new campingcare_api ;
$campingcare->set_api_key('YOUR API KEY');

// CREATE RESERVATION
try{

    $data = array();

    $data["arrival"] = "2018-04-10";
    $data["departure"] = "2018-04-12";

    // get your accommodation_id with the api function 'Get accommodations'
    $data["accommodation_id"] = 75 ;

    // the total number of persons in this reservation
    $data["persons"] = 5;

    // if there are age tables availeble this data is required.
    // More information about age tables can be found in the 'Get age tables' function
    $data["age_table_input"] = array(
        array(
            "id" => 29, // the id of the age table (Childeren for example)
            "count" => 3 // The number of 'Childeren'
        ),

        array(
            "id" => 30, // the id of the age table (Adults for example)
            "count" => 2 // The number of 'Adults'
        )
    );

    // Optional, the card id, if there is one
    $data["card_id"] = 0 ;

    //$data["age_table_input"] = "";
    //$data["discount_card"] = "";

    $created_reservation = $campingcare->create_reservation($data);

    echo "<pre>";
    echo json_encode($created_reservation, JSON_PRETTY_PRINT);
    echo "</pre>";


}catch(Exception $e){
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}

echo $api_key ;