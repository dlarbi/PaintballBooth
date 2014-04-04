<?php 

include('application/includes/frontend/navbar.php');
require('application/includes/frontend/head.php');

?>

<div id="homeVideoWrapper">

	<video id="homeVideo" preload="auto" autoplay="true" loop="loop" muted="muted" volume="0">	

		<source src="/application/assets/media/video/goldmanrun.mp4" type="video/mp4">

	</video>	

	

	<div id="loginForm">

		<form class="form-inline" action="/login" method="POST">

		  <input type="text" class="input-small" name="loginUser" placeholder="User">

		  <input type="password" class="input-small" name="loginPass" placeholder="Password">

		  <button type="submit" class="btn btn-warning pull-right" id="loginButton"><i class="icon-user icon-white"></i> Login</button>		  

		</form>

	</div>

	<div id="homeRegisterBox">

		<div class="pull-left row-fluid" >

			<div id="signupButtons">

				<h1>New to PaintballBooth?</h1>			

				<img src="/application/assets/media/images/signinfacebook.png"/>

				<div class="btn btn-signup"><i class="icon-envelope icon-white"></i> Sign up with email</div>

			</div>

		</div>

		<div class="pull-left row-fluid" id="homeRegisterFormWrapper">			

			<div id="homeRegisterForm">

				<h1>Sign Up</h1>

				<form class="form-horizontal" method="POST" action="/player/register">

				  <div class="control-group">

				  	<label class="control-label" for="registerName">Full Name</label>

				    <div class="controls">

				      <input type="text" name="registerName" id="registerName" placeholder="Name">

				    </div>

				  </div>

				  <div class="control-group">

				  	<label class="control-label" for="registerUsername">Username</label>

				    <div class="controls">

				      <input type="text" name="registerUsername" id="registerUsername" placeholder="Username">

				    </div>

				  </div>

				  <div class="control-group">

				    <label class="control-label" for="registerEmail">Email</label>

				    <div class="controls">

				      <input type="text" id="registerEmail" name="registerEmail" placeholder="Email">

				    </div>

				  </div>

				  <div class="control-group">

				    <label class="control-label" for="registerPassword">Password</label>

				    <div class="controls">

				      <input type="password" id="registerPassword" name="registerPassword" placeholder="Password">

				    </div>

				  </div>

				  <div class="control-group">

				    <div class="controls">				      

				      <button type="submit" class="btn btn-warning btn-large" id="homeRegisterButton"><i class="icon-ok icon-white"></i> Register</button>

				    </div>

				  </div>

				</form>

			</div>

		</div>	

	</div>

</div>

<div id="homeDescriptionWrapper">

	<div class="container">

		<div class="row-fluid">

			<div class="span3">

				<img class="homeCalloutImage" src="/application/assets/media/images/mapicon.png" />

			</div>

			<div class="span3">

				<img class="homeCalloutImage" src="/application/assets/media/images/awardicon.png" />

			</div>

			<div class="span3">

				<img class="homeCalloutImage" src="/application/assets/media/images/vsicon.png" />

			</div>

			<div class="span3">

				<img class="homeCalloutImage" src="/application/assets/media/images/basketicon.png" />

			</div>

		</div>

	</div>

</div>