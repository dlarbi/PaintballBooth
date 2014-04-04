<div id="messageModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3 id="myModalLabel">Send Message to <?php echo $username; ?></h3>
  </div>
  <div class="modal-body">
    <p>Send your message here</p>
     <div class="control-group">
	    <label class="control-label" for="messageRecipient">Recipient</label>
	    <div class="controls">
	      <input type="text" id="messageRecipient" value="<?php echo $username; ?>">
	    </div>
	  </div>
	<div class="row-fluid" id="conversationBox">
	
	</div>
    <textarea rows="3" id="messageSendModal" class="row-fluid" placeholder="Write a reply..."></textarea>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary" id="sendMessageModalButton"><i class="icon-envelope icon-white"></i> Send Message</button>
  </div>
</div>