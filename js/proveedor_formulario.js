
$( document ).ready( function() {

	// Evento para cancelar edición y regresar a tabla
	$( "#btn-cancelar" ).click( function() {
		$( location ).attr( "href", "proveedor.php" );
	});

	// Validación de formulario
	$( "#form-proveedor" ).submit( function( evento ) {
		//evento.preventDefault();	// Elimina comportamiento

		$( ".form-group" ).removeClass( "has-error" );
		$( "#mensaje-validacion" ).html( "" );

		var patron = /^[ñíóáéúa-zA-Z\s]*$/;
		var patronCol = /^[ñíóáéúa-zA-Z0-9\s]*$/;
		var patroncve = /^[p]+[\_]+[a-z]*$/;
		var patronEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

		if ( $( "#Cve_prov" ).val() == "" ) {
			muestra_error( "Cve_prov", "danger",
				"La clave del proveedor no debe ir vacía" );
			return false;
		}else if ( $( "#Nom_prov" ).val() == "" ) {
			muestra_error( "Nom_prov", "danger",
				"El nombre del proveedor no debe ir vacío" );
			return false;
		} else if ( $( "#Email_prov" ).val() == "" ) {
			muestra_error( "Email_prov", "danger",
				"El correo no debe ir vacío" );
			return false;
		} else if ( $( "#Tel_prov" ).val() == "" ) {
			muestra_error( "Tel_prov", "danger",
				"El teléfono no debe ir vacío" );
			return false;
		} else if ( $( "#Calle_prov" ).val() == "" ) {
			muestra_error( "Calle_prov", "danger",
				"La calle no debe ir vacía" );
			return false;
		} else if ( $( "#Col_prov" ).val() == "" ) {
			muestra_error( "Col_prov", "danger",
			"La colonia no debe ir vacía" );
			return false;
		} else if ( $( "#Cp_prov" ).val() == "" ) {
			muestra_error( "Cp_prov", "danger",
				"El código postal no debe ir vaío" );
			return false;
		} else if ( $( "#Noc_prov" ).val() == "" ) {
			muestra_error( "Noc_prov", "danger",
				"El número de calle no debe ir vaío" );
			return false;
		} else if ( $( "#cve_ciu" ).val() == 0 ) {
			muestra_error( "cve_ciu", "danger",
				"Debes seleccionar la ciudad" );
			return false;
		} else if ( $( "#Nom_usu" ).val() == "" ) {
			muestra_error( "Nom_usu", "danger",
				"El nombre de usuario no debe ir vaío" );
			return false;
		} else if ( ($("#Cve_prov").val()).search(patroncve) ) {
			muestra_error( "Cve_prov", "danger",
				"La clave del producto debe seguir el formato p_xxx" );
			return false;
		} else if ( ($("#Nom_prov").val()).search(patron) ) {
			muestra_error( "Nom_prov", "danger",
				"El nombre debe contener solo letras" );
			return false;
		}else if ( !patronEmail.test( $("#Email_prov").val()) ) {
			muestra_error( "Email_prov", "danger",
				"Correo electrónico inválido" );
			return false;
		} else if ( isNaN( $("#Tel_prov").val() ) ) {
			muestra_error( "Tel_prov", "danger",
				"El teléfono debe contener solo números" );
			return false;
		} else if ( ($("#Calle_prov").val()).search(patron) ) {
			muestra_error( "Calle_prov", "danger",
				"La calle debe contener solo letras" );
			return false;
		} else if ( ($("#Col_prov").val()).search(patronCol) ) {
			muestra_error( "Col_prov", "danger",
				"La colonia debe contener solo letras y puede tener números" );
			return false;
		} else if ( isNaN( $("#Cp_prov").val() ) ) {
			muestra_error( "Cp_prov", "danger",
				"El código postal debe contener solo números" );
			return false;
		} else if ( ($("#Cp_prov").val()).length<5 ) {
			muestra_error( "Cp_prov", "danger",
				"El código postal debe contener 5 dígitos" );
			return false;
		} else if ( isNaN( $("#Noc_prov").val() ) ) {
			muestra_error( "Noc_prov", "danger",
				"El número de calle debe contener solo números" );
			return false;
		} else if ( ($("#Nom_usu").val()).search(patron) ) {
			muestra_error( "Nom_usu", "danger",
				"El nombre de usuario debe contener solo letras" );
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