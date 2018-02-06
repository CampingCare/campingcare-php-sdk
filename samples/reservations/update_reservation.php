<?php


/*
* Example create reservation - How to create a reservation calculated price for a from the Camping.care API
* https://camping.care/developer/reservations/calculate_price
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
    * Set your price id. It can be found by using the function get_reservations
    * http://camping.care/developer/reservations/get_reservations
    */

    $id = 123 ; // this is the id of the reservation, not the reservation_id (Required)

    /*
    * Parameters:
    *   contact_id:     The id of a contact (required)
    *   options:        he options that are selected by the guest. You can get the available options with this function get options
    *   finish:         Make it final by setting this variable to true. The reservation will get the status 'pending', this means the reservation is done.
    */

    $data = array();

    // the contact_id id, this can be found with the function get_contacts (Required)
    // if you don't have a contact id you can create a contact with Create contact
    $data["contact_id"] = 124 ;

    // if options are selected, sent them to the server
    // More information about options can be found in the 'Get options' function
    $data["options"] = array(
        array(
            "id" => 1, // the id of the option (Babyseat for example)
            "count" => 3 // The number of 'Babyseats'
        ),

        array(
            "id" => 2, // the id of the option (Insurance for example)
            "count" => 2 // The number of 'Insurances'
        )
    );

    // finished the reservation? Make it final by setting this variable to true
    // the reservation will get the status 'pending', this means the reservation is done
    // Once the reservation has the status 'pending' you're not able to update it anymore.

    // if finish is set to true, the contact_id is required

    $data["finish"] = false ; 


    /*
    * All data is returned in a reservation object
    * The structure can be found here: https://camping.care/developer/reservations/get_reservation.
    */

    $reservation = $campingcare->update_reservation($id, $data);


  /*
    * In this example we print the data in json format on the page
    */
    echo "Reservation";
    echo "<pre>";
    echo json_encode($reservation, JSON_PRETTY_PRINT);
    echo "</pre>";


}catch(Exception $e){
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}
