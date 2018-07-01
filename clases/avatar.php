<?php
/**
  * 
  */
 class Avatar 
 {
	public $nombreViejo; 
	public $extension; 
	public $nombreNuevo; 
	public $archivoFinal; 
	public $nomDir; 
	public $nomAvatar; 
	public $archivoFinal; 


 	function __construct(argument)
 	{
 		$original = $_FILES["avatar"];
 		if($original["error"] === UPLOAD_ERR_OK) {
			$nombreViejo = $original["name"];
			$extension = pathinfo($nombreViejo, PATHINFO_EXTENSION);
			$nombreNuevo = $original["tmp_name"];
			$archivoFinal = dirname(__FILE__);
			$nomDir = "/avatar/";
			$nomAvatar =  uniqid() . "." . $extension;
			/*var_dump($nombreNuevo, $archivoFinal);exit;*/
			$archivoFinal .= $nomDir . $nomAvatar;
			move_uploaded_file($nombreNuevo, $archivoFinal);
		}
 		# code...
 	}

 	function getNombre(){
 		return $nomAvatar; 
 } 
?>