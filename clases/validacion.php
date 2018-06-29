<?php
include_once ("autoload.php"); 

	abstract class Validacion {
		
	}

	function validarDatos($datos){
		$errores = [];
		if ($datos["usuario"]=="") {
		   $errores["usuario"]="Por favor ingresá tu usuario";
		}
		if ($datos["email"]=="") {
		    $errores["email"]="Por favor ingresá tu email";
		}elseif (!filter_var($datos["email"],FILTER_VALIDATE_EMAIL)) {
		    $errores["email"]="Por favor ingresá un email válido";
			$_POST["email"]="";
		}
		if ($datos ["email_confirm"]=="") {
		    $errores["email_confirm"]= "Por favor reingresá tu email";
		}elseif ($datos["email_confirm"]!==$datos["email"]) {
		    $errores["email_confirm"]="Los email no coinciden";
		    $_POST["email_confirm"]="";
		}
		if ($datos["password"]=="") {
		    $errores["password"]= "Por favor ingresá una contraseña";
		}
		if ($datos ["password-confirm"]=="") {
		    $errores["password-confirm"]= "Por favor reingresá tu contraseña";
		}elseif ($datos["password-confirm"]!==$datos["password"]) {
		    $errores["password-confirm"]="Las contraseñas no coinciden";
		    $_POST["password"]="";
		    $_POST["password-confirm"]="";
		}
		return $errores;
	}
	
	public static function validarDatosLogin(){ //que no estén en blanco y que sea valido

	}

	public static function comprobarLogin(){  //que el user sea válido y que tenga la password correcta

	}
?>