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
			<li><a href="jugar.php">Jugá</a></li>
			 <li><a href="ingreso.php">Ingresá</a></li>
			 <li class="activo"><a href="registro.php">Registrate</a></li>
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
			<form action="" method="post" id="registro">
 				<div class="campo">
 					<label for="usuario">Usuario: </label>
					<input type="text" name="usuario" value="">
 				</div>
 				<div class="campo">
 					<label for="email">e-Mail: </label>
					<input type="email" name="email" value="">
 				</div>
 				<div class="campo">
 					<label for="email-confirm">Confirmar e-Mail: </label>
					<input type="email" name="email-confirm" value="">
 				</div>
 				<div class="campo">
 					<label for="password">Contraseña: </label>
					<input type="password" name="password" value="">
 				</div>
 				<div class="campo">
 					<label for="password-confirm">Confirmar Contraseña: </label>
					<input type="password" name="password-confirm" value="">
 				</div>
				<div class="campo">
					<button type="submit" form="registro" value="registrarme">Registrarme</button>
				</div>
 			</form>
 			<div class="campo">
				<p><em>*&nbsp; Todos los campos son requeridos.</em></p>
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