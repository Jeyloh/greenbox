<?php $title = "Userpage";
include("top.php"); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
			<h3>Welcome <?php echo $_SESSION["user"]; ?>. This is your userpage</h3>
			<p>Here you can find information about your current products, subscription status, remaining months
			and user settings. There are no feature for editing your own user yet but it should be implemented.</p>
		</div>
		<div class="col-md-4">
			<div id="userpage-settings">
				<form id="user-settings-form" name="form-userpage" method="POST" action="updateUser.php">
					<h2 class="form-feedback-heading">Update Personal settings</h2>
					<label for="address">Address</label>
					<input type="text" name="address" class="form-control" placeholder="Address"><br>

					<input class="btn btn-lg btn-success btn-block" type="submit" name="usersettings-submit" value="Update Info">
				</form>
			</div>

		</div>
	</div>

	<?php
	$userId = $_SESSION["user"];
	$sql_vegId = "SELECT vegetablePackageId FROM Subscription WHERE userId = '$userId'";
	$result_vegId = mysqli_fetch_object($con->query($sql_vegId));
	$vegid = $result_vegId->vegetablePackageId;

	$sql_package = "SELECT * FROM VegetablePackage WHERE vegetablePackageId = '$vegid'";
	$result_package = $con->query($sql_package);

	$package_data = mysqli_fetch_object($result_package);


	?>

	<div class="row">
		<div class="col-md-12" id="current-subscription">
			<h1>Your Greenbox</h1>
			<p> Here will be information about your current package </p>
			<?php
			$img = (string) $package_data->imageLink;
			echo ("This imagelink should be the background image in following div with a gradient green $img");
			echo "<div id='user-current-product' style='background: linear-gradient( to right,	rgba(255,255,255,0.45),
																								rgba(0,255,0,0.45) ), 
																								url('. $img .')>";
				echo "<h1> $package_data->packageSalesName  </h1>";
				echo "<h4>$package_data->price €/month</h4>";
				echo "<div id='user-left-container'>";
					echo "<ul>";
						echo "<h4>This weeks ingredients:</h4>";
						echo "<li class='userpage-ingredients'>$package_data->vegetable1</li>";
						echo "<li class='userpage-ingredients'>$package_data->vegetable2</li>";
						echo "<li class='userpage-ingredients'>$package_data->vegetable3</li>";
						echo "<li class='userpage-ingredients'>$package_data->vegetable4</li>";
						echo "<li class='userpage-ingredients'>$package_data->vegetable5</li>";
					echo "</ul>";

			echo "</div>";
				echo "<div id='user-right-container'>";
					echo "<h4> About </h4>";
					echo "<p> $package_data->description </p>";

				echo "</div>";

			echo "</div>";
			echo "<div class=\"btn btn-danger btn-lg\" onclick=\"unsub(' . $userId . ')\">Unsubsribe</div>";
			?>

		</div>
	</div>



</div>
<script>
	function unsub(uidToUnsub) {
	$.ajax({
	url: 'invokeAjax.php',
	data: {action: 'unsub', unsubId: uidToUnsub},
	type: 'POST',
	success: function () {
		// Reference the current row and remove it
		$('#user-current-product').remove();
		alert("Successfully unsubscribed");
	}
	});
	}
	</script>
<?php include("bottom.php");?>