<?php

/**
 * Copyright (c) 2018, Boekanders B.V.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * - Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 * - Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in the
 *    documentation and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE AUTHOR AND CONTRIBUTORS ``AS IS'' AND ANY
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE AUTHOR OR CONTRIBUTORS BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY
 * OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH
 * DAMAGE.
 *
 * @license     Berkeley Software Distribution License (BSD-License 2) http://www.opensource.org/licenses/bsd-license.php
 * @author      Boekanders B.V. <support@camping.care>
 * @copyright   Boekanders B.V.
 * @link        https://camping.care
 */

class campingcare_api {

	var $api_key ;
	var $api_url = "https://camping.care/api/v1" ; 


	// change the api key variable to the users input
	function set_api_key($api_key){
		$this->api_key = $api_key ;
	}

	function set_api_url($api_url){
		$this->api_url = $api_url ;
	}

	// make a request with the an endpoint at campingcare
	function make_api_request($endpoint, $data = array(), $type = 'get'){

		$post = false ;

		$authorization = "Authorization: Bearer ".$this->api_key ;
		$endpoint = $this->api_url.$endpoint ;

		if($type == 'get'){
			$endpoint = $endpoint."?".http_build_query($data);
		}else{
			$post = true ;
		};

		$ch = curl_init($endpoint);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array($authorization));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		if($post){
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		};

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

	function get_park($data = array()){

		return $this->make_api_request("/park", $data);

	}

	function get_age_tables($data = array()){

		return $this->make_api_request("/park/age_tables", $data);

	}

	function get_cards($data = array()){

		return $this->make_api_request("/park/cards", $data);

	}

	function get_accommodations($data = array()){

		return $this->make_api_request("/accommodations", $data);

	}

	function get_accommodation($id = 0, $data = array()){

		$id = intval($id);

		if(!$id){
			throw new Exception("No accommodation ID found");
		};

		return $this->make_api_request("/accommodations/".$id, $data);

	}

	function get_availability($id = 0, $data = array()){

		$id = intval($id);

		if(!$id){
			throw new Exception("No accommodation ID found");
		};

		return $this->make_api_request("/accommodations/".$id."/availability", $data);

	}

	function get_options($id = 0, $data = array()){

		$id = intval($id);

		if(!$id){
			throw new Exception("No accommodation ID found");
		};

		return $this->make_api_request("/accommodations/".$id."/options", $data);

	}


	function get_reservations($data = array()){

		return $this->make_api_request("/reservations", $data);

	}

	function get_reservation($id = 0){

		$id = intval($id);

		if(!$id){
			throw new Exception("No reservation ID found");
		};

		return $this->make_api_request("/reservations/".$id);

	}

	function get_reservation_options($id = 0, $data = array()){

		$id = intval($id);

		if(!$id){
			throw new Exception("No reservation ID found");
		};

		return $this->make_api_request("/reservations/".$id."/options", $data);

	}

	function calculate_price($data = array()){

		if(!$data['accommodation_id']){
			throw new Exception("No accommodation ID found");
		};

		return $this->make_api_request("/reservations/calculate_price", $data, 'POST');

	}

	function create_reservation($data = array()){

		$data['age_table_input'] = json_encode($data['age_table_input']);

		return $this->make_api_request("/reservations", $data, 'POST');

	}

	function update_reservation($id = 0, $data = array()){

		$id = intval($id);

		if(!$id){
			throw new Exception("No reservation ID found");
		};

		$data['options'] = json_encode($data['options']);

		return $this->make_api_request("/reservations/".$id, $data, 'POST');

	}

	function get_prices($id = 0, $data = array()){

		$id = intval($id);

		if(!$id){
			throw new Exception("No accommodation ID found");
		};

		return $this->make_api_request("/prices/".$id, $data);

	}

	function get_price($id = 0, $data = array()){

		$id = intval($id);

		if(!$id){
			throw new Exception("No price ID found");
		};
		return $this->make_api_request("/price/". $id, $data);

	}

	function get_invoices($data = array()){

		return $this->make_api_request("/invoicing", $data);

	}

	function get_invoice($id = 0){

		$id = intval($id);

		if(!$id){
			throw new Exception("No invoice ID found");
		};
		return $this->make_api_request("/invoicing/". $id);

	}


	function get_vat_groups($data = array()){

		return $this->make_api_request("/invoicing/vat_groups", $data);

	}

	function get_contacts($data = array()){

		return $this->make_api_request("/contacts", $data);

	}

	function get_contact($id = 0){

		$id = intval($id);

		if(!$id){
			throw new Exception("No contact ID found");
		};
		return $this->make_api_request("/contacts/". $id);

	}

	function create_contact($data = array()){

		return $this->make_api_request("/contacts", $data, 'POST');

	}

}