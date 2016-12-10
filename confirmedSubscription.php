
<?php $title = "Confirmed Subscription";
header('Refresh:5;url=userpage.php');
include("top.php"); ?>

<!--
    TODO: Show Javascript by taking review from user and adding it to a loop
        Add the data to the review-section dynamically and also add it to vegpack table in a new column.
-->

            <div class="container">
            	<h1>Congratulations!</h1>
            	<p>User <?php echo $_SESSION["user"];?> successfully subscribed to package. Redirecting to userpage!</p>

            	<div>

            	</div>


                
            </div>
        </div>
    </div>



<?php include("bottom.php"); ?>