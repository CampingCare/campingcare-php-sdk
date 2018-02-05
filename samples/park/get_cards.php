<?php


/*
 * Example get cards - How to get card information information from the Camping.care API
 * https://camping.care/developer/park/get_cards
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
	* All data is returned in a cards opject
	* The structure can be found here: https://camping.care/developer/park/get_cards.
	*/

    $cards = $campingcare->get_cards();

    echo "Card data";
    echo "<pre>";
    echo json_encode($cards, JSON_PRETTY_PRINT);
    echo "</pre>";


} catch (Exception $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}