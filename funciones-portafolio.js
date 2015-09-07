$(document).ready(function() {

	$('.ch-item').hover(
		function(){
			$(this).addClass('shadow-articulo');
			$(this).children('.ch-img').children('img').addClass('zoom-active')
		},
		function(){
			$(this).removeClass('shadow-articulo');
			$(this).children('.ch-img').children('img').removeClass('zoom-active')
		}
	);

	$( ".ch-item" ).click(function() {
		var id=$(this).attr('id');
		var url = "realizados.html?id="+id;
		$(location).attr('href',url);	
	});
});