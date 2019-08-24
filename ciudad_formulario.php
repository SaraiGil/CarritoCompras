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
	<TITLE>Actualizacion de Ciudad</TITLE>
	<META charset="UTF-8">
	<META author="Equipo 5 T186">
</HEAD>

<BODY>
<?php 
extract( $_REQUEST );
?>
<DIV class="container">
<FORM id="form-ciudad" action="ciudad_procesa.php" method="post">
	<INPUT type="hidden" name="accion"
		value="<?= $accion ?>" />
	<INPUT type="hidden" name="u"
		value="<?= $u ?>" />
	<INPUT type="hidden" name="s"
		value="<?= $s ?>" />

<BR />

<DIV class="row">
	<DIV class="col col-md-9">
		<H2>Actualización de ciudad</H2>
	</DIV>
</DIV>

<DIV class="row">
	<DIV class="col col-md-9">
		<DIV id="mensaje-validacion"></DIV>
	</DIV>
</DIV>

<?php


$nom_ciu = "" ;
$nom_est = "" ;
$cve_est = "" ;
$cve_ciu = "" ;


if ( $accion == "cambio" ) {
	$sql = "SELECT * from ciudad 
			where cve_ciu='$cve_ciu'";

	$rs = $mysqli->query( $sql );
	if( $row = $rs->fetch_assoc() ) {
		extract( $row );
	}
}
else if ( $accion == "alta" ) {
	$cve_ciu = "";
}
?>


<DIV class="row">

     <DIV class="col">
		<DIV class="form-group" id="group-cve_ciu">
			<LABEL for="cve_ciu">cve_ciu</LABEL>
			<INPUT type="text" name="cve_ciu" 
				id="cve_ciu"
				class="form-control"
					value="<?= $cve_ciu ?>" <?=
				$accion == "cambio" ? ' readonly="readonly"' : ""
				?>
				/>
		</DIV>
	</DIV>

	<DIV class="col">
		<DIV class="form-group" id="group-nom_ciu">
			<LABEL for="nom_ciu">Nombre</LABEL>
			<INPUT type="text" name="nom_ciu" 
				id="nom_ciu"
				class="form-control"
				value="<?= $nom_ciu ?>"/>
		</DIV>
	</DIV>

	<DIV class="col">
		<DIV class="form-group" id="group-cve_est">
			<LABEL for="cve_est">Estado</LABEL>
			<SELECT name="cve_est" class="form-control" id="cve_est">
				<OPTION value="0">-- Elige estado--</OPTION>
			<?php
			$sql = "select * from estado";
			$rstipo = $mysqli->query( $sql );
			while ( $rowtipo = $rstipo->fetch_assoc() ) : ?>
				<OPTION 
					value="<?= $rowtipo["cve_est"] ?>"
					<?= $cve_est == $rowtipo["cve_est"] ?
						'selected="selected"' : "$nom_est" ?>><?= $rowtipo["nom_est"] ?>
				</OPTION>
			<?php endwhile; ?>
			
			</SELECT>
		</DIV>

	</DIV>
</DIV>


	<DIV class="col col-md-4">
		<DIV class="form-group">
			<BUTTON type="submit" class="btn btn-lg btn-success">
				<I class="fa fa-floppy-o fa-2x"></I>
				Guardar
			</BUTTON>

			<A class="btn btn-lg btn-default"
				href="ciudad.php?u=<?= $u ?>&s=<?= $s ?>"
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