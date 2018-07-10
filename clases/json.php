<?php
// require_once 'db.php';

// Creamos la clase JSON
class Json extends DB {
	// Como vamos a trabajar siempre con el mismo archivo, creamos una variable con el nombre y nos referimos al mismo utilizando la constante
	const ARCHIVO = "usuarios.json";

	// Función para guardar usuarios con typehinting para obligar a recibir un objeto del tipo usuario
	public function guardarUsuario(Usuario $usuario) {
/*		echo "<pre>";
		$array_usuario = (array) $usuario;
		var_dump($array_usuario); 
		exit; 
*/		// Generamos un array en el cual guardamos las diferentes propiedades de nuestro usuario
		$usuarioFinal = [];
		$usuarioFinal["usuario"] = $usuario->getUserName();
		$usuarioFinal["email"] = $usuario->getEmail();
		$usuarioFinal["password"] = $usuario->getPassword();
		$usuarioFinal["avatar"] = $usuario->getAvatar();
		echo "<br> en clase Json genere Usuario Final<br>";
		// Guardamos el usuario en nuestro archivo JSON, usando la constante ARCHIVO (usando la palabra self para referirse al objeto, de la misma forma que usabamos $this) como nombre del archivo. Le agregamos PHP_EOL al json_encode() para que se inserte un salto de linea.
	  $user= json_encode($usuarioFinal);
	  $json= file_get_contents("usuarios.json");
	  $array= json_decode($json,true);
	  $array["usuarios"][]= $user;
		echo "<br> en clase Json array guarde en array <br>";
	  $array= json_encode($array);
	  file_put_contents("usuarios.json",$array);
//	file_put_contents(self::ARCHIVO, json_encode($usuarioFinal) . PHP_EOL, FILE_APPEND);
//	exit; 
	}

	public function esUsuarioValido(Usuario $usuario) {

        $json= file_get_contents("usuarios.json");
        $array= json_decode($json,true);
        $array = $array["usuarios"];

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
//como no devuelcvo user no tiene sentido guardarlo              $usuario->setEmail($user["email"]);
//como no devuelcvo user no tiene sentido guardarlo              $usuario->setAvatar($user["avatar"]); 
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

	public function retornaUsuario(array $datos):Usuario {


	}
}
?>