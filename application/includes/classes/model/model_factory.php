<?php 

//data_objects.php is a class file that contains all the different data types we have. Like players, "booths", messages etc
include('data_objects.php');

// The model factory constructs the appropriate class name (ie. example_mapper), based on what was sent as a $name argument from the controller
// This mapper interacts with the database, and builds objects of the types found in data_objects.php
class Model_Factory {
	protected $db = null;	

	function __construct($db) {
		$this->db = $db;		
	}	

	public function buildMapper( $name ) {
		$class = $name . '_mapper';
		$instance = new $class( $this->db );
		return $instance;
	}	

	public function buildObject( $name ) {
		$class = $name . '_object';
		$instance = new $class();
		return $instance;
	}
}

class player_mapper {	
	protected $db;		

	function __construct($db){
		$this->db = $db;
	}

	function registerPlayer($username, $email, $fullname, $pass) {
		$sth = $this->db->prepare('INSERT INTO players ( username, email, full_name ) VALUES ( ?, ?, ? )');
		$sth2 = $this->db->prepare('INSERT INTO pass ( pass ) VALUES (?)');
		$sth->execute(array($username, $email, $fullname));
		$sth2->execute(array($pass));				
		$registeredplayer = new player_object();
		$registeredplayer->username = $username;
		$registeredplayer->email = $email;
		$registeredplayer->fullname = $fullname;	
		return $registeredplayer;
	}		

	function getAuthToken($session = 0, $user = null, $pass = null) {
		$token = new auth_token();
		
		if($session == 0) {				
			if($user != null && $pass != null) {						
				$_SESSION['currentUser'] = $user;
				$sth = $this->db->prepare('SELECT pass.pass, players.username FROM pass INNER JOIN players ON pass.id = players.id WHERE players.username = ?');
				$sth->execute(array($user));
				
				while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
					$mustmatch = $row['pass'];
				}				

				if($mustmatch == $pass) {					
					$token->setAuth(1, $user);																				
					$_SESSION['authorized'] = 1;
				} else {
					$token->setAuth(0, $user = null);		
				}									
			return $token;
			}
		} elseif($session == 1) {
			$_SESSION['authorized'] = 1;
			$token->setAuth(1, $_SESSION['currentUser']);					
			return $token;
		}		
		return $token;		
	}	

	function getNearbyPlayers($latlng = null) {
		$sth = $this->db->prepare('SELECT * FROM players');
		$sth->execute();

		while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
			$nearbyplayerdata[] = $row;
		}
		$playerset = array();
		foreach($nearbyplayerdata as $playerdata) {
			$player = new player_object();
			$player->id = $playerdata['id'];
			$player->username = $playerdata['username'];
			$player->email = $playerdata['email'];
			$player->fullname = $playerdata['full_name'];
			$playerset[] = $player;
		}		
		return $playerset;
	}		

	function getPlayer($input, $typeofinput = 'username', $loadnearbyplayers = false ) {					

		if($typeofinput == 'id') {
			$sth = $this->db->prepare('SELECT * FROM players WHERE id = ?');
			$sth->execute(array($input));
		} elseif ($typeofinput == 'username') {	
			$sth = $this->db->prepare('SELECT * FROM players WHERE username = ?');
			$sth->execute(array($input));			
		}

		while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
			$playerdata = $row;
		}	

		$player = new player_object();
		$player->id = $playerdata['id'];
		$player->username = $playerdata['username'];
		$player->email = $playerdata['email'];
		$player->fullname = $playerdata['full_name'];		
		$player->team = $playerdata['team'];
		$player->latlng = array(85, 91);	
		if($loadnearbyplayers == true) $player->nearbyplayers = $this->getNearbyPlayers();
		$player->subscribedbooths = $this->getSubscribedBooths();
		return $player;
	}
	
	function updatePlayer($username, $fullname, $email, $team = 'Free-Agent') {
		$args = func_get_args();
		foreach($args as $arg => $value) {
			if($value == null) {
				echo 'Cannot be null';
				return;
			}
		}
		$sth = $this->db->prepare('UPDATE players SET full_name = ?, email = ?, team = ? WHERE username = ?');
		$sth->execute(array($fullname, $email, $team, $username));
		return;
	}
	
	function addProfilePicture($playerid, $src) {
		$sth = $this->db->prepare('INSERT INTO players_pictures (player_id, src) VALUES (? , ?)');
		$sth->execute(array($fullname, $email, $username));
		return;
	}
	
	function getSubscribedBooths() {
		$booth = new booth_object();
		$booth->boothname = 'dye';
		$booth->users = array('dog', 'cat');
		return $booth;
	}
	
}

class message_mapper {
	
	protected $db;
	
	function __construct($db){
		$this->db = $db;
	}

	function sendMessage($recipient, $message, $sender) {
		$sth = $this->db->prepare('INSERT INTO messages (sender, recipient, message) VALUES (?, ?, ?)');
		$sth->execute(array($sender, $recipient, $message));
		return;
	}
	
	function getMessages($username, $recipient) {
		$sth = $this->db->prepare('SELECT * FROM messages WHERE (sender = :username OR recipient = :recipient) ORDER BY time ASC');
		$sth->bindParam(':username', $username, PDO::PARAM_STR);
		$sth->bindParam(':recipient', $recipient, PDO::PARAM_STR);
		$sth->execute();
		
		while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
			$messages[] = $row;
		}	
		
		$messagethread = new message_thread_object();
		
		foreach($messages as $message) {
			$messageobj = new message_object();
			$messageobj->sender = $message['sender'];
			$messageobj->recipient = $message['recipient'];
			$messageobj->message = $message['message'];
			$messageobj->timestamp = $message['time'];
			$messagethread->messages[] = $messageobj;
		}			
		return $messagethread;
	}
}

class booth_mapper {
	protected $db;
	function __construct($db){
		$this->db = $db;
	}
		
}



?>