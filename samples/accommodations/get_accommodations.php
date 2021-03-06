<?php

/*
* Example get accommodations - How to get all accommodations data from the Camping.care API
* https://camping.care/developer/accommodations/get_accommodations
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
    * Parameters:
    * language : ISO language code (optional)
    *
    */

    $data = array();
    $data['language'] = "de" ;

    /*
    * All data is returned in a accommodations object
    * The structure can be found here: https://camping.care/developer/accommodations/get_accommodations.
    */

    $accommodations = $campingcare->get_accommodations($data);

    /*
     * In this example we print the data in json format on the page
    */
    echo "List of accommodations";
    echo "<pre>";
    echo json_encode($accommodations, JSON_PRETTY_PRINT);
    echo "</pre>";


} catch (Exception $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}