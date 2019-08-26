<?php
include( "c_funciones.php" );
$mysqli = conectar();

extract( $_REQUEST );

	#Cierre de sesión
	if(isset($_GET['salir'])){
		if($_GET['salir'] == 1){
			#Liberamos las variables de sesión
			echo "USER SESSION: ".$us_ses;
			echo "SESION2: ".$ses;
			$u=0;
			unset($_SESSION['user']);
			unset($_SESSION['ses']);
			unset($_SESSION['CARRITO']);
			//unset($_SESSION['']);
			session_unset();
			echo "<script>alert('Sesión cerrada con éxito :). USER: ".$_SESSION['user'].", SESION: ".$_SESSION['ses']."')</script>";
			header( "location:c_login.php" );
		}
	}
//echo "USER: ".$u;
//echo "SESION: ".$s;

?>