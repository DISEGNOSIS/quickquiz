<?php
/**
 * clase session se encarga de login, verificar si esta logueado y logout 
 */
class Session 
{
	
	public function __construct(){
		session_start(); 
	}

	public function login($user, $password){
		$_SESSION["user"] = 
	}

	public function estaLogueado(){
		if(isset($_SESSION["user"]) && !empty($SESSION["user"])){ //si tiene guaradada el user en la session (es decir, se logueo)
			return true; 
		} 
	}

	public function logout(){
		session_destroy(); 
		foreach ($_COOKIE as $key => $value) {
			setcookie($key, '', -1); //para borrar todas las cookies al hacer logout
		}
	}
}
?>