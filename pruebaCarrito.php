<?php
include 'carrito.php';
include './inc/link.php';
include_once 'nomanches_funciones.php';
$mysqli = conectar();
extract( $_REQUEST );
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Maid Cleaning Service</title>

  <!-- Bootstrap core CSS -->
  <LINK rel="stylesheet" href="fontawesome4/css/font-awesome.min.css" />
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
 <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">


	<STYLE>
		.suc:link, .suc:visited {
		  background-color: #white;
		  border: 2px solid #4CAF50;
		  color: black;
		  padding: 14px 25px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		}

		.suc:hover, .suc:active {
		  background-color: #4CAF50;
		  color: white;
		}

		table, th, td, tr{
			text-align: center;
			vertical-align: : middle;
			
		}


	</STYLE>
</HEAD>
<BODY>

   <DIV class="barra">
       <?php include './inc/navbar.php'; ?>
   </DIV>
     <header class="masthead" style="background-image: url('img/about-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Nuestros Servicios</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p align="center">Elige tu paquete o personalízalo a tu gusto...</p>
        
      </div>
    </div>
  </div>

<DIV class="container">

<?php if($msj!=""){?>
<DIV class = "alert alert-success">
<?php echo $msj;?>
<a href="mostrar_carrito.php" class="badge badge-success">ver Carrito</a>
</DIV>
<?php } ?>

<BR />



<?php $suc=""; 

?>

</br>

  <?php

  $mysqli = conectar();

  $sql = "SELECT * FROM paquete;";
  $rs= $mysqli->query($sql);
?>


<DIV class="col col-md-12">
  <TABLE class="table table-bordered table-hover table-responsive">
    <TR class="info">
     
      <TH class="col col-md-9" colspan="3">PRODUCTOS</TH>

    </TR>
    <TR>

    <?php
    
    while( $row = $rs->fetch_assoc() ) : 
      extract( $row ); //Crea una variable por cada índice del arreglo
      //print_r($row);
      ?>
</TR>
      <TBODY id="myTable">
      <TR > 
     
        <TD class="col col-md-2" align="center"><img src="img/pisos.jpg" class="imgRedonda" position="center" style="border-radius:1500px; width: 100px; height: 100px" align="center"></TD> 
        <TD><?="<h4>".$nom_paq."</h4>"?><TD>
        <TD><?="<h4>".$desc_paq."</h4>"?><TD>
        <TD><?="<h4>".$prec_paq."</h4>"  ?><TD>

        
          	<FORM action="" method="post">

							<input type="hidden" name="cve_paq"  id="cve_paq"  value="<?php echo $cve_paq; ?>">
							<input type="hidden" name="nom_paq" id="nom_paq" value="<?php echo $nom_paq; ?>">
							<input type="hidden" name="cantidad"  id="cantidad"  value="1">
							<input type="hidden" name="desc_paq" id="desc_paq" value="<?php echo $desc_paq; ?>">
								<input type="hidden" name="prec_paq" id="prec_paq" value="<?php echo $prec_paq; ?>">
          <TD>
							<BUTTON class="btn btn-warning"	name="btnAccion"	value="Agregar"	type="submit">Agregar al carrito</BUTTON>
						</FORM>
          </TD>


	<?php endwhile; ?>
      </TR>
			</TR>

	
	</TBODY>
	</TABLE>



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



</HTML>