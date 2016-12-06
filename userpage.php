<?php $title = "Userpage";
include("top.php"); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
			<h3>Welcome <?php $_SESSION["user"]; getCurrentUserData();?>. This is your userpage</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
			<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
		</div>
		<div class="col-md-4">
			<img src="resources/art.jpg" class="img-responsive img-rounded">

		</div>
	</div>

	<div class="row">
		<div class="col-md-12" id="current-subscription">
			<h1>Your Greenbox</h1>

		</div>
	</div>



</div>

<?php include("bottom.php");?>