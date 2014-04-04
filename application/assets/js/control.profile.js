$(document).ready(function() {

	messages = function() {
			
		this.messageSend = function() {
			var messageRecipient = $('#messageRecipient'),
				messageSendModal = $('#messageSendModal');
	
			$.ajax({
	            type: "POST",
	            url: '/ajax/send_message',
	            data: {recipient : messageRecipient.val(), message : messageSendModal.val()},
	            success: function (data) {
	            	messageSendModal.val('');
	            }
	        });
		}
		
		this.loadMessages = function() {
			var profileUsername = $('#profileUsername'),
				conversationBox = $('#conversationBox');
			
			// this posts to controller_ajax.php and executes the proper method; in this case load_messages(); (This is common in paintballbooth)
			$.ajax({
	            type: "POST",
	            url: '/ajax/load_messages',
	            data: {recipient : profileUsername.html()},
	            success: function (data) {		            	
	            	var responseJSON = $.parseJSON(data);
	            	conversationBox.html('');
	            	for(i in responseJSON){	            		
	            		// Checks if a message is from the sender, so we can choose colors for messages
	            		if(responseJSON[i].sender == loggedInUser){
	            			conversationBox.append('<div class="alert alert-info">' + responseJSON[i].message + '</div>');
	            		} else {
	            			conversationBox.append('<div class="alert">' + responseJSON[i].message + '</div>');
	            		}
	            	}	            	
	            }
	        });
			
			//alert(profileUsername.html());
		}
	}	

	$('#sendMessageModalButton').on('click', function() {
		var message = new messages();
		message.messageSend();
		message.loadMessages();	
	});
	
	$('#openMessageModal').on('click', function(){		
		var message = new messages();
		message.loadMessages();		
	});
});