<?php
include_once( "nomanches_funciones.php" );
include_once( "carrito.php");
extract( $_REQUEST );
// Recibimos $u y $p del formulario

$mysqli = conectar();
$tipo = permiso( $u, $p );
//echo "HOLA SI ENTRAMOS\n";
echo $tipo;


if ( $tipo == "0" ) {
	header( "location:nomanches_login.php?iderror=1" );

} else {

	switch( $sucursal ){
		case "Querétaro":
			$_SESSION['sucursal'] = "s_01";
		break;
		case "Monterrey":
			$_SESSION['sucursal'] = "s_02";
		break;
		case "Ciudad de México":
			$_SESSION['sucursal'] = "s_03";
		break;
	}
	# Habilitar variables de sesión
	session_start();


	srand( (double)microtime() * 1000000 );
	$sesion = md5( uniqid( rand() ) );

	# Creación de variables de sesión
	$_SESSION['user'] = $tipo;
	$_SESSION['ses'] = $sesion;

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
?>