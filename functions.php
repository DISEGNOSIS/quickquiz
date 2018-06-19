<?php

session_start();

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
  /*if ($datos["username"]=="") {
   $errores["username"]="Por favor ingrese su usuario";
  }*/
  if ($datos["password"]=="") {
    $errores["password"]= "Por favor ingresá una contraseña";
  }
  if ($datos ["password-confirm"]=="") {
    $errores["password-confirm"]= "Por favor reingresá tu contraseña";
  } elseif ($datos["password-confirm"]!==$datos["password"]) {
    $errores["password-confirm"]="Las contraseñas no coinciden";
    $_POST["password"]="";
    $_POST["password-confirm"]="";
  }

  return $errores;

}

function crearUsuario($datos){
  return [
    "nombre" => $datos["usuario"],
    "mail" => $datos["email"],
    "usuario" => $datos ["usuario"],
    "password" => password_hash($datos["password"],PASSWORD_BCRYPT),
    "avatar" =>  $datos["avatar"],
  ];

}

function guardarUsuario($usuario){
  $user= json_encode($usuario);
  $json= file_get_contents("usuarios.json");
  $array= json_decode($json,true);
  $array["usuarios"][]= $user;
  $array= json_encode($array);
  file_put_contents("usuarios.json",$array);
}

/*function test(){
  $json= file_get_contents("usuarios.json");
  $array= json_decode($json,true);
  var_dump($array);
}*/

function validarLoginCompleto($datos){
  $errores = [];
  if ($datos["usuario"]=="") {
    $errores["usuario"]= "Por Favor ingresá tu usuario." ;
  }
  if ($datos["password"]=="") {
      $errores["password"]= "Por Favor ingresá tu contraseña.";
  }
  return $errores;
}

function validarLoginOK($datos){
    $errores = [];
    $userEncontrado=false;

    $json= file_get_contents("usuarios.json");
    $array= json_decode($json,true);
    $array = $array["usuarios"];

    for ($i=0; $i < count($array); $i++) {
      
      $user = json_decode($array[$i],true);
      
      if($datos["usuario"]==$user["usuario"]){
        /*var_dump($datos['usuario'],$user['usuario']);
        echo "<br> User encontrado, valido password"; */

        if(!password_verify($datos["password"], $user["password"]) ){
          /*echo "<br> password incorrecta"; */
          $errores["password"]= "Contraseña incorrecta, por favor volvé a ingresarla.";
          return $errores;
          break;
        } else {
          $userEncontrado=true;
          $_SESSION["user"] = $user["usuario"];
          $_SESSION["avatar"] = $user["avatar"];
        }
 
      }
    }

    if($userEncontrado==false) {
      $errores["usuario"]= "Usuario incorrecto, por favor volvé a ingresarlo o registrate si aún no lo hiciste.";
    }
    return $errores;
}

function userLogueado() {

  if(isset($_COOKIE["userQQ"])) {
    $_SESSION["user"] = $_COOKIE["userQQ"];
    //$_SESSION["avatar"] = $_COOKIE["avatar"];
  }

  if(isset($_SESSION["user"])){
    /* var_dump($_SESSION["avatar"]);
    exit(); */
    return $_SESSION["user"];
  } else {
    return false;
  }

}

?>