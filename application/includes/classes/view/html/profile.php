<?php 

require('application/includes/frontend/navbar.php');

require('application/includes/frontend/head.php');
require('application/includes/classes/view/html/widgets/message_modal.php');

?>

<script type="text/javascript" src="/application/assets/js/control.profile.js"></script>

<div id="leftDashboardSidebar">

	<div id="profileMiniWidget">

	<h5><i class="icon-user"></i> <a id="profileUsername" href="/player/<?php echo $username;?>"><?php echo $username; ?></a></h5>

	<div style="margin-bottom:0;" class="row-fluid pull-left">

		<div id="profileThumbnail">

			<img width="80%" class="img-polaroid" src="/application/assets/media/images/noimage.jpg"/>

		</div>

		<table class="table table-condensed" id="miniData">

			<tr>

				<td><strong>Full Name</strong></td>

				<td><?php echo $fullname; ?></td>

			</tr>

			<tr>

				<td><strong>Team</strong></td>

				<td><?php echo $team; ?></td>

			</tr>

			<tr>

				<td><strong>Division</strong></td>			

				<td>3</td>

			</tr>

			<tr>

				<td><strong>Reputation</strong></td>			

				<td>

					<?php 

					for($i=0; $i<4; $i++){ 

					?>

					<i class="icon-star-empty"></i>&nbsp;

					<?php 

					}

					?>				

				</td>

			</tr>

			</tr>

		</table>

	</div>	

</div>

	<div id="dashboardMainLinks">

		<table class="table table-striped table-hover">

			<tr><td><a href="#messageModal" role="button" class="btn" data-toggle="modal" id="openMessageModal"><i class="icon-envelope"></i> Message</a></td></tr>

			

		</table>

	</div>

</div>

