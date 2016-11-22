<!DOCTYPE html>
<html lang="en">
<head>
	<title>The Greenhouse - Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/login.css">
	<script src="jquery-3.1.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		// Jquery code here
	});
</script>

</head>
<body>
<div id="outer-image">
		<!-- Add tabs here for either Creating user or logging in -->
	<div id="wrapper">
		<header id="registerbanner">
		<!-- Add  -->
		</header>
		<main>
			<div id="loginform">
			<!-- INSERT LOGIN FORM HERE -->
				<h2>REGISTER</h2>
				<p>Register at Greenhouse and become a member today to receive food packages straight to your home. It's that easy!
				<form method="POST" action="processRegister.php">
				<div id="leftside">
					<fieldset><legend>Personal Information</legend>
					<input type=text name=registerusername size=30 placeholder="Username"><br>
					<input type=password name=registerpassword size=30 placeholder="Password"><br>
					<input type=password name=confirmpassword size=30 placeholder="Confirm Password"><br>
					<input type=text name=firstname size=30 placeholder="First Name"><br>
					<input type=text name=lastname size=30 placeholder="Surname"><br>
					</fieldset>
				</div>
				<div id="rightside">
					<fieldset><legend>Shipping Information</legend>
					<input type=text name=phone size=30 placeholder="Phone (+44)"><br>
					<input type=text name=email size=30 placeholder="E-mail"><br>
					<input type=text name=address size=30 placeholder="Address"><br>
					<select name=country>
						<option value="Country" disabled="disabled" selected>Country</option>
					    <option value="Ireland">Ireland</option>
					    <option value="Norway">Norway</option>
					    <option value="USA">US n' A</option>
				    </select>
					<input type=text name=zip size=30 placeholder="Zip"><br>
					</fieldset>
					<input type="checkbox" name="admin" value="true">Are you an admin?
				</div>
				<input id=loginsubmit type=submit name=registersubmit>
				</form>
			</div>
		</main>
	</div>
</div>
</body>
</html>
