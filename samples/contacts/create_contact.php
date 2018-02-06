<?php


/*
* Example get contacts - How to get a specific contacts from the Camping.care API
* https://camping.care/developer/contacts/create_contact
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
    * Parameters:
    *   email           The email of the contact. (required)
    *   company         The company name of the contact.
    *   first_name      The first name of the contact.
    *   last_name       The last name of the contact. (required)
    *   gender          The gender of the contact. ('male', 'female' or 'family')
    *   address         The address of the contact.
    *   address_number  The address number of the contact.        
    *   zipcode         The zip code of the contact.
    *   city            The city of the contact.
    *   country         The country of the contact in ISO 3166 1 - Alpha 2 format. ('NL', 'IT', etc)
    *   phone           The phone of the contact.
    *   birthday        The birthday of the contact(YYYY - MM - DD)
    *
    */

	$data = array();

    $data["email"] = "info@example.com"; // A valid email address is required

    $data["first_name"] = "John" ;
    $data["last_name"] = "Doe" ; // A last name is required
    $data["gender"] = "male";

    $data["address"] = "Example street";
    $data["address_number"] = "666";
    $data["zipcode"] = "1337OK";
    $data["city"] = "ExampleCity";
    $data["country"] = "DE";

    $data["phone"] = "0031 85 065 3614";
    $data["birthday"] = "1986-01-25";

    /*
    * All data is returned in a contact object
    * The structure can be found here: https://camping.care/developer/contacts/get_contact.
    */

	$contact = $campingcare->create_contact($data);

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
