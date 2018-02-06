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

	function get_park(){

		return $this->make_api_request("/park");

	}

	function get_age_tables(){

		return $this->make_api_request("/park/age_tables");

	}

	function get_cards(){

		return $this->make_api_request("/park/cards");

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

	function get_options($id, $data){

		$id = intval($id);

		if(!$id){
			throw new Exception("No accommodation ID found");
		};

		return $this->make_api_request("/accommodations/".$id."/options", $data);

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

	function calculate_price($data){

		if(!$data['accommodation_id']){
			throw new Exception("No accommodation ID found");
		};

		return $this->make_api_request("/reservations/calculate_price", $data, 'POST');

	}

	function create_reservation($data){

		$data['age_table_input'] = json_encode($data['age_table_input']);

		return $this->make_api_request("/reservations", $data, 'POST');

	}

	function update_reservation($id, $data){

		$id = intval($id);

		if(!$id){
			throw new Exception("No reservation ID found");
		};

		$data['id'] = $id;
		$data['options'] = json_encode($data['options']);

		return $this->make_api_request("/reservations/".$id, $data, 'POST');

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

		return $this->make_api_request("/invoicing", $data);

	}

	function get_invoice($id){

		$id = intval($id);

		if(!$id){
			throw new Exception("No invoice ID found");
		};
		return $this->make_api_request("/invoicing/". $id);

	}


	function get_vat_groups(){

		return $this->make_api_request("/invoicing/vat_groups");

	}

	function get_contacts($data){

		return $this->make_api_request("/contacts", $data);

	}

	function get_contact($id){

		$id = intval($id);

		if(!$id){
			throw new Exception("No contact ID found");
		};
		return $this->make_api_request("/contacts". $id);

	}

	function create_contact($data){

		return $this->make_api_request("/contacts", $data, 'POST');

	}

}