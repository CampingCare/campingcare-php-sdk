<?php

/*
* Example get contacts - How to get a list of contacts from the Camping.care API
* https://camping.care/developer/contacts/get_contacts
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


    $data = array();
    $data["offset"] = 1 ; // start with the first dataset
    $data["limit"] = 100 ; // returns 100 contacts at the time, max. is 1000

	/*
     * All data is returned in a contact opject
     * The structure can be found here: https://camping.care/developer/contacts/get_contact.
     */

    $contacts = $campingcare->get_contacts($data);

	/*
    * In this example we print the data in json format on the page
    */

    echo "Contacts";
    echo "<pre>";
    echo json_encode($contacts, JSON_PRETTY_PRINT);
    echo "</pre>";

}catch(Exception $e){
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}