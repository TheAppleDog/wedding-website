$(document).ready(function(){
  var signUp = $('.signup-but');
  var logIn = $('.login-but');
  
  signUp.on('click', function(){
    $('.login').fadeOut('slow').css('display', 'none');
    $('.sign-up').fadeIn('slow');
    
    $('.form-container').animate({left: '10px'}, 'slow');
  });
  
  logIn.on('click', function(){
    $('.login').fadeIn('slow');
    $('.sign-up').fadeOut('slow').css('display', 'none');
    
    $('.form-container').animate({left: '400px'}, 'slow');
  });
});
