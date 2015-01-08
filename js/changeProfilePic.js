$(document).ready(function(){
	$('#profilePicModal').modal('hide');
});
$("#profileBubble").hover(function(){
	$(this).fadeTo("fast", .4);
	$(".editProfilePic").removeClass("hidden");
},function(){
	$(this).fadeTo("fast", 1);
	$(".editProfilePic").addClass("hidden");
});

$("#profileBubble").click(function(){
	$('#profilePicModal').modal('show');
});
