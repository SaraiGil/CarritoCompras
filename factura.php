<?php
	include( "nomanches_funciones.php" );
	include './inc/link.php';
	$mysqli = conectar();
	extract( $_REQUEST );
	if ( !existe_sesion( $u, $s ) ) :
		header( "location:nomanches_login.php?iderror=2" );
	else :
?>

<!DOCTYPE html>
<HTML>

<HEAD>
	<TITLE>Factura</TITLE>
	<META charset="UTF-8">
	<META author="Equipo 5 T186">
	<SCRIPT src="../js/jquery-3.4.1.min.js"></SCRIPT>
	<LINK rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
	<LINK rel="stylesheet" href="../font-awesome/css/font-awesome.min.css" />
	<SCRIPT src="../bootstrap/js/bootstrap.min.js"></SCRIPT>
	<SCRIPT src="js/factura.js"></SCRIPT>

</HEAD>
<BODY>

<DIV class="barra">
	 <?php include './inc/navbaradm.php'; ?>
</DIV>


<DIV class="container">

<BR />


<H3>Lista de facturas</H3>
<BR />

<DIV class="row">
	<DIV class="col col-md-12">
		<H3>Buscar factura en específico:</H3>  
		  <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
 	</DIV>
</DIV>

<BR />

<?php

$sql = "SELECT * FROM factura";

$rs = $mysqli->query( $sql );

if( $rs->num_rows >0 ) :
?>

<DIV class="col col-md-9">
	<TABLE class="table table-bordered table-hover table-responsive centro">
		<TR class="amarillo">
			<TH class="col col-md-3">Folio</TH>
			<TH class="col col-md-3">Fecha</TH>
			<TH class="col col-md-3">Número de venta</TH>
			<TH class="col col-md-2">Edición</TH>


		</TR>

		<?php
		
		while( $row = $rs->fetch_assoc() ) : 
			extract( $row ); //Crea una variable por cada índice del arreglo
			?>
			<TBODY id="myTable">
			<TR >	
				<TD><?= $Fol_fac?></TD>
				<TD><?= $Fec_fac?></TD>
				<TD><?= $No_ven?></TD>
				

				
				<TD><A title="Modificar <?= $Fol_fac ?>"
						class="btn btn-sm btn-info"
						href="factura_formulario.php?accion=cambio&Fol_fac=<?= $Fol_fac ?>&u=<?= $u ?>&s=<?= $s ?>">
						<I class="fa fa-edit fa-2x"></I>
						</A>
						<BUTTON 
						type="button"
						title="Borrar <?= $Fol_fac ?>"
						class="btn btn-sm btn-danger btn-borrar"
						data-toggle="modal"
						data-target="#modal-baja"
						data-Fol_fac="<?= $Fol_fac ?>"
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
			<H4>Facturas encontradas: <?= $rs->num_rows ?></H4>
		</DIV>
	</DIV>

<?php else : ?>
	<DIV class="row">
		<DIV class="col col-md-9">
			<H4>No se encontraron facturas</H4>
		</DIV>
	</DIV>

<?php endif; ?>


<DIV class="row">
		<DIV class="col col-md-12">
			<A class="btn btn-lg btn-success float-right helper pull-right"
				href="factura_formulario.php?accion=alta&u=<?= $u ?>&s=<?= $s ?>">
				<I id="icono" class="fa fa-plus"></I>
				Agregar factura</A>

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
        <p>¿Quieres eliminar la factura: <STRONG><SPAN id="modal-Fol_fac"></SPAN></STRONG>?</p>
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

<?php endif; ?>