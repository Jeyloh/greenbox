<!DOCTYPE html>
<html lang="en">
<head>
	<title>The Greenhouse - Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/login.css">
	<script src="js/jquery-3.1.1.min.js"></script>

</head>
<body>

	<div id="outer-image">
		<!-- Add tabs here for either Creating user or logging in -->
		<div id="wrapper">
			<main>
				<div id="loginform">
				<!-- INSERT LOGIN FORM HERE -->
					<h2>LOG IN</h2>
					<form method="POST" action="processLogin.php">
						<label>Username </label><br>
						<input type=text name=loginusername size=30><br>
						<label>Password</label><br>
						<input type=password name=loginpassword size=30><br>
						<input type=submit id="loginsubmit" value=Login><br>
					</form>
				</div>
			</main>
		</div>
	</div>
</body>
</html>
