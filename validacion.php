<?php
include_once ("autoload.php"); 

	abstract class Validacion {

    public static function validarDatos($datos){
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
      $datosValidos=!$hayError; 
      return $errores;
    }

    public static function validarLoginCompleto($datos){
//     echo "<br> validarLoginCompleto!";
//      var_dump($datos); 
      $errores = [];
      $hayError = false;
/*      echo "<br> CHAU???!";
      var_dump($hayError); */
      if ($datos["usuario"]=="") {
        $errores["usuario"]= "Por Favor ingresá tu usuario." ;
        $hayError = true; 
      }
      if ($datos["password"]=="") {
          $errores["password"]= "Por Favor ingresá tu contraseña.";
          $hayError = true; 
      }
      var_dump($errores); 
      return $errores;
    }

    public static function validarLoginOK(usuario $usuario){
        $errores = [];
        $userEncontrado=false;

        //OOP lo siguiente debe ir en json, pero todavía no se como hacerlo, lo dejo por acá por ahora... 
        $json= file_get_contents("usuarios.json");
        $array= json_decode($json,true);
        $array = $array["usuarios"];
//        echo "<br> en validarLoginOK <br>";
//        var_dump($array);


        for ($i=0; $i < count($array); $i++) {
          
          $user = json_decode($array[$i],true);
      
          if($usuario->getUsername()==$user["usuario"]){
//          var_dump($datos['usuario'],$user['usuario']);
/*          echo "<br> User encontrado, valido password"; 
     echo "<br> validarLoginOK password: <br>";
var_dump($user["password"]); 
         echo "<br> validarLoginOK getPassword: <br>";
var_dump($usuario->getPassword()); 
         echo "<br> validarLoginOK !PasswordVerify: <br>";
var_dump(!password_verify($usuario->getPassword(), $user["password"])); */
            if(!password_verify($usuario->getPassword(), $user["password"]) ){
//              echo "<br> password incorrecta"; 
//                    exit; 
              $errores["password"]= "Contraseña incorrecta, por favor volvé a ingresarla.";
              return $errores;
              break;

            } else {
//              echo "<br> password correcta"; 
//                      exit; 
            $userEncontrado=true;
              //OOP
              $usuario->setEmail($user["email"]);
              $usuario->setAvatar($user["avatar"]); 
              //OOP

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

  /*	public static function comprobarLogin(){  //que el user sea válido y que tenga la password correcta

  	}*/
  }
?>