$(".postType").click(function(){
	var div_id = $('.postType').index($(this));
	$('.postType').removeClass("postTypeActive");
	$('.postType').eq(div_id).addClass('postTypeActive');
});