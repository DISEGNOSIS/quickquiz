<?php
	include_once("autoload.php");
	//OOP	require("functions.php"); //PARA QUE LLAME A LAS FUNCIONES CREADAS

	//OOP	$user = userLogueado(); 
	//OOPif($user){
	if(estaLogueado()){
		header("Location: index.php");
	} else {
		$php2="bienvenida.php";
		$php3="salida.php";
		$etiqueta2= $user;
		$etiqueta3= "Salí";							
	}
	
	if(!isset($_COOKIE["userQQ"])){
		$usuario = "";
		$password = "";		
		$recordar = "";
	}

    //OOP 	$loginInvalido = false; //revisar si se puede sacar! debería poderse... 

	if($_POST) {
//echo "<br> entra al post";
//		var_dump($_POST); 
		//OOP		$usuario = $_POST['usuario'];
		//OOP 		$password = $_POST['password'];
		$usuario = New Usuario($_POST['usuario'], $_POST['email'], $_POST['password'], $_POST['avatar']); 
	    //OOP 	$loginInvalido = validarLoginCompleto($_POST);

	    //OOP 	if(empty($loginInvalido)) {
		if (Validacion::validarLoginCompleto)
		    /*echo "login completo";*/
	    	$loginInvalido = validarLoginOK($_POST);
    	/*echo "<br> antes de validar login";
			var_dump($loginInvalido);*/

			if (empty($loginInvalido)) {
			/*echo "<br> DESPUES de validar login";*/
				//session_start(); 
				if(isset($_POST['recordarme'])) {
					$cookie_name = "userQQ"; 
					$cookie_value = $usuario;
					setcookie($cookie_name, $cookie_value, time()+2592000);
					setcookie("avatar", $_SESSION["avatar"], time()+2592000);
				}
				header('Location: bienvenida.php');
			}
		}

	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>QuickQuiz - Ingresá a tu cuenta.</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="fonts/css/fontawesome-all.css">
	<link href="https://fonts.googleapis.com/css?family=Parisienne|Rambla|Indie+Flower" rel="stylesheet">
	<link rel="icon" href="img/favicon.png" type="image/x-icon">
  <!--[if lt IE 9]>
  	<script src="js/html5shiv.js"></script>
	<![endif]-->
</head>
<body>
 <header>
 	<div class="fila">
		<div id="logo">
			<a href="index.php">
				<img src="img/logo.png" alt="QuickQuiz" class="logo">
			</a>
		</div>
		<nav class="top">
			<ul>
			<li><a href="jugar.php">JUGÁ</a></li>
			 <li class="activo"><a href="ingreso.php">INGRESÁ</a></li>
			 <li><a href="registro.php">REGISTRATE</a></li>
			</ul>
		</nav>
	 </div>
	 <a href="#" class="toggle-nav">
		 <span class="ion-navicon-round">
			 <img src="img/nav-icon.png" alt="Menú"/>
		 </span>
	 </a>
	 <nav class="main-nav">
		 <ul>
		 	<li><a href="index.php">Inicio</a></li>
			 <li><a href="como-jugar.php">¿Cómo se juega?</a></li>
			 <li><a href="reglas.php">Reglas</li>
			 <li><a href="ayuda.php">Ayuda</a></li>
		 </ul>
	 </nav>
	</header>
 <main>
 	<section>
 		<h1 class="ingreso">Ingresá a tu cuenta:</h1>
		<article class="formulario">
			<form action="" method="post" id="ingreso">
 				<div class="campo">
 					<label for="usuario">Usuario: </label>
					<input type="text" name="usuario" value="<?=$usuario?>" required>
 				</div>
 				<div class="error">
					<span ><?php echo isset($loginInvalido["usuario"])? $loginInvalido["usuario"]:"";?> </span>
                </div>
 
				<div class="campo">
 					<label for="password">Contraseña: </label>
					<input type="password" name="password" value="<?=$password?>" required>
				</div>				
 				<div class="error">
					<span ><?php echo isset($loginInvalido["password"])? $loginInvalido["password"]:"";?> </span>
                </div>

 				<div class="campo1">
 					<div class="checkbox">
 						<input type="checkbox" name="recordarme" value="recordar" <?=$recordar ?>>Recordarme
 					</div>
 					<a href="#">Olvidé mi Contraseña</a>
				</div>
				<div class="campo">
					<button type="submit" form="ingreso" value="ingresar">Ingresar</button>
				</div>
 			</form>
 		</article>
 	</section>
 </main>
 <footer>
	<div class="sociales">
	<div class="facebook"><a href="#"><i class="fab fa-facebook-f"></i></a></div>
	<div class="twitter"><a href="#"><i class="fab fa-twitter"></i></a></div>
	<div class="instagram"><a href="#"><i class="fab fa-instagram"></i></a></div>
	</div>
	<div class="fecha">
		<time><?php
			$dias=array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
			$meses=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ; 
		?></time>
	</div>
 </footer>
</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/menu.js"></script>
</html>