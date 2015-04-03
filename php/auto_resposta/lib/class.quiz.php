<?php

class QUIZ{

	var $LOG_FILE;
	var $DEBUG;
	var $MSG;
		
	function __construct(){
		$config_ini 		= parse_ini_file("config.ini", true);
		$this->LOG_FILE		= $config_ini['quiz']['log_file'];
		$this->DEBUG		= $config_ini['quiz']['debug'];
		$this->MSG		= $config_ini['quiz']['mensagem'];
			
	}
	
	
		
	function getMSG(){

		
		if($this->DEBUG == 1)		
			$this->log("getMSG",$this->MSG);
		
	
		return $this->MSG;		
	}




	function log($metodName,$data){

		$dateTime=date("dmY H:i:s");

		file_put_contents($this->LOG_FILE,$dateTime."\t[QUIZ]\t".$metodName."\t".$data."\n",FILE_APPEND);
		
	
	}



}

?>

