<?php

/*
<<<<<<< HEAD:samples/accommodations/get_calculate_price.php
* Example get calculate_price - How to get calculated price for a specific accommodation between 2 dates from the Camping.care API
* https://camping.care/developer/accommodations/get_calculate_price
=======
* Example calculate_price - How to get calculated price for a 
* specific accommodation between 2 dates from the Camping.care API
* https://camping.care/developer/reservations/calculate_price
>>>>>>> a321d59eddf8665a34208ef5814c271a1625971f:samples/reservations/calculate_price.php
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
    $campingcare->set_api_key("xy/1JRxLIiwpNWfYnvIgHbx+gNUF34bS67mZ7uD+2lqys+reyMqWvUn/wNnNzs1818ZLf8DKVMJ3mP6f2mpU7Q==");
    $campingcare->set_api_url("http://localhost:8084/api/v1");
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
    $data['accommodation_id'] = 37 ; // Accommodation ID (required)
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