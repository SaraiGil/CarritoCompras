<?php
include( "nomanches_funciones.php" );
$mysqli = conectar();

extract( $_REQUEST );

	#Cierre de sesión
	if(isset($_GET['salir'])){
		if($_GET['salir'] == 1){
			#Liberamos las variables de sesión
			echo "USER SESSION: ".$us_ses;
			echo "SESION2: ".$ses;
			unset($_SESSION['user']);
			unset($_SESSION['ses']);
			session_unset();
			echo "<script>alert('Sesión cerrada con éxito :)')</script>";
			header( "location:nomanches_login.php" );
		}
	}
//echo "USER: ".$u;
//echo "SESION: ".$s;

?>