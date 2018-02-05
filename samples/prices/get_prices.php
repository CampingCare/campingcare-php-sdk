<?php

/*
* Example get prices - How to get all prices from the Camping.care API
* https://camping.care/developer/prices/get_prices
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
    * Set your accommodation id. It can be found by using the function get_accommodations 
    * http://camping.care/developer/accommodations/get_accommodations
    */

	$accommodation_id = 1; // Accommodation id here (required)

	/*
    * Parameters:
    * None
    *
    */

	/*
	* All data is returned in a price object
	* The structure can be found here: https://camping.care/developer/prices/get_price.
	*/

    $prices = $campingcare->get_prices($accommodation_id); 

    /*
    * In this example we print the oprions in json format on the page
    */
    echo "Prices for accommodation";
    echo "<pre>";
    echo json_encode($prices, JSON_PRETTY_PRINT);
    echo "</pre>";

} catch (Exception $e) {
	echo "API call failed: " . htmlspecialchars($e->getMessage());
}