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
	<TITLE>Venta</TITLE>
	<META charset="UTF-8">
	<META author="Equipo 5 T186">
	<SCRIPT src="../js/jquery-3.4.1.min.js"></SCRIPT>
	<LINK rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
	<LINK rel="stylesheet" href="../font-awesome/css/font-awesome.min.css" />
	<SCRIPT src="../bootstrap/js/bootstrap.min.js"></SCRIPT>
	<SCRIPT src="js/venta_formulario.js"></SCRIPT>

</HEAD>

<BODY>
<?php 
extract( $_REQUEST );
?>
<DIV class="container">

<FORM id="form-venta" action="venta_procesa.php" method="post">
	<INPUT type="hidden" name="accion"
		value="<?= $accion ?>" />
		<INPUT type="hidden" name="u"
		value="<?= $u ?>" />
	<INPUT type="hidden" name="s"
		value="<?= $s ?>" />

<BR />


<DIV class="row">
	<DIV class="col col-md-9">
		<H2>Actualización de venta</H2>
	</DIV>
</DIV>

<DIV class="row">
	<DIV class="col col-md-9">
		<DIV id="mensaje-validacion"></DIV>
	</DIV>
</DIV>


<?php
$mysqli =  new mysqli( "localhost", "root", 1234, "nomanches_bd" );

$Stat_ven = "";
$Fec_ven = "";
$Cve_clie = "";
$total_ven = 0;

if ( $accion == "cambio" ) {
	$sql = "select * from venta 
			where No_ven='$No_ven'";

	$rs = $mysqli->query( $sql );
	if( $row = $rs->fetch_assoc() ) {
		extract( $row );
	}
}
else if ( $accion == "alta" ) {
	$No_ven = "";
}
?>


<DIV class="row">
    
    <DIV class="col col-md-2">
		<DIV class="form-group" id="group-No_ven">
			<LABEL for="No_ven">Número de venta</LABEL>
			<INPUT type="text" name="No_ven" 
				id="No_ven"
				class="form-control"
				value="<?= $No_ven ?>" <?=
				$accion == "cambio" ? ' readonly="readonly"' : ""
				?>
				/>
		</DIV>
	</DIV>

	<DIV class="col col-md-2">
		<DIV class="form-group" id="group-Stat_ven">
			<LABEL for="Stat_ven">Estatus</LABEL>
			<INPUT type="text" name="Stat_ven" 
				id="Stat_ven"
				class="form-control"
				value="<?= $Stat_ven ?>">
		</DIV>
	</DIV>

	<DIV class="col col-md-3">
		<DIV class="form-group" id="group-Fec_ven">
			<LABEL for="Fec_ven">Fecha</LABEL>
			<INPUT type="date" name="Fec_ven" 
				id="Fec_ven"
				class="form-control"
				value="<?= $Fec_ven ?>">
		</DIV>
	</DIV>

</DIV>	

<DIV class="row">
	

	<DIV class="col col-md-3">
		<DIV class="form-group" id="group-Cve_clie">
			<LABEL for="Cve_clie">Clave de cliente</LABEL>
			<SELECT name="Cve_clie" class="form-control" id="Cve_clie">
				<OPTION value="0">-- Elige un cliente --</OPTION>
			
			<?php
			$sql = "select * from cliente";
			$rstipo = $mysqli->query( $sql );
			while ( $rowtipo = $rstipo->fetch_assoc() ) : ?>
				<OPTION 
					value="<?= $rowtipo["Cve_clie"] ?>"
					<?= $Cve_clie == $rowtipo["Cve_clie"] ?
						'selected="selected"' : "" ?>><?= $rowtipo["Cve_clie"] ?>
				</OPTION>
			<?php endwhile; ?>
			
			</SELECT>
		</DIV>
	</DIV>

	<DIV class="col col-md-3">
		<DIV class="form-group" id="group-total_ven">
			<LABEL for="total_ven">Total</LABEL>
			<INPUT type="text" name="total_ven"
				id="total_ven" 
				class="form-control"
				value="<?= $total_ven ?>">
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
				href="venta.php?u=<?= $u ?>&s=<?= $s ?>"
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