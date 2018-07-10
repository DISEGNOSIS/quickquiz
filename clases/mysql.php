<?php
class Mysql extends DB {
  // Genero variable $db privada pra manejarla dentro del objeto
  private $db;
  // Genero conexión. Falta poner nombre de la BD y fijarse si anda o no con pass = root
  public function __construct() {
    $dsn = "mysql:host=localhost;dbname=quickquiz_db;charset=utf8mb4";
    $usuario = "root";
    $password = "";
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
    
    $query->bindParam(":username", $user->getUsername());
    $query->bindParam(":email", $user->getEmail());
    $query->bindParam(":password", $user->getPassword());
    $query->bindParam(":avatar", $user->getAvatar());
    $query->execute();
  }
}
 ?>