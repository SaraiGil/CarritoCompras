 <title>Registro</title>
    <?php include './inc/link.php'; 
     include '../proyecto/nomanches_funciones.php'; 
     include '../proyecto/carrito.php'; 
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
<body id="container-page-registration">
    
  <DIV class="barra">
    <?php include './inc/navbar.php'; ?>
  </DIV>  
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Regístrate </h1>
            <span class="subheading">Y Disruta de nuestros servicios</span>
          </div>
        </div>
      </div>
    </div>
  </header>
                       <h1 align="center"> <small class="tittles-pages-logo">Completa el siguiente formulario.</small></h1>

                       
                    
                    <br /> <br />
                </div>
                <div class="col-xs-12 col-sm-6" align="center">
                   <br /><br />
                    <div id="form-group" align="center">
                       
                       <form id="form-registro" class="form-horizontal" action="registro_procesa.php" method="post" align="center">
                            <br>
                            <div class="form-group" id="group-Nom_usu">
                              <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input id="Nom_usu" class="form-control all-elements-tooltip" type="text" placeholder="Ingrese su nombre de usuario" required name="nom_us" data-toggle="tooltip" data-placement="top" title="Ingrese su nombre. Máximo 9 caracteres (solamente letras)" pattern="[a-zA-Z]{1,9}" maxlength="9" >
                              </div>
                            </div>
                            <br>
                            <div class="form-group" id="group-Nom_clie">
                              <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input id="Nom_clie" class="form-control all-elements-tooltip" type="text" placeholder="Ingrese su nombre" required name="nom_clie" data-toggle="tooltip" data-placement="top" title="Ingrese su nombre(solamente letras)" pattern="[a-zA-Z ]{1,50}" maxlength="15">
                              </div>
                            </div>
                            <br>
                            <div class="form-group" id="group-App_clie">
                              <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input id="App_clie" class="form-control all-elements-tooltip" type="text" placeholder="Ingrese su apellido paterno" required name="ap_clie" data-toggle="tooltip" data-placement="top" title="Ingrese su apellido paterno(solamente letras)" pattern="[a-zA-Z ]{1,50}" maxlength="10">
                              </div>
                            </div>
                            <br>
                            <div class="form-group" id="group-Apm_clie">
                              <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input id="Apm_clie" class="form-control all-elements-tooltip" type="text" placeholder="Ingrese su apellido materno" required name="am_clie" data-toggle="tooltip" data-placement="top" title="Ingrese su apellido materno(solamente letras)" pattern="[a-zA-Z ]{1,50}" maxlength="10">
                              </div>
                            </div>
                            <br>
                            <div class="form-group" id="group-Pass_usu">
                              <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                <input id="Pass_usu" class="form-control all-elements-tooltip" type="password" placeholder="Introduzca una contraseña" required name="pass_us" data-toggle="tooltip" data-placement="top" title="Defina una contraseña para iniciar sesión">
                              </div>
                            </div>
                            <br>
                            <div class="form-group" id="group-Calle_clie">
                              <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-home"></i></div>
                                <input id="Calle_clie" class="form-control all-elements-tooltip" type="text" placeholder="Ingrese su calle" required name="calle_clie" data-toggle="tooltip" data-placement="top" title="Ingrese la direción en la reside actualmente" maxlength="30">
                              </div>
                            </div>
                            <br>
                            <div class="form-group" id="group-Col_clie">
                              <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-home"></i></div>
                                <input id="Col_clie" class="form-control all-elements-tooltip" type="text" placeholder="Ingrese su colonia" required name="col_clie" data-toggle="tooltip" data-placement="top" title="Ingrese la direción en la reside actualmente" maxlength="20">
                              </div>
                            </div>
                            <br>
                            <div class="form-group" id="group-Noc_clie">
                              <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-home"></i></div>
                                <input id="Noc_clie" class="form-control all-elements-tooltip" type="text" placeholder="Ingrese su número de calle" required name="numc_clie" data-toggle="tooltip" data-placement="top" title="Ingrese la direción en la reside actualmente" maxlength="5" pattern="[0-9]{1,11}">
                              </div>
                            </div>
                            <br />
                            <div class="form-group" id="group-Cp_clie">
                              <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-home"></i></div>
                                <input id="Cp_clie" class="form-control all-elements-tooltip" type="text" placeholder="Ingrese su código postal" required name="cp_clie" data-toggle="tooltip" data-placement="top" title="Ingrese la direción en la reside actualmente" maxlength="5" pattern="[0-9]{5}">
                              </div>
                            </div>
                            <br>
                            <div class="form-group" id="group-Rfc_clie">
                              <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-home"></i></div>
                                <input id="Rfc_clie" class="form-control all-elements-tooltip" type="text" placeholder="Ingrese su RFC" required name="rfc_clie" data-toggle="tooltip" data-placement="top" title="Ingrese su RFC" maxlength="13" pattern="[0-9a-zA-Z]{13}">
                              </div>
                            </div>
                            <br>
                            <div class="form-group" id="group-Tel_clie">
                              <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                                <input id="Tel_clie" class="form-control all-elements-tooltip" type="tel" placeholder="Ingrese su número telefónico" required name="tel_clie" maxlength="11" pattern="[0-9]{8,11}" data-toggle="tooltip" data-placement="top" title="Ingrese su número telefónico. Mínimo 8 digitos máximo 11">
                              </div>
                            </div>
                            <br>
                            <div class="form-group" id="group-Email_clie">
                              <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-at"></i></div>
                                <input id="Email_clie" class="form-control all-elements-tooltip" type="email" placeholder="Ingrese su Email" required name="email_clie" data-toggle="tooltip" data-placement="top" title="Ingrese la dirección de su Email" maxlength="30">
                              </div>
                            </div>
                            <br>
                            <div class="form-group" id="group-cve_ciu">
                              <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-at"></i></div>
                                    <select name="cve_ciu" class="form-control" id="cve_ciu">
                                      <option value="0">-- Selecciona una ciudad --</option>
                                      <?php
                                      $sql = "select * from ciudad";
                                      $rstipo = $mysqli->query( $sql );
                                      while ( $rowtipo = $rstipo->fetch_assoc() ) : ?>
                                         <option 
                                          value="<?= $rowtipo["cve_ciu"] ?>"><?= $rowtipo["nom_ciu"] ?>
                                          </option>
                                      <?php endwhile; ?>
                                    </select>
                                </div>
                            <br />
                            <div id="mensaje-validacion"><?php
                                extract( $_REQUEST );

                                if (isset( $Id_error )) :
                                  switch( $Id_error ) {
                                    case 1: 
                                      $mensaje = "El usuario ya existe, elija otro";
                                      break;
                                  } 
                                  ?>
                                  <div class="alert alert-danger alert-dismissible fade in">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>ERROR:</strong><?php $mensaje ?></div>
                                <?php endif;
                                ?>
                            </div>
                            <p><button type="submit" class="btn btn-success btn-block"><i class="fa fa-pencil"></i>&nbsp; Registrarse</button></p>
                            
                        </form> 
                    </div> 
                </div>
            </div>
        </div>
    </section>
    
</body>

<?php
  desconectar();
?>

</html>