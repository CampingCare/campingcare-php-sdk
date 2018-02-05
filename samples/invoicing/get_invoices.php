<?php

/*
* Example get invoices - How to get invoices between a start and end date from the Camping.care API
* https://camping.care/developer/invoicing/get_invoices
*/

try{

	/*
    * Initialize the Camping.care API SDK with your API key.
    *
    * See: https://camping.care/settings/api
    */

	include_once($_SERVER['DOCUMENT_ROOT']. '../src/CampingCare/Autoloader.php');

    $campingcare = new CampingCare_Client ;
	$campingcare->set_api_key('YOUR API KEY');

	/*
    * Parameters:
    * start_date:		The arrival date where reservations have to be inbetween (required)
    * end_date:			The departure date where reservations have to be inbetween (required)
    *
    */

	$data = array();
	$data["start_date"] = "2017-01-01"; // start invoice create date: YYYY-MM-DD (required)
	$data["end_date"] = "2018-12-31"; // end invoice create date: YYYY-MM-DD (required)

	/*
	* All data is returned in a invoice object
	* The structure can be found here: https://camping.care/developer/invoicing/get_invoice.
	*/

	$invoices= $campingcare->get_invoices($data);

	/*
	* In this example we print the oprions in json format on the page
	*/

    echo "Invoices";
    echo "<pre>";
    echo json_encode($invoices, JSON_PRETTY_PRINT);
    echo "</pre>";

}catch(Exception $e){
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}