<?php
	include( "c_funciones.php" );
	include './inc/link.php';
	$mysqli = conectar();

	extract( $_REQUEST );
	
	/*if ( !existe_sesion( $u, $s ) ) :
		header( "location:c_login.php?iderror=2" );
	else :*/
?>

<!DOCTYPE html>
<HTML>

<HEAD>
	<TITLE>Clientes</TITLE>
	<META charset="UTF-8">
	<META author="Equipo 5 T186">
	<SCRIPT src="../js/jquery-3.4.1.min.js"></SCRIPT>
	<LINK rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
	<LINK rel="stylesheet" href="../font-awesome/css/font-awesome.min.css" />
	<SCRIPT src="../bootstrap/js/bootstrap.min.js"></SCRIPT>
	<SCRIPT src="js/cliente.js"></SCRIPT>


</HEAD>
<BODY>

<DIV class="barra">
	 <?php include './inc/navbaradm.php'; ?>
</DIV>

<DIV class="container">

<BR />

<H3>Lista de clientes</H3>
<BR />

<DIV class="row">
	<DIV class="col col-md-12">
		<H4>Buscar cliente en específico:</H4>  
		  <input class="form-control" id="myInput" type="text" placeholder="Search..">
 	</DIV>
</DIV>
<BR />



<?php
$rs = $mysqli->query( "SELECT * from usuario where cve_tipous=3;" );
if( $rs->num_rows ==0 ) :
?>

<DIV class="row">
		<DIV class="col col-md-9">
			<H4>No se encontraron clientes</H4>
		</DIV>
	</DIV>



<?php else : ?>

<DIV class="col col-md-12">
	<TABLE class="table table-bordered table-hover table-responsive centro">
		<TR class="azul">
			<TH class="col col-md-2">ID</TH>
			<TH class="col col-md-2">Nombre</TH>
			<TH class="col col-md-2">Apellido paterno</TH>
			<TH class="col col-md-2">Apellido materno</TH>
			<TH class="col col-md-2">RFC</TH>
			<TH class="col col-md-2">Email</TH>
			<TH class="col col-md-2" col>Teléfono</TH>
			<TH class="col col-md-1" col>Edición</TH>

		</TR>

		<?php
		
		while( $row = $rs->fetch_assoc() ) : 
			extract( $row ); //Crea una variable por cada índice del arreglo
			?>
			<TBODY id="myTable">
			<TR >	
				<TD><?= $id_us?></TD>
				<TD><?=$nom_us?></TD>
				<TD><?= $ap_us?></TD>
				<TD><?=$am_us?></TD>
				<TD><?= $rfc_us?></TD>
				<TD><?=$email_us?></TD>
				<TD><?= $tel_us?></TD>
				

				
				<TD><A title="Modificar <?= $nom_us ?>"
						class="btn btn-sm btn-info"
						href="cliente_formulario.php?accion=cambio&id_us=<?= $id_us ?>&u=<?= $u ?>&s=<?= $s ?>">
						<I class="fa fa-edit fa-2x"></I>
						</A>
						<BUTTON 
						type="button"
						title="Borrar <?= $nom_us ?>"
						class="btn btn-sm btn-danger btn-borrar"
						data-toggle="modal"
						data-target="#modal-baja"
						data-nom_us="<?= $nom_us ?>"
						data-id_us="<?= $id_us ?>"
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
			<H4>Clientes encontrados: <?= $rs->num_rows ?></H4>
		</DIV>
	</DIV>	

<?php endif; ?>


<DIV class="row">
		<DIV class="col col-md-12">
			<A class="btn btn-lg btn-success float-right helper pull-right"
				href="cliente_formulario.php?accion=alta&u=<?= $u ?>&s=<?= $s ?>">
				<I id="icono" class="fa fa-plus"></I>
				Agregar cliente</A>

			<A class="btn btn-lg btn-default "
				href="menu_admin.php?u=<?= $u ?>&s=<?= $s ?>"
				id="btn-cancelar">
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
        <p>¿Quieres eliminar al cliente: <STRONG><SPAN id="modal-Nom_clie"></SPAN></STRONG>?</p>
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