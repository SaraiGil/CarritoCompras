<?php
include( "c_funciones.php" );
include './inc/link.php';
$mysqli = conectar();

extract( $_REQUEST );
//if (isset($_SESSION['user'])) {

if ( !existe_sesion( $u, $s ) ) :
	header( "location:c_login.php?iderror=2" );
else :

?>


<!DOCTYPE html>
<HTML>

<HEAD>
	<TITLE>Menú administrador</TITLE>
	<META charset="UTF-8">
	<META author="Equipo 5 T186">
	<SCRIPT src="../bootstrap/js/bootstrap.min.js"></SCRIPT>

</HEAD>
<BODY  class="#container-page-index" >
	<DIV class="barra">
	 <?php include './inc/navbaradm.php'; 
	 session_start(); 
	 $us_ses=$_SESSION['user'];
	 $ses=$_SESSION['ses'];	 ?>
	</DIV>
	<DIV class="container centro">
	
	<BR />

	<BR />
		<!-- <H3> Menú del administrador <?php echo $us_ses.' - '.$ses;?></H3> -->
	<BR />
	<BR />
	<BR />
		<DIV class="row">
		<a href="usuario.php ?>&u=<?= $us_ses ?>&s=<?= $ses ?>" class="boton">Usuarios</a>
		<a href="cliente.php ?>&u=<?= $us_ses ?>&s=<?= $ses ?>" class="boton azul">Clientes</a>
		<a href="empleado.php ?>&u=<?= $u ?>&s=<?= $s ?>" class="boton morado">Empleados</a>
		</DIV>

		<DIV class="row">
		<a href="proveedor.php ?>&u=<?= $us_ses ?>&s=<?= $ses ?>" class="boton naranja">Proveedores</a>
		<a href="compra.php ?>&u=<?= $us_ses?>&s=<?= $ses ?>" class="boton rojo">Compra</a>
		<a href="ciudad.php ?>&u=<?= $us_ses?>&s=<?= $ses ?>" class="boton cafe">Ciudad</a>
		<!--<a href="com_inv.php ?>&u=<?= $us_ses?>&s=<?= $ses ?>" class="boton morado">Detalle Compra</a>-->
		<!-- <a href="venta.php ?>&u=<?= $us_ses?>&s=<?= $ses ?>" class="boton gris">Venta</a> -->
		</DIV>

		<DIV class="row">
		<a href="catalogo.php ?>&u=<?= $us_ses?>&s=<?= $ses ?>" class="boton azul_2">Producto</a>
		<!--<a href="#" class="boton salmon">Detalle venta</a>-->
		<a href="factura.php ?>&u=<?= $us_ses?>&s=<?= $ses ?> " class="boton amarillo">Factura</a>
		<a href="inventario.php ?>&u=<?= $us_ses?>&s=<?= $ses ?>" class="boton jalapeno">Inventario</a>
		<!-- <a href="envio.php ?>&u=<?= $us_ses?>&s=<?= $ses ?>" class="boton rojo">Envio</a> -->
		</DIV>

<!-- 		<DIV class="row">
			
		</DIV> -->

	</DIV>

 <?php include './inc/footeradm.php'; ?>

</BODY>

</HTML>

<?php endif; ?>