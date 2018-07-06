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
}

/**
 
class Json extends DB
{
	
	function guardarUsuario($usuario){
		echo "<br> en clase Json INICIO<br>";
		var_dump($usuario); 
		 json_encode($array, JSON_FORCE_OBJECT);
	  $user= json_encode($usuario);
	  $json= file_get_contents("usuarios.json");
	  $array= json_decode($json,true);
	  $array["usuarios"][]= $user;
		echo "<br> en clase Json array antes de encode<br>";
		var_dump($array); 
	  $array= json_encode($array);
		echo "<br> en clase Json array despues de encode<br>";
		var_dump($array); 
	  file_put_contents("usuarios.json",$array);
	  	echo "<br> en clase Json file_put_contents DONE!<br>";
		
	}


}
*/
?>