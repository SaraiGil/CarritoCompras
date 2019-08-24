<?php
include( "nomanches_funciones.php" );
extract( $_REQUEST );

$mysqli =  conectar();

switch( $accion ) {
	case "alta":
		$sql = "INSERT INTO proveedor VALUES (
			'$cve_prov',
			'$nom_prov',
			'$calle_prov',
			'$ncalle_prov',
			'$col_prov',
			'$cp_prov',
			'$tel_prov',
			'$cve_ciu',
			)";
		break;

	case "cambio":
		$sql = "UPDATE proveedor SET
			cve_prov = '$cve_prov',
			nom_prov = '$nom_prov',
			calle_prov = '$calle_prov',
			ncalle_prov = '$ncalle_prov',
			col_prov = '$col_prov',
			cp_prov = '$cp_prov',
			tel_prov = '$tel_prov', 
			cve_ciu = '$cve_ciu',
			WHERE cve_prov = '$cve_prov'";
		break;

	case "baja":
		$sql = "DELETE FROM proveedor
				WHERE cve_prov = '$cve_prov'";
		break;
}

$mysqli->query( $sql );
//die( $mysqli->error );

$mysqli->close();
header( "location:proveedor.php?u=$u&s=$s" );
?>