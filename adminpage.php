<?php $title = "Adminpage"; include("top.php");?>

<!-- PHP script to get all vegetables from VegetablePackages -->


<div class="container-fluid">
	<div class="row">

		<div class="col-lg-8">
			<h3>Admin Page</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
			<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
		</div>

		<div class="col-lg-4">
			<img src="resources/art.jpg" class="img-responsive img-rounded">
		</div>

	</div>

	<div class="row">
		<div class="col-lg-4 center-block">
			<h1>Create a new Greenbox!</h1>
			<form method="POST" action="addGreenbox.php">
				<div class="form-group form-inline">
					<label for="salesname">Salesname</label>
					<input type="text" name="packageSalesName" class="form-control" id="salesname" placeholder="Greenbox Salesname" required>
					<input type="number" name="price" class="form-control" id="price" placeholder="Price in €uro" required>
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea name="description" class="form-control" id="description" placeholder="Description" rows="5"></textarea>
				</div>
				<div class="form-group">
					<label for="veg1">Vegetable List</label>
					<input type="text" name="veg1" class="form-control" id="veg1" placeholder="Ingredient 1">
					<input type="text" name="veg2" class="form-control" id="veg2" placeholder="Ingredient 2">
					<input type="text" name="veg3" class="form-control" id="veg3" placeholder="Ingredient 3">
					<input type="text" name="veg4" class="form-control" id="veg4" placeholder="Ingredient 4">
					<input type="text" name="veg5" class="form-control" id="veg5" placeholder="Ingredient 5">
				</div>
				<div class="form-group">
					<!-- Add Image to the Box -->
					<label class="custom-file">Add image
						<input type="file" name="image" id="file" class="custom-file-input">
						<span class="custom-file-control"></span>
					</label>
				</div>
				<button type="submit" class="btn btn-primary">Add Greenbox</button>
			</form>
		</div>

		<div class="col-lg-8">
			<h1>Current Active Greenboxes</h1>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Package ID</th>
						<th>Vegetable Name</th>
						<th>Price</th>
						<th>Description</th>
						<th>Vegetables</th>
						<th>Related Image</th>
						<th>Edit Box</th>
						<th>Remove Box</th>
					</tr>
					</thead>
					<tbody>
						<?php
						// First I include some code with functions to remove objects and AJAX implementation
						include('modifyVegPack.php');
						// Then, store a query in a var
						$sql_vegPackage = "SELECT * FROM VegetablePackage";
						// Check connectivity to DB and query it
						$result_vegPackage = $con->query($sql_vegPackage);
						// Do the follow for every item in the table
						while($listOfBoxes=mysqli_fetch_assoc($result_vegPackage))
						{
							// Store all vegetables in one string to use in single <th>
							$vegetableList = $listOfBoxes["vegetable1"] . " " . $listOfBoxes["vegetable2"] . " " .
								$listOfBoxes["vegetable3"] . " " . $listOfBoxes["vegetable4"] . " " . $listOfBoxes["vegetable5"];
							// Setup int id to remove/edit boxes
							$intId = intval($listOfBoxes["vegetablePackageId"]);
							// Start creating table rows and columns with values from DB
							echo '<tr>';
							echo '<th>'.$listOfBoxes["vegetablePackageId"].'</th>';
							echo '<th>'.$listOfBoxes["packageSalesName"].'</th>';
							echo '<th>'.$listOfBoxes["price"].'</th>';
							echo '<th>'.$listOfBoxes["description"].'</th>';
							// This is the variable earlier created
							echo '<th>'.$vegetableList.'</th>';
							echo '<th><img src="'.$listOfBoxes["imageLink"].'" width="150px" height="100px"></th>';
							echo '<th> <button type="button" class="close" onclick="editBox()">&times;</button></th>'; //TODO: Implement editBox()
							echo '<th> <button type="button" class="close" onclick="removeBox('.$intId.')">&times;</button></th>';

							echo '</tr>';
						}
						?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	// Using AJAX to send a live request to a php script for
	function editBox() {
		$.ajax({
			url: 'modifyVegPack.php',
			data: {action: 'edit'},
			type: 'post',
			success: function(output) {
				alert(output);
			}
		});
	}
	function removeBox(packId) {
		$.ajax({
			url: 'modifyVegPack.php',
			data: {action: 'remove', packId: packId},
			type: 'post',
			success: function(output) {
				alert("Successfully removed Greenbox with ID: " + packId + " from the table VegetablePackage\n\n" + output);
			}
		});


	}
</script>
<style>
	a {
		padding: 0.2em;
	}
	a:hover {
		background-color: #02AAEE;
	}
	#output {
		display: block;
		margin-top: 8px;
		padding: 1%;
		border: 1px solid #666;
		background-color: #efefef;

	}
</style>

<?php include("bottom.php");?>