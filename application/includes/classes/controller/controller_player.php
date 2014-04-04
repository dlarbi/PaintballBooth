<?php 

class Controller_player {
	public $modelfactory;
	public $pathargs;
	public $token;	

	function __construct($modelfactory, $pathargs, $token) {
		$this->modelfactory = $modelfactory;	
		$this->pathargs = $pathargs;
		$this->token = $token;
	}

	function load_profile(){		
		$username = $this->pathargs[count($this->pathargs)-1];
		$playermapper = $this->modelfactory->buildMapper('player');
		$player = $playermapper->getPlayer($username, 'username');	
		View::render('profile', $player);
	}	

	function action_login() {			
		if($this->token->auth == 0) {			
			header( 'Location: http://www.paintballbooth.com/');
			die();
		} 
	}

	function action_register() {
		$playermapper = $this->modelfactory->buildMapper('player');		
		$registeredplayer = $playermapper->registerPlayer($_POST['registerUsername'], $_POST['registerEmail'], $_POST['registerName'], $_POST['registerPassword']);				
		$_SESSION['authorized'] = 1;
		$_SESSION['currentUser'] = $_POST['registerUsername'];
		View::render('register', $registeredplayer);	
	}	
		
	function action_dashboard() {
		//if the token auth property is 0 or the user is not the same as the user in the URL, the request fails.
		if($this->token->auth == 0 || $this->token->user != $this->pathargs[count($this->pathargs)-1]) {			
			header( 'Location: http://www.paintballbooth.com/');
			die();
		} 		

		$username = $this->pathargs[count($this->pathargs)-1];
		
		$playermapper = $this->modelfactory->buildMapper('player');
		$player = $playermapper->getPlayer($username, 'username', $loadnearbyplayers = true);		
		
		View::render('dashboard', $player);
		
	}			

}



?>