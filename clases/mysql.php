<?php

/**
 * 
 */
class MySql extends DB
{
	private conexion; 

	function __construct(argument)
	{
		this->conexion = new PDO ($dns, $user, $pass); 
	}

	
}
?>