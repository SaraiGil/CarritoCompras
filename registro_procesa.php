<?php
include( "nomanches_funciones.php" );
extract( $_REQUEST );

$mysqli =  conectar();


$sql = "SELECT id_us from usuario where nickuser = '$nom_us'";

$rs = $mysqli->query( $sql );

if( !$rs->num_rows >0 ) {

$passIns=password_hash($pass_us, PASSWORD_BCRYPT);
//if (password_verify($pass_us, $passIns)) {
    $newUser = "INSERT INTO usuario (nickuser,pass_us,nom_us,ap_us,am_us,calle_us,numc_us,col_us,cp_us,tel_us,rfc_us,email_us,cve_ciu,cve_tipous) 
	VALUES ('$nom_us','$passIns','$nom_clie','$ap_clie', '$am_clie', '$calle_clie',$numc_clie ,'$col_clie',$cp_clie ,'$tel_clie','$rfc_clie','$email_clie','$cve_ciu',2)";
	print($newUser);

	if ($mysqli->query( $newUser )) {
		echo "<script>alert('Usuario registrado correctamente! :)')</script>";
	} else {
		echo "ERROR: {$con->error}<br />";
		echo $newUser . "<br/>";
	}

//} else {
  //  echo 'La contraseña no es válida.\n';
//}


//die( "<a href='nomanches_login.php'>nomanches_login.php</a>" );

$mysqli->close();
header( "location:nomanches_login.php" );

}else{


header( "location:registro.php?Id_error=1" );


}


?>