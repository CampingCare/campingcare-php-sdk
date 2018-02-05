<?php

/*
* Example get invoices - How to get a specific invoice from the Camping.care API
* https://camping.care/developer/invoicing/get_invoice
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
    * Set your invoice id. It can be found by using the function get_invoices
    * https://camping.care/developer/invoicing/get_invoice
    */

	$invoice_id = 321;

	/*
    * Parameters:
    * None
    *
    */



	/*
	* All data is returned in a invoice object
	* The structure can be found here: https://camping.care/developer/invoicing/get_invoice.
	*/

    $invoice= $campingcare->get_invoice($invoice_id);


    /*
     * In this example we print the oprions in json format on the page
    */

    echo "Invoice";
    echo "<pre>";
    echo json_encode($invoice, JSON_PRETTY_PRINT);
    echo "</pre>";

}catch(Exception $e){
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}