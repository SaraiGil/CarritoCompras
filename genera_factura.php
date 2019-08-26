<?php
		include 'carrito.php';
		include 'transacciones.php';
		include './inc/link.php';
		include 'c_funciones.php';
		include 'c_inicio_sesion.php';
		$mysqli = conectar();
		extract( $_REQUEST );

		if ( !existe_sesion( $u, $s ) ) :
		header( "location:c_login.php?iderror=2" );
	else :
?>

<!DOCTYPE html>
<HTML>

<HEAD>
	<TITLE>Factura</TITLE>
	<META charset="UTF-8">
	<META author="Equipo 5 T186">
	<SCRIPT src="../js/jquery-3.4.1.min.js"></SCRIPT>
	<SCRIPT src="../bootstrap/js/bootstrap.min.js"></SCRIPT>
	<SCRIPT src="js/genera_factura_formulario.js"></SCRIPT>

</HEAD>
<BODY>

<DIV class="barra">
	 <?php include './inc/navbar.php'; ?>
</DIV>

<DIV class="container">

<FORM id="form-factura" action="genera_factura_procesa.php" method="post">
	<INPUT type="hidden" name="accion"
		value="<?= $accion ?>" />
		<INPUT type="hidden" name="u"
		value="<?= $u ?>" />
		<INPUT type="hidden" name="s"
		value="<?= $s ?>" />
	<H2>Factura</H2>
	<BR />
	<H3>Verifique su información para continuar</H3>
	<BR />


	<?php

	$sql = "SELECT * from cliente where Cve_clie = '{$_SESSION['usr']}' ";
	
	$rs = $mysqli->query( $sql );
	
	if( $row = $rs->fetch_assoc() ) {
		extract( $row );
	}

	?>

	<DIV class="row">
	   
		<DIV class="col col-md-2">
			<DIV class="form-group" id="group-Cve_clie">
			<LABEL for="Cve_clie">ID</LABEL>
			<INPUT type="text" name="Cve_clie" 
				id="Cve_clie"
				class="form-control"
				value="<?= $Cve_clie ?>" 
				readonly="readonly";
				?>
			</DIV>
		</DIV>

	    <DIV class="col col-md-3">
			<DIV class="form-group" id="group-Nom_clie">
				<LABEL for="Nom_clie">Nombre</LABEL>
				<INPUT type="text" name="Nom_clie" 
					id="Nom_clie"
					class="form-control"
					value="<?= $Nom_clie ?>"/>
			</DIV>
		</DIV>

		<DIV class="col col-md-3">
				<DIV class="form-group" id="group-App_clie">
					<LABEL for="App_clie">Apellido paterno</LABEL>
					<INPUT type="text" name="App_clie"
						id="App_clie" 
						class="form-control"
						value="<?= $App_clie ?>">
				</DIV>
		</DIV>

		<DIV class="col col-md-3">
				<DIV class="form-group" id="group-Apm_clie">
					<LABEL for="Apm_clie">Apellido materno</LABEL>
					<INPUT type="text" name="Apm_clie" 
						id="Apm_clie"
						class="form-control"
						value="<?= $Apm_clie ?>">
				</DIV>
		</DIV>
	</DIV>

	<DIV class="row">

		<DIV class="col col-md-2">
			<DIV class="form-group" id="group-Rfc_clie">
				<LABEL for="Rfc_clie">RFC</LABEL>
				<INPUT type="text" name="Rfc_clie" 
					id="Rfc_clie"
					class="form-control"
					value="<?= $Rfc_clie ?>">
			</DIV>
		</DIV>

	<DIV class="col col-md-4">
			<DIV class="form-group" id="group-Email_clie">
				<LABEL for="Email_clie">Email</LABEL>
				<INPUT type="text" name="Email_clie" 
					id="Email_clie"
					class="form-control"
					value="<?= $Email_clie ?>">
			</DIV>
	</DIV>

	</DIV>

	<H4>Dirección</H4>

	<DIV class="row">

		<DIV class="col col-md-3">
			<DIV class="form-group" id="group-Calle_clie">
				<LABEL for="Calle_clie">Calle</LABEL>
				<INPUT type="text" name="Calle_clie" 
					id="Calle_clie"
					class="form-control"
					value="<?= $Calle_clie ?>">
			</DIV>
		</DIV>

		<DIV class="col col-md-3">
			<DIV class="form-group" id="group-Col_clie">
				<LABEL for="Col_clie">Colonia</LABEL>
				<INPUT type="text" name="Col_clie" 
					id="Col_clie"
					class="form-control"
					value="<?= $Col_clie ?>">
			</DIV>
		</DIV>

		<DIV class="col col-md-2">
			<DIV class="form-group" id="group-Cp_clie">
				<LABEL for="Cp_clie">CP</LABEL>
				<INPUT type="text" name="Cp_clie" 
					id="Cp_clie"
					class="form-control"
					value="<?= $Cp_clie ?>">
			</DIV>
		</DIV>
	</DIV>

	<DIV class="row">

		<DIV class="col col-md-2">
			<DIV class="form-group" id="group-Noc_clie">
				<LABEL for="Noc_clie">Número</LABEL>
				<INPUT type="text" name="Noc_clie" 
					id="Noc_clie"
					class="form-control"
					value="<?= $Noc_clie ?>">
			</DIV>
		</DIV>

		<DIV class="col col-md-3">
			<DIV class="form-group" id="group-cve_ciu">
				<LABEL for="cve_ciu">Ciudad</LABEL>
				<SELECT name="cve_ciu" class="form-control" id="cve_ciu">
					<OPTION value="0">-- Elige ciudad --</OPTION>
				
				<?php
				$sql = "select * from ciudad";
				$rstipo = $mysqli->query( $sql );
				while ( $rowtipo = $rstipo->fetch_assoc() ) : ?>
					<OPTION 
						value="<?= $rowtipo["Cve_ciu"] ?>"
						<?= $cve_ciu == $rowtipo["Cve_ciu"] ?
							'selected="selected"' : "" ?>><?= $rowtipo["Nom_ciu"] ?>
					</OPTION>
				<?php endwhile; ?>
				
				</SELECT>
			</DIV>

		</DIV>
	</DIV>


	<DIV class="col col-md-4">
			<DIV class="form-group">
				<BUTTON class="btn btn-lg btn-success">
					<I class="fa fa-floppy-o fa-2x"></I>
					Guardar
				</BUTTON>
			</DIV>
	</DIV>
	</FORM>

		<A class="btn btn-lg btn-success" href="/../factura2/example01_basic.php">Generar factura</A>
		<DIV class="container">

<BR />
	<FORM action="index.php" method="get">
			<INPUT type="hidden" name="u"
				value="<?= $u ?>" />
			<INPUT type="hidden" name="s"
				value="<?= $s ?>" />

		<BUTTON type="submit" class="btn btn-lg btn-warning " name="btnAccion" value="fin">
				Volver a la tienda
		</BUTTON>
	</FORM>




</DIV>
</BODY>

<?php
desconectar();
?>


</HTML>

<?php endif; ?>