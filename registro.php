<?php

	include_once("functions.php");

	$user = userLogueado();
	if($user){
		header("Location: index.php");

	} else {
		$php2="bienvenida.php";
		$php3="salida.php";
		$etiqueta2= $user;
		$etiqueta3= "Salí";						
	}

	if($_POST) {

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
	$_POST["avatar"] = $nomAvatar;
	/*var_dump($_POST);*/
	}

	if($_POST) {
		$errores = validarDatos($_POST);
		if(empty($errores)){
			$usuario = crearUsuario($_POST);
			//var_dump($usuario);
			guardarUsuario($usuario);
			//session_start();
			$_SESSION["user"] = $_POST["usuario"];
          	$_SESSION["avatar"] = $_POST["avatar"];
			header("Location: inscripto.php");
			//echo "<script>location.href='inscripto.php';</script>";
			//exit;
		}
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>QuickQuiz - Registrate.</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="fonts/css/fontawesome-all.css">
	<link href="https://fonts.googleapis.com/css?family=Parisienne|Rambla" rel="stylesheet"> 
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
			 <li><a href="ingreso.php">INGRESÁ</a></li>
			 <li class="activo"><a href="registro.php">REGISTRATE</a></li>
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
 		<h1 class="registro">Registrate:</h1>
		<article class="formulario">
			<form method="post" id="registro" enctype="multipart/form-data">

 				<div class="campo">
 					<label for="usuario">Usuario*: </label>
					<input type="text" name="usuario" value= "<?php
					 if ($_POST && $_POST["usuario"] !== "") {
					 	echo $_POST["usuario"];
					 }else echo "";
					 ?>">
				</div>
				<div class="error">
					<span ><?php echo isset($errores["usuario"])? $errores["usuario"]: "";?> </span>
                </div>
 				
 				<div class="campo">
 					<label for="email">e-Mail*: </label>
					<input type="email" name="email" value="<?php
					 if ($_POST && $_POST["email"] !== "") {
					 	echo $_POST["email"];
					 }else echo "";
					 ?>">
				</div>
 				<div class="error">
 					<span  class='error'><?php echo isset($errores["email"])? $errores["email"]:"";?> </span>
 				</div>
 				
 				<div class="campo">
 					<label for="email_confirm">Confirmá tu e-Mail*: </label>
					<input type="email" name="email_confirm" value="<?php
					 if ($_POST && $_POST["email_confirm"] !== "") {
					 	echo $_POST["email_confirm"];
					 }else echo "";
					 ?>">
 				</div>
 				<div class="error">
 					<span  class='error'><?php echo isset($errores["email_confirm"])? $errores["email_confirm"]:"";?> </span>
 				</div>
 				
 				<div class="campo">
 					<label for="password">Contraseña*: </label>
					<input type="password" name="password" value="">
	  			</div>
 				<div  class="error" style='clear:both'><?php echo isset($errores["password"])? $errores["password"]:"";?> </div>
 				
 				<div class="campo">
 					<label for="password-confirm">Confirmá tu Contraseña*: </label>
					<input type="password" name="password-confirm" value="">
				</div>
 				<div  class="error" style='clear:both'><?php echo isset($errores["password-confirm"])? $errores["password-confirm"]:"";?> </div>

 				<div class="campo">
 					<label for="avatar">Elegí tu avatar: </label>
					<input type="file" name="avatar" value="">
 				</div>

				<div class="campo">
					<button type="submit" form="registro" value="registrarme">Registrarme</button>
				</div>
 			</form>
 			<div class="campo">
				<p><em>*&nbsp; Campos requeridos.</em></p>
			</div>

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