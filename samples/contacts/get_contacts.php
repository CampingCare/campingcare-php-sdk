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

    include_once($_SERVER['DOCUMENT_ROOT']. '../src/CampingCare/Autoloader.php');

    $campingcare = new campingcare_api ;
	$campingcare->set_api_key('YOUR API KEY');


    /*
    * Parameters:
    *   filter    		The filter can be used to filter the contact list on name, you can use the '%' to get all contacts (required)
    *
    */

	$data = array();
	$data["filter"] = "%"; // start characters of search string (required)

	/*
     * All data is returned in a contact opject
     * The structure can be found here: https://camping.care/developer/contacts/get_contact.
     */

	$contacts= $campingcare->get_contacts($data);

	/*
    * In this example we print the oprions in json format on the page
    */

    echo "Contacts";
    echo "<pre>";
    echo json_encode($contacts, JSON_PRETTY_PRINT);
    echo "</pre>";

}catch(Exception $e){
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}