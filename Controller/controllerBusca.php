<?php 

$action = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : "";
//include '../Model/Usuario.php';
//$usuario = new Usuario();

function($id){
	$im = imagegrabscreen();
	imagejpeg($im, "imagem.jpeg");
	$to_crop_array = array('x' =>70 , 'y' => 111, 'width' => 1000, 'height'=> 560);
	$thumb_im = imagecrop($im, $to_crop_array);
	imagejpeg($thumb_im, 'imagem.jpeg');


}

?>