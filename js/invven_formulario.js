
$( document ).ready( function() {

	// Evento para cancelar edición y regresar a tabla
	$( "#btn-cancelar" ).click( function() {
		$( location ).attr( "href", "catalogo.php" );
	});

	// Validación de formulario
	$( "#form-producto" ).submit( function( evento ) {
		//evento.preventDefault();	// Elimina comportamiento

		$( ".form-group" ).removeClass( "has-error" );
		$( "#mensaje-validacion" ).html( "" );

		var patron = /^[ñíóáéúa-zA-Z\s]*$/;
		var patroncve = /^[p]+[\_]+[0-9]*$/;

		if ( $( "#Cve_prod" ).val() == "" ) {
			muestra_error( "Cve_prod", "danger",
				"La clave del producto no debe ir vacía" );
			return false;
		}else if ( $( "#Desc_prod" ).val() == "" ) {
			muestra_error( "Desc_prod", "danger",
				"La descripción del producto no debe ir vacía" );
			return false;
		} else if ( $( "#Costo_prod" ).val() == "" ) {
			muestra_error( "Costo_prod", "danger",
				"El costo del producto no debe ir vacío" );
			return false;
		} else if ( $( "#Prec_prod" ).val() == "" ) {
			muestra_error( "Prec_prod", "danger",
				"El precio del producto no debe ir vacío" );
			return false;
		} else if ( $( "#Gen_prod" ).val() == "" ) {
			muestra_error( "Gen_prod", "danger",
				"El género no debe ir vacío" );
			return false;
		} else if ( $( "#Img_prod" ).val() == "" ) {
			muestra_error( "Img_prod", "danger",
			"La dirección de la imagen no debe ir vacía" );
			return false;
		} else if ( $( "#Cve_cat" ).val() == 0 ) {
			muestra_error( "Cve_cat", "danger",
				"Debes seleccionar la categoría" );
			return false;
		} else if ( isNaN( $("#Prec_prod").val() ) ) {
			muestra_error( "Prec_prod", "danger",
				"El precio debe contener solo números" );
			return false;
		} else if ( isNaN( $("#Costo_prod").val() ) ) {
			muestra_error( "Costo_prod", "danger",
				"El costo debe contener solo números" );
			return false;
		} else if ( ($("#Desc_prod").val()).search(patron) ) {
			muestra_error( "Desc_prod", "danger",
				"La descripción debe contener solo letras" );
			return false;
		} else if ( ($("#Gen_prod").val()).search(patron) ) {
			muestra_error( "Gen_prod", "danger",
				"El género debe contener solo letras" );
			return false;
		} else if ( ($("#Cve_prod").val()).search(patroncve) ) {
			muestra_error( "Cve_prod", "danger",
				"La clave del producto debe seguir el formato p_xxx" );
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