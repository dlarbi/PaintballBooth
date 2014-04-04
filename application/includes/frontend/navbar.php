<div class="topNavBar">

	<a href="http://www.paintballbooth.com"><img style="margin-left:10px;" src="/application/assets/media/images/logo.png"/></a>
<?php 
if($_SESSION['authorized'] == 1) {
?>
	<a class="pull-right" href="/logout"><div type="submit" class="btn btn-warning" id="loginButton"><i class="icon-user icon-white"></i> Logout</div></a>
<?php
}
?>
</div>