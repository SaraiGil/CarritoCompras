<?php
include( "nomanches_funciones.php" );
extract( $_REQUEST );

$mysqli =  conectar();

switch( $accion ) {
	case "alta":
		$sql = "INSERT INTO producto VALUES (
			'$Cve_prod',
			'$Prec_prod',
			'$Costo_prod',
			'$Gen_prod',
			'$Desc_prod',
			'$Cve_cat',
			'$Img_prod'
			)";
		break;

	case "cambio":
		$sql = "UPDATE producto SET
			Cve_prod = '$Cve_prod',
			Prec_prod = '$Prec_prod',
			Costo_prod = '$Costo_prod',
			Gen_prod = '$Gen_prod',
			Desc_prod = '$Desc_prod',
			Cve_cat = '$Cve_cat',
			Img_prod = '$Img_prod'
			WHERE Cve_prod = '$Cve_prod'";
		break;

	case "baja":
		$sql = "DELETE FROM producto
				WHERE Cve_prod = '$Cve_prod'";
		break;
}

$mysqli->query( $sql );
//die( $mysqli->error );

$mysqli->close();
header( "location:catalogo.php?u=$u&s=$s" );
?>