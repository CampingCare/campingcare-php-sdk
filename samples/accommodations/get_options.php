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

    require_once dirname(__FILE__) . '/../../src/campingcare/Autoloader.php';

    $campingcare = new campingcare_api ;
    $campingcare->set_api_key('YOUR API KEY');


    /*
    * Set your accommodation id. It can be found by using the function get_accommodations 
    * http://camping.care/developer/accommodations/get_accommodations
    */

    $id =  74 ; // Accommodation ID (required)

     /*
    * Parameters:
    * language : ISO language code (optional)
    *
    */
    $data = array();
    $data['language'] = "de" ;

    /*
     * All data is returned in a option opject
     * The structure can be found here: https://camping.care/developer/accommodations/get_options.
     */
    $options = $campingcare->get_options($id, $data);


    /*
    * In this example we print the data in json format on the page
    */
    echo "GET accommodation options";
    echo "<pre>";
    echo json_encode($options, JSON_PRETTY_PRINT);
    echo "</pre>";

} catch (Exception $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}