<?php


/*
* Example get prices - How to get a specific reservation from the Camping.care API
* https://camping.care/developer/reservations/get_reservation
*/

try{

	/*
    * Initialize the Camping.care API SDK with your API key.
    *
    * See: https://camping.care/settings/api
    */

    require_once dirname(__FILE__) . '/../../src/campingcare/Autoloader.php';

    $campingcare = new campingcare_api ;
	$campingcare->set_api_key('YOUR API KEY');

	/*
    * Set your reservation id. It can be found by using the function get_reservations
    * http://camping.care/developer/reservations/get_reservations
    */

	$reservation_id = 33; // set your reservation id here (required)

	/*
    * Parameters:
    * None
    *
    */

	/*
	* All data is returned in a reservation object
	* The structure can be found here: https://camping.care/developer/reservations/get_reservation.
	*/

    $reservation = $campingcare->get_reservation($reservation_id);


    /*
    * In this example we print the oprions in json format on the page
    */

    echo "Reservation";
    echo "<pre>";
    echo json_encode($reservation, JSON_PRETTY_PRINT);
    echo "</pre>";

}catch(Exception $e){
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}