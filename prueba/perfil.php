<?php
session_start();
$con = mysqli_connect("localhost","root","","abc") or die("Error");
$consultaN = "SELECT nombre from usuarios where correo='" . $_SESSION['correo'] . "'";
$EjecutarConsultaNombre = mysqli_query($con, $consultaN);
$nombre=mysqli_fetch_array($EjecutarConsultaNombre);

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - CSS Profile Card</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.8/css/all.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'><link rel="stylesheet" href="./style2.css">

</head>
<body>

<!-- partial:index.partial.html -->
<input id="slider" class="customSlider" type="checkbox">
<label for="slider"></label>

<div class="wrapper">

	
	<div class="profile">
		<h3 class="name"><?php  echo "Bienvenid@ <br>". $nombre['nombre']; ?></h3>
		<p class="title"><?php  echo$_SESSION['correo']; ?></p>
		<p class="description">:)</p>
	</div>
	
	<a href="index.html">Regresar al indice</a>
</div>


<!-- partial -->
  <script src='https://code.jquery.com/jquery-3.3.1.slim.js'></script>
</body>
</html>
