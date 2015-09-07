$(document).ready(function() {

	$('.nav ul li').not(".logo-no-active").hover(
		function(){
			//$(this).addClass("active-nav");
			$(this).addClass("nav-active");
			$(this).children('a').addClass("color-active");

		},
		function(){
			$(this).removeClass("nav-active");
			$(this).children('a').removeClass("color-active");
		}
	); 

	$('.trabajos div').hover(
		function(){
			$(this).addClass("active-trabajos");
		},
		function(){
			$(this).removeClass("active-trabajos");
		}
	);

	$('.articulo .leer-mas').hover(
		function(){
			$(this).css('background-color','#E71D25');
			$(this).addClass('shadow-articulo');
		},
		function(){
			$(this).css('background-color','black');
			$(this).removeClass('shadow-articulo');
		}
	);

	$( ".trabajos div" ).click(function() {
		var id=$(this).attr('class');
		id = id.replace(' active-trabajos', '');
		$(location).attr('href',id+".html");	
	});

});