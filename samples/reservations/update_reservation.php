<?php

include_once($_SERVER['DOCUMENT_ROOT']. '../src/CampingCare/Autoloader.php');

$campingcare = new campingcare_api ;
$campingcare->set_api_key('YOUR API KEY');

try{
    
    $id = 123 ; // this is the reservation id (Required)

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

    $reservation = $campingcare->update_reservation($id, $data);

    echo $reservation->id ;

}catch(Exception $e){
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}
