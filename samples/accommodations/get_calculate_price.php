<?php

/*
* Example get calculate_price - How to get calculated price for a specific accommodation between 2 dates from the Camping.care API
* https://camping.care/developer/accommodations/get_calculate_price
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
    * https://camping.care/developer/accommodations/get_calculate_price
    */

    $id =  1; // Accommodation ID (required)


    /*
    * Parameters:
    *   arrival             Arrival date for the availability (required)
    *   departure           Departure date for the availability (required)
    *   persons             Number of persons. (required if no age tables)
    *   age_tables          Array of age table data check https://camping.care/developer/accommodations/get_calculate_price (required if age tables are used in a park)
    *
    */

    $data = array();
    $data['arrival'] = "2018-06-10" ; //date YYYY-MM-DD
    $data['departure'] = "2018-06-17" ; //date YYYY-MM-DD

    $data["persons"] = "2"; // Number of persons for calcualtion

    /*
    * All data is returned as calculate price opject
    * The structure can be found here: https://camping.care/developer/accommodations/get_calculate_price.
    */

    $calculated_price = $campingcare->get_calculate_price($id, $data);

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