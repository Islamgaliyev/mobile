$(document).ready(function(){
	$('#image1').click(function(){
		$('.photo_slider1').show(200);
		$('.photo_slider2').hide(200);
	});
	$('#image2').click(function(){
		$('.photo_slider2').show(200);
		$('.photo_slider1').hide(200);
		
	});
});