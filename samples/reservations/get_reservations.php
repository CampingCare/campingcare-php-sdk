<?php

/*
* Example get reservations - How to get reservations between a arrival and departure date from the Camping.care API
* https://camping.care/developer/reservations/get_reservations
*/

try {

	/*
    * Initialize the Camping.care API SDK with your API key.
    *
    * See: https://camping.care/settings/api
    */

	include_once($_SERVER['DOCUMENT_ROOT']. '../src/CampingCare/Autoloader.php');

    $campingcare = new campingcare_api ;
	$campingcare->set_api_key('YOUR API KEY');

	/*
    * Parameters:
    * arrival:		The arrival date where reservations have to be inbetween
    * departure:	The departure date where reservations have to be inbetween
    *
    */

	$data = array();
	$data["arrival"] = "2017-01-01"; // date YYYY-MM-DD  (required)
	$data["departure"] = "2018-12-31";  // date YYYY-MM-DD (required)

	/*
	* All data is returned in a reservation object
	* The structure can be found here: https://camping.care/developer/reservations/get_reservation.
	*/

    $reservations = $campingcare->get_reservations($data); 

    /*
    * In this example we print the oprions in json format on the page
    */

    echo "Get reservations between dates";
    echo "<pre>";
    echo json_encode($reservations, JSON_PRETTY_PRINT);
    echo "</pre>";

} catch (Exception $e) {
	echo "API call failed: " . htmlspecialchars($e->getMessage());
}