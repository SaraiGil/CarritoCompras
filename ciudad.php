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
	<TITLE>Ciudades</TITLE>
	<META charset="UTF-8">
	<META author="Equipo 5 T186">


</HEAD>
<BODY>

<DIV class="barra">
	 <?php include './inc/navbaradm.php'; ?>
</DIV>	

<BR />

<DIV class="container">

<H3>Lista de ciudades</H3>
<BR />

<DIV class="row">
	<DIV class="col col-md-12">
		<H4>Buscar ciudad:</H4>  
		  <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
 	</DIV>
</DIV>
<BR />



<?php
$rs = $mysqli->query( "SELECT * FROM ciudad,estado WHERE ciudad.cve_est = estado.cve_est ORDER BY cve_ciu");
if( $rs->num_rows >0 ) :
?>

<DIV class="col col-md-12">
	<TABLE class="table table-bordered table-hover table-responsive">
		<TR class="cafe">
			<TH class="col col-md-2">Clave de Ciudad</TH>
			<TH class="col col-md-2">Nombre</TH>
			<TH class="col col-md-2">Clave de Estado</TH>
			<TH class="col col-md-2">Nombre de Estado</TH>
			<TH class="col col-md-2">Modificar / Eliminar</TH>

		</TR>

		<?php
		
		while( $row = $rs->fetch_assoc() ) : 
			extract( $row ); //Crea una variable por cada índice del arreglo
			?>
			<TBODY id="myTable">
			<TR >	
				<TD><?= $cve_ciu?></TD>
				<TD><?= $nom_ciu?></TD>
				<TD><?= $cve_est?></TD>
				<TD><?= $nom_est?></TD>

				
				

				
				<TD><A title="Modificar <?= $cve_ciu ?>"
						class="btn btn-sm btn-info"
						href="ciudad_formulario.php?accion=cambio&cve_ciu=<?= $cve_ciu ?>&u=<?= $u ?>&s=<?= $s ?>">
						<I class="fa fa-edit fa-2x"></I>
						</A>
						<BUTTON
						type="button"
						title="Borrar <?= $nom_ciu ?>"
						class="btn btn-sm btn-danger btn-borrar"
						data-toggle="modal"
						data-target="#modal-baja"
						data-cve_ciu="<?= $cve_ciu ?>"
						data-nom_ciu="<?= $nom_ciu ?>"
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
			<H4>Ciudad encontrada: <?= $rs->num_rows ?></H4>
		</DIV>
	</DIV>

<?php else : ?>
	<DIV class="row">
		<DIV class="col col-md-9">
			<H4>No se encontro la ciudad</H4>
		</DIV>
	</DIV>

<?php endif; ?>


<DIV class="row">
		<DIV class="col col-md-12">
			<A class="btn btn-lg btn-success float-right helper pull-right"
				href="ciudad_formulario.php?accion=alta&u=<?= $u ?>&s=<?= $s?>">
				<I id="icono" class="fa fa-plus"></I>
				Agregar ciudad</A>

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
        <p>¿Quieres eliminar la ciudad: <STRONG><SPAN id="modal-Nom_ciu"></SPAN></STRONG>?</p>
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
  </div>




</div>

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

</body>

<?php
desconectar();
?>

</html>

<?php //endif; ?>