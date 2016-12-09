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
                            <li><a href="reviews.php">Review Boxes</a></li>
                            <li><a href="feedback.php">Feedback</a></li>
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





</body>
</html>