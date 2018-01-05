<?php 

class campingcare_api {

	var $api_key ; 
	var $api_url = "http://localhost:8084/api/v1" ; 

	//'http://localhost:8084/api/accommodations' 

	// change the api key variable to the users input
	function set_api_key($api_key){
		$this->api_key = $api_key ;
	}

	// make a request with the an endpoint at campingcare
	function make_api_request($endpoint, $post = array()){

		$authorization = "Authorization: Bearer ".$this->api_key ;

		// set post fields
		// $post = [
		//     'page' => 1
		// ];

		$ch = curl_init($this->api_url.$endpoint);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array($authorization));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 60); //timeout in seconds

		// execute!
		$json_response = curl_exec($ch);

		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		// close the connection, release resources used
		curl_close($ch);

		if($httpcode == '500'){

			throw new Exception("Httpcode 500 - we could not reach the server");

		}elseif($httpcode == '201'){

			$response = json_decode($json_response);

			if(!$response){
				throw new Exception("We got an empty response");
			};

			// do anything you want with your response
			return $response ;

		}elseif($httpcode == '230'){

			$response = json_decode($json_response);

			if(!$response){
				throw new Exception("We got an empty error response");
			};

			// the response is an error message
			throw new Exception($response->code . ": ". $response->message); 

		}elseif($httpcode == '404'){

			throw new Exception("404 - Page not found");

		};

		throw new Exception("Unknown httpcode (".$httpcode.") ");

	}

	function get_accommodations(){

		return $this->make_api_request("/accommodations");

	}

	function get_accommodation($id){

		$id = intval($id);

		if(!$id){
			throw new Exception("No accommodation ID found");
		};

		return $this->make_api_request("/accommodations/".$id);

	}

	function get_availability($id, $data){

		$id = intval($id);

		if(!$id){
			throw new Exception("No accommodation ID found");
		};

		return $this->make_api_request("/accommodations/".$id."/availability", $data);

	}

	function get_calculate_price($id, $data){

		$id = intval($id);

		if(!$id){
			throw new Exception("No accommodation ID found");
		};

		return $this->make_api_request("/accommodations/".$id."/calculate_price", $data);

	}


	function get_reservations($data){

		return $this->make_api_request("/reservations", $data);

	}

	function get_reservation($id){

		$id = intval($id);

		if(!$id){
			throw new Exception("No reservation ID found");
		};

		return $this->make_api_request("/reservations/".$id);

	}

	function create_reservation($data){

		return $this->make_api_request("/reservations/create/", $data);

	}


	function get_prices($id){

		$id = intval($id);

		if(!$id){
			throw new Exception("No accommodation ID found");
		};

		return $this->make_api_request("/prices/".$id);

	}

	function get_price($id){

		$id = intval($id);

		if(!$id){
			throw new Exception("No price ID found");
		};
		return $this->make_api_request("/price/". $id);

	}

	function get_invoices($data){

		return $this->make_api_request("/invoicing/", $data);

	}

	function get_invoice($id){

		$id = intval($id);

		if(!$id){
			throw new Exception("No invoice ID found");
		};
		return $this->make_api_request("/invoicing/". $id);

	}

	function get_contacts($data){

		return $this->make_api_request("/contacts/", $data);

	}

	function get_contact($id){

		$id = intval($id);

		if(!$id){
			throw new Exception("No contact ID found");
		};
		return $this->make_api_request("/contacts/". $id);

	}

}