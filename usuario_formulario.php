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
	<TITLE>Usuario</TITLE>
	<META charset="UTF-8">
	<META author="Equipo 5 T186">
<!-- 	<SCRIPT src="../js/jquery-3.4.1.min.js"></SCRIPT>
	<LINK rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
	<LINK rel="stylesheet" href="../font-awesome/css/font-awesome.min.css" />
	<SCRIPT src="../bootstrap/js/bootstrap.min.js"></SCRIPT>
	<SCRIPT src="js/usuario_formulario.js"></SCRIPT> -->

</HEAD>

<BODY>
<?php 
extract( $_REQUEST );
?>
<DIV class="container">

<FORM id="form-usuario" action="usuario_procesa.php" method="post">
	<INPUT type="hidden" name="accion"
		value="<?= $accion ?>" />
		<INPUT type="hidden" name="u"
		value="<?= $u ?>" />
		<INPUT type="hidden" name="s"
		value="<?= $s ?>" />


<BR />

<DIV class="row">
	<DIV class="col col-md-9">
		<H2>Actualización de usuario</H2>
	</DIV>
</DIV>


<DIV class="row">
	<DIV class="col col-md-9">
		<DIV id="mensaje-validacion"></DIV>
	</DIV>
</DIV>


<?php

$tipo_us = "";
$pass_usu = "";

if ( $accion == "cambio" ) {
	$sql = "select * from usuario 
			where nickuser='$nickuser'";

	$rs = $mysqli->query( $sql );
	if( $row = $rs->fetch_assoc() ) {
		extract( $row );
	}
}
else if ( $accion == "alta" ) {
	$nickuser = "";
}
?>


<DIV class="row">
    
    <DIV class="col col-md-3">
		<DIV class="form-group" id="group-nickuser">
			<LABEL for="nickuser">NOMBRE DE USUARIO</LABEL>
			<INPUT type="text" name="nickuser" 
				id="nickuser"
				class="form-control"
				value="<?= $nickuser ?>" <?=
				$accion == "cambio" ? ' readonly="readonly"' : ""
				?>
				/>
		</DIV>
	</DIV>


	<DIV class="col col-md-3">
		<DIV class="form-group" id="group-Tipo_usu">
			<LABEL for="Tipo_usu">Usuario</LABEL>			
				<SELECT name="Tipo_usu" class="form-control" id="Tipo_usu">
					<OPTION value="0">--Elige un usuario---</OPTION>
					<OPTION
					value='cliente'
					<?= $tipo_us == 'cliente' ?
						'selected="selected"' : "" ?>>cliente
					</OPTION>
					<OPTION
					value='admin'
					<?= $tipo_us == 'admin' ?
						'selected="selected"' : "" ?>>admin
					</OPTION>
					<OPTION
					value='empleado'
					<?= $tipo_us == 'empleado' ?
						'selected="selected"' : "" ?>>empleado
					</OPTION>
				</SELECT>
		</DIV>
	</DIV>

</DIV>	

<DIV class="row">
	<DIV class="col col-md-6">
		<DIV class="form-group" id="group-Pass_usu">
			<LABEL for="Pass_usu">PASSWORD</LABEL>
			<INPUT type="password" name="Pass_usu" 
				id="Pass_usu"
				class="form-control"
				value="<?= $Pass_usu ?>">
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
				href="usuario.php?u=<?= $u ?>&s=<?= $s ?>"
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