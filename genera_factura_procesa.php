<?php
include( "nomanches_funciones.php" );
$mysqli =  conectar();

extract( $_REQUEST );


		$sql = "UPDATE cliente SET
			Nom_clie = '$Nom_clie',
			App_clie = '$App_clie',
			Apm_clie = '$Apm_clie',
			Rfc_clie = '$Rfc_clie',
			Email_clie = '$Email_clie',
			Calle_clie = '$Calle_clie',
			Col_clie = '$Col_clie',
			Cp_clie = '$Cp_clie',
			Noc_clie = '$Noc_clie',
			cve_ciu = '$cve_ciu'

			WHERE Cve_clie = '$Cve_clie'";

$mysqli->query( $sql );
//die( $mysqli->error );

$mysqli->close();
header( "location:genera_factura.php?u=$u&s=$s" );
?>