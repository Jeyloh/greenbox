<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Page</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/slideshow.css">
	<link rel="stylesheet" href="css/greenhouse.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/mobile-menu.css">
	<script src="js/mobile-menubutton.js"></script>
	<script src="js/slideshow.js"></script>
	
</head>
<body onload="showSlides()">
	<div id="wrapper">
		<header>
            <img src="images/greenhouse-logo.png" id="greenhouse-logo">
            <!-- Use any element to open the sidenav -->
			<span style="font-size:30px;cursor:pointer;">
				<img src="images/mobile-menu-2.png" id="mobile-logo" visibility="hidden" onclick="openNav()">
			</span>
			<h1>The Greenhouse</h1>
			<nav>
				<a href="index.html" class="navbtn">Home</a>
				<a href="gallery.html" class="navbtn">Gallery</a> 
				<a href="news.html" class="navbtn">News</a>
				<a href="reviews.html" class="navbtn">Reviews</a>
				<a href="faq.html" class="navbtn">FAQ</a>
				<?php
					include('connect.php');
					include('functions.php');
					if (getAdmin()) {
						echo '<a href="adminAddProducts.php" id="orderbtn">Add Greenbox</a>';
						echo '<a href="adminManageUsers.php" id="orderbtn">Change Users</a>';
					} else {
						echo '<a href="userOrderBox.php" class="navbtn">Order</a>';
						echo '<a href="userPage.php" class="navbtn">Your Homepage</a>';
					}
				?>
			</nav>

			<a href="login.php" class="loginbtn">Log in</a> <!-- Change to javascript popup with a darker main page for loging in -->
			<a href="register.php" class="loginbtn">Register</a>

			<div id="mySidenav" class="sidenav">
				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
				<a href="index.html">Home</a>
				<a href="gallery.html">Gallery</a>
				<a href="news.html">News</a>
				<a href="reviews.html">Reviews</a>
				<a href="faq.html">FAQ</a>
				<a href="order.html" id="mobile-order-btn">Order</a>
				<a href="login.php" id="mobile-login-btn">Log in</a>
				<a href="register.php" id="mobile-login-btn">Register</a>
			</div>
		</header>
		
		<main>
			<h1>Welcome to the User page</h1>
			<p>The User should be able to subscribe to packages and edit own information</p>
		</main>
		
		<footer>
			Copyright &copy; 2016 The Greenhouse<br>
			<a href="mailto:jorgenlybeck94@gmail.com" id="footermail">-Send the designer a mail-</a>
		</footer>
	</div>
</body>
</html>
