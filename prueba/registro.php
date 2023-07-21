<?php 
	$con = mysqli_connect("localhost","root","","abc") or die("Error");

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<h1 align="center"><font size="7" color="#000000" face="Fantasy">Registrate llenando el formulario</font></h1>
 	<meta charset="utf-8">
 	<title></title>
 </head>
 <body>
 	<center>
 		<form method="POST" action="registro.php">
 			<label>Nombre:</label><br>
 			<input type="text" name="nombre" placeholder="Escribe tu nombre"><br>
  			<label>Contraseña:</label><br>
 			<input type="password" name="passw" placeholder="Escribe tu contraseña"><br>
  			<label>Correo:</label><br>
 			<input type="email" name="email" placeholder="Escribe tu correo"><br>
 			<input type="submit" name="insert" value="Registrar">
 		</form>
 	</center>

 	<?php
 		if(isset($_POST["insert"])){
 			$usuario = $_POST["nombre"];
 			$pass = $_POST["passw"];
 			$email = $_POST["email"];

 			$insertar = "INSERT INTO `usuarios` (`nombre`, `contraseña`, `correo`) VALUES ('$usuario', '$pass', '$email')";
 			$ejecutar = mysqli_query($con, $insertar);

 			if($ejecutar){
 				echo "Usuario insertado correctamente";
 			}
 		}
 	?>

 	<br>
 	<center>
 		<table width="500" border="2" style="background-color: #f9f9f9;">
 			<tr>
 				<th>Código</th>
 				<th>Usuario</th>
 				<th>Contraseña</th>
 				<th>Correo</th>
 				<th>Editar</th>
 				<th>Borrar</th>
 			</tr>
 	</center>
 	<?php
 		$consulta = "SELECT * FROM usuarios";
 		$ejecutar = mysqli_query($con, $consulta);

 		$i = 0;

 		while ($fila = mysqli_fetch_array($ejecutar)) {
 			$id = $fila['idUsuarios'];
 			$usuario = $fila['nombre'];
 			$password = $fila['contraseña'];
 			$email = $fila['correo'];

 			$i++;
 		?>

 		<tr align="center">
 			<td><?php echo $id; ?></td>
 			<td><?php echo $usuario; ?></td>
 			<td><?php echo $password; ?></td>
 			<td><?php echo $email; ?></td>
 			<td><a href="registro.php?editar=<?php echo $id; ?>">Editar</a></td>
 			<td><a href="registro.php?borrar=<?php echo $id; ?>">Borrar</a></td>
 		</tr>
 		<?php
 		}
 		?>
 		</table>

 		<?php 
 			if(isset($_GET['editar'])){
 				include("editar.php");
 			}
 		?>

 		<?php 
 			if(isset($_GET['borrar'])){
 				$borrar_id = $_GET['borrar'];
 				$borrar = "delete from usuarios where idUsuarios = '$borrar_id'";
 				$ejecutar = mysqli_query($con, $borrar);

 				if($ejecutar){
 				echo "Usuario eliminado correctamente";
 				//echo "//window.location.href = "registro.php";
 				}
 			}
 		?>
 	</center>

	 <a href="index.html">Regresar al indice</a>

 </body>
 </html>