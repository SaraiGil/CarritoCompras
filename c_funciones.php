<?php
function conectar() {
	// Configurar parámetros de la base de datos
	$servidor = "localhost";
	$usuario  = "root";
	$password = "";
	$bd       = "maid_cleaning_service";

	return new mysqli( $servidor, $usuario, $password, $bd );
}

function desconectar() {
	global $mysqli;
	$mysqli->close();
}

function permiso( $usuario, $password ) {
	global $mysqli;
	//$passHash =password_hash($password, PASSWORD_BCRYPT);
	# Busqueda de usuario en la BD
		$busquedaUser = "SELECT * FROM usuario
						 WHERE nickuser = '$usuario';";
		$resultado = $mysqli->query($busquedaUser) or die($mysqli->error);
		$datos = $resultado->fetch_assoc();
		$passwSearch = $datos["pass_us"];
		# En caso de encontrar al usuario
		if (password_verify($password, $passwSearch)) {
			# Búsqueda de datos usuario que inica sesión
			$datosUser = "SELECT id_us, nickuser FROM usuario
						  WHERE nickuser = '{$usuario}';";
			$resultado = $mysqli->query($datosUser)or die($mysqli->error);
			$datos = $resultado->fetch_assoc();
			echo "<script>alert('{$datos["nickuser"]}')</script>";
			return $datos["nickuser"];
			
		}
		else {
			echo "<script>alert('Contraseña inválida')</script>";
			return "0";

		}

}

function existe_sesion( $us, $ses ) {
	global $mysqli;

	$sql = "SELECT * FROM sesiones WHERE nickus = '$us' AND ses = '$ses';";
	//echo $sql;
	//print_r();
	$rs = $mysqli->query( $sql );
	//echo $rs;
	$sihay=$rs->num_rows;
	//echo "Cantidad: ".$sihay;
	if ( $sihay == 0 ) {
		return false;
	} else {
		//$row = $rs->fetch_assoc();
		return true;
	}
	//return $rs->num_rows == 1;
}


?>