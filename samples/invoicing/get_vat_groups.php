<?php
/*
* Example get vat groups - How to get vat group information from the Camping.care API
* https://camping.care/developer/invoicing/get_vat_groups
*/
try {


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
    * None
    *
    */

	/*
	* All data is returned in a vat groups opject
	* The structure can be found here: https://camping.care/developer/invoicing/get_vat_groups.
	*/
    $vat_groups = $campingcare->get_vat_groups();

    /*
     * In this example we print the data in json format on the page
    */
    echo "Vat group data";
    echo "<pre>";
    echo json_encode($vat_groups, JSON_PRETTY_PRINT);
    echo "</pre>";


} catch (Exception $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}