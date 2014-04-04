<?php 

class router {	
	// $pathargs is the array of arguments from the URI
	public $pathargs;
	// $modelfactory is first passed here, and then passed to the controller chosen by the router.
	public $modelfactory;
	public $auth;

	function __construct($pathargs, $modelfactory, array $auth) {
		$this->pathargs = $pathargs;
		$this->modelfactory = $modelfactory;
		$this->auth = $auth;
	}	

	function authorize() {		
		$playermapper = $this->modelfactory->buildMapper('player');
		if(count($this->auth) == 1){
			$token = $playermapper->getAuthToken($session = $this->auth[0]);
		} elseif(count($this->auth) == 2){
			$token = $playermapper->getAuthToken($session = 0, $user = $this->auth[0], $pass = $this->auth[1]);
		}				

		return $token;		
	}

	function buildController () {	
		$token = $this->authorize();		
				
		if($this->pathargs[0] == 'logout') {
			session_destroy();
			header( 'Location: http://www.paintballbooth.com/');
			die();
		} 

		if($this->pathargs[0] == 'login') {
			$userforredirect = $_SESSION['currentUser'];
			if(isset($_POST['loginUser'])){
				 $userforredirect = $_POST['loginUser'];
			}
			header( 'Location: http://www.paintballbooth.com/player/dashboard/' . $userforredirect );
			die();		
		}		

		// Loads index page if no arguments are given
		if(count($this->pathargs) == 0) {
			if($token->auth == 1) {
				header( 'Location: http://www.paintballbooth.com/player/dashboard/' . $_SESSION['currentUser'] );
				die();		
			}
			include('application/includes/classes/view/index.php');
		} else {
			
			// loads a specific controller class depending on $this->pathargs
			// specific controllers use the naming convention 'Controller_Example', and they are called within this function dynamically
			include('controller_' . $this->pathargs[0] . '.php');
			$controllertoinitialize = 'Controller_' . $this->pathargs[0];
			$initializedcontroller = new $controllertoinitialize($this->modelfactory, $this->pathargs, $token);			

			//Store keywords we know are not usernames, we use these to make decisions below (must elaborate more :( )
			$reservedpages = array('register', 'dashboard', 'login', 'logout', 'create_booth');	
			
			if($this->pathargs[0] == 'player') {
				if(count($this->pathargs) > 3) {
					header('Location: http://www.paintballbooth.com');
					die();
				} elseif(in_array($this->pathargs[1], $reservedpages) == false) {
					$username = $this->pathargs[1];
					$initializedcontroller->action_login();					
					$initializedcontroller->load_profile();
				} elseif($this->pathargs[1] == 'register') {
					$initializedcontroller->action_register();
				} elseif ($this->pathargs[1] == 'dashboard') {
					$username = $this->pathargs[2];
					$initializedcontroller->action_dashboard();
				}
			}

			if($this->pathargs[0] == 'booth') {				
				if(count($this->pathargs) > 3) {									
					header('Location: http://www.paintballbooth.com');					
					die();			
				} elseif(in_array($this->pathargs[1], $reservedpages) == false) {				
					$boothname = $this->pathargs[1];
					$initializedcontroller->load_booth();				
				} elseif($this->pathargs[1] == 'create_booth') {
					$initializedcontroller->create_booth();
				}
			}
			
			if($this->pathargs[0] == 'ajax') {
				if($this->pathargs[1] == 'edit_dashboard'){
					$initializedcontroller->action_login();
					$initializedcontroller->edit_dashboard($_POST['username'], $_POST['fullname'], $_POST['email'], $_POST['team']);
				} elseif ($this->pathargs[1] == 'add_image') {
					$initializedcontroller->action_login();
					$initializedcontroller->add_image($_POST['playerid'], $_POST['image']);
				} elseif ($this->pathargs[1] == 'send_message') {
					$initializedcontroller->action_login();
					$initializedcontroller->send_message($_POST['recipient'], $_POST['message'], $_SESSION['currentUser']);
				} elseif ($this->pathargs[1] == 'load_messages') {
					$initializedcontroller->action_login();
					$initializedcontroller->load_messages($_SESSION['currentUser'],$_POST['recipient']);
				}
			}
		}
	}
}



?>