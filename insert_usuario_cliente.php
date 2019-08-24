<?php
////////////////// CONEXION A LA BASE DE DATOS //////////////////
$host = 'localhost';
$basededatos = 'nomanches_bd';
$usuario = 'root';
$contraseña = '';

$conexion = new mysqli($host, $usuario, $contraseña, $basededatos);
if ($conexion -> connect_errno) {
die( "Fallo la conexión : (" . $conexion -> mysqli_connect_errno() 
. ") " . $conexion -> mysqli_connect_error());
}
 ///////////////////CONSULTA DE AMBAS TABLAS///////////////////////
$queryCliente= $conexion->query("SELECT * FROM cliente order by Cve_clie");
$queryUsuario=$conexion->query("SELECT * FROM usuario order by Nom_usu");

/////////// INSERTAR REGISTRO A AMBAS TABLAS ///////////////////////
if(isset($_POST['insertar']))// SI SE PRESIONA EL BOTÓN INSERTAR OCURRE LO SIGUIENTE:
{

$Cve_clie=$_POST['Cve_clie'];
$Nom_clie=$_POST['Nom_clie'];
$App_clie=$_POST['App_clie'];
$Apm_clie=$_POST['Apm_clie'];
$Rfc_clie=$_POST['Rfc_clie'];
$Email_clie=$_POST['Email_clie'];
$Tel_clie=$_POST['Tel_clie'];
$Calle_clie=$_POST['Calle_clie'];
$Col_clie=$_POST['Col_clie'];
$Cp_clie=$_POST['Cp_clie'];
$Noc_clie=$_POST['Noc_clie'];
$qr_clie=$_POST['qr_clie'];
$cve_ciu=$_POST['cve_ciu'];
$bon_clie=$_POST['bon_clie'];
$Nom_usu=$_POST['Nom_usu'];
$Tipo_usu=$_POST['Tipo_usu'];
$Pass_usu=$_POST['Pass_usu'];


// SE EJECUTA LA PRIMER INSERCIÓN A LA TABLA NO. 1
$insertarClie=$conexion->query("INSERT INTO cliente VALUES ('$Cve_clie', '$Nom_clie', '$App_clie', '$Apm_clie', '$Rfc_clie', '$Email_clie', '$Tel_clie', '$Calle_clie', '$Col_clie', '$Cp_clie', '$Noc_clie', '$qr_clie', '$cve_ciu', '$bon_clie', '$Nom_usu')");
if ($insertarClie==true)// SI LA QUERY ANTERIOR SE EJECUTA CON EXITO, SE EJECUTA LA INSERCIÓN A LA TABLA 2
{
	$insertarUsu=$conexion->query("INSERT INTO usuario VALUES ('Nom_usu', '$Tipo_usu', '$Pass_usu')");
}


if($insertarDos=true)// MENSAJE DE CONFIRMACIÓN DE INSERCIÓN
{
	echo "<center><strong><h4>¡INSERCIÓN EXITOSA!<BR><a href='insertar_dos_tablas.php'>CLICK PARA VERIFICAR</a></strong></h4></center>";
}
}
?>
<html lang="es">
	<head>
		<title>INSERTAR</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="../css/estilos.css" rel="stylesheet">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	</head>
	<body>
		<header>
			<div class="alert alert-info">
			<h2>Insertar refistro cliente-usuario</h2>
			</div>
		</header>
		<section class=="col-md-12">
		<!-- ///////////// T A B L A   cliente ///////////////////-->
		<div class="col-md-6">
				<h3 class="text-center">TABLA 1</h3>
				<table class="table">
					<tr class="info">
						<th>Cve_clie</th>
						<th>Nom_clie</th>
						<th>App_clie</th>
						<th>Apm_clie</th>
						<th>Rfc_clie</th>
						<th>Email_clie</th>
						<th>Tel_clie</th>
						<th>Calle_clie</th>
						<th>Col_clie</th>
						<th>Cp_clie</th>
						<th>Noc_clie</th>
						<th>Qr_clie</th>
						<th>Cve_ciu</th>
						<th>Nom_usu</th>
						<th>bon_clie</th>
				    </tr>
				  <?php
				  while($registroAlumno  = $queryAlumnos->fetch_array( MYSQLI_BOTH)) 
				  {
				  echo '<tr style="background-color:#FFF;">
				    	<td>'.$registroCliente['Cve_clie'].'</td>
				    	<td>'.$registroCliente['Noc_clie'].'</td>
				    	<td>'.$registroCliente['App_clie'].'</td>
				    	<td>'.$registroCliente['Apm_clie'].'</td>
				    	<td>'.$registroCliente['Rfc_clie'].'</td>
				    	<td>'.$registroCliente['Email_clie'].'</td>
				    	<td>'.$registroCliente['Tel_clie'].'</td>
				    	<td>'.$registroCliente['Calle_clie'].'</td>
				    	<td>'.$registroCliente['Col_clie'].'</td>
				    	<td>'.$registroCliente['Cp_clie'].'</td>
				    	<td>'.$registroCliente['Noc_clie'].'</td>
				    	<td>'.$registroCliente['Qr_clie'].'</td>
				    	<td>'.$registroCliente['Cve_ciu'].'</td>
				    	<td>'.$registroCliente['Nom_usu'].'</td>
				    	<td>'.$registroCliente['bon_clie'].'</td>
				    </tr>';
				   } 
				  ?>
				</table>
			</div>
			<!-- ///////////// T A B L A   Usuario ///////////////////-->
			<div class="col-md-6">

				<h3 class="text-center">TABLA 2</h3>
				<table class="table col-md-6">
					<tr class="info">
						<th>Nom_usu</th>
						<th>Tipo_usu</th>
						<th>Pass_usu</th>
						
				    </tr>

				  <?php
				  while($registroAlumnoDos  = $queryAlumnosDos->fetch_array( MYSQLI_BOTH)) 
				  {
				  echo '<tr>
				    	<td>'.$registroUsuario['Nom_usu'].'</td>
				    	<td>'.$registroUsuario['Tipo_usu'].'</td>
				    	<td>'.$registroUsuario['Pass_usu'].'</td>
				    </tr>';
				   }
				  ?>
				</table>
				</div>
				<!-- //////////FORMULARIO PARA INSERTAR DATOS//////////// -->
				<form method="post" class="form text-center form-inline col-md-12 bg-info" style="padding-bottom: 1%;">
				<h3 class="bg-primary" style="padding: .5%;">ingresar cliente-usuario</h3>
					<input name="Cve_clie" type="text" placeholder="Cve_clie" class="form-control form-inline">
					<input name="Nom_clie" type="text" placeholder="Nom_clie" class="form-control form-inline">
					<input name="App_clie" type="text" placeholder="App_clie" class="form-control form-inline">
					<input name="Apm_clie" type="text" placeholder="Apm_clie" class="form-control form-inline">
					<input name="Rfc_clie" type="text" placeholder="Rfc_clie" class="form-control form-inline">
					<input name="Email_clie" type="text" placeholder="Email_clie" class="form-control form-inline">
					<input name="Tel_clie" type="text" placeholder="Tel_clie" class="form-control form-inline">
					<input name="Calle_clie" type="text" placeholder="Calle_clie" class="form-control form-inline">
					<input name="Col_clie" type="text" placeholder="Col_clie" class="form-control form-inline">
					<input name="Cp_clie" type="text" placeholder="Cp_clie" class="form-control form-inline">
					<input name="Noc_clie" type="text" placeholder="Noc_clie" class="form-control form-inline">
					<input name="qr_clie" type="text" placeholder="qr_clie" class="form-control form-inline">
					<input name="Cve_ciu" type="text" placeholder="Cve_ciu" class="form-control form-inline">
					<input name="bon_clie" type="text" placeholder="bon_clie" class="form-control form-inline">
					<input name="Nom_usu" type="text" placeholder="Nom_usu" class="form-control form-inline">
					<input name="Tipo_usu" type="text" placeholder="Tipo_usu" class="form-control form-inline">
					<input name="Pass_usu" type="text" placeholder="Pass_usu" class="form-control form-inline">

					<input name="Rfc_clie" type="submit" value="Rfc_clie" class="btn btn-info">
				</form>

		</section>
		<footer>
		</footer>
	</body>

</html>


