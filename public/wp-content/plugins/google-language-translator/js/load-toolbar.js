jQuery(document).ready(function($) {
  $('#glt-translate-trigger').toolbar({content: '#flags', position: 'top', hideOnClick: 'true'});
  
  
    $('#glt-translate-trigger').on('toolbarShown',function(event) { 
	  $('.tool-rounded').css('display','block');
	  $('.tool-rounded').css('position','fixed');
	  $('.tool-rounded').css('bottom','50px');
	  $('.tool-rounded').css('top','auto !important');
	  $('#glt-translate-trigger span').text('Idioma « ');
      
    });
  
  $('#glt-translate-trigger').on('toolbarHidden',function(event) {
	  $('#glt-translate-trigger span').text('Idioma » ');
	  $('.tool-rounded').css('position','absolute');
	  
  });
  
    
  
});