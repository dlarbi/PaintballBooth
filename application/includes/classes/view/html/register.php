<?php 

include('application/includes/frontend/navbar.php');
require('application/includes/frontend/head.php');

?>





<div id="register1" class="modal hide fade" data-backdrop="true">

  <div class="modal-header">

    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

    <h3>Welcome to PaintballBooth!</h3>

  </div>

  <div class="modal-body">

    <h4>Find other players</h4>

    <p>Whether you are a first-timer or a national competitor, PaintballBooth connects you with people to play paintball with in your area.</p>

  </div>

  <div class="modal-footer">

    <a href="#" class="btn">Straight to Dashboard</a>

    <a href="/login" class="btn btn-primary">Continue</a>

  </div>

</div>





<script type="text/javascript">

var register1 = $('#register1');



register1.modal('show');

</script>