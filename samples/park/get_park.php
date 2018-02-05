<?php

/*
* Example get park - How to get park information from the Camping.care API
* https://camping.care/developer/park/get_park
*/
try {


	/*
    * Initialize the Camping.care API SDK with your API key.
    *
    * See: https://camping.care/settings/api
    */
	require_once dirname(__FILE__) . '/../../src/campingcare/Autoloader.php';

	$campingcare = new campingcare_api ;
	$campingcare->set_api_key('xy/1JRxLIiwpNWfYnvIgHbx+gNUF34bS67mZ7uD+2lqys+reyMqWvUn/wNnNzs1818ZLf8DKVMJ3mP6f2mpU7Q==');
    $campingcare->set_api_url('http://localhost:8084/api/v1');
	/*
    * Parameters:
    * None
    *
    */



	/*
	* All data is returned in a park opject
	* The structure can be found here: https://camping.care/developer/park/get_park.
	*/
    $park = $campingcare->get_park();


    /*
     * In this example we print the oprions in json format on the page
    */
    echo "Park data";
    echo "<pre>";
    echo json_encode($park, JSON_PRETTY_PRINT);
    echo "</pre>";


} catch (Exception $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}