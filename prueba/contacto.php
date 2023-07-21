<?php 
	$con = mysqli_connect("localhost","root","","abc") or die("Error");

 ?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Contacto</title>
    <meta charset="utf-8">
</head>

<body>
	<img src="vs.jpg" height="100px" width="800x">
	<h1><b>Contacto</b></h1>
	<h2>Miembros del equipo:
    </h2>
    <h3>
        <ol>
            <li>Ezequiel Torres Morales</li>
            <li>Yasmin Lisbeth Muñoz Martínez</li>
            <li>Luz Elisabet Sánchez Campos</li>
            <li>Marco Antonio Amorós Hermida</li>
            <li>Rodríguez Prianti Fernando</li>
        </ol>
    </h3>
    <br>

    <div id="after_submit"></div>
<form id="contact_form" action="contacto.php" method="POST">
  <div class="row">
    <label>Nombre:</label><br />
    <input id="name" name="name" type="text" size="30" /><br />
  </div>
  <div class="row">
    <label>Email:</label><br />
    <input id="email" name="email" type="email" size="30" /><br />
  </div>
  <div class="row">
    <label>Tu mensaje:</label><br />
    <textarea id="message" name="message" rows="7" cols="30"></textarea><br />
  </div>
    
    <input id="submit_button" type="submit" name="insert" />
</form>

<br>

<?php
 		if(isset($_POST["insert"])){
 			$nombre = $_POST["name"];
 			$email = $_POST["email"];
 			$mensaje = $_POST["message"];

 			$insertar = "INSERT INTO `contacto` (`Nombre`, `Email`, `Mensaje`) VALUES ('$nombre', '$email', '$mensaje')";
 			$ejecutar = mysqli_query($con, $insertar);

 			if($ejecutar){
 				echo "Mensaje enviado correctamente";
 			}else{
        echo "error";
      }
 		}
 	?>

<br>

    <a href="index.html">Regresar al indice</a>
</body>

</html>
