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
	<TITLE>Catálogo</TITLE>
	<META charset="UTF-8">
	<META author="Equipo 5 T186">
	<SCRIPT src="../js/jquery-3.4.1.min.js"></SCRIPT>
	<LINK rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
	<LINK rel="stylesheet" href="../font-awesome/css/font-awesome.min.css" />
	<SCRIPT src="../bootstrap/js/bootstrap.min.js"></SCRIPT>
	<SCRIPT src="js/inventario_formulario.js"></SCRIPT>

</HEAD>

<BODY>
<?php 
extract( $_REQUEST );
?>
<DIV class="container">

<FORM id="form-inventario" action="inventario_procesa.php" method="post">
	<INPUT type="hidden" name="accion"
		value="<?= $accion ?>" />
		<INPUT type="hidden" name="u"
		value="<?= $u ?>" />
		<INPUT type="hidden" name="s"
		value="<?= $s ?>" />

<BR />

<DIV class="row">
	<DIV class="col col-md-9">
		<H2>Actualización de producto en inventario</H2>
	</DIV>
</DIV>

<DIV class="row">
	<DIV class="col col-md-9">
		<DIV id="mensaje-validacion"></DIV>
	</DIV>
</DIV>


<?php

$Exis_prod = "0";
$Cve_prod = "";
$Cve_talla = "";
$cve_suc = "";

if ( $accion == "cambio" ) {
	$sql = "select * from inventario 
			where No_inv='$No_inv'";

	$rs = $mysqli->query( $sql );
	if( $row = $rs->fetch_assoc() ) {
		extract( $row );
	}
}
else if ( $accion == "alta" ) {
	$No_inv = "0";
}
?>


<DIV class="row">
    
    <DIV class="col col-md-2">
		<DIV class="form-group" id="group-No_inv">
			<LABEL for="No_inv">No. de inventario</LABEL>
			<INPUT type="text" name="No_inv" 
				id="No_inv"
				class="form-control"
				value="<?= $No_inv ?>" <?=
				$accion == "cambio" ? ' readonly="readonly"' : ""
				?>
				/>
		</DIV>
	</DIV>

	<DIV class="col col-md-2">
		<DIV class="form-group" id="group-Exis_prod">
			<LABEL for="Exis_prod">Existencia</LABEL>
			<INPUT type="text" name="Exis_prod" 
				id="Exis_prod"
				class="form-control"
				value="<?= $Exis_prod ?>">
		</DIV>
	</DIV>

</DIV>	

<DIV class="row">

<DIV class="col col-md-2">
		<DIV class="form-group" id="group-No_ven">
			<LABEL for="Cve_prod">ID de producto</LABEL>
			<SELECT name="Cve_prod" class="form-control" id="Cve_prod">
				<OPTION value="0">-- Elige un producto --</OPTION>
			
			<?php
			$sql = "select * from producto";
			$rstipo = $mysqli->query( $sql );
			while ( $rowtipo = $rstipo->fetch_assoc() ) : ?>
				<OPTION 
					value="<?= $rowtipo["Cve_prod"] ?>"
					<?= $Cve_prod == $rowtipo["Cve_prod"] ?
						'selected="selected"' : "" ?>><?= $rowtipo["Cve_prod"] ?>
				</OPTION>
			<?php endwhile; ?>
			
			</SELECT>
		</DIV>
	</DIV>

	<DIV class="col col-md-2">
		<DIV class="form-group" id="group-Cve_talla">
			<LABEL for="Cve_talla">Talla</LABEL>
			<SELECT name="Cve_talla" class="form-control" id="Cve_talla">
				<OPTION value="0">-- Elige una talla --</OPTION>
			
			<?php
			$sql = "select * from talla";
			$rstipo = $mysqli->query( $sql );
			while ( $rowtipo = $rstipo->fetch_assoc() ) : ?>
				<OPTION 
					value="<?= $rowtipo["Cve_talla"] ?>"
					<?= $Cve_talla == $rowtipo["Cve_talla"] ?
						'selected="selected"' : "" ?>><?= $rowtipo["Desc_talla"] ?>
				</OPTION>
			<?php endwhile; ?>
			
			</SELECT>
		</DIV>
</DIV>

</DIV>

	
<DIV class="row">

	<DIV class="col col-md-4">
		<DIV class="form-group" id="group-cve_suc">
			<LABEL for="cve_suc">Sucursal</LABEL>
			<SELECT name="cve_suc" class="form-control" id="cve_suc">
				<OPTION value="0">-- Elige sucursal --</OPTION>
			<?php
			$sql = "select * from sucursal";
			$rstipo = $mysqli->query( $sql );
			while ( $rowtipo = $rstipo->fetch_assoc() ) : ?>
				<OPTION 
					value="<?= $rowtipo["Cve_suc"] ?>"
					<?= $cve_suc == $rowtipo["Cve_suc"] ?
						'selected="selected"' : "" ?>><?= $rowtipo["Nom_suc"] ?>
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
				href="inventario.php?u=<?= $u ?>&s=<?= $s ?>"
				id="btn-cancelar">
				<I class="fa fa-remove fa-2x"></I>
				Cancelar
			</A>

		</DIV>
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