<?php
include_once ("autoload.php"); 

	abstract class Validacion {
		
	}

  function validarDatos($datos){
    $errores = [];
    $hayError = false; 
    if ($datos["usuario"]=="") {
     $errores["usuario"]="Por favor ingresá tu usuario";
     $hayError = true; 
     }
    if ($datos["email"]=="") {
      $errores["email"]="Por favor ingresá tu email";
      $hayError = true; 
    }elseif (!filter_var($datos["email"],FILTER_VALIDATE_EMAIL)) {
      $errores["email"]="Por favor ingresá un email válido";
      $_POST["email"]="";
      $hayError = true; 
    }
      if ($datos ["email_confirm"]=="") {
      $errores["email_confirm"]= "Por favor reingresá tu email";
      $hayError = true; 
  }elseif ($datos["email_confirm"]!==$datos["email"]) {
      $errores["email_confirm"]="Los email no coinciden";
      $_POST["email_confirm"]="";
      $hayError = true; 
    }
    /*if ($datos["username"]=="") {
     $errores["username"]="Por favor ingrese su usuario";
    }*/
    if ($datos["password"]=="") {
      $errores["password"]= "Por favor ingresá una contraseña";
      $hayError = true; 
    }
    if ($datos ["password-confirm"]=="") {
      $errores["password-confirm"]= "Por favor reingresá tu contraseña";
      $hayError = true; 
   } elseif ($datos["password-confirm"]!==$datos["password"]) {
      $errores["password-confirm"]="Las contraseñas no coinciden";
      $_POST["password"]="";
      $_POST["password-confirm"]="";
      $hayError = true; 
    }

    return $hayError;

  }

  function validarLoginCompleto($datos){
    $errores = [];
    $hayError = false; 
    if ($datos["usuario"]=="") {
      $errores["usuario"]= "Por Favor ingresá tu usuario." ;
      $hayError = true; 
    }
    if ($datos["password"]=="") {
        $errores["password"]= "Por Favor ingresá tu contraseña.";
        $hayError = true; 
    }
    return $hayError;
  }

	public static function comprobarLogin(){  //que el user sea válido y que tenga la password correcta

	}
?>