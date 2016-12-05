<?php $title = "Products"; include("top.php");



?>

<div class="container">
<h1>Our Greenboxes</h1>
	<p>This is an overview of our boxes! Expect to receive your packages every Monday before 17:00.<br>
	Ingredients will change every month, and you receive notification about new ingredients, and more recipes.<br>
	You're receiving food for as many people the package states. There are family sizes, pair sizes and single sizes.</p>

		<?php
		include('connect.php');
		global $con;

		$sql_vegPackage = "SELECT * FROM VegetablePackage";
		$result_vegPackage = $con->query($sql_vegPackage);

		while ($listOfBoxes = mysqli_fetch_assoc($result_vegPackage)) {
			echo '<div class="row products-row">';
				echo '<div class="col-md-8">';
					echo '<form method="FORM" action="processSubscription.php">';
						echo '<h2 name="id" style="display:none">' . $listOfBoxes["vegetablePackageId"] . '</h2>';
						echo '<h2 name="productname">' . $listOfBoxes["packageSalesName"] . '</h2>';
						echo '<p name="description">' .  $listOfBoxes["description"]  . '</p>';
						echo '<div class="form-group form-inline">';
							echo '<h1 name="price">' .  $listOfBoxes["price"]  . "€<small>/month</small>" . '</h1>';
							echo '<input type="number" name="months" class="form-control" id="submonth" placeholder="Months" style="width:150px" required>';
						echo '</div>';	
						echo '<button type="submit" name="subscribe" class="btn btn-success btn-lg ">Subscribe to product ' ."ID: " . $listOfBoxes['vegetablePackageId'] . '</button>'; //TODO: Activate subscription in DB and take to user page!
					echo '</form>';
				echo '</div>';

				echo '<div class="col-md-4" style="background: url("");>'; //linear-gradient(to left, rgba(255, 255, 255, 0) 0, rgba(255, 255, 255, 1) 240px, rgba(255, 255, 255, 1) 290px),
					echo '<img class="img-responsive img-rounded" src="'.$listOfBoxes["imageLink"].'">';
				echo '</div>';

			echo '</div>';
		}
		?>

</div>





<?php include("bottom.php");?>