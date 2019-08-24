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
	<TITLE>Ejercicio 16 - Conexión con MySQL</TITLE>


</HEAD>

<BODY>

<DIV class="container">
<FORM id="form-cliente" action="cliente_procesa.php" method="post">
	<INPUT type="hidden" name="accion"
		value="<?= $accion ?>" />
		<INPUT type="hidden" name="u"
		value="<?= $u ?>" />
		<INPUT type="hidden" name="s"
		value="<?= $s ?>" />


<BR />

<DIV class="row">
	<DIV class="col col-md-9">
		<H2>Actualización de cliente</H2>
	</DIV>
</DIV>

<DIV class="row">
	<DIV class="col col-md-9">
		<DIV id="mensaje-validacion"></DIV>
	</DIV>
</DIV>

<?php

$nickuser = "";
$ap_clie = "";
$am_clie = "";
$rfc_us = "";
$rmail_clie = "";
$tel_clie = "";
$calle_us = "";
$col_us = "";
$cp_us = 0;
$numc_us = "";
$cve_ciu = "";
$nom_us = "";
$cve_tipous=0;


if ( $accion == "cambio" ) {
	$sql = "select * from usuario 
			where id_us='$id_us'";

	$rs = $mysqli->query( $sql );
	if( $row = $rs->fetch_assoc() ) {
		extract( $row );
	}
}
else if ( $accion == "alta" ) {
	$id_us = "";
}
?>


<DIV class="row">
    
    <DIV class="col col-md-2">
		<DIV class="form-group" id="group-id_us">
			<LABEL for="id_us">ID</LABEL>
			<INPUT type="text" name="id_us" 
				id="id_us"
				class="form-control"
				value="<?= $id_us ?>" <?=
				$accion == "cambio" ? ' readonly="readonly"' : ""
				?>
				/>
		</DIV>
	</DIV>

	<DIV class="col col-md-2">
		<DIV class="form-group" id="group-nom_us">
			<LABEL for="nom_us">Nombre</LABEL>
			<INPUT type="text" name="nom_us" 
				id="nom_us"
				class="form-control"
				value="<?= $nom_us ?>">
		</DIV>
	</DIV>

	<DIV class="col col-md-2">
			<DIV class="form-group" id="group-ap_us">
				<LABEL for="ap_us">Apellido paterno</LABEL>
				<INPUT type="text" name="ap_us"
					id="ap_us" 
					class="form-control"
					value="<?= $ap_us ?>">
			</DIV>
	</DIV>

	<DIV class="col col-md-2">
			<DIV class="form-group" id="group-am_us">
				<LABEL for="am_us">Apellido materno</LABEL>
				<INPUT type="text" name="am_us" 
					id="am_us"
					class="form-control"
					value="<?= $am_us ?>">
			</DIV>
	</DIV>


</DIV>	

<DIV class="row">

	<DIV class="col col-md-2">
		<DIV class="form-group" id="group-rfc_us">
			<LABEL for="rfc_us">RFC</LABEL>
			<INPUT type="text" name="rfc_us" 
				id="rfc_us"
				class="form-control"
				value="<?= $rfc_us ?>">
		</DIV>
	</DIV>

	<DIV class="col col-md-3">
		<DIV class="form-group" id="group-email_us">
			<LABEL for="email_us">Email</LABEL>
			<INPUT type="text" name="email_us" 
				id="email_us"
				class="form-control"
				value="<?= $email_us ?>">
		</DIV>
	</DIV>

	<DIV class="col col-md-3">
		<DIV class="form-group" id="group-tel_us">
			<LABEL for="tel_us">Teléfono</LABEL>
			<INPUT type="text" name="tel_us" 
				id="tel_us"
				class="form-control"
				value="<?= $tel_us ?>">
		</DIV>
	</DIV>

</DIV>
<DIV class="row">

	<DIV class="col col-md-3">
		<DIV class="form-group" id="group-calle_us">
			<LABEL for="calle_us">Calle</LABEL>
			<INPUT type="text" name="calle_us" 
				id="calle_us"
				class="form-control"
				value="<?= $calle_us ?>">
		</DIV>
	</DIV>

	<DIV class="col col-md-3">
		<DIV class="form-group" id="group-col_us">
			<LABEL for="col_us">Colonia</LABEL>
			<INPUT type="text" name="col_us" 
				id="col_us"
				class="form-control"
				value="<?= $col_us ?>">
		</DIV>
	</DIV>

	<DIV class="col col-md-2">
		<DIV class="form-group" id="group-cp_us">
			<LABEL for="cp_us">CP</LABEL>
			<INPUT type="text" name="cp_us" 
				id="cp_us"
				class="form-control"
				value="<?= $cp_us ?>">
		</DIV>
	</DIV>


</DIV>

<DIV class="row">

	<DIV class="col col-md-2">
		<DIV class="form-group" id="group-numc_us">
			<LABEL for="numc_us">Número</LABEL>
			<INPUT type="text" name="numc_us" 
				id="numc_us"
				class="form-control"
				value="<?= $numc_us ?>">
		</DIV>
	</DIV>

	<DIV class="col col-md-2">
		<DIV class="form-group" id="group-cve_tipous">
			<LABEL for="cve_tipous">Tipo Usuario</LABEL>
			<INPUT type="text" name="cve_tipous" 
				id="cve_tipous"
				class="form-control"
				value="<?= $cve_tipous ?>">
		</DIV>
	</DIV>


</DIV>


	<DIV class="row">

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
					value="<?= $rowtipo["cve_ciu"] ?>"
					<?= $cve_ciu == $rowtipo["cve_ciu"] ?
						'selected="selected"' : "" ?>><?= $rowtipo["nom_ciu"] ?>
				</OPTION>
			<?php endwhile; ?>
			
			</SELECT>
		</DIV>

	</DIV>

	<DIV class="col col-md-3">
		<DIV class="form-group" id="group-nickuser">
			<LABEL for="nickuser">Nombre de usuario</LABEL>
			<INPUT type="text" name="nickuser"
				id="nickuser" 
				class="form-control"
				value="<?= $nickuser ?>">
		</DIV>
	</DIV>
	


	</DIV>

	<DIV class="col col-md-4">
		<DIV class="form-group">
			<BUTTON class="btn btn-lg btn-success">
				<I class="fa fa-floppy-o fa-2x"></I>
				Guardar
			</BUTTON>
			</BUTTON>
			<A class="btn btn-lg btn-default"
				href="cliente.php?u=<?= $u ?>&s=<?= $s ?>"
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

<?php //endif; ?>