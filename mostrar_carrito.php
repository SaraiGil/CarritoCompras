<?php
include_once 'carrito.php';
include_once './inc/link.php';
include_once 'c_funciones.php';
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


</head>

<BODY>

<DIV class="barra">
	 <?php include_once './inc/navbar.php'; ?>

</DIV>
<header class="masthead" style="background-image: url('img/about-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Tu carrito de compras</h1>
          </div>
        </div>
      </div>
    </div>
  </header>


<DIV class=container>

<H3>Productos en el carrito</H3>

<?php $_SESSION['enviar_datos'] = 'si'; ?>


<?php if( !empty($_SESSION['CARRITO'] )) { ?>


<TABLE class="table table-light table-bordered">
	<tbody>
		<TR>
			<TH class="col col-md-2">Nombre Paquete</TH>
			<TH class="col col-md-2">Descripción</TH>
			<TH class="col col-md-2">Cantidad</TH>
			<TH class="col col-md-2">Precio</TH>
			<TH class="col col-md-2">Total</TH>
			<TH class="col col-md-1">---</TH>

		</TR>
		<?php $total=0; ?>
		<?php foreach ($_SESSION['CARRITO'] as $indice => $paquete) { ?>
		<TR>
			<TD class="text-center"><?php echo $paquete['NOMBRE'] ?></TD>
			<TD class="text-center"><?php echo $paquete['DESCRIPCION'] ?></TD> 
			<TD class="text-center"><?php echo $paquete['CANTIDAD'] ?></TD> 
			<TD class="text-center">$<?php echo $paquete['PRECIO'] ?></TD>
			<TD class="text-center">
				<FORM action="" method="post"> 
					<INPUT type="hidden" name="cve_paq" value="<?php echo $paquete['cve_paq']; ?>">
					<BUTTON class="btn btn-primary" name="btnAccion" value="Menos"	type="submit">
						<I id="icono" class="fa fa-minus"></I>
					</BUTTON>    
						<?php echo $paquete['CANTIDAD'] ?> 
					<INPUT type="hidden" name="cve_paq" value="<?php echo $paquete['cve_paq']; ?>">
					<BUTTON class="btn btn-primary" name="btnAccion" value="Mas"	type="submit">
						<I id="icono" class="fa fa-plus"></I>
					</BUTTON>  
				</FORM> 
			</TD> 
			<TD class="text-center">$<?php echo number_format($paquete['PRECIO']*$paquete['CANTIDAD'], 2); ?></TD>
			<TD>
				<FORM action="" method="post">

				<INPUT type="hidden" id="cve_paq" name="cve_paq" value="<?php echo $paquete['ID_PAQ']; ?>">

				<BUTTON class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar">
				Eliminar</BUTTON>

				</FORM>
			</TD>
		</TR>
		<?php $total=$total + ($paquete['PRECIO']*$paquete['CANTIDAD']); ?>
		<?php } ?>
		<TR>
			<TD colspan="4" align="right"><H3>Total</H3></TD>
			<TD align="right"><H3>$<?php echo number_format($total,2); ?></H3></TD>
		</TR>
	</tbody>
</TABLE>

<?php } else{ ?>

	<DIV class="alert alert-info">
		No tienes productos en el carrito
	</DIV>

<?php } ?>
		<?php if ( !isset($u) and !isset($s)) { ?>

		<?php //if ( existe_sesion( $u, $s ) ) : ?>
		
		<FORM action="pago.php" method="post">
			<INPUT type="hidden" name="u"
				value="<?= $u ?>" />
			<INPUT type="hidden" name="s"
				value="<?= $s ?>" />


		<?php if( !empty($_SESSION['CARRITO'] )) { ?>

		<div class="alert alert-info">
			<div class="form-group">
				<label for="usr">Para continuar, ingrese su nombre de usuario: </label>
				<input class="form-control" type="text" name="usr" id="usr" placeholder="Usuario" required>
			</div>
		</div>

		<?php } ?>
		
		<A href="pruebaCarrito.php?u=<?= $u ?>&s=<?= $s ?>" class="btn btn-lg btn-danger">
				Volver al catálogo
		</A> 
		

		

		<?php if( !empty($_SESSION['CARRITO'] )) { ?>



		<BUTTON class="btn btn-lg btn-primary float-right helper pull-right " name="btnAccion" value="proceder" type="submit">
				Proceder con el pago
		</BUTTON>

		<H3>¿Requiere factura?</H3>

		<input class="form-control" name="confirmacion" type="radio" id="confirmacion" value='si' required/>Si
		<input class="form-control" name="confirmacion" type="radio" id="confirmacion" value='no' required/>No

		<?php } ?>

	   

		</FORM>

		<?php //endif; ?>

		<?php }else ?>

		<BR />
		<BR />
		<BR />
		<FONT FACE="Century Gothic" size="30" color="black">¡Para continuar con la compra inicia sesión o regístrate!</FONT>

	<a type="button" href="registro.php" class="btn btn-success btn-block"><i class="fa fa-pencil"></i>&nbsp; Registrarse</a>
		<a type="button" href="c_login.php" class="btn btn-info btn-block"><i class="fa fa-pencil"></i>&nbsp; Iniciar sesión</a>


		<?php ?>




</BODY>

<?php
desconectar();
?>

</HTML>