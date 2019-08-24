    <?php include_once './inc/link.php'; 
          include_once 'carrito.php'; 
          include_once( "nomanches_funciones.php" );
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
  <link rel="stylesheet" href="fontawesome4/css/font-awesome.min.css" />
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
 <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>
<STYLE>
	body{
		background-color: white;
    
	}

	</STYLE>
<body id="container-page-index" class="#container-page-index">
    <div class="barra">
        <?php include_once './inc/navbar.php'; ?>
    </div>
     <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Maid Cleaning Service</h1>
            <span class="subheading">Servicio de limpieza a domicilio</span>
          </div>
        </div>
      </div>
    </div>
  </header>

 <?php
 $sql = "SELECT s.*, c.nom_ciu FROM sucursal as s LEFT JOIN ciudad as c USING ( cve_ciu );";
     

$rs = $mysqli->query( $sql );


?>

<div class="col col-md-10">
 <table class="table table-bordered table-hover table-responsive" >
    <tr class="info">
     
      <th class="col col-md-10" colspan="10">Sucursales</th></tr>
      <TR class="">
        <TH class="col col-md-2">Nombre</TH>
        <TH class="col col-md-3">Calle</TH>
        <TH class="col col-md-2">Número</TH>
        <TH class="col col-md-4">Colonia</TH>
        <TH class="col col-md-1">CP</TH>
        <TH class="col col-md-4">Ciudad/Municipio</TH>
      </TR>

    <?php
    
    while( $row = $rs->fetch_assoc() ) : 
      extract( $row ); //Crea una variable por cada índice del arreglo
      ?>
      <tbody id="myTable">
     
        <td align="center"><?=$nom_suc?></td>
         <td align="center"><?=$calle_suc?></td>
         <td align="center"><?=$numc_suc ?></td>
         <td align="center"><?= $col_suc ?></td>
         <td align="center"><?= $cp_suc ?></td>
         <td align="center"><?= $nom_ciu ?></td>

       
        

      

    <?php endwhile; ?>
  </tbody>
  </table>



          
    </section>
  
    <?php include_once './inc/footeradm.php'; ?>
</body>
</html>


