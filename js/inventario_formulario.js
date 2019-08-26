
$( document ).ready( function() {

	// Evento para cancelar edición y regresar a tabla
	$( "#btn-cancelar" ).click( function() {
		$( location ).attr( "href", "inventario.php" );
	});

	// Validación de formulario
	$( "#form-inventario" ).submit( function( evento ) {
		//evento.preventDefault();	// Elimina comportamiento

		$( ".form-group" ).removeClass( "has-error" );
		$( "#mensaje-validacion" ).html( "" );

		var patron = /^[ñíóáéúa-zA-Z\s]*$/;
		var patroncve = /^[p]+[\_]+[0-9]*$/;
		var patroncvetalla = /^[t]+[\_]+[0-9]*$/;

		
		if ( $( "#No_inv").val() == "" ) {
			muestra_error( "No_inv", "danger",
				"El número de inventario no debe ir vacío" );
			return false;
		}else if ( $( "#Exis_prod" ).val() == "" ) {
			muestra_error( "Exis_prod", "danger",
				"La existencia del producto no debe ir vacía" );
			return false;
		}else if ( $( "#Cve_prod" ).val() == 0 ) {
			muestra_error( "Cve_prod", "danger",
				"Debe seleccionar un producto" );
			return false;
		}else if ( $( "#Cve_talla" ).val() == 0 ) {
			muestra_error( "Cve_talla", "danger",
				"Debes seleccionar una clave de talla" );
			return false;
		}else if ( isNaN( $("#No_inv").val() ) ) {
			muestra_error( "No_inv", "danger",
				"El número de inventario debe contener solo números" );
			return false;
		} else if ( isNaN( $("#Exis_prod").val() ) ) {
			muestra_error( "Exis_prod", "danger",
				"La existencia debe contener solo números" );
			return false;
		} else if ( $( "#cve_suc" ).val() == 0 ) {
			muestra_error( "cve_suc", "danger",
				"Debes seleccionar la sucursal" );
			return false;
		}

		/* 	Se agregan tantos IF como condiciones de 
			validación sean necesarias */

		return true;
	});

});

function muestra_error( id, tipo, mensaje ) {
	$( "#group-" + id ).addClass( "has-error" );
	$( "#mensaje-validacion" ).html( '<div class="alert alert-' + tipo +' alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>ERROR:</strong> ' + mensaje + '</div>' );
	$( "#" + id ).focus();
}