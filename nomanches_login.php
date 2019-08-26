
<?php include_once './inc/link.php'; 
      include_once 'carrito.php'; 
      include_once( "c_funciones.php" );

      $mysqli = conectar();
      //session_start();
 ?>

<!DOCTYPE html>
<HTML>

<head>
	<title>Inicio de sesión</title>
	<meta charset="UTF-8">
	<meta author="Equipo 5 T186">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css" />
	<script src="../js/jquery-3.4.1.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="js/c_login.js"></script>
	<style>
	body{
		background-image: url("img/login.jpg");
	}
	</style>
</head>

<body>

<form action="c_inicio_sesion.php"
	method="post" id="form-login">

<br />
<br />

<h2 class="centro txtBlanco">Inicio de sesión</h2>

<br />
<br />


<div class="container">
	<div class="col col-sm-3">
	</div>

	<div class="col col-sm-6">


		<div class="panel panel-info">
			<div class="panel-heading text-center">
				<h3>Bienvenido a nuestra plataform exclusiva y con los mejores servicios de Limpieza.</h3>
			</div>

			<div class="panel-body">

				<div class="form-group" id="group-u">
                      <LABEL for="u"><SPAN class="glyphicon glyphicon-user"></SPAN>&nbsp;Nombre de usuario:</LABEL>
                      <INPUT type="text" class="form-control" name="u" id="u" placeholder="Escribe tu nombre" required=""/ >
                 </div>

				<div class="form-group" id="group-p">
                      <SPAN for="p"><SPAN class="glyphicon glyphicon-lock"></SPAN>&nbsp;Contraseña:</LABEL>
                      <INPUT type="password" class="form-control" name="p" id="p" placeholder="Escribe tu contraseña" required=""/>
                  </div>

				<H5><b>Seleccione una sucursal</b></H5>
				<div class="form-group">			
				<SELECT name="cve_suc" class="form-control" name="sucursal" required>
				<OPTION value="0">-- Elige una sucursal --</OPTION>
				<?php
				$sql = "select * from sucursal";
				$rstipo = $mysqli->query( $sql );
				while ( $rowtipo = $rstipo->fetch_assoc() ) : ?>
					<option 
                    	value="<?= $rowtipo["cve_suc"] ?>"><?= $rowtipo["nom_suc"] ?>
                    </option>
				<?php endwhile; ?>
				</SELECT>


<!-- 				<SELECT class="form-control" name="sucursal" required>
					<OPTION selected="selected" value="">--Elige una sucursal---</OPTION>
					<OPTION>Querétaro</OPTION>
					<OPTION>Guadalajara</OPTION>
					<OPTION>Ciudad de México</OPTION>
				</SELECT> -->
				</div>

				</div>

				<div id="mensaje-validacion"><?php
				extract( $_REQUEST );

				if ( isset( $iderror ) ) :
					switch( $iderror ) {
						case 1: 
							$mensaje = "Usuario o contraseña erróneo";
							break;
						case 2: 
							$mensaje = "Sesión inválida";
							break;
						default: 
							$mensaje = "Error desconocido";
							break;
					} ?>
					<div class="alert alert-danger alert-dismissible fade in"><A href="#" class="close" data-dismiss="alert" aria-label="close">&times;</A><STRONG>ERROR:</STRONG>
					<?= $mensaje ?></div>
				<?php endif;
				?></div>

			</div>

			<div class="panel-footer text-right">

				<A href="registro.php" class="btn btn-lg btn-danger">
					Registrarse
				</A>

				<BUTTON type="submit" 
					class="btn btn-lg btn-success">
					<I class="fa fa-sign-in"></I>
					Iniciar sesión
				</BUTTON>
			</div>
		</div>
	</div>

</div>

</FORM>

</body>
</HTML>