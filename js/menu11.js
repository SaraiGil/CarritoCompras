$(document).ready( function() {
	var colorTextoMenu;
	var colorFondoMenu;
	var apuntadorRaton;

	// Oculta submenús
	$( ".submenu" ).hide();
	
	// Modifica contenido del mensaje
	$( "#mensaje" ).html( "Bienvenido al mundo JQuery" );

	// Click del botón "Borrar"
	$( "#btnBorrar" ).click( function() {
		$( "#mensaje" ).html("");
	});

	// Click del botón "Mostrar"
	$( "#btnMostrar" ).click( function() {
		$( "#mensaje" ).show();
	});

	// Click del botón "Ocultar"
	$( "#btnOcultar" ).click( function() {
		$( "#mensaje" ).hide();
	});

	// Click de los links
	$( "a" ).click( function() {
		$( "#mensaje" ).html( $( this ).html() );
		$( "#mensaje" ).css( "font-family", $( this ).attr( "letra" ) );
		$( "#mensaje" ).css( "font-size",   $( this ).attr( "tamanio" ) + "pt" );
	});

	// Click para todos los menús
	$( ".menu" ).mouseover( function() {
		// Obtener el id del menú
		var menu = $( this ).attr( "id" );

		// Ocultar todos los submenús que no 
		// correspondan al id del menú obtenido
		$( ".submenu" ).each( function() {
			if ( $( this ).attr( "id" ) != "sub" + menu ) {
				$( this ).hide();
			}
			else {
				$( this ).show();
			}
		});

		// Obetener los colores originales
		colorTextoMenu = $(this).css( "color" );
		colorFondoMenu = $(this).css( "background-color" );
		apuntadorRaton = $(this).css( "cursor" );
		
		// Establecer los colores cuando se selecciona
		$( this ).css( "color", "white" );
		$( this ).css( "background-color", "orange" );
		$( this ).css( "cursor", "pointer" );

	});

	// Restablece colores oiriginales del menú
	$( ".menu" ).mouseout( function() {
		$( this ).css( "color", colorTextoMenu );
		$( this ).css( "background-color", colorFondoMenu );
		$( this ).css( "cursor", apuntadorRaton );
	});

	// Aparece / desaparece submenú con el click
	$( ".menu" ).click( function() {
		$( "#sub" + $( this ).attr( "id" ) ).toggle();
	});

	// Oculta cualquier submenú al presionar
	// Cualquier botón
	$( "button" ).click( function() {
		$( ".submenu" ).each( function() {
			$( this ).hide();
		});
	});

});
