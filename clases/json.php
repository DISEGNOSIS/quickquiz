<?php

/**
 * 
 */
class Json extends DB
{
	
	function guardarUsuario($usuario){
	  $user= json_encode($usuario);
	  $json= file_get_contents("usuarios.json");
	  $array= json_decode($json,true);
	  $array["usuarios"][]= $user;
	  $array= json_encode($array);
	  file_put_contents("usuarios.json",$array);
	}


?>