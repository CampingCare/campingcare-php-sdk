<?php

/*
* Example calculate_price - How to get calculated price for a 
* specific accommodation between 2 dates from the Camping.care API
* https://camping.care/developer/reservations/calculate_price
*/


try {

     /*
    * Initialize the Camping.care API SDK with your API key.
    *
    * See: https://camping.care/settings/api
    */
    require_once dirname(__FILE__) . '/../../src/campingcare/Autoloader.php';

    $campingcare = new campingcare_api ;
    $campingcare->set_api_key('YOUR API KEY');

    /*
    * Set your accommodation id. It can be found by using the function get_accommodations 
    * https://camping.care/developer/reservations/calculate_price


    * Parameters:
    *   accommodation_id    Accommodation ID (required)
    *   arrival             Arrival date for the availability (required)
    *   departure           Departure date for the availability (required)
    *   persons             Number of persons. (required if no age tables)
    *   age_tables          Array of age table data check https://camping.care/developer/reservations/calculate_price (required if age tables are used in a park)
    *
    */

    $data = array();
    $data['accommodation_id'] = 12 ; // Accommodation ID (required)
    $data['arrival'] = "2018-06-10" ; //date YYYY-MM-DD
    $data['departure'] = "2018-06-17" ; //date YYYY-MM-DD

    $data["persons"] = "2"; // Number of persons for calcualtion

    /*
    * All data is returned as calculate price opject
    * The structure can be found here: https://camping.care/developer/reservations/calculate_price.
    */

    $calculated_price = $campingcare->calculate_price($data);

    /*
    * In this example we print the oprions in json format on the page
    */

    echo "GET calculated price for a accommodation between dates";
    echo "<pre>";
    echo json_encode($calculated_price, JSON_PRETTY_PRINT);
    echo "</pre>";

} catch (Exception $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}