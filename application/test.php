<head>
<link rel="stylesheet" type="text/css" href="/application/assets/css/styles.css">
<link rel="stylesheet" type="text/css" href="/application/assets/css/bootstrap/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/application/assets/css/bootstrap/bootstrap-responsive.css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="/application/assets/js/bootstrap.js"></script>
<script src="/application/assets/js/animations.js"></script>
<script src="/application/assets/js/controller.dashboard.js"></script>
</head>

<?php


function get_client_ip() {
	 $ipaddress = '';
	 if ($_SERVER['HTTP_CLIENT_IP'])
		 $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	 else if($_SERVER['HTTP_X_FORWARDED_FOR'])
		 $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	 else if($_SERVER['HTTP_X_FORWARDED'])
		 $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	 else if($_SERVER['HTTP_FORWARDED_FOR'])
		 $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	 else if($_SERVER['HTTP_FORWARDED'])
		 $ipaddress = $_SERVER['HTTP_FORWARDED'];
	 else if($_SERVER['REMOTE_ADDR'])
		 $ipaddress = $_SERVER['REMOTE_ADDR'];
	 else
		 $ipaddress = 'UNKNOWN';

	 return $ipaddress; 
}

$ip = get_client_ip();
//$ip = '88.190.229.170'; //Paris, France
$geoUrl = 'http://freegeoip.net/json/' . $ip;


function get_data($url) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

$location = get_data($geoUrl);
$location_data = json_decode($location);

//var_dump ($location_data);

$url = 'http://maps.googleapis.com/maps/api/geocode/json?address=' . $location_data->city . '+' .  $location_data->region_name . '+' . $location_data->country_name . '&sensor=true';

?>

<script>
$(document).ready(function() {
	
var url = '<?php echo $url ?>';


$('#url').html('<a href = "' + url + '">' + url + '</a>');







});
</script>

<div id="images"></div>
<div id="url"></div>
