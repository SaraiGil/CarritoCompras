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
	<TITLE>Proveedor</TITLE>
<!-- 	<META charset="UTF-8">
	<META author="Equipo 5 T186">
	<SCRIPT src="../js/jquery-3.4.1.min.js"></SCRIPT>
	<LINK rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
	<LINK rel="stylesheet" href="../font-awesome/css/font-awesome.min.css" />
	<SCRIPT src="../bootstrap/js/bootstrap.min.js"></SCRIPT>
	<SCRIPT src="js/proveedor.js"></SCRIPT> -->

</HEAD>
<BODY>

<DIV class="barra">
	 <?php include './inc/navbaradm.php'; ?>
</DIV>

<DIV class="container">


<BR />

<DIV class="row">
	<DIV class="col col-md-12">
		<H3>Buscar proveedor en específico:</H3>  
		  <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
 	</DIV>
</DIV>

<BR />

<?php

$sql = "SELECT pr.*, cd.Nom_ciu 
		FROM proveedor as pr
			LEFT JOIN ciudad as cd using (cve_ciu)";

$rs = $mysqli->query( $sql );

if( $rs->num_rows >0 ) :
?>

<DIV class="col col-md-26">
	<TABLE class="table table-bordered table-hover table-responsive centro">
		<TR class="naranja">
			<TH class="col col-md-1">Clave</TH>
			<TH class="col col-md-2">Nombre</TH>
			<TH class="col col-md-2">Correo</TH>
			<TH class="col col-md-2">Téléfono</TH>
			<TH class="col col-md-3">Calle</TH>
			<TH class="col col-md-4">Colonia</TH>
			<TH class="col col-md-1">CP</TH>
			<TH class="col col-md-2">Número</TH>
			<TH class="col col-md-4">Ciudad</TH>
			<TH class="col col-md-2">Edición</TH>

		</TR>

		<?php
		
		while( $row = $rs->fetch_assoc() ) : 
			extract( $row ); //Crea una variable por cada índice del arreglo
			?>
			<TBODY id="myTable">
			<TR >	
				<TD><?= $cve_prov ?></TD>
				<TD><?= $nom_prov ?></TD>
				<TD><?= $email_prov ?></TD>
				<TD><?= $tel_prov ?></TD>
				<TD><?= $calle_prov ?></TD>
				<TD><?= $col_prov ?></TD>
				<TD><?= $cp_prov ?></TD>
				<TD><?= $ncalle_prov ?></TD>
				<TD><?= $cve_ciu ?></TD>
				
				
				</TD>

				
				<TD><A title="Modificar <?= $Nom_prov ?>"
						class="btn btn-sm btn-info"
						href="proveedor_formulario.php?accion=cambio&cve_prov=<?= $cve_prov ?>&u=<?= $u ?>&s=<?= $s ?>">
						<I class="fa fa-edit fa-2x"></I>
						</A>
						<BUTTON 
						type="button"
						title="Borrar <?= $Nom_prov ?>"
						class="btn btn-sm btn-danger btn-borrar"
						data-toggle="modal"
						data-target="#modal-baja"
						data-nom_prov="<?= $nom_prov ?>"
						data-cve_prov="<?= $cve_prov ?>"
						data-u="<?= $u ?>"
						data-s="<?= $s ?>">
						<I class="fa fa-trash-o fa-2x"></I>
						</BUTTON>
					</TD>

			</TR>

		<?php endwhile; ?>
	</TBODY>
	</TABLE>
</DIV>

<DIV class="row">
		<DIV class="col col-md-9">
			<H4>Proveedores encontrados: <?= $rs->num_rows ?></H4>
		</DIV>
	</DIV>

<?php else : ?>
	<DIV class="row">
		<DIV class="col col-md-9">
			<H4>No se encontraron proveedores</H4>
		</DIV>
	</DIV>

<?php endif; ?>


<DIV class="row">
		<DIV class="col col-md-12">
			<A class="btn btn-lg btn-success float-right helper pull-right"
				href="proveedor_formulario.php?accion=alta&u=<?= $u ?>&s=<?= $s ?>">
				<I id="icono" class="fa fa-plus"></I>
				Agregar proveedor</A>

				<A class="btn btn-lg btn-default"
				href="menu_admin.php?u=<?= $u ?>&s=<?= $s ?>">
				Regresar al menú
				</A>
		</DIV>
	</DIV>



<!-- Modal Confirmación de Baja -->
<div id="modal-baja" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header"
      	style="background-color:#cc0000;color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Confirmar baja</h4>
      </div>
      <div class="modal-body">
        <p>¿Quieres eliminar el proovedor: <STRONG><SPAN id="modal-Nom_prov"></SPAN></STRONG>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
        	<i class="fa fa-remove"></i>
        	Cancelar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn-borrar-confirmar">
        	<i class="fa fa-trash"></i>
        	Confirmar</button>
      </div>
    </div>

  </div>




</DIV>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</BODY>

<?php
desconectar();
?>

</HTML>

<?php //endif; ?>