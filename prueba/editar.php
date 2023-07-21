<?php
	if(isset($_GET['editar'])){
		$editar_id = $_GET['editar'];
		$consulta = "select * from usuarios where 'idUsuarios' = '$editar_id'";

		$ejecutar = mysqli_query($con, $consulta);

		$fila = mysqli_fetch_array($ejecutar);
		if(isset($fila['nombre']) && isset($fila['contraseña']) && isset($fila['correo'])){
			$usuario = $fila['nombre'];
			$password = $fila['contraseña'];
			$email = $fila['correo'];

		}
	}
?>
<br>
<form method="POST" action="">
	<input type = "text" name="nombre" value="<?php echo $usuario; ?>"><br>
	<input type = "password" name="passw" value="<?php echo $password; ?>"><br>
	<input type = "email" name="email" value="<?php echo $email; ?>"><br>
	<input type = "submit" name="actualizar" value="Actualizar Datos">
</form>

<?php
	if(isset($_POST['actualizar'])){
		$act_nombre = $_POST['nombre'];
		$act_password = $_POST['passw'];
		$act_email = $_POST['email'];

		$actualizar = "update usuarios set nombre = '$act_nombre', contraseña='$act_password', correo='$act_email' where idUsuarios = '$editar_id'";
		$ejecutar = mysqli_query($con, $actualizar);

		if ($ejecutar) {
			echo "Se actualizaron los datos";
			echo "<script>windows.open('registro.php')</script>";
		}
	}
?>