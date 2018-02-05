<?php


/*
* Example get contacts - How to get a specific contacts from the Camping.care API
* https://camping.care/developer/contacts/get_contact
*/

try{

	/*
    * Initialize the Camping.care API SDK with your API key.
    *
    * See: https://camping.care/settings/api
    */

	include_once($_SERVER['DOCUMENT_ROOT']. '../src/CampingCare/Autoloader.php');

    $campingcare = new campingcare_api ;
	$campingcare->set_api_key('YOUR API KEY');

	/*
    * Set your contact id. It can be found by using the function get_contacts
    * https://camping.care/developer/contacts/get_contacts
    */

	$contact_id = 1;


	/*
    * Parameters:
    * None
    *
    */

	/*
	* All data is returned in a contact object
	* The structure can be found here: https://camping.care/developer/contacts/get_contact.
	*/

	$contact= $campingcare->get_contact($contact_id);

	/*
    * In this example we print the oprions in json format on the page
    */

    echo "Contact";
    echo "<pre>";
    echo json_encode($contact, JSON_PRETTY_PRINT);
    echo "</pre>";

}catch(Exception $e){
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}