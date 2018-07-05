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
	public $locFinal;

 	function __construct()	{
 		$original = $_FILES["avatar"];
 		if($original["error"] === UPLOAD_ERR_OK) {
			$this->nombreViejo = $original["name"];
			$this->extension = pathinfo($this->nombreViejo, PATHINFO_EXTENSION);
			$this->nombreNuevo = $original["tmp_name"];
			$this->archivoFinal = realpath(dirname(__FILE__) . '/../');
			$this->nomDir = "/avatar/";
			$this->nomAvatar =  uniqid() . "." . $this->extension;
			$this->locFinal = $this->archivoFinal .$this->nomDir . $this->nomAvatar;
			$this->archivoFinal = $this->nomDir . $this->nomAvatar;
			var_dump($this->nombreNuevo, 'archivoFinal: ' . $this->archivoFinal);
			//exit;
			move_uploaded_file($this->nombreNuevo, $this->locFinal);
		}
 		# code...
 	}

 	function getNombre(){
 		return $this->$archivoFinal; 
 	}
 } 
?>