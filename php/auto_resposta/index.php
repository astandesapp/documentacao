<?php

require('lib/class.astandes.php');
require('lib/class.quiz.php');


$data = json_decode(file_get_contents('php://input'));



$astandes	= new ASTANDES();
$quiz		= new QUIZ();



$mensagem = $quiz->getMSG();


if( $data->status == "204" ){

	$astandes->sendSMS($data->phone, $mensagem, $data->device->_id);

}



?>


