<div id="profileMiniWidget">

	<h5><i class="icon-user"></i> <a href="/player/<?php echo $username;?>"><?php echo $username; ?></a></h5>

	<div style="margin-bottom:0;" class="row-fluid pull-left">

		<div id="profileThumbnail">

			<img width="80%" class="img-polaroid" src="/application/assets/media/images/noimage.jpg"/>

		</div>

		<table class="table table-condensed" id="miniData">

			<tr>

				<td><strong>Full Name</strong></td>

				<td id="dashboardPlayerName"><?php echo $fullname; ?></td>

			</tr>

			<tr>

				<td><strong>Team</strong></td>

				<td id="dashboardPlayerTeam"><?php echo $team; ?></td>

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

	<a class="btn btn-small pull-right" href="/player/<?php echo $username;?>"></i> View Profile</a>
	<a class="btn btn-small pull-right" style="margin-right:5px" href="<?php echo '?edit=true'; ?>"></i> Edit Profile</a>

</div>