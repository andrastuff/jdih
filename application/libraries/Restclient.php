<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Restclient{
	public function __construct(){}
	public function callApi($url,$body,$method,$header){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url); 
		switch ($method) {
			case 'POST':
				curl_setopt($curl, CURLOPT_POST, 1);
				curl_setopt($curl, CURLOPT_POSTFIELDS,$body);
				break;
			case 'PUT':
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST , 'PUT');
				curl_setopt($curl, CURLOPT_POSTFIELDS,$body);
				break;
			case 'DELETE':
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST , 'DELETE');
				curl_setopt($curl, CURLOPT_POSTFIELDS,$body);
				break;
			case 'PATCH':
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST , 'PATCH');
				curl_setopt($curl, CURLOPT_POSTFIELDS,$body);
				break;
			case 'GET':
			default:
				//curl_setopt($curl, CURLOPT_CUSTOMREQUEST , 'GET');
				break;
		}

		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		curl_setopt($curl, CURLOPT_VERBOSE,true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION,true);
		curl_setopt($curl, CURLOPT_ENCODING,"");
		curl_setopt($curl, CURLOPT_AUTOREFERER,true);
		curl_setopt($curl, CURLOPT_MAXREDIRS,5);
		curl_setopt($curl, CURLOPT_TIMEOUT,30);
		curl_setopt($curl, CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
		$response 			= curl_exec($curl);
		$httpCode 			= curl_getinfo($curl, CURLINFO_HTTP_CODE);
		$err      			= curl_error($curl);
	    $out 				= [];
	    curl_close($curl);
	    if($response){
	    	return $response;
	    }else{
	    	return FALSE;
	    }
	    //$out['data'] 		= $response;
	    //$out['status_code'] = $httpCode;   
	    //$out['error'] 		= $err;
		
		//return (object) $out;
	}
	public function post($url,$params,$header){
		return $this->callApi($url,$params,'POST',$header);
	}
	public function get($url,$params,$header){
		return $this->callApi($url,$params,'GET',$header);
	}
	public function patch($url,$params,$header){
		return $this->callApi($url,$params,'PATCH',$header);
	}
	public function put($url,$params,$header){
		return $this->callApi($url,$params,'PUT',$header);
	}
	public function delete($url,$params,$header){
		return $this->callApi($url,$params,'DELETE',$header);
	}
}
