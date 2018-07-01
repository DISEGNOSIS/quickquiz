<?php

	//require("functions.php"); cambiado por autoload//PARA QUE LLAME A LAS FUNCIONES CREADAS 
	include_once("autoload.php");

	//$user = userLogueado(); cambiado por la funcion de session.php
	$session = new session(); 
	if (!$session->estalogueado()) {
		$php2="ingreso.php";
		$php3="registro.php";
		$etiqueta2= "Ingresá";
		$etiqueta3= "Registrate";
	}else{
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
	<link href="https://fonts.googleapis.com/css?family=Parisienne|Rambla|Indie+Flower" rel="stylesheet">
	<link rel="icon" href="img/favicon.png" type="image/x-icon">
<!--agrego un font de prueba-Mariela
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet"> -->
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
			<h1 class="principal">Juegos para el Aprendizaje</h1>
			<p><strong>QuickQuiz</strong> es una plataforma para realizar juegos, actividades o desafíos de preguntas y respuestas.</p>
			<p>Es ideal para maestros, pero también pueden utilizarla todos aquellos que quieran enseñar emplear un método práctico y divertido para fijar conocimientos.<br>Asimismo constituye una herramienta de esparcimiento para cualquier edad y con objetivos diversos.</p>
			</article>
			<article>
			<div class="izq">
				<img src="img/quickquiz-juego-aprender-online.jpg" alt="QuickQuiz juego para aprender online">
			</div>
			<h2>¿Cómo funciona?</h2>
			<h3>CREAR:</h3>
			<p>Creá en minutos un juego divertido para el aprendizaje, generando preguntas con respuestas de opciones múltiples.</p>
			<p>El formato y el número de las preguntas dependerá de vos. También podés agregar imágenes, videos y diagramas como forma de respuesta.</p>
			<h3>JUGAR:</h3>
			<p>Participá de juegos en grupo, respondiendo a preguntas en tu propio dispositivo.</p>
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