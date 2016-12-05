<?php $title = "Adminpage";

include("top.php"); ?>

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
                        <input type="text" name="packageSalesName" class="form-control" id="salesname"
                               placeholder="Greenbox Salesname" required>
                        <input type="number" name="price" class="form-control" id="price" placeholder="Price in €uro"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" placeholder="Description"
                                  rows="5"></textarea>
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
                    include('invokeAjax.php');
                    // Then, store a query in a var
                    $sql_vegPackage = "SELECT * FROM VegetablePackage";
                    // Check connectivity to DB and query it
                    $result_vegPackage = $con->query($sql_vegPackage);
                    // Do the follow for every item in the table
                    while ($listOfBoxes = mysqli_fetch_assoc($result_vegPackage)) {
                        // Store all vegetables in one string to use in single <th>
                        $vegetableList = $listOfBoxes["vegetable1"] . " " . $listOfBoxes["vegetable2"] . " " .
                            $listOfBoxes["vegetable3"] . " " . $listOfBoxes["vegetable4"] . " " . $listOfBoxes["vegetable5"];
                        // Setup int id to remove/edit boxes
                        $intId = intval($listOfBoxes["vegetablePackageId"]);
                        // Start creating table rows and columns with values from DB
                        echo '<tr class="row'.$intId.'">';
                        echo '<th>' . $listOfBoxes["vegetablePackageId"] . '</th>';
                        echo '<th>' . $listOfBoxes["packageSalesName"] . '</th>';
                        echo '<th>' . $listOfBoxes["price"] . '</th>';
                        echo '<th>' . $listOfBoxes["description"] . '</th>';
                        // This is the variable earlier created
                        echo '<th>' . $vegetableList . '</th>';
                        echo '<th><img src="' . $listOfBoxes["imageLink"] . '" width="150px" height="100px"></th>';
                        echo '<th> <button type="button" class="close" onclick="edit()">&times;</button></th>'; //TODO: Implement edit()
                        echo '<th> <button type="button" class="close" onclick="removePackage(' . $intId . ')">&times;</button></th>';
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-12">
                <h1>Users</h1>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Country</th>
                        <th>Current Subscription</th>
                        <th>Remove User</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    //Then, store a query in a var
                    $sql_users = "SELECT * FROM User";
                    // Check connectivity to DB and query it
                    $result_users = $con->query($sql_users);
                    // Do the follow for every item in the table
                    while ($user_list = mysqli_fetch_assoc($result_users)) {

                        $userId = $user_list["userId"];
                        if ($user_list["adminStatus"]) {
                            $isAdmin = "[A]";
                        } else {$isAdmin = "";}
                        //TODO Query Database to get Users active subscription, on hold until user subs are implemented

                        // Start creating table rows and columns with values from DB
                        echo '<tr class="row'.$userId.'">';
                        echo '<th>' . $isAdmin . " " . $userId . '</th>';
                        echo '<th>' . $user_list["firstName"] . '</th>';
                        echo '<th>' . $user_list["lastName"] . '</th>';
                        echo '<th>' . $user_list["email"] . '</th>';
                        echo '<th>' . $user_list["address"] . '</th>';
                        echo '<th>' . $user_list["country"] . '</th>';
                        echo '<th>' . /*$user_list["subscription"] . */'</th>';
                        echo '<th> <button type="button" class="close" onclick="removeUser(' . $userId . ')">&times;</button></th>';
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Using AJAX to send a live request to invokeAjax.php
        function edit() {
            $.ajax({
                url: 'invokeAjax.php',
                data: {action: 'edit'},
                type: 'post',
                success: function (output) {
                    alert(output);
                }
            });
        }
        function removePackage(pid) {
            $.ajax({
                url: 'invokeAjax.php',
                data: {action: 'removepack', pid: pid},
                type: 'post',
                success: function () {
                    // Reference the current row and remove it
                    $('.row'+pid).remove();
                    alert("Package with ID " + pid + " is removed from DB")
                }
            });
        }
        function removeUser(uid) {
            $.ajax({
                url: 'invokeAjax.php',
                data: {action: 'removeuser', uid: uid},
                type: 'post',
                success: function () {
                    // Reference the current row and remove it
                    $('.row'+uid).remove();
                    alert(uid + " is removed from DB")
                }
            });
        }
    </script>

<?php include("bottom.php"); ?>