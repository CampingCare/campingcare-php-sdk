<?php


/*
* Example get contacts - How to get a specific contacts from the Camping.care API
* https://camping.care/developer/contacts/get_contact
*/
require_once('vendor/autoload.php');

$campingcare = new CampingCare_Client ;
$campingcare->set_api_key("YOUR SECRET API KEY");

try{

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

	$contact = $campingcare->create_contact($data);

	echo $contact->id ;

}catch(Exception $e){
	echo "API call failed: " . htmlspecialchars($e->getMessage());
}
