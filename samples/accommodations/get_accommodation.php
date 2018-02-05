<?php

/*
* Example get accommodation - How to get accommodation information from the Camping.care API
* https://camping.care/developer/accommodations/get_accommodation
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

	$id =  1; // Accommodation ID (required)

	/*
    * Parameters:
    * None
    *
    */



	/*
	* All data is returned in a accommodation opject
	* The structure can be found here: https://camping.care/developer/accommodations/get_accommodation.
	*/

	$accommodation = $campingcare->get_accommodation($id);

	echo "Data from a single Accommodation";
	echo "<pre>";
	echo json_encode($accommodation, JSON_PRETTY_PRINT);
	echo "</pre>";

} catch (Exception $e) {
	echo "API call failed: " . htmlspecialchars($e->getMessage());
}