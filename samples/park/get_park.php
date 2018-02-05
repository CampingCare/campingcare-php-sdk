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
	include_once($_SERVER['DOCUMENT_ROOT']. '/autoloader.php');

	$campingcare = new campingcare_api ;
	$campingcare->set_api_key('YOUR API KEY');


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