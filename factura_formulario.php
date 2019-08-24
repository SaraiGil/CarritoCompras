<?php
include( "nomanches_funciones.php" );
$mysqli = conectar();

extract( $_REQUEST );

if ( !existe_sesion( $u, $s ) ) :
	header( "location:nomanches_login.php?iderror=2" );
else :
?>

<!DOCTYPE html>
<HTML>

<HEAD>
	<TITLE>Factura Editar</TITLE>
	<META charset="UTF-8">
	<META author="Equipo 5 T186">
	<SCRIPT src="../js/jquery-3.4.1.min.js"></SCRIPT>
	<LINK rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
	<LINK rel="stylesheet" href="../font-awesome/css/font-awesome.min.css" />
	<SCRIPT src="../bootstrap/js/bootstrap.min.js"></SCRIPT>
	<SCRIPT src="js/factura_formulario.js"></SCRIPT>

</HEAD>

<BODY>

<DIV class="container">


<FORM id="form-factura" action="factura_procesa.php" method="post">
	<INPUT type="hidden" name="accion"
		value="<?= $accion ?>" />
	<INPUT type="hidden" name="u"
		value="<?= $u ?>" />
	<INPUT type="hidden" name="s"
		value="<?= $s ?>" />

<BR />


<DIV class="row">
	<DIV class="col col-md-9">
		<H2>Actualización de factura</H2>
	</DIV>
</DIV>

<DIV class="row">
	<DIV class="col col-md-9">
		<DIV id="mensaje-validacion"></DIV>
	</DIV>
</DIV>


<?php
$Fec_fac = "";
$No_ven = "";


if ( $accion == "cambio" ) {
	$sql = "select * from factura
			where Fol_fac='$Fol_fac'";

	$rs = $mysqli->query( $sql );
	if( $row = $rs->fetch_assoc() ) {
		extract( $row );
	}
}
else if ( $accion == "alta" ) {
	$Fol_fac = "";
}
?>


<DIV class="row">
    
    <DIV class="col col-md-2">
		<DIV class="form-group" id="group-Fol_fac">
			<LABEL for="Fol_fac">Folio</LABEL>
			<INPUT type="text" name="Fol_fac" 
				id="Fol_fac"
				class="form-control"
				value="<?= $Fol_fac ?>" <?=
				$accion == "cambio" ? ' readonly="readonly"' : ""
				?>
				/>
		</DIV>
	</DIV>

	<DIV class="col col-md-3">
		<DIV class="form-group" id="group-Fec_fac">
			<LABEL for="Fec_fac">Fecha</LABEL>
			<INPUT type="date" name="Fec_fac" 
				id="Fec_fac"
				class="form-control"
				value="<?= $Fec_fac ?>">
		</DIV>
	</DIV>

</DIV>	

<DIV class="row">
	<DIV class="col col-md-4">
		<DIV class="form-group" id="group-No_ven">
				<LABEL for="No_ven">Número de venta</LABEL>
				<SELECT name="No_ven" class="form-control" id="No_ven">
					<OPTION value="0">-- Elige un número de venta --</OPTION>
				
				<?php
				$sql = "select * from venta";
				$rstipo = $mysqli->query( $sql );
				while ( $rowtipo = $rstipo->fetch_assoc() ) : ?>
					<OPTION 
						value="<?= $rowtipo["No_ven"] ?>"
						<?= $No_ven == $rowtipo["No_ven"] ?
							'selected="selected"' : "" ?>><?= $rowtipo["No_ven"] ?>
					</OPTION>
				<?php endwhile; ?>
				
				</SELECT>
		</DIV>
	</DIV>
</DIV>

<DIV class="row">
	<DIV class="col col-md-4">
		<DIV class="form-group">
			<BUTTON class="btn btn-lg btn-success">
				<I class="fa fa-floppy-o fa-2x"></I>
				Guardar
			</BUTTON>
			<A class="btn btn-lg btn-default"
				href="factura.php?u=<?= $u ?>&s=<?= $s ?>"
				id="btn-cancelar">
				<I class="fa fa-remove fa-2x"></I>
				Cancelar
			</A>

	</DIV>
</DIV>


</FORM>

<?php
desconectar();
?>

</DIV>

</BODY>

</HTML>


<?php endif; ?>