<?php
include( "nomanches_funciones.php" );
extract( $_REQUEST );

$mysqli = conectar();

switch( $accion ) {
	case "alta":
		$sql = "INSERT INTO ciudad VALUES (
			'$Cve_ciu',
			'$Nom_ciu',
			'$Cve_edo'
			)";
		break;

	case "cambio":
		$sql = "UPDATE ciudad SET 
			Cve_ciu = '$Cve_ciu',
			Nom_ciu = '$Nom_ciu',
			Cve_edo = '$Cve_edo'


			WHERE Cve_ciu = '$Cve_ciu'";
		break;

	case "baja":
		$sql = "DELETE FROM ciudad
				WHERE Cve_ciu = '$Cve_ciu'";
		break;
}

$mysqli->query( $sql );
//die( $mysqli->error );

$mysqli->close();
header( "location:ciudad.php?u=$u&s=$s" );
?>