<?php
include_once( "c_funciones.php" );
include_once( "carrito.php");
extract( $_REQUEST );
// Recibimos $u y $p del formulario

$mysqli = conectar();
$tipo = permiso( $u, $p );
//echo "HOLA SI ENTRAMOS\n";
# Habilitar variables de sesión
//session_start();

echo $tipo;


if ( $tipo == "0" ) {
	header( "location:c_login.php?iderror=1" );

} else {

	switch( $cve_suc ){
		case "Corregidora":
			$_SESSION['sucursal'] = "s_01";
		break;
		case "Guadalajara":
			$_SESSION['sucursal'] = "s_02";
		break;
		case "Ciudad de México":
			$_SESSION['sucursal'] = "s_03";
		break;
	}


	//srand( (double)microtime() * 1000000 );
	//$sesion = md5( uniqid( rand() ) );
	$sesion= session_id();

	# Creación de variables de sesión
	$_SESSION['user'] = $tipo;
	$_SESSION['ses'] = $sesion;

	$del = "DELETE FROM sesiones 
			WHERE nickus = '$u'";
	$mysqli->query( $del );



	$datosUs = "SELECT id_us, nickuser FROM usuario
						  WHERE nickuser = '{$tipo}';";
	$resultado = $mysqli->query($datosUs)or die($mysqli->error);

	if( $resultado->num_rows > 0 ){
		$dat = $resultado->fetch_assoc();
		$usEnc=$dat["nickuser"];
		echo "<script>alert('Si hay un usuario: $usEnc')</script>";
		$idAcceso = $dat["id_us"];
		
		// Inserta sesión
		$sql = "INSERT INTO sesiones (user, ses,nickus) VALUES (
					$idAcceso,
					'$sesion',
					'$tipo'
				)";
		//echo $sql;
		$nvaSesion= $mysqli->query( $sql )or die($mysqli->error);

		$us_ses=$_SESSION['user'];
		$ses=$_SESSION['ses'];

		if( $tipo == 'admin'){
			echo "<script>alert('ERES ADMINISTRADOR :)')</script>";
			header( "location:menu_admin.php?u=$us_ses&s=$ses" );
		}
		else{
			// Envía a página HOME
			echo "<script>alert('NO ERES ADMINISTRADOR :)')</script>";
			header( "location:index.php?u=$us_ses&s=$ses");
		}
	}
	else{
		$mysqli->error;
		echo "<script>alert('Algo pasó')</script>";
	}

	
	
	
}
?>