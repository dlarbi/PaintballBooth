$(document).ready(function() {
	
	profileEdit = function() {
		var editFullNameButton = $('#editFullNameButton'),
			userName = $('#editUserName'),
			editEmailButton = $('#editEmailButton'),
			editTeamButton = $('#editTeamButton'),
			saveChangesButton = $('#saveChangesButton'),
			editFullName = $('#editFullName'),
			editEmail = $('#editEmail'),
			editTeam = $('#editTeam'),
			cancelDashboardEdit = $('#cancelDashboardEdit'),
			editProfileWidget = $('#editProfileWidget');
		
		
		enableField = function (buttonClicked, fieldToActivate){		
			fieldToActivate.attr('disabled', true);
			var storeVal = fieldToActivate.val();
			buttonClicked.on('click', function() {			
				
				
				if(fieldToActivate.attr('disabled') == 'disabled') {		        
			        fieldToActivate.removeAttr('disabled'); 		        
				} else {				
					fieldToActivate.val(storeVal);
					fieldToActivate.attr('disabled', true);
				}
			});		
		}
		
		cancelDashboardEdit.on('click', function() {
			editProfileWidget.slideUp(100);		
		});
		
		saveChangesButton.on('click', function() {		
			$.ajax({
	            type: "POST",
	            url: '/ajax/edit_dashboard',
	            data: {username: userName.val(), email : editEmail.val(), fullname : editFullName.val(), team : editTeam.val()},
	            success: function (data) {
	            	editProfileWidget.slideUp(100);
	            	$('#dashboardPlayerName').html(editFullName.val());
	            	$('#dashboardPlayerTeam').html(editTeam.val());
	            }
	        });
		})
		
		enableField(editFullNameButton, editFullName);
		enableField(editEmailButton, editEmail);
		enableField(editTeamButton, editTeam);
	}
		
	profileEdit();
	
	booths = function () {
		
	}
});