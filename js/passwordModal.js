$("#editPassword").click(function(){
	$('#passwordModal').modal('show');
});

$(document).ready(function(){
	$('#passwordModal').modal('hide');
});

var confirmed = false;

// Attach a submit handler to the form
$( "#confirm_password" ).submit(function( event ) {
 
  // Stop form from submitting normally
  event.preventDefault();
 
  // Get some values from elements on the page:
  var $form = $( this ),
    term = $form.find( "input[name='confirm_password']" ).val(),
    token = $form.find( "input[name='token']" ).val(),
    url = $form.attr( "action" );

 
  // Send the data using post
  var posting = $.post( "passwordConfirm.php",{ confirm_password: term, token: token })
  .done(function( returnedData ) {
    if(returnedData)
    {
    	$("#confirm_password").addClass("hideForm");
    	$("#change_password").removeClass("hideForm");
    	confirmed = true;
    }
    else
    {
    	alert('Password Not Correct');
    }
  });
 
});

// Attach a submit handler to the form
$( "#change_password" ).submit(function( event ) {
 
  // Stop form from submitting normally
  event.preventDefault();
 
 if(confirmed)
 {

  // Get some values from elements on the page:
  var $form = $( this ),
    pass = $form.find( "input[name='password']" ).val(),
    pass_again = $form.find( "input[name='password_again']" ).val(),
    token = $form.find( "input[name='token']" ).val(),
    url = $form.attr( "action" );

 
  // Send the data using post
  var posting = $.post( "changepassword.php",{ password: pass, password_again: pass_again, token: token })
  .done(function( returnedData ) {
   	if(returnedData)
   	{
   		window.location.replace("redirectToSettings.php");
    }
    else
    {
		alert("Error");
	}
  });
}
 
});



	

