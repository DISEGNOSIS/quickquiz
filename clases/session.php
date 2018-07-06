<?php
/**
 * clase session se encarga de login, verificar si esta logueado y logout 
 */
class Session 
{
	public $usuario;  
	
	public function __construct(){
		session_start();
	}

	public function login(Usuario $usuario){
		echo "<br> LOGIN <br>"; 
		$_SESSION["user"] = $usuario->getUserName();
		$this->usuario = $usuario->getUserName();
		echo "<br> usuario <br>";
//var_dump($usuario); 
		$_SESSION["avatar"] = $usuario->getAvatar(); 
//echo "<br> LOGUEADO.., supuestamente con session <br>";
//	var_dump($_SESSION); 
	}

	public function estaLogueado(){
//echo "<br> ESTA LOGUEADO <br>";
//	var_dump($_SESSION); 
/*echo "<br> isset user: <br>";
var_dump(isset($_SESSION["user"])); 
echo "<br> not empty <br>";
var_dump(!empty($_SESSION["user"])); */

		if(isset($_SESSION["user"]) && !empty($_SESSION["user"])){ //si tiene guaradada el user en la session (es decir, se logueo)
//echo "<br> SI! está logueado <br>";
			$this->usuario = $_SESSION["user"];
			return true; 
		} 
	}

	public function logout(){
//echo "<br> LOGOUT antes de destroy <br>";

		session_destroy(); 
//echo "<br> LOGOUT despues de destroy <br>";
//	var_dump($_SESSION); 
//exit; 
		foreach ($_COOKIE as $key => $value) {
			//setcookie($key, '', -1); //para borrar todas las cookies al hacer logout
			setcookie("userQQ", "", time()-1);
			setcookie("avatar", "", time()-1);
		}
	}
}
?>