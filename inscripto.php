<?php
	include_once("autoload.php"); //OOP
	//	require("functions.php"); //PARA QUE LLAME A LAS FUNCIONES CREADAS

	//$user = userLogueado(); 
	if(!estaLogueado()){
		header("Location: ingreso.php");
		$php2="ingreso.php";
		$php3="registro.php";
		$etiqueta2="Ingresá";
		$etiqueta3="Registrate";
	} else {
		$php2="bienvenida.php";
		$php3="salida.php";
		$etiqueta2= $user;
		$etiqueta3= "Salí";	 
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>QuickQuiz - Juegos para el aprendizaje.</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="fonts/css/fontawesome-all.css">
	<link href="https://fonts.googleapis.com/css?family=Parisienne|Rambla" rel="stylesheet"> 
	<link rel="icon" href="img/favicon.png" type="image/x-icon">
<!--agrego un font de prueba-Mariela-->
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
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
			 <li><a href="<?php echo $php2?>"><?php echo $etiqueta2?></a></li>
			 <li><a href="<?php echo $php3?>"><?php echo $etiqueta3?></a></li>
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
		 	<li class="activo"><a href="index.php">Inicio</a></li>
			 <li><a href="como-jugar.php">¿Cómo se juega?</a></li>
			 <li><a href="reglas.php">Reglas</li>
			 <li><a href="ayuda.php">Ayuda</a></li>
		 </ul>
	 </nav>
	</header>
 <main>
 	<section>
		<article>
				<h1 class="principal">¡Bienvenido!</h1>
				<div class="contenido">
				<p>Gracias por registrarte en <strong>QuickQuiz</strong>. <br>Ya podés comenzar a jugar y/o preparar tus juegos de preguntas y respuestas.<br> ¡No olvides consultar nuestra página de <a href="ayuda.php">AYUDA</a>! </p>
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