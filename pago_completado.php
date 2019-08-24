	<?php
		include 'carrito.php';
		include 'transacciones.php';
		include './inc/link.php';
		include 'nomanches_funciones.php';
		$mysqli = conectar();
		extract( $_REQUEST );

	if ( !existe_sesion( $u, $s ) ) :
		header( "location:nomanches_login.php?iderror=2" );
	else :



	?>

<!DOCTYPE html>
<HTML>

<HEAD>
	<TITLE>Pago completado</TITLE>
	<META charset="UTF-8">
	<META author="Equipo 5 T186">
	<SCRIPT src="../js/jquery-3.4.1.min.js"></SCRIPT>
	<SCRIPT src="../bootstrap/js/bootstrap.min.js"></SCRIPT>
	<SCRIPT src="js/catalogo.js"></SCRIPT>

</HEAD>
<BODY>

<DIV class="barra">
	 <?php include './inc/navbar.php'; ?>
</DIV>

	<DIV class="container">


	<?php
	
	$total=0; 
	foreach ($_SESSION['CARRITO'] as $indice => $producto) {
		$total = $total + ( $producto['Prec_prod']*$producto['cantidad']);
	}
	
	
	/*Registrar venta*/

	if($_SESSION['enviar_datos'] == 'si') : 

	$sql = "CALL registra_venta('ven_06', 'Pagado', '{$_SESSION['usr']}', '$total')";
	$mysqli->query( $sql );
	$mysqli->query( "commit" );

	
	foreach ($_SESSION['CARRITO'] as $indice => $producto) {
	
		$mysqli->query( "call obtener_numero( '{$producto['Cve_prod']}', '{$_SESSION['sucursal']}', @NoInv)" );

		$mysqli->query( "call clave_venta( @clave_1 )") ;

		$rs = $mysqli->query( "select @clave_1 as cveventa ") ;

		if( $row = $rs->fetch_assoc() ) {
		extract( $row );
		}

		$_SESSION['venta'] = $cveventa;

		$sql = "CALL registra_detventa(@NoInv, @clave_1, '{$producto['cantidad']}')";

		$mysqli->query( $sql );
		$mysqli->query( "commit" );

		$_SESSION['enviar_datos'] = 'no';

	}

	foreach ($_SESSION['CARRITO'] as $indice => $producto) {
				$_SESSION['CARRITO2'][$indice] = $_SESSION['CARRITO'][$indice];
			}

	unset($_SESSION['CARRITO']);

	endif ;
	

	?>


	<H3 class="centro">Transacción completada</H3>

	<BR />
	<BR />
	<BR />

	<FONT class="centro" FACE="impact" size="40" color="#2980b9">¡Gracias por su compra!</FONT>
	<BR />
	<BR />
	<BR />
	<BR />

	<FORM action="pruebaCarrito.php" method="post">
		<BUTTON class="btn btn-lg btn-success " name="btnAccion" value="fin">
				Volver a la tienda
		</BUTTON>

		<?php if( $_SESSION['genera_factura'] == 'si') {?>
		<A href="genera_factura.php?&u=<?= $u ?>&s=<?= $s ?>" class="btn btn-lg btn-info float-right helper pull-right">Ir a facturación</A>
		<?php } ?>

	</FORM>

	</DIV>
	
</BODY>
	
	<?php
	desconectar();
	?>


</HTML>

<?php endif; ?>