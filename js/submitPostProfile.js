$("#postProfileForm").submit(function( event ) {
 
  // Stop form from submitting normally
  event.preventDefault();

  var $form = $( this ),
    post_body = $form.find( "textarea[name='post_body']" ).val(),
    token = $form.find( "input[name='token']" ).val(),
    url = $form.attr( "action" );

    // Send the data using post
    var data = {
		post_body: post_body,
		token: token
	}

	$.ajax({
		type: 'POST',
		url: 'submitPost.php', 
		data: data,
		success: function(data) {
			if(data!='error')
			{
				$("#postWall > div").replaceWith(data);
				$("#noPost").remove();
				$('[data-toggle="popover"]').popover();
			}
		}
	});

});