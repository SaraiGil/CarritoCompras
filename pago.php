<?php
include 'carrito.php';
include 'transacciones.php';
include './inc/link.php';
//include 'c_funciones.php';
$mysqli = conectar();
extract( $_REQUEST );

	if ( !existe_sesion( $u, $s ) ) :
		header( "location:c_login.php?iderror=2" );
	else :


?>
<!DOCTYPE html>
<HTML>
<HEAD>
	<TITLE>Pago</TITLE>
	<META charset="UTF-8">
	<META author="Equipo 5 T186">
	<SCRIPT src="js/jquery-3.4.1.min.js"></SCRIPT>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=MXN"></script>
	<!-- <script src="https://www.paypal.com/sdk/js?client-id=ATil7wrKu1m894I85d8M7euPud8zeeSHuhZIr6-eBeawz_Z83jhOi6iAm8vDBjDY4qggJTcvGev-7nAA&currency=MXN"></script> -->

</HEAD>
<BODY>

<DIV class="barra">
       <?php include './inc/navbar.php'; ?>
   </DIV>

<?php
	
	if($_POST){
		$total=0; 
		$SID=session_id();
		foreach ($_SESSION['CARRITO'] as $indice => $paquete){
			$total = $total + ( $paquete['PRECIO']*$paquete['CANTIDAD']);
			}
			$user="SELECT id_us from usuario WHERE nickuser = '{$_SESSION['user']}';";
			//echo $user;
			$r=$mysqli->query($user);
			//echo $r;
			while ($row = $r->fetch_assoc()){
				//$cve_us = $row['id_us'];
				extract($row);
			}
			
			$sql = "INSERT INTO compra VALUES(NULL,'$SID','',NOW(),{$id_us},{$total},'pendiente');";
			//echo $sql;
	 		$rs= $mysqli->query($sql);

	 		$idCompra=$mysqli->insert_id;

	 		foreach ($_SESSION['CARRITO'] as $indice => $paquete){
	 			$cant=$paquete['CANTIDAD'];
	 			$paq=$paquete['ID_PAQ'];
	 			$precio=$paquete['PRECIO'];
	 			$ins = "INSERT INTO detalle_compra VALUES (NULL,{$idCompra},{$cant},{$paq},{$precio});";
				//echo $ins;
	 			$rs= $mysqli->query($ins);

	 		}

 		//echo "Id compra: ".$idCompra;
		//echo "<h3>".$total."</h3>";
	}

	$_SESSION['genera_factura'] = $_POST['confirmacion'];

	
?>

	<BR />
	
<style>
   
    /* Media query for mobile viewport */
    @media screen and (max-width: 400px) {
        #paypal-button-container {
           width: 100%;
        }
    }
   
    /* Media query for desktop viewport */
    @media screen and (min-width: 400px) {
        #paypal-button-container {
           width: 450px;
            display: inline-block;
        }
    }
   
</style> 




	<DIV class="container">
			<DIV class="jumbotron jumbotron-fluid">
				<H2 class="display-4 text-center">Información del pedido</H2>
				<HR class="my-4">
					<?php foreach ($_SESSION['CARRITO'] as $indice => $paquete) { 
						 echo "<p class=\"text-center\">- ".$paquete['NOMBRE']."<BR /></p>";
					} ?>
					<p class="text-center"><?php echo $_SESSION['user'];?>, estas a punto de pagar con Paypal la cantidad de:</p>
					<H3 class="text-center">Total a pagar: <b>$<?= number_format($total,2); ?></b></H3>
				</p>
		<HR class="my-4">
		<H3 class="display-4 text-center">Pago con Paypal</H3>
    	
    	<!-- Set up a container element for the button -->
    	<div id="paypal-button-container" class="text-center"></div>

	</DIV>




    <script>
        // Render the PayPal button into #paypal-button-container

        paypal.Buttons({
        createOrder: ( data, actions ) => {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?php echo $total;?>',
                        currency_code: "MXN",
                    },
                    description: 'Compra de productos a Maid Cleaning Service: :<?php echo number_format($total,2); ?>',
                    reference_id: "<?php echo $SID; ?>#<?php echo "ASDFGHJKLQWERTY" ?>"
                }]
            })
        },
        onApprove: ( data, actions ) => {
            return actions.order.capture().then(function(details) {
                alert('Pago realizado correctamente :)');
                console.log(data);
                window.location="verifica.php?paymentToken="+data.orderID;
            })
        },
        onError: ( error ) => {
            console.log('error',error);
        }
    }).render('#paypal-button-container')
 
</script>

		
	

	</DIV>
</BODY>

<?php
desconectar();
?>


</HTML>

<?php endif; ?>