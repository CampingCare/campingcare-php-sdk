<?php

include_once($_SERVER['DOCUMENT_ROOT']. '/autoloader.php');

$campingcare = new campingcare_api ;
//$campingcare->set_api_key('YOUR API KEY');
$campingcare->set_api_key('3nsIqgtQSsJxNHUAgnVxUqGaDv7fMLvZAI9fcq0MitBkSvNcijiQIrdkxeqG3yow0EXmtHs6D4okNZ2nRX2lqQ==');


// GET ACCOMODATIONS
try {

    $accommodations = $campingcare->get_accommodations();

    echo "List of accommodations";
    echo "<pre>";
    echo json_encode($accommodations, JSON_PRETTY_PRINT);
    echo "</pre>";


} catch (Exception $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}