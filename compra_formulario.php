<?php
	include( "c_funciones.php" );
	include './inc/link.php';
	$mysqli = conectar();
	extract( $_REQUEST );
/*	if ( !existe_sesion( $u, $s ) ) :
		header( "location:c_login.php?iderror=2" );
	else :*/
?>

<!DOCTYPE html>
<HTML>

<HEAD>
	<TITLE>Actualizacion_Compra</TITLE>
	<META charset="UTF-8">
	<META author="Equipo 5 T186">
	<!-- <SCRIPT src="../js/jquery-3.4.1.min.js"></SCRIPT>
	<LINK rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
	<LINK rel="stylesheet" href="../font-awesome/css/font-awesome.min.css" />
	<SCRIPT src="../bootstrap/js/bootstrap.min.js"></SCRIPT>
	<SCRIPT src="js/compra_formulario.js"></SCRIPT> -->

</HEAD>

<BODY>

<DIV class="container">
<FORM id="form-compra"action="compra_procesa.php" method="post">
	<INPUT type="hidden" name="accion"
		value="<?= $accion ?>" />
		<INPUT type="hidden" name="u"
			value="<?= $u ?>" />
		<INPUT type="hidden" name="s"
		value="<?= $s ?>" />
<BR />

<DIV class="row">
	<DIV class="col col-md-9">
		<H2> Actulizacion / Alta de compra</H2>
	</DIV>
</DIV>

<DIV class="row">
	<DIV class="col col-md-9">
		<DIV id="mensaje-validacion"></DIV>
	</DIV>
</DIV>

<?php

$status = "" ;
$fec_comp = "" ;
$cve_us = "" ;
$cve_prov = "" ;
$total=0;


if ( $accion == "cambio" ) {
	$sql = "SELECT * from compra 
			where cve_comp ='$cve_comp'";

	$rs = $mysqli->query( $sql );
	if( $row = $rs->fetch_assoc() ) {
		extract( $row );
	}
}
else if ( $accion == "alta" ) {
	$cve_us = "";
}
?>


<DIV class="row">
    
    <DIV class="col col-md-2">
		<DIV class="form-group" id="gorup-cve_prov">
			<LABEL for="cve_comp">cve_comp</LABEL>
			<INPUT type="text" name="cve_comp" 
				class="form-control"
				value="<?= $cve_comp ?>" <?=
				$accion == "cambio" ? ' readonly="readonly"' : ""
				?>
				/>
		</DIV>
	</DIV>

	<DIV class="col col-md-2">
		<DIV class="form-group">
			<LABEL for="Stat_com">Total</LABEL>
			<INPUT type="text" name="Stat_com" 
				class="form-control"
				value="<?= $total ?>">
		</DIV>
	</DIV>

	<DIV class="col col-md-2">
			<DIV class="form-group">
				<LABEL for="fec_comp">Fecha</LABEL>
				<INPUT type="date" name="fec_comp" 
					class="form-control"
					value="<?= $fec_comp ?>">
			</DIV>
	</DIV>

	<DIV class="col col-md-3">
		<DIV class="form-group">
			<LABEL for="cve_prov">Usuario</LABEL>
			<SELECT name="cve_prov" class="form-control">
				<OPTION value="0">-- Elige Usuario--</OPTION>
			
			<?php
			$sql = "SELECT * FROM usuario WHERE cve_tipous=2";
			$rstipo = $mysqli->query( $sql );
			while ( $rowtipo = $rstipo->fetch_assoc() ) : ?>
				<OPTION 
					value="<?= $rowtipo["id_us"] ?>"
					<?= $cve_us == $rowtipo["id_us"] ?
						'selected="selected"' : "" ?>><?= $rowtipo["nom_us"] ?>
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
			<A class="btn btn-lg btn-default"
				href="compra.php?u=<?= $u ?>&s=<?= $s ?>"
				id="btn-cancelar">
				<I class="fa fa-remove fa-2x"></I>
				Cancelar
			</A>
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

<?php //endif; ?>