
<div id="editProfileWidget">	
	<form>
	  <fieldset>
	    <legend>Edit profile for <?php echo $username; ?></legend>
	    	<label>Profile Picture</label>
	    	<img class="img-polaroid" src="/application/assets/media/images/noimage.jpg" />
	    	<input type="file" id="uploadProfilePicture" name="uploadProfilePicture" />
		    
		    <button class="btn disabled" id="editProfilePicture" type="button"><i class="icon-pencil"></i> Edit</button>
			
		    <label>Username</label>
		    <div class="input-append">
			  <input class="span3" id="editUserName" type="text" value="<?php echo $username; ?>" readonly>
			  <button class="btn disabled" id="editUserNameButton" type="button"><i class="icon-pencil"></i> Edit</button>
			</div>
			<label>Full Name</label>
		    <div class="input-append">
			  <input class="span3" id="editFullName" type="text" value="<?php echo $fullname; ?>">
			  <button class="btn" id="editFullNameButton" type="button"><i class="icon-pencil"></i> Edit</button>
			</div>
			<label>Email</label>
		    <div class="input-append">
			  <input class="span3" id="editEmail" type="text" value="<?php echo $email; ?>">
			  <button class="btn" id="editEmailButton" type="button" ><i class="icon-pencil"></i> Edit</button>
			</div>
			<label>Team</label>
		    <div class="input-append">
			  <input class="span3" id="editTeam" type="text" value="<?php echo $team; ?>">
			  <button class="btn" id="editTeamButton" type="button" ><i class="icon-pencil"></i> Edit</button>
			</div>
		    <span class="help-block">These changes will appear to other users viewing your profile.</span>
		    		    
		    <div class="form-actions">
			  <div class="btn btn-primary" id="saveChangesButton">Save changes</div>
			  <div class="btn" id="cancelDashboardEdit">Cancel</div>
			</div>
		
	  </fieldset>
	</form>
</div>


