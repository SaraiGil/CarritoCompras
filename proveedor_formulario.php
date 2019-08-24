<?php
include( "nomanches_funciones.php" );
include './inc/link.php';
$mysqli = conectar();

extract( $_REQUEST );

/*if ( !existe_sesion( $u, $s ) ) :
	header( "location:nomanches_login.php?iderror=2" );
else :*/
?>

<!DOCTYPE html>
<HTML>

<HEAD>
	<TITLE>Catálogo</TITLE>
	<META charset="UTF-8">
	<META author="Equipo 5 T186">
	<!-- <SCRIPT src="../js/jquery-3.4.1.min.js"></SCRIPT>
	<LINK rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
	<LINK rel="stylesheet" href="../font-awesome/css/font-awesome.min.css" />
	<SCRIPT src="../bootstrap/js/bootstrap.min.js"></SCRIPT>
	<SCRIPT src="js/proveedor_formulario.js"></SCRIPT> -->

</HEAD>

<BODY>
<?php 
extract( $_REQUEST );
?>
<DIV class="container">

<FORM id="form-proveedor" action="proveedor_procesa.php" method="post">
	<INPUT type="hidden" name="accion"
		value="<?= $accion ?>" />
		<INPUT type="hidden" name="u"
		value="<?= $u ?>" />
		<INPUT type="hidden" name="s"
		value="<?= $s ?>" />

<BR />

<DIV class="row">
	<DIV class="col col-md-9">
		<H2>Actualización de proveedor</H2>
	</DIV>
</DIV>

<DIV class="row">
	<DIV class="col col-md-9">
		<DIV id="mensaje-validacion"></DIV>
	</DIV>
</DIV>


<?php

$nom_prov = "";
$email_prov = "";
$tel_prov = "";
$calle_prov = "";
$col_prov = "";
$cp_prov = "";
$ncalle_prov = "";
$cve_ciu = "";
//$Nom_usu = "";

if ( $accion == "cambio" ) {
	$sql = "select * from proveedor 
			where cve_prov='$cve_prov'";

	$rs = $mysqli->query( $sql );
	if( $row = $rs->fetch_assoc() ) {
		extract( $row );
	}
}
else if ( $accion == "alta" ) {
	$cve_prov = "";
}
?>


<DIV class="row">
    
    <DIV class="col col-md-2">
		<DIV class="form-group" id="group-cve_prov">
			<LABEL for="cve_prov">CLAVE</LABEL>
			<INPUT type="text" name="cve_prov" 
				id="cve_prov"
				class="form-control"
				value="<?= $cve_prov ?>" <?=
				$accion == "cambio" ? ' readonly="readonly"' : ""
				?>
				/>
		</DIV>
	</DIV>

	<DIV class="col col-md-3">
		<DIV class="form-group" id="group-nom_prov">
			<LABEL for="nom_prov">NOMBRE</LABEL>
			<INPUT type="text" name="nom_prov" 
				id="nom_prov"
				class="form-control"
				value="<?= $nom_prov ?>">
		</DIV>
	</DIV>

	<DIV class="col col-md-3">
		<DIV class="form-group" id="group-email_prov">
			<LABEL for="email_prov">CORREO</LABEL>
			<INPUT type="text" name="email_prov" 
				id="email_prov"
				class="form-control"
				value="<?= $email_prov ?>">
		</DIV>
	</DIV>

</DIV>	

<DIV class="row">
	

	<DIV class="col col-md-2">
		<DIV class="form-group" id="group-tel_prov">
			<LABEL for="tel_prov">TELÉFONO</LABEL>
			<INPUT type="text" name="tel_prov"
				id="tel_prov" 
				class="form-control"
				value="<?= $tel_prov ?>">
		</DIV>
	</DIV>

	<DIV class="col col-md-3">
		<DIV class="form-group" id="group-calle_prov">
			<LABEL for="calle_prov">CALLE</LABEL>
			<INPUT type="text" name="calle_prov"
				id="calle_prov" 
				class="form-control"
				value="<?= $calle_prov ?>">
		</DIV>
	</DIV>

	<DIV class="col col-md-3">
		<DIV class="form-group" id="group-col_prov">
			<LABEL for="col_prov">COLONIA</LABEL>
			<INPUT type="text" name="col_prov" 
				id="col_prov"
				class="form-control"
				value="<?= $col_prov ?>">
		</DIV>
	</DIV>

</DIV>
<DIV class="row">

	<DIV class="col col-md-2">
		<DIV class="form-group" id="group-cp_prov">
			<LABEL for="cp_prov">CP</LABEL>
			<INPUT type="text" name="cp_prov" 
				id="cp_prov"
				class="form-control"
				value="<?= $cp_prov ?>">
		</DIV>
	</DIV>

	<DIV class="col col-md-2">
		<DIV class="form-group" id="group-ncalle_prov">
			<LABEL for="ncalle_prov">NÚMERO CALLE</LABEL>
			<INPUT type="text" name="ncalle_prov" 
				id="ncalle_prov"
				class="form-control"
				value="<?= $ncalle_prov ?>">
		</DIV>
	</DIV>

	<DIV class="col col-md-4">
		<DIV class="form-group" id="group-cve_ciu">
			<LABEL for="cve_ciu">Ciudad</LABEL>
			<SELECT name="cve_ciu" class="form-control" id="cve_ciu">
				<OPTION value="0">-- Elige tipo --</OPTION>
			<?php
			$sql = "select * from ciudad";
			$rstipo = $mysqli->query( $sql );
			while ( $rowtipo = $rstipo->fetch_assoc() ) : ?>
				<OPTION 
					value="<?= $rowtipo["cve_ciu"] ?>"
					<?= $cve_ciu == $rowtipo["cve_ciu"] ?
						'selected="selected"' : "" ?>><?= $rowtipo["nom_ciu"] ?>
				</OPTION>
			<?php endwhile; ?>
			</SELECT>
		</DIV>
	</DIV>
</DIV>

<!-- <DIV class="row">

	<DIV class="col col-md-2">
		<DIV class="form-group" id="group-Nom_usu">
			<LABEL for="Nom_usu">NOMBRE DE USUARIO</LABEL>
			<INPUT type="text" name="Nom_usu" 
				id="Nom_usu"
				class="form-control"
				value="<?= $Nom_usu ?>">
		</DIV>
	</DIV>

</DIV> -->


<DIV class="row">
	<DIV class="col col-md-4">
		<DIV class="form-group">
			<BUTTON class="btn btn-lg btn-success">
				<I class="fa fa-floppy-o fa-2x"></I>
				Guardar
			</BUTTON>
			<A class="btn btn-lg btn-default"
				href="proveedor.php?u=<?= $u ?>&s=<?= $s ?>"
				id="btn-cancelar">
				<I class="fa fa-remove"></I>
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

<?php //endif; ?>