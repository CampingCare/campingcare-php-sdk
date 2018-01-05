<?php

include_once($_SERVER['DOCUMENT_ROOT']. '/autoloader.php');

$campingcare = new campingcare_api ;
$campingcare->set_api_key('YOUR API KEY');

// GET CONTACTS
try{

	$data = array();
	$data["filter"] = "%"; // start characters of search string

	$contacts= $campingcare->get_contacts($data);

    echo "Contacts";
    echo "<pre>";
    echo json_encode($contacts, JSON_PRETTY_PRINT);
    echo "</pre>";

}catch(Exception $e){
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}