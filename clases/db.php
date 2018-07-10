<?php

/**
 * 
 */
 abstract class DB
{
	
	abstract function guardarUsuario(Usuario $usuario) ; 
/*	datosnuevo*/
	abstract function esUsuarioValido(Usuario $usuario) ; 

	abstract function retornaUsuario(array $datos):Usuario; 
}
?>