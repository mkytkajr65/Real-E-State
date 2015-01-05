$('.settingLink').click(function (e){
   e.preventDefault();
   var div_id = $('.settingLink').index($(this));
   $('.settingGroup').hide().eq(div_id).show();
   $('.settingLink').removeClass('present');
   $('.settingLink').eq(div_id).addClass('present');
});

$(document).ready(function(){
	$('.settingLink').eq(0).addClass('present');
});