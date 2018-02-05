<?php
/*
 * Example get age tables - How to get age table information from the Camping.care API
 * https://camping.care/developer/park/get_age_tables
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
	* All data is returned in a age table opject
	* The structure can be found here: https://camping.care/developer/park/get_age_tables.
	*/

    $age_tables = $campingcare->get_age_tables();

	/*
     * In this example we print the oprions in json format on the page
    */
    echo "Age table data";
    echo "<pre>";
    echo json_encode($age_tables, JSON_PRETTY_PRINT);
    echo "</pre>";


} catch (Exception $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}