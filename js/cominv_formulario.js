$( document ).ready( function() {

	// Evento para cancelar edición y regresar a tabla
	$( "#btn-cancelar" ).click( function() {
		$( location ).attr( "href", "cominv.php" );
	});

	// Validación de formulario
	$( "#form-cominv" ).submit( function( evento ) {
		//evento.preventDefault();	// Elimina comportamiento

		$( ".form-group" ).removeClass( "has-error" );
		$( "#mensaje-validacion" ).html( "" );

		var patron = /^[0-9]*$/;
		var patronNoinv = /^[0-9]*$/;
		var patronNocom = /^[c]+[0-9]*$/;

		/*if ( $( "#No_inv" ).val() == "" ) {
			muestra_error( "No_inv", "danger",
				"El numero de inventario no debe ir vacía" );
			return false;
		}else if ( $( "#Cantidad_cominv" ).val() == "" ) {
			muestra_error( "Cantidad_cominv", "danger",
				"La cantidad no debe ir vacía" );
			return false;
		} else if ( $( "#No_com" ).val() == "" ) {
			muestra_error( "No_com", "danger",
				"El numero de compra no debe ir vacía" );
			return false;
		} else if ( ($("#Cantidad_cominv").val()).search(patron) ) {
			muestra_error( "Cantidad_cominv", "danger",
				"La cantidad debe contener solo números" );
			return false;
		} else if ( ($("#No_inv").val()).search(patronNoinv) ) {
			muestra_error( "No_inv", "danger",
				"El numero de inventario debe seguir el formato XXXX" );
			return false;
		}else if ( ($("#No_com").val()).search(patronNocom) ) {
			muestra_error( "No_com", "danger",
				"El numero de compra debe seguir el formato cXXXX" );
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