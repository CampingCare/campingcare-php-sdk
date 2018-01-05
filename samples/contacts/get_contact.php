<?php

include_once($_SERVER['DOCUMENT_ROOT']. '/autoloader.php');

$campingcare = new campingcare_api ;
$campingcare->set_api_key('YOUR API KEY');
// GET CONTACTS
try{

	$contact_id = 1;

	$contact= $campingcare->get_contact($contact_id);

    echo "Contact";
    echo "<pre>";
    echo json_encode($contact, JSON_PRETTY_PRINT);
    echo "</pre>";

}catch(Exception $e){
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}