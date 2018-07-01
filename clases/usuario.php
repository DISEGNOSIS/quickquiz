<?php
include_once ("autoload.php"); 

	class Usuario {
		private $username; 
		private $email; 
		private $password; 
		private $avatar; 
	}

	public function __construct($username, $email, $password, $avatar){
		this->username = $username; 
		this->email = $email; 
		this->password = $password; 
		this->avatar = $avatar; 
	}

	public function hashPassword($password){
		this->password = password_hash($password, PASSWORD_DEFAULT);  
	}

	//geters y seters

	public function getUsername(){
		return this->username; 
	}
	public function getEmail(){
		return this->email; 
	}
	public function getPassword(){
		return this->password; 
	}
	public function getAvatar(){
		return this->avatar; 
	}

	public function setUsername($username){
		this->username = $username; 
	}
	public function setEmail($email){
		this->email = $email; 
	}
	public function setPassword($password){
		this->hashPassword($password); 
	}
	public function setAvatar($avatar){
		this->avatar = $avatar; 
	}
?>