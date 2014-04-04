<?php 



class View {

	

	static function render($view, $args = null, $args1 = null, $args2 = null) {

		$argsarray = (array)$args;	
		$argsarray1 = (array)$args1;
		$argsarray2 = (array)$args2;
		
		if($argsarray !== null){
			extract($argsarray);
		}
		if($argsarray1 !== null){		
			extract($argsarray1);		
		}
		if($argsarray2 !== null){		
			extract($argsarray2);		
		}		

		//print_r($args);

		require('application/includes/classes/view/html/' . $view . '.php');		

	}	

}

?>