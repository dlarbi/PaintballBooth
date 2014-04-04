<div id="nearbyPlayersWidget">

	<h5><i class="icon-globe"></i> Players near you:</h5>

	<div class="row-fluid">

	<?php 
	$i = 2;
	foreach($nearbyplayers as $player ){
		

		if($i % 2 == 0) {
	?>
		
		<div class="span6" style="margin-left:0;">
			<a href="/player/<?php echo $player->username; ?>">
			<div class="nearbyPlayerCell" data-toggle="popover" data-placement="left" data-content="<?php echo $player->email; ?>" data-original-title="<?php echo $player->fullname; ?>">
			<p class="userListName"><?php echo $player->username; ?></p>
			<img style="max-width:90%" class="img-polaroid" src="/application/assets/media/images/noimage.jpg" />
			</div>
			</a>
		</div>
			

	<?php		
		} else {	
	?>
		<div class="span6">
			<a href="/player/<?php echo $player->username; ?>">
			<div class="nearbyPlayerCell" data-toggle="popover" data-placement="left" data-content="<?php echo $player->email; ?>" data-original-title="<?php echo $player->fullname; ?>">
			<p class="userListName"><?php echo $player->username; ?></p>
			<img style="max-width:90%" class="img-polaroid" src="/application/assets/media/images/noimage.jpg" />
			</div>
			</a>
		</div>
	<?php
		}
		$i++;
	}

	?>		

	</div>	

</div>

<script type="text/javascript">

var nearbyPlayerCell = $('.nearbyPlayerCell');

$(function(){
    $('#nearbyPlayersWidget').slimScroll({
        height: $(window).height() - $('.topNavBar').outerHeight()
    });
});

nearbyPlayerCell.hover(function() {

	$(this).popover('show');

}, function() {

	$(this).popover('hide');

});



</script>