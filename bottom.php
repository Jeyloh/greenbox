<!-- TEMPLATE STARTS HERE
        Previous lines would consist of main page content and is closed here -->

	<div class="container-fluid" style="padding-left:0px">
		<footer class="footer col-centered" id="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4 footer-box">
						<ul class="list-group list-unstyled">
							<p class="lead">Quick Navigation</p>
							<li><a href="index.php">Home</a></li>
							<li><a href="products.php">Products</a></li>
							<li><a href="news.php">News</a></li>
							<li><a href="reviews.php">Reviews</a></li>
							<li><a href="faq.php">FAQ</a></li>
							<?php
							if (isLoggedIn()) {
								if ($_SESSION['admin'] == true) {
									echo('<li><a href="adminpage.php" class="blue-background">Admin HUB</a></li>');
								} else {
									echo('<li><a href="userpage.php" class="blue-background">User Home</a></li>');
								}
							}
							// Check if the user is logged in and set logout or login as appropriate
							if (isLoggedIn()) {
								echo('<li><a href="logout.php" id="logout-btn" class="grayhover orange-background">Log Out</a></li>');
							} else {
								echo('<li><a href="#" id="login-modal-trigger" class="green-background" data-target="#login-modal" data-toggle="modal">Login/Register</a></li>');
							}
							?>
						</ul>
					</div>
					<div class="col-md-4">
						<ul class="list-group list-unstyled">
							<p class="lead">Contact</p>
							<li>Phone: +44 972 839 02</li>
							<li>Mail: support@greenbox.com</li>
							<li>Address: Breffni Close, Lismore Park</li>
						</ul>
					</div>
					<div class="col-md-4">
						<p class="lead">Find us</p>
						<div id="map">
					</div>
				</div>
			</div>
				<div class="row">
					<div class="col-md-12" id="developer-bar">
						<span>Created and designed by Jorgen Lybeck Hansen @ WIT</span>
					</div>
				</div>
		</div>
	</footer>
</div> <!-- <div class="container-fluid" id="main-content-wrapper"> -->




<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Jquery hosted by Google, added additionally to Bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript from Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<!-- My Jquery and Javascript code -->
<script src="js/greenbox.js"></script>
<!-- Get asyn defer map from googleapi to initiate google maps -->
<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8xFGLqm2yn96v0FWWbHmgLJSJaKuyjWM&callback=initMap">
</script>
</body>
</html>