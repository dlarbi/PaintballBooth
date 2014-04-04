<?php 
session_start();
/*if(!isset($_SESSION['authorized'])) {
	$_SESSION['authorized'] = 0;
}*/
//$_SESSION['authorized'] = 0;

require('application/includes/classes/controller/router.php');
require('application/includes/classes/model/model_factory.php');
require('application/includes/classes/view/view.php');

//DB CONNECTION
try {
	$db = new PDO( "mysql:host=www.paintballbooth.com;dbname=paintb10_main", 'paintb10', 'postal9curse$swan' );
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}

// We take the Request URI, pass the values into an Array $pathargs.  $pathargs used as parameters to the route
// the request to the proper controller and execute the correct methods.
// $pathargs[0] contains the directive for the specific controller, while its consecutive (ie $pathargs[1]) values are directions towards particular methods within that controller class
$currentpath = $_SERVER['REQUEST_URI'];
$spliturlaroundgetvalues = explode('?', $currentpath, 2);
$urlwithoutgetvalues = $spliturlaroundgetvalues[0];
$getvalues = $spliturlaroundgetvalues[1];
$pathargs = array_values(array_filter(explode('/', $urlwithoutgetvalues)));

if(isset($_POST['loginUser']) && isset($_POST['loginPass'])){	
	$auth = array($_POST['loginUser'], $_POST['loginPass']);
} else {
	$auth = array($_SESSION['authorized']);
}

$modelfactory = new Model_Factory($db);
$router = new router($pathargs, $modelfactory, $auth);
$router->buildController();


?>