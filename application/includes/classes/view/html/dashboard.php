<?php 

require('application/includes/frontend/head.php');

include('application/includes/frontend/navbar.php'); 

?>
<script type="text/javascript" src="/application/assets/js/control.dashboard.js"></script>
<div id="dashboardCenterWrapper">	

<?php
if($_GET['edit'] == 'true') {
	include('application/includes/classes/view/html/widgets/edit_profile.php');	
}
?>	
</div>





<div id="leftDashboardSidebar">

	<?php include('application/includes/classes/view/html/widgets/profile_mini.php'); ?>

	<div id="dashboardMainLinks">

		<table class="table table-striped table-hover">

			<tr><td><a href="#"><i class="icon-home"></i> Dashboard</a></td></tr>

			<tr><td><a href="#"><i class="icon-shopping-cart"></i> Marketplace</a></td></tr>

		</table>

	</div>

</div>

<div style="position:fixed; left:20%; width:65%;">
<?php 
include('application/includes/classes/view/html/widgets/booths_subscribed.php');
?>
</div>

<div id="rightDashboardSidebar">

<?php include('application/includes/classes/view/html/widgets/users_list.php'); ?>

</div>



<script type="text/javascript">



</script>





