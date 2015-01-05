$(document).ready(function(){
  $( "#userRow" ).slideDown( 1000, function() {
    // Animation complete.
  });
});

$( ".close" ).click(function() {
  $( "#userRow" ).slideUp( "slow", function() {
    // Animation complete.
  });
});