<?php

	include_once("autoload.php");

	//$user = userLogueado(); cambiado por la funcion de session.php
	$session = new session(); 
	if ($session->estalogueado()) {
		header("Location: index.php");

	} else {
		$php2="ingreso.php";
		$php3="registro.php";
		$etiqueta2= "Ingresá";
		$etiqueta3= "Registrate";

/*corregido porque no estaba ok. Si está logueado va a index, sino, se queda en registro con los botones de ingreso y regsitro
		$php2="bienvenida.php";
		$php3="salida.php";
		$etiqueta2= $user;
		$etiqueta3= "Salí";						
*/
	}

	if($_POST) {
	//AVATAR CORREGIR - temporalmente deshabilitado para ver funcionamiento ok. 	$avatar = New Avatar(); 

	/*pasado a clase avatar... 

	$original = $_FILES["avatar"];

	if($original["error"] === UPLOAD_ERR_OK) {
		$nombreViejo = $original["name"];
		$extension = pathinfo($nombreViejo, PATHINFO_EXTENSION);
		$nombreNuevo = $original["tmp_name"];
		$archivoFinal = dirname(__FILE__);
		$nomDir = "/avatar/";
		$nomAvatar =  uniqid() . "." . $extension;
		$archivoFinal .= $nomDir . $nomAvatar;
		move_uploaded_file($nombreNuevo, $archivoFinal);
	}
	*/
	//AVATAR CORREGIR - temporalmente deshabilitado para ver funcionamiento ok.	$_POST["avatar"] = $avatar->getNombre(); //= $nomAvatar; 
		$_POST["avatar"] = "avatar"; 

	//cambiado por nueva funcion en avatar.
	/*var_dump($_POST);*/

	}

	if($_POST) {
		//OOP 	$errores = validarDatos($_POST);
		//OOP 	if(empty($errores)){
		$errores=Validacion::validarDatos($_POST); 
		if(empty($errores)){
			$usuario = New Usuario($_POST['usuario'], $_POST['email_confirm'], '', $_POST['avatar']);
			$usuario->setPassword($_POST['password']); 
			$json = New Json; //AGREGADO PARA MANEJO CON jSON

//	echo "<br> usuario en registro php: <br>"; 
//	var_dump($usuario);
			$json->guardarUsuario($usuario); // antes solo guardarUsuario($usuario); 
			$session->login($usuario); //agregado para OOP
			//$_SESSION["user"] = $_POST["usuario"]; eliminado para OOP
          	//$_SESSION["avatar"] = $_POST["avatar"]; eliminado para OOP
			//echo "<script>location.href='inscripto.php';</script>";
			header("Location: bienvenida.php");
			
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
					 ?>" required>
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
					 ?>" required>
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
					 ?>" required>
 				</div>
 				<div class="error">
 					<span  class='error'><?php echo isset($errores["email_confirm"])? $errores["email_confirm"]:"";?> </span>
 				</div>
 				
 				<div class="campo">
 					<label for="password">Contraseña*: </label>
					<input type="password" name="password" value="" required>
	  			</div>
 				<div  class="error" style='clear:both'><?php echo isset($errores["password"])? $errores["password"]:"";?> </div>
 				
 				<div class="campo">
 					<label for="password-confirm">Confirmá tu Contraseña*: </label>
					<input type="password" name="password-confirm" value="" required>
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