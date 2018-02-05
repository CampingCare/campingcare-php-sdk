<?php

/*
* Example get accommodation - How to get accommodation information from the Camping.care API
* https://camping.care/developer/accommodations/get_availability
*/


try {


    /*
    * Initialize the Camping.care API SDK with your API key.
    *
    * See: https://camping.care/settings/api
    */

   include_once($_SERVER['DOCUMENT_ROOT']. '../src/CampingCare/Autoloader.php');

    $campingcare = new CampingCare_Client ;
    $campingcare->set_api_key('YOUR API KEY');

    /*
    * Set your accommodation id. It can be found by using the function get_accommodations 
    * http://camping.care/developer/accommodations/get_accommodations
    */

    $id =  1 ; // Accommodation ID (required)

    /*
    * Parameters:
    *   arrival             Arrival date for the availability (required)
    *   departure           Departure date for the availability (required)
    *   places              If set it returns the available places, if this parameter is not set you get the availability count only for this accommodation (optional)
    *   inactive_places     If set it includes the inactive places in the results (optional)
    *
    */

    $data = array();
    $data['arrival'] = "2018-06-10" ;
    $data['departure'] = "2018-06-17" ;
    $data['places'] = 1;
    $data['inactive_places'] = 0;

    /*
     * All data is returned in a availbility count, if requested also the places are returned in a array of place objects
     * The structure can be found here: https://camping.care/developer/accommodations/get_availability
     */
    $availability = $campingcare->get_availability($id, $data);

    /*
    * In this example we print the oprions in json format on the page
    */
    echo "GET availability between dates from an Accommodation";
    echo "<pre>";
    echo json_encode($availability, JSON_PRETTY_PRINT);
    echo "</pre>";

} catch (Exception $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}