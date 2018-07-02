<?php
/**
  * 
  */
 class Avatar 
 {
	public $nombreViejo; 
	public $extension; 
	public $nombreNuevo; 
	public $nomDir; 
	public $nomAvatar; 
	public $archivoFinal; 


 	function __construct()	{
 		$original = $_FILES["avatar"];
 		if($original["error"] === UPLOAD_ERR_OK) {
			$this->$nombreViejo = $original["name"];
			$this->$extension = pathinfo($nombreViejo, PATHINFO_EXTENSION);
			$this->$nombreNuevo = $original["tmp_name"];
			$this->$archivoFinal = dirname(__FILE__);
			$this->$nomDir = "/avatar/";
			$this->$nomAvatar =  uniqid() . "." . $extension;
			/*var_dump($nombreNuevo, $archivoFinal);exit;*/
			$this->$archivoFinal = $nomDir . $nomAvatar;
			move_uploaded_file($this->$nombreNuevo, $this->$archivoFinal);
		}
 		# code...
 	}

 	function getNombre(){
 		return $this->$nomAvatar; 
 	}
 } 
?>