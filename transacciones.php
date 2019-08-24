<?php
	include 'nomanches_funciones.php';
	$mysqli = conectar();
	
	$sql = "CALL registra_venta('ven_06', 'Pendiente', 'c_ale', 550)";

	//die( $mysqli->error );

	/*
	$sql->bind_param(':NoVenta', 'v_016');
	$sql->bind_param(':StatVenta', 'Pendiente');
	$sql->bind_param(':CveClie', $_SESSION['usr']);
	$sql->bind_Param(':total', $total);
    */

	?>