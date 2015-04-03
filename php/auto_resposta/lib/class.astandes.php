<?php


class ASTANDES{

	var $API_KEY;
	var $DEVICE_ID;
	var $LOG_FILE;
	var $DEBUG;
		
	function __construct(){
		$config_ini 		= parse_ini_file("config.ini", true);
		$this->API_KEY 		= $config_ini['astandes']['api_key'];
		$this->DEVICE_ID 	= $config_ini['astandes']['device_id'];
		$this->LOG_FILE		= $config_ini['astandes']['log_file'];
		$this->DEBUG		= $config_ini['astandes']['debug'];
			
	}
	
	
		
	function sendSMS($dst, $msg, $device_id){

		$data='{"device":"'.$this->DEVICE_ID.'","phone":"'.$dst.'","text":"'.$msg.'"}';

		
		$header_data= array("Content-Type: application/json","Authorization: $this->API_KEY");
		$url ='https://astandes.com.br/api/v1/message';
		$ch = curl_init();
                curl_setopt($ch, CURLOPT_URL , $url );
                curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);
                curl_setopt($ch, CURLOPT_TIMEOUT , 60);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_USERAGENT , "" );
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header_data );
                curl_setopt($ch, CURLOPT_POST , 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS , $data );
		
		$this->postResult = curl_exec($ch);
		
		echo $this->postResult;
	
		if (curl_errno($ch)) {
			print curl_error($ch);
		}
		curl_close($ch);
		
		if($this->DEBUG == 1){		
			$this->log("sendSMS",$data);
			$this->log("astantes_rcv",$this->postResult);
			$this->log("astantes_token",$this->API_KEY);
		}
			
	}




	function log($metodName,$data){

		$dateTime=date("dmY H:i:s");

		file_put_contents($this->LOG_FILE,$dateTime."\t[".$this->DEVICE_ID."]\t".$metodName."\t".$data."\n",FILE_APPEND);
		
	
	}



}

?>

