<?php 
class Controller_ajax {
	public $modelfactory;	
	public $pathargs;	
	public $token;	
	
	function __construct($modelfactory, $pathargs, $token) {
		$this->modelfactory = $modelfactory;	
		$this->pathargs = $pathargs;	
		$this->token = $token;			
	}
	
	function action_login() {	
		if($this->token->auth == 0) {	
			header( 'Location: http://www.paintballbooth.com/');	
			die();	
		}
	}
	
	function edit_dashboard($username, $fullname = null, $email = null, $team = null){		
		if($fullname == null || $email == null || $team == null) {
			echo 'Cant be null';
			return;
		}
		$playermapper = $this->modelfactory->buildMapper('player');	
		$playermapper->updatePlayer($username, $fullname, $email, $team);		
	}
	
	function add_image($username, $import) {
		$playermapper = $this->modelfactory->buildMapper('player');
		$playermapper->addProfilePicture($playerid, $src);
	}
	
	function send_message($recipient, $message, $sender) {
		$messagemapper = $this->modelfactory->buildMapper('message');
		$messagemapper->sendMessage($recipient, $message, $sender);
	}
	
	function load_messages($username, $recipient){
		$messagemapper = $this->modelfactory->buildMapper('message');
		$messagethread = $messagemapper->getMessages($username, $recipient);
		echo json_encode($messagethread->messages);
	}
}
?>