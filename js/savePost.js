$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
var numOfClicks = 0;
$(".savePost").click(function(){
	if(numOfClicks%2==0)
	{
		$(this).removeClass("glyphicon glyphicon-star-empty");
		$(this).addClass("glyphicon glyphicon-star");
		numOfClicks++;
		var that = $(this)
	    that.tooltip('show');
	    setTimeout(function(){
	        that.tooltip('hide');
	    }, 2000);
	}
	else
	{
		$(this).removeClass("glyphicon glyphicon-star");
		$(this).addClass("glyphicon glyphicon-star-empty");
		numOfClicks++;
		var that = $(this)
		that.tooltip('hide');
	}
});