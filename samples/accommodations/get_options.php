<?php

/*
 * Example get options - How to get acoomodation options the Camping.care API
 * https://camping.care/developer/accommodations/get_options.
 */
try {

    /*
    * Initialize the Camping.care API SDK with your API key.
    *
    * See: https://camping.care/settings/api
    */

    include_once($_SERVER['DOCUMENT_ROOT']. '../src/CampingCare/Autoloader.php');

    $campingcare = new campingcare_api ;
    $campingcare->set_api_key('YOUR API KEY');

    /*
    * Set your accommodation id. It can be found by using the function get_accommodations 
    * http://camping.care/developer/accommodations/get_accommodations
    */

    $id =  37 ; // Accommodation ID (required)

    /*
    * Parameters:
    *   reservation_id     Reservation id for getting options for a specific reservation (optional)
    *   required_only      To get the required ooptions only if a reservation id is set (optional only in combination with parameter reservation_id)
    *
    * You can include additional data to the get options function.
    * By including the reservation id you only get the options which are available for a specific reservation by setting the reservation_id
    *
    * If you choose to get the required options for a specific resercation only you can add the required_only parameter
    *
    */

    $data = array();
    $data['reservation_id'] = 638 ; // optional: to get options for a specific reservation id
    $data['required_only'] = 1 ; // optional: to get the required options for a specific reservation


    /*
     * All data is returned in a option opject
     * The structure can be found here: https://camping.care/developer/accommodations/get_options.
     */
    $options = $campingcare->get_options($id, $data);


    /*
    * In this example we print the oprions in json format on the page
    */
    echo "GET accommodation options";
    echo "<pre>";
    echo json_encode($options, JSON_PRETTY_PRINT);
    echo "</pre>";

} catch (Exception $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}