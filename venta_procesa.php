<?php
include( "c_funciones.php" );
extract( $_REQUEST );

$mysqli =  conectar();

switch( $accion ) {
	case "alta":
		$sql = "INSERT INTO venta VALUES (
			'$No_ven',
			'$Stat_ven',
			'$Fec_ven',
			'$Cve_clie',
			'$total_ven'
			)";
		break;

	case "cambio":
		$sql = "UPDATE venta SET
			No_ven = '$No_ven',
			Stat_ven = '$Stat_ven',
			Fec_ven = '$Fec_ven',
			Cve_clie = '$Cve_clie',
			total_ven = '$total_ven'
			WHERE No_ven = '$No_ven'";
		break;

	case "baja":
		$sql = "DELETE FROM venta
				WHERE No_ven = '$No_ven'";
		break;
}

$mysqli->query( $sql );
//die( $mysqli->error );

$mysqli->close();
header( "location:venta.php?u=$u&s=$s" );
?>