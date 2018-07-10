<?php    
    class Migracion {

        public function crearDB() {
            try {
                $dsn = "mysql:host=localhost";
                $user = "root";
                $pass = "root";
                $db = new PDO($dsn, $user, $pass);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "CREATE DATABASE IF NOT EXISTS quickquiz_db";
                $db->exec($sql);
                return "Base de Datos creada con éxito.";
            } catch(PDOException $e) {
                return "Error al crear la Base de Datos:<br>" . $e->getMessage();
            }
        }

        public function crearTablaUsuarios($db) {
            $sql="CREATE TABLE IF NOT EXISTS usuarios (
                id INT(6) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
                username VARCHAR(255) UNIQUE NOT NULL,
                email VARCHAR(255) UNIQUE NOT NULL,
                password VARCHAR(255) NOT NULL,
                avatar VARCHAR(255) NOT NULL
            )";
            $query = $db->getConexion()->query($sql);
            if($query) {
                return "Tabla Usuarios creada con éxito.";
            } else {
                return "Error al crear la tabla Usuarios: " . $db->error;
            }
        }

        public function jsonToMysql($db) {
            $usuariosJSON=file_get_contents("usuarios.json");
            $usuarios=json_decode($usuariosJSON,true);
            $usuarios=$usuarios["usuarios"];
            $usuariosArray=[];
            $i=0;
            foreach($usuarios as $usuario) {
                $usuariosArray[]=json_decode($usuario,true);
                $nuevoUsuario = new Usuario($usuariosArray[$i]["username"], $usuariosArray[$i]["email"], $usuariosArray[$i]["password"], $usuariosArray[$i]["avatar"]);
                $existeUsuario = $db->existeUsuarioR($nuevoUsuario);
                if(empty($existeUsuario)) {
                    $db->guardarUsuario($nuevoUsuario);
                }
                $i++;
            }
            return "Ha finalizado la migración de Usuarios de JSON a MySQL.";
        }
    }    
?>