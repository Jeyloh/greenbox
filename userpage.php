<!DOCTYPE html>
<html>
<head>
	<title>Greenbox</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/greenbox.css">
</head>
<body>
<!-- Fixed Navigation Bar  -->
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">

		<!-- Logo -->
		<div class="navbar-header">
			<!-- Collapse mainNavBar button -->
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
				<span class="glyphicon glyphicon-th"></span>
			</button>
			<a href="#" class="navbar-brand"><kbd>GREENBOX</kbd></a>
		</div>

		<!-- Collapsable Menu Items -->
		<div class="collapse navbar-collapse" id="mainNavBar">
			<!-- Left Hand Side -->
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				<li class="active"><a href="newbostonTutorial.php">TNB Tutorial</a></li>
				<li><a href="Greenboxes">News</a></li>
				<li><a href="reviews.html">Reviews</a></li>
				<li><a href="faq.html">FAQ</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">My Profile<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Order Box</a></li>
						<li><a href="#">Settings</a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<!-- NavBar PHP code to check if user is admin and add appropriate menu items,
            then add either login/register or logout if the user is logged in or not -->
			<?php
			session_start();
			include('connect.php');
			include('functions.php');
			if(isLoggedIn()) {
				// TODO: Add these items to the navbar on the right side!
				if($_SESSION['admin'] == true) {
					echo('<li><a href="php/adminpage.php">Admin HUB</a></li>');
					echo('<li><a href="#">Add Box</a></li>');
				} 
				else {
					echo('<li><a href="php/userpage.php">User Home</a></li>');
					echo('<li><a href="#">Subscribe</a></li>');
				}
			}

					
			// Check if the user is logged in and set logout or login as appropriate
			if(isLoggedIn()) {
				echo('<li><a href="logout.php">Log Out</a></li>');
			} 
			else {
				echo('<li><a href="login.php">Login</a></li>');
				echo('<li><a href="register.php">Register</a></li>');
			}
			?>
			</ul>
		</div>
	</div>
</nav>

<div class="container" style="margin-top:80px">
	<div class="row">
		<div class="col-md-8">
			<h3>User Page</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
			<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
		</div>
		<div class="col-md-4">
			<img src="../resources/art.jpg" class="img-responsive img-rounded">

		</div>
	</div>
</div>
</body>
</html>
