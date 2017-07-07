$(document).ready(function(){
	var dydis = "0px"
	$(".actors").mouseover(function(){
		dydis = $(this).width();
		$(this).css("width", "310px", "height", "250px");
	});
	$(".actors").mouseout(function(){
		$(this).css("width", dydis);
	});
	
});
