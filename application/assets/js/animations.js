$(document).ready(function(){

	var sidebars = $('#rightDashboardSidebar, #leftDashboardSidebar');
	sidebars.css('height', window.innerHeight - 50);
	
	(function() {
		var homeSignupButton = $('.btn-signup'),
		    homeRegisterBox = $('#homeRegisterBox'),
		    homeRegisterForm = $('#homeRegisterFormWrapper'),
		    homeVideo = $('#homeVideo'),
		    homeVideoWrapper = $('#homeVideoWrapper'),
		    loginForm = $('#loginForm'),
		    signupButtons = $('#signupButtons');

		homeRegisterForm.hide();
		
		homeSignupButton.on('click', function(){
			signupButtons.hide();
			loginForm.hide();
			homeVideo.animate({opacity : '.2'});			
			homeVideoWrapper.animate({height: '1105px'});
			homeVideo.css('width' , 'auto');
			homeRegisterBox.addClass('registerBoxMarginChange');
			homeRegisterForm.fadeIn();
		});

	})();	

});