$(".bar-icon").on('click',function(){
	hide_navbar();
})
$("main").on('click',function(){
	var left_pos = $(".header_link_list").css("left");
	if(left_pos == "0px"){
		$(".header_link_list").css("left",'-310px');
		$(".bar-icon i").removeClass("fa fa-times");
		$(".bar-icon i").addClass("fa fa-bars");
	}
});