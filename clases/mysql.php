<?php
class Mysql extends DB {
  // Genero variable $db privada pra manejarla dentro del objeto
  private $db;
  // Genero conexión. Falta poner nombre de la BD y fijarse si anda o no con pass = root
  public function __construct() {
    $dsn = "mysql:host=localhost;dbname=quickquiz_db;charset=utf8mb4";
    $usuario = "root";
    $password = "root";
    // Fijarse que en este caso, el constructor está seteando la variable $this->db para usar como base de datos.
    $this->db = new PDO($dsn, $usuario, $password);
  }
  // Llamo a la función que está en Mariela usa sin public y Sin (Usuario $username) usa ($username). Revisar setPassword y setEmail que Mariela no usó en el constructor de usuario.

    public function guardarUsuario(Usuario $user) {
    
	    // Query para enviar - Controlar nombre de la tabla que vamos a usar. Campos: respeto nombres en Json de Mariela
	    $sql = "INSERT INTO usuarios (username, email, password, avatar) VALUES (:username, :email, :password, :avatar)";
	    // Preparamos la query
	    $query = $this->db->prepare($sql);
	    // Bindeo según usuario.php de Mariela al 6/07
	    
	    $query->bindValue(":username", $user->getUsername());
	    $query->bindValue(":email", $user->getEmail());
	    $query->bindValue(":password", $user->getPassword());
	    $query->bindValue(":avatar", $user->getAvatar());
	    $query->execute();
  	}

	public function retornaUsuario(array $datos):Usuario {
	}

	public function esUsuarioValido(Usuario $user) {

        $userEncontrado=false;

	    // Query para enviar - Controlar nombre de la tabla que vamos a usar. Campos: respeto nombres en Json de Mariela
	    /* $sql = "SELECT * FROM usuarios WHERE username=:username";
	    // Preparamos la query
	    $query = $this->db->prepare($sql);
	    // Bindeo según usuario.php de Mariela al 6/07
	    $username =  $user->getUsername(); 
//var_dump($username); 
	    $query->bindParam(":username",$username);
	    $query->execute();
//var_dump($query); 

	    $row = $query->FetchAll(PDO::FETCH_ASSOC);  */

//var_dump($row); 
//exit; 
		$errores = [];
	   /*  if (!empty($row)) {
	    	foreach ($row as $key => $value) { */
/*	    		echo '<br>'; 
	    		foreach ($value as $clave => $valuor) {
	    			echo $clave. " = " . $value[$clave].'<br>';
		
	    		}
				exit; */
		        if(!password_verify($_POST['password'], $user->getPassword())){
//		              echo "<br> password incorrecta"; 
//		              exit; 
		              $errores["password"]= "Contraseña incorrecta, por favor volvé a ingresarla.";
		              return $errores;
			    } else {
						$userEncontrado=true;
//		              echo "<br> password CORRECTA!"; 
//		              exit; 
		              	/* $_SESSION["user"] = $user->getUsername();
						$_SESSION["avatar"] = $user->getAvatar(); */
			    }
	   /*  	}
		} */ 
	    if($userEncontrado==false) {
	        $errores["usuario"]= "Usuario incorrecto, por favor volvé a ingresarlo o registrate si aún no lo hiciste.";
	    }
	    return $errores; 
	}
/*
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

//var_dump($userEncontrado); 

        if($userEncontrado==false) {

          $errores["usuario"]= "Usuario incorrecto, por favor volvé a ingresarlo o registrate si aún no lo hiciste.";
        }
        return $errores; 

	}*/

	public function existeUsuarioR(Usuario $usuario) {
		$existeUsuario=[];
		$sql = "SELECT * FROM usuarios WHERE username = :username";
		$query = $this->db->prepare($sql);
		$query->bindValue(":username", $usuario->getUsername());
		$query->execute();
		$usuarioTraido = $query->fetch(PDO::FETCH_ASSOC);
		if($usuarioTraido != false) {
			foreach($usuarioTraido as $value){
				if($value==$usuario->getUsername()) {
					$existeUsuario["usuario"] = "Ya está registrado ese Usuario por favor elegí otro";
				}
				if($value==$usuario->getEmail()) {
					$existeUsuario["email"] = "Ya está registrado ese e-Mail por favor elegí otro";
				}
			}
		}
		return $existeUsuario;
	}

	public function existeUsuarioL() {
		$sql = "SELECT * FROM usuarios WHERE username = :username";
		$query = $this->db->prepare($sql);
		$query->bindValue(":username", $_POST["usuario"]);
		$query->execute();
		$usuario = $query->fetch(PDO::FETCH_ASSOC);
		return $usuario;
	}

	public function getConexion() {
		return $this->db;
	}
}
 ?>