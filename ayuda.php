<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>QuickQuiz - Ayuda.</title>
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
			<li><a href="jugar.php">Jugá</a></li>
			 <li><a href="ingreso.php">Ingresá</a></li>
			 <li><a href="registro.php">Registrate</a></li>
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
			 <li class="activo"><a href="ayuda.php">Ayuda</a></li>
		 </ul>
	 </nav>
	</header>
 <main>
 	<section>
		<article>
			<h1 class="ayuda">Ayuda</h1>
			<h4>¿Cómo juego?</h4>
			<p>Para participar de los juegos, pedí el código de juego a quien te invitó a participar e ingresalo <a href="jugar.php">acá</a>. Si querés crear un nuevo juego, deberás <a href="registro.php">registrarte acá</a>.</p>
			<h4>¿Tengo que registrarme para jugar?</h4>
			<p>No es necesario que te registres. Podés jugar ingresando como invitad@.</p>
			<h4>¿Qué beneficios tengo por registrarme?</h4>
			<p>Si te registrás, podés crear juegos de preguntas y respuestas e invitar a quien quieras a participar. Este juego queda guardado y podés utilizarlo con distintos grupos de alumnos o participantes.</p>
			<h4>¿Cómo me registro?</h4>
			<p><a href="registro.php">Ingresá a la página de registro</a> y completa sólo unos datos mínimos.</p>
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