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
	<TITLE>Catálogo Editar</TITLE>
	<META charset="UTF-8">
	<META author="Equipo 5 T186">
	<SCRIPT src="../js/jquery-3.4.1.min.js"></SCRIPT>
	<LINK rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
	<LINK rel="stylesheet" href="../font-awesome/css/font-awesome.min.css" />
	<SCRIPT src="../bootstrap/js/bootstrap.min.js"></SCRIPT>
	<SCRIPT src="js/catalogo_formulario.js"></SCRIPT>

</HEAD>

<BODY>

<DIV class="container">


<FORM id="form-producto" action="catalogo_procesa.php" method="post">
	<INPUT type="hidden" name="accion"
		value="<?= $accion ?>" />
	<INPUT type="hidden" name="u"
		value="<?= $u ?>" />
	<INPUT type="hidden" name="s"
		value="<?= $s ?>" />


<DIV class="row">
	<DIV class="col col-md-12 text-right">
		<A class="btn btn-secondary"
			href="nomanches_cerrar.php?u=<?= $u ?>&s=<?= $s ?>">
			<I id="icono" class="fa fa-sign-out"></I>
			Cerrar sesión (<?= $u ?>)
		</A>
	</DIV>
</DIV>
<BR />


<DIV class="row">
	<DIV class="col col-md-9">
		<H2>Actualización de producto</H2>
	</DIV>
</DIV>

<DIV class="row">
	<DIV class="col col-md-9">
		<DIV id="mensaje-validacion"></DIV>
	</DIV>
</DIV>


<?php
$Prec_prod = "0.00";
$Costo_prod = "0.00";
$Gen_prod = "";
$Desc_prod = "";
$Cve_cat = "";
$Img_prod = "";

if ( $accion == "cambio" ) {
	$sql = "select * from producto 
			where Cve_prod='$Cve_prod'";

	$rs = $mysqli->query( $sql );
	if( $row = $rs->fetch_assoc() ) {
		extract( $row );
	}
}
else if ( $accion == "alta" ) {
	$Cve_prod = "";
}
?>


<DIV class="row">
    
    <DIV class="col col-md-2">
		<DIV class="form-group" id="group-Cve_prod">
			<LABEL for="Cve_prod">ID</LABEL>
			<INPUT type="text" name="Cve_prod" 
				id="Cve_prod"
				class="form-control"
				value="<?= $Cve_prod ?>" <?=
				$accion == "cambio" ? ' readonly="readonly"' : ""
				?>
				/>
		</DIV>
	</DIV>

	<DIV class="col col-md-7">
		<DIV class="form-group" id="group-Desc_prod">
			<LABEL for="Desc_prod">PRODUCTO</LABEL>
			<INPUT type="text" name="Desc_prod" 
				id="Desc_prod"
				class="form-control"
				value="<?= $Desc_prod ?>">
		</DIV>
	</DIV>

</DIV>	

<DIV class="row">
	<DIV class="col col-md-3">
		<DIV class="form-group" id="group-Costo_prod">
			<LABEL for="Costo_prod">COSTO</LABEL>
			<INPUT type="text" name="Costo_prod" 
				id="Costo_prod"
				class="form-control"
				value="<?= $Costo_prod ?>">
		</DIV>
	</DIV>

	<DIV class="col col-md-3">
		<DIV class="form-group" id="group-Prec_prod">
			<LABEL for="Prec_prod">PRECIO</LABEL>
			<INPUT type="text" name="Prec_prod"
				id="Prec_prod" 
				class="form-control"
				value="<?= $Prec_prod ?>">
		</DIV>
	</DIV>

	<DIV class="col col-md-3">
		<DIV class="form-group" id="group-Gen_prod">
			<LABEL for="Gen_prod">Genero</LABEL>
			<INPUT type="text" name="Gen_prod"
				id="Gen_prod" 
				class="form-control"
				value="<?= $Gen_prod ?>">
		</DIV>
	</DIV>

</DIV>
<DIV class="row">

	<DIV class="col col-md-3">
		<DIV class="form-group" id="group-Img_prod">
			<LABEL for="Img_prod">Imagen</LABEL>
			<INPUT type="text" name="Img_prod" 
				id="Img_prod"
				class="form-control"
				value="<?= $Img_prod ?>">
		</DIV>
	</DIV>

	<DIV class="col col-md-4">
		<DIV class="form-group" id="group-Cve_cat">
			<LABEL for="idtipo">TIPO</LABEL>
			<SELECT name="Cve_cat" class="form-control" id="Cve_cat">
				<OPTION value="0">-- Elige tipo --</OPTION>
			
			<?php
			$sql = "select * from categoria";
			$rstipo = $mysqli->query( $sql );
			while ( $rowtipo = $rstipo->fetch_assoc() ) : ?>
				<OPTION 
					value="<?= $rowtipo["Cve_cat"] ?>"
					<?= $Cve_cat == $rowtipo["Cve_cat"] ?
						'selected="selected"' : "" ?>><?= $rowtipo["Nom_cat"] ?>
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
				href="catalogo.php?u=<?= $u ?>&s=<?= $s ?>"
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


<?php endif; ?>