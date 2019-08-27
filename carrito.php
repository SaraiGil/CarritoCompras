<?php
session_start();

$msj="";


if(isset($_POST['btnAccion'])) {

	
	//unset($_SESSION['CARRITO']);
	switch($_POST['btnAccion']) {
		case 'Agregar':
			if(is_numeric($_POST['cve_paq'])){
				$ID  = $_POST['cve_paq'];
				$msj.="Ok ID correcto ".$ID."</br>";
			}else {
				$msj.="Upss... ID incorrecto".$ID."</br>";
			}
			if(is_string($_POST['nom_paq'])){
				$NOMBRE = $_POST['nom_paq'];
				$msj.="Ok Paquete correcto ".$NOMBRE."</br>";
			}else {
				$msj.="Upss... Paquete incorrecto".$NOMBRE."</br>";
			}
			if(is_numeric($_POST['cantidad'])){
				$CANTIDAD  = $_POST['cantidad'];
				$msj.="Ok cantidad correcta ".$CANTIDAD."</br>";
			}else {
				$msj.="Upss... cantidad incorrecta ".$CANTIDAD."</br>";
			}	
			if(is_string($_POST['desc_paq'])){
				$DESCRIPCION = $_POST['desc_paq'];
				$msj.="Ok Descripción correcta ".$DESCRIPCION."</br>";
			}else {
				$msj.="Upss... Descripción incorrecta".$DESCRIPCION."</br>";
			}
			if(is_numeric($_POST['prec_paq'])){
				$PRECIO = $_POST['prec_paq'];
				$msj.="Ok Precio correcto ".$PRECIO."</br>";
			}else {
				$msj.="Upss... Precio incorrecto".$PRECIO."</br>";
			}

			//Arreglo para guardar los datos del carrito utilizando una variable de sesión
			if(!isset($_SESSION['CARRITO'])){
				$paquete=array(
					'ID_PAQ'=>$ID,
					'NOMBRE'=>$NOMBRE,
					'DESCRIPCION'=>$DESCRIPCION,
					'PRECIO'=>$PRECIO,
					'CANTIDAD'=>$CANTIDAD,
					//'EXISTENCIA'=>$Exis_prod
				);
				$_SESSION['CARRITO'][0]=$paquete;
				$msj= "Producto agregado al carrito";

			}else{


				$cvePaquetes = array_column($_SESSION['CARRITO'], "ID_PAQ");

				if(in_array($ID, $cvePaquetes)){
					echo "<script>alert('El paquete ya ha sido agregado al carrito');</script>";
					//$msj="";
				}else{

					$numProductos=count($_SESSION['CARRITO']);
					$paquete=array(
						'ID_PAQ'=>$ID,
						'NOMBRE'=>$NOMBRE,
						'DESCRIPCION'=>$DESCRIPCION,
						'PRECIO'=>$PRECIO,
						'CANTIDAD'=>$CANTIDAD,
						//'EXISTENCIA'=>$Exis_prod
					);
					$_SESSION['CARRITO'][$numProductos]=$paquete;
					$msj= "Producto agregado al carrito";
				}
			}

			//$msj= print_r( $_SESSION, true );

				
		break;

		case 'Eliminar':

			if(is_numeric($_POST['cve_paq'])){
				$ID  = $_POST['cve_paq'];
				//$msj.="Ok ID correcto ".$ID."</br>";

				foreach ($_SESSION['CARRITO'] as $indice => $paquete) {
					if($paquete['ID_PAQ'] == $ID){
						unset($_SESSION['CARRITO'][$indice]);
						echo "<script>alert('Elemento borrado');</script>";
					}

				}

			}else {
				$msj.="Upss... ID incorrecto".$ID."</br>";
			}

			

		break;

/*		case 'Mas':
			$cve_paq  = $_POST['cve_paq'];

			foreach ($_SESSION['CARRITO'] as $indice => $producto) {
				if($producto['cve_paq'] == $Cve_prod){
					if( $_SESSION['CARRITO'][$indice]['cantidad'] < $_SESSION['CARRITO'][$indice]['Exis_prod']){
						$_SESSION['CARRITO'][$indice]['cantidad'] = $_SESSION['CARRITO'][$indice]['cantidad'] + 1;
					} 
				} 
			}
		break;

		case 'Menos':
			$Cve_prod  = $_POST['Cve_prod'];
			foreach ($_SESSION['CARRITO'] as $indice => $producto) {
				if($producto['Cve_prod'] == $Cve_prod){
					if( $_SESSION['CARRITO'][$indice]['cantidad'] > 1){
					  $_SESSION['CARRITO'][$indice]['cantidad'] = $_SESSION['CARRITO'][$indice]['cantidad'] - 1;
					}
				} 
			}
		break;*/

		case 'proceder':
			$_SESSION['usr'] = $_POST['usr'];
		break;

		case 'fin':
			unset($_SESSION['CARRITO']);
			unset($_SESSION['CARRITO2']);
			unset($_SESSION['usr']);
		break; 
	}

}




//session_destroy();


?>