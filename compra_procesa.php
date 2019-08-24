<?php
include( "nomanches_funciones.php" );
extract( $_REQUEST );

$mysqli =  conectar();

switch( $accion ) {
	case "alta":
		$sql = "INSERT INTO compra VALUES (
			'$No_com',
			'$Stat_com',
			'$Fec_com',
			'$Cve_prov'
			)";
		break;

	case "cambio":
		$sql = "UPDATE compra SET
			No_com = '$No_com',
			Stat_com = '$Stat_com',
			Fec_com = '$Fec_com',
			Cve_prov = '$Cve_prov'

			WHERE No_com = '$No_com'";
		break;

	case "baja":
		$sql = "DELETE FROM compra
				WHERE No_com = '$No_com'";
		break;
}

$mysqli->query( $sql );
//die( $mysqli->error );

$mysqli->close();
header( "location:compra.php?u=$u&s=$s" );
?>