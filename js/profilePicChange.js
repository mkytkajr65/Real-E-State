$(document).ready(function(){
  $("#errorDiv").addClass("hideObj");
});



$( "#profile_pic_form" ).submit(function( event ) {
 
  // Stop form from submitting normally
  event.preventDefault();
  window.location.replace("redirectToProfile.php");

  // Get some values from elements on the page:
  var $form = $( this ),
    change_picture = $form.find( "input[name='change_picture']" ).val(),
    token = $form.find( "input[name='token']" ).val(),
    url = $form.attr( "action" );


  // Send the data using post
  var posting = $.post( "changePicture.php",{ change_picture: change_picture, token: token })
  .done(function( returnedData ) {
    returnedData = JSON.parse(returnedData);
    if(returnedData.didPass)
    {
     	window.location.replace("redirectToProfile.php");
    }
    else
    {
     	$("#errorDiv").removeClass("hideObj");
     	$("#errorDiv").empty();
    	$("#errorDiv").append(returnedData.errors);
    }
  });
 
});