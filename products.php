<?php $title = "Products"; include("top.php");



?>

<div class="container">
<h1>Our Greenboxes</h1>
	<p>This is an overview of our boxes!</p>

		<?php
		include('connect.php');
		global $con;

		$sql_vegPackage = "SELECT * FROM VegetablePackage";
		$result_vegPackage = $con->query($sql_vegPackage);



		while ($listOfBoxes = mysqli_fetch_assoc($result_vegPackage)) {
			echo '<div class="row products-row">';
				echo '<div class="col-md-8">';
					echo '<h2>' . $listOfBoxes["packageSalesName"] . '</h2>';
					echo '<p>' .  $listOfBoxes["description"]  . '</p>';
					echo '<h1>' .  $listOfBoxes["price"]  . '</h1>';
					echo '<button type="button" class="btn btn-success btn-lg ">Subscribe to product</button>'; //TODO: Activate subscription in DB and take to user page!
				echo '</div>';

				echo '<div class="col-md-4" style="background: url("");>'; //linear-gradient(to left, rgba(255, 255, 255, 0) 0, rgba(255, 255, 255, 1) 240px, rgba(255, 255, 255, 1) 290px),
					echo '<img class="img-responsive img-rounded" src="'.$listOfBoxes["imageLink"].'">';
				echo '</div>';

			echo '</div>';
		}
		?>

</div>





<?php include("bottom.php");?>