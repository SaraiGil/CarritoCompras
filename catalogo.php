<?php
	include( "c_funciones.php" );
	include './inc/link.php';
	$mysqli = conectar();
	extract( $_REQUEST );
	if ( !existe_sesion( $u, $s ) ) :
		header( "location:c_login.php?iderror=2" );
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
	<SCRIPT src="js/catalogo.js"></SCRIPT>

</HEAD>
<BODY>

<DIV class="barra">
	 <?php include './inc/navbaradm.php'; ?>
</DIV>	

<DIV class="container">

<BR />


<H3>Lista de productos</H3>
<BR />

<DIV class="row">
	<DIV class="col col-md-12">
		<H3>Buscar producto en específico:</H3>  
		  <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
 	</DIV>
</DIV>

<BR />

<?php

$sql = "SELECT p.*, ct.desc_tip
		FROM producto as p
			LEFT JOIN tipo_producto as ct USING ( cve_tip );";

$rs = $mysqli->query( $sql );

if( $rs->num_rows >0 ) :
?>

<DIV class="col col-md-10">
	<TABLE class="table table-bordered table-hover table-responsive centro">
		<TR class="azul_2">
			<TH class="col col-md-1 txtblanco">ID</TH>
			<TH class="col col-md-9 txtblanco" colspan="3">PRODUCTO</TH>

		</TR>

		<?php
		
		while( $row = $rs->fetch_assoc() ) : 
			extract( $row ); //Crea una variable por cada índice del arreglo
			?>
			<TBODY id="myTable">
			<TR >	
				<TD><?= $cve_prod?></TD>
				<TD class="col col-md-2"><img src="<?=$img_prod?>" class="img-rounded" alt="Cinque Terre" height="300px" width="200px"></TD>
				<TD><?="<H2>".$desc_prod."</H2><BR />".
					$Gen_prod."<BR />$".
					$Prec_prod."<BR />".
					$Nom_cat."<BR />"
				?>
				</TD>

				
				<TD><A title="Modificar <?= $Desc_prod ?>"
						class="btn btn-sm btn-info"
						href="catalogo_formulario.php?accion=cambio&Cve_prod=<?= $Cve_prod ?>&u=<?= $u ?>&s=<?= $s ?>">
						<I class="fa fa-edit fa-2x"></I>
						</A>
						<BUTTON 
						type="button"
						title="Borrar <?= $Desc_prod ?>"
						class="btn btn-sm btn-danger btn-borrar"
						data-toggle="modal"
						data-target="#modal-baja"
						data-Desc_prod="<?= $Desc_prod ?>"
						data-Cve_prod="<?= $Cve_prod ?>"
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
			<H4>Productos encontrados: <?= $rs->num_rows ?></H4>
		</DIV>
	</DIV>

<?php else : ?>
	<DIV class="row">
		<DIV class="col col-md-9">
			<H4>No se encontraron productos</H4>
		</DIV>
	</DIV>

<?php endif; ?>


<DIV class="row">
		<DIV class="col col-md-12">
			<A class="btn btn-lg btn-success float-right helper pull-right"
				href="catalogo_formulario.php?accion=alta&u=<?= $u ?>&s=<?= $s ?>">
				<I id="icono" class="fa fa-plus"></I>
				Agregar producto</A>

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
        <p>¿Quieres eliminar el producto: <STRONG><SPAN id="modal-Desc_prod"></SPAN></STRONG>?</p>
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