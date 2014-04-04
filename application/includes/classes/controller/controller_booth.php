<?php

class Controller_booth {
	public $modelfactory;

	public $pathargs;

	public $token;

	

	function __construct($modelfactory, $pathargs, $token) {

		$this->modelfactory = $modelfactory;	

		$this->pathargs = $pathargs;

		$this->token = $token;

	}
	
	function load_booth () {
		
		$boothmapper = $this->modelfactory->buildMapper('booth');
		$booth = $this->modelfactory->buildObject('booth');
		
	}
}

?>
