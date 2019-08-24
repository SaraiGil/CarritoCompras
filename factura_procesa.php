<?php
include( "nomanches_funciones.php" );
extract( $_REQUEST );

$mysqli =  conectar();

switch( $accion ) {
	case "alta":
		$sql = "INSERT INTO factura VALUES (
			'$Fol_fac',
			'$Fec_fac',
			'$No_ven'
			)";
		break;

	case "cambio":
		$sql = "UPDATE factura SET
			Fol_fac = '$Fol_fac',
			Fec_fac = '$Fec_fac',
			No_ven = '$No_ven'
			WHERE Fol_fac = '$Fol_fac'";
		break;

	case "baja":
		$sql = "DELETE FROM factura
				WHERE Fol_fac = '$Fol_fac'";
		break;
}

$mysqli->query( $sql );
//die( $mysqli->error );

$mysqli->close();
header( "location:factura.php?u=$u&s=$s" );
?>