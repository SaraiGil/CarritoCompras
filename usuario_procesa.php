<?php
include( "nomanches_funciones.php" );
extract( $_REQUEST );

$mysqli =  conectar();

switch( $accion ) {
	case "alta":
		$sql = "INSERT INTO usuario VALUES (
			'$Nom_usu',
			'$Tipo_usu',
			'$Pass_usu'
			)";
		break;

	case "cambio":
		$sql = "UPDATE usuario SET
			Nom_usu = '$Nom_usu',
			Tipo_usu = '$Tipo_usu',
			Pass_usu = '$Pass_usu'
			WHERE Nom_usu = '$Nom_usu'";
		break;

	case "baja":
		$sql = "DELETE FROM usuario
				WHERE Nom_usu = '$Nom_usu'";
		break;
}

$mysqli->query( $sql );
//die( $mysqli->error );

$mysqli->close();
header( "location:usuario.php?u=$u&s=$s" );
?>