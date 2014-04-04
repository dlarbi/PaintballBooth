<?php 

class auth_token {
	public $auth;
	public $user;

	function setAuth($i = false, $user){
		$this->auth = $i;
		$this->user = $user;
	}

	function getAuth(){
		return $this->auth;
	}

}


class player_object {
	public $id;
	public $username;
	public $email;
	public $fullname;
	public $images = array();
	public $stats = array();
	public $geolocation = array();
	public $nearbyplayers = array();
	public $team = 'Free-agent';
	public $subscribedbooths = array();
}

class booth_object {
	public $id;
	public $boothname;
	public $users = array();
	public $threads = array();
}

class booth_thread_object {
	public $id;
	public $title;
	public $content;
	public $author;
	public $date;
	public $popularity;
}

class booth_post_object {
	public $id;
	public $content;
	public $date;
	public $author;
}

class message_object {
	public $sender;
	public $recipient;
	public $message;
	public $timestamp;
}

class message_thread_object {
	public $messages = array();
}
?>