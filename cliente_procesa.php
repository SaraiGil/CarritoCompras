<?php
include( "nomanches_funciones.php" );
extract( $_REQUEST );

$mysqli =  conectar();

switch( $accion ) {
	case "alta":
		$passIns=password_hash($pass_us, PASSWORD_BCRYPT);
		$sql = "INSERT INTO usuario VALUES (
			'$id_us',
			'$nickuser',
			'$passIn',
			'$nom_clie',
			'$ap_clie',
			'$am_clie',
			'$calle_clie',
			 $numc_clie ,
			'$col_clie',
			 $cp_clie ,
			'$tel_clie',
			'$rfc_clie',
			'$email_clie',
			'$cve_ciu',
			2
			);";
		break;

	case "cambio":
		$sql = "UPDATE usuario SET
			id_us = '$id_us',
			nickuser = '$nickuser',
			pass_us = '$pass_us',
			nom_clie = '$nom_clie',
			ap_clie = '$ap_clie',
			am_clie = '$am_clie',
			calle_clie = '$calle_clie',
			numc_clie = $numc_clie , 
			col_clie = '$col_clie',
			cp_clie =  $cp_clie ,
			tel_clie = '$tel_clie',
			rfc_clie = '$rfc_clie',
			email_clie = '$email_clie',
			cve_ciu = '$cve_ciu',
			cve_tipous = 2 

			WHERE id_us = '$id_us'";
		break;

	case "baja":
		$sql = "DELETE FROM usuario
				WHERE id_us = '$id_us'";
		break;
}

$mysqli->query( $sql );
//die( $mysqli->error );

$mysqli->close();
header( "location:cliente.php?u=$u&s=$s" );
?>