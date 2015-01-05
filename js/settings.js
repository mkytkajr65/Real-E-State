$('.settingLink').click(function (e){
   e.preventDefault();
   var div_id = $('.settingLink').index($(this));
   $('.settingGroup').hide().eq(div_id).show();
});