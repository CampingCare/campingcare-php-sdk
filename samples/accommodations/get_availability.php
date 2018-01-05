<?php

include_once($_SERVER['DOCUMENT_ROOT']. '/autoloader.php');

$campingcare = new campingcare_api ;
$campingcare->set_api_key('YOUR API KEY');

//GET availability
try {

    $id =  1 ; // Accommodation ID

    $data = array();
    $data['arrival'] = "2018-06-10" ;
    $data['departure'] = "2018-06-17" ;

    $availability = $campingcare->get_availability($id, $data);

    echo "GET availability between dates from an Accommodation";
    echo "<pre>";
    echo json_encode($availability, JSON_PRETTY_PRINT);
    echo "</pre>";

} catch (Exception $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}