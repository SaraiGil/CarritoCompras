$(document).ready(function() {
			//alert("Bienvendio al mundo JQuerry" );
			var colorTextoMenu = $(".menu").css( "color");
			var colorFondoMenu = $(".menu").css( "background-color");
			var apuntadorRaton = $(".menu").css( "cursor");

			$("#menu1").click( function() {
				$("#submenu1").toggle();
				$("#submenu2").hide();
				$("#submenu3").hide();

			});
			$("#menu2").click( function() {
				$("#submenu2").toggle();
				$("#submenu1").hide();
				$("#submenu3").hide();
			});
			$("#menu3").click( function() {
				$("#submenu3").toggle();
				$("#submenu1").hide();
				$("#submenu2").hide();
			});


			$("#mensaje").html("AHORA SI YA SABES PROGRAMAR EN JQuerry");

			//$(".submenu").hide();

			$("#btnBorrar").click( function(){
				$("#mensaje").html(" ");

			});
			$("#btnMostrar").click( function(){
				$("#mensaje").show();
				$(".submenu").show();
			});		
			$("#btnOcultar").click( function(){
				$("#mensaje").hide();
				$(".submenu").hide();
			});
			$("a").click( function() {
				$("#mensaje").html( $(this).html() );
			});
			$(".menu").mouseover( function() {
				$(this).css( "color", "white");
				$(this).css( "background-color", "blue");
				$(this).css( "cursor", "pointer");
			});
			$(".menu").mouseout( function() {
				$(this).css( "color", colorTextoMenu);
				$(this).css( "background-color", colorFondoMenu);
				$(this).css( "cursor", apuntadorRaton);
			});
		});		