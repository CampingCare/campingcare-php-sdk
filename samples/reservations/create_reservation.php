<?php

/*
* Example create reservation - How to create a reservation calculated price for a from the Camping.care API
* https://camping.care/developer/reservations/calculate_price
*/

try{

    /*
    * Initialize the Camping.care API SDK with your API key.
    *
    * See: https://camping.care/settings/api
    */

    include_once($_SERVER['DOCUMENT_ROOT']. '../src/CampingCare/Autoloader.php');

    $campingcare = new campingcare_api ;
    $campingcare->set_api_key('YOUR API KEY');

    /*
    * Parameters:
    *   arrival:            Arrival date for the reservation (YYYY-MM-DD) (required)
    *   departure:          Departure date for the reservation (YYYY-MM-DD) (required)
    *   accommodation_id:   Accommodation id for the reservation. The specific id from a accommodation can be get by the function get accommodations
    *   persons:            The total number of persons in the reservation. (required)
    *   age_table_input:    The age table input of persons for the reservation. The age table input is a JSON string. (required*) (*if age tables are available)
    *   card_id:            The id of an discount card. This id can be found with this function. get cards.
    */

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



    /*
    * All data is returned in a reservation object
    * The structure can be found here: https://camping.care/developer/reservations/get_reservation.
    */
    $created_reservation = $campingcare->create_reservation($data);

    /*
    * In this example we print the oprions in json format on the page
    */


    echo "<pre>";
    echo json_encode($created_reservation, JSON_PRETTY_PRINT);
    echo "</pre>";


}catch(Exception $e){
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}

echo $api_key ;