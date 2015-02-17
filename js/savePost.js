$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
var numOfClicks = 0;
$(document).on('click', '.savePost', function() {
	var $this = $(this);
	if($(this).data( "type" ) === "empty")
	{
		var data = {
			post_id: $(this).data("postid")
		}
		$.ajax({
			type: 'POST',
			url: 'savePost.php', 
			data: data,
			success: function(data) {
				data = JSON.parse(data);
				if(!data.success) { 
					alert("error");
				}
				else
				{
					$this.parentsUntil(".post")
						.find(".numSaves").text(" " + data.saves);
				}
			}
		});
		$(this).data("type", "star");
		$(this).removeClass("glyphicon glyphicon-star-empty");
		$(this).addClass("glyphicon glyphicon-star");
		var that = $(this)
	    that.tooltip('show');
	    setTimeout(function(){
	        that.tooltip('hide');
	    }, 2000);
	}
	else if($(this).data( "type" ) === "star")
	{
		var data = {
			post_id: $(this).data("postid")
		}
		$.ajax({
			type: 'POST',
			url: 'unsavePost.php', 
			data: data,
			success: function(data) {
				data = JSON.parse(data);
				if(!data.success) { 
					alert("error");
				}
				else
				{
					$this.parentsUntil(".post").
						find(".numSaves").text(" " + data.saves);
				}
			}
		});
		$(this).data("type", "empty");
		$(this).removeClass("glyphicon glyphicon-star");
		$(this).addClass("glyphicon glyphicon-star-empty");
		var that = $(this)
		that.tooltip('hide');
	}
});