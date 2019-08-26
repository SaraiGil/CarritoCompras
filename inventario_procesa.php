<?php
include( "c_funciones.php" );
extract( $_REQUEST );

$mysqli =  conectar();

switch( $accion ) {
	case "alta":
		$sql = "INSERT INTO inventario VALUES (
			'$No_inv',
			'$Exis_prod',
			'$Cve_prod',
			'$Cve_talla',
			'$cve_suc'
			)";
		break;

	case "cambio":
		$sql = "UPDATE inventario SET
			No_inv = '$No_inv',
			Exis_prod = '$Exis_prod',
			Cve_prod = '$Cve_prod',
			Cve_talla = '$Cve_talla',
			cve_suc = '$cve_suc'
			WHERE No_inv = '$No_inv'";
		break;

	case "baja":
		$sql = "DELETE FROM inventario
				WHERE No_inv = '$No_inv'";
		break;
}

$mysqli->query( $sql );
//die( $mysqli->error );

$mysqli->close();
header( "location:inventario.php?u=$u&s=$s" );
?>