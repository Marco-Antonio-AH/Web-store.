<?php
$usuario = $_POST['nnombre'];
$pass = $_POST['npassword'];
if(empty($usuario) || empty($pass)){
header("Location: index.html");
exit();
}
$con = mysqli_connect("localhost","root","","abc") or die("Error");
$consulta = "SELECT * from usuarios where correo='" . $usuario . "'";
$result = mysqli_query($con, $consulta);
if($row = mysqli_fetch_array($result)){
if($row['contraseña'] == $pass){
session_start();
$_SESSION['correo'] = $usuario;
header("Location: perfil.php");
}else{
header("Location: index.html");
exit();
}
}else{
header("Location: index.html");
exit();
}
?>