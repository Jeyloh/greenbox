<head>
<title>Connect Subscription</title>
</head>
<body>

<?php
session_start();
require('connect.php');
include('functions.php');
global $con;


$subName = $_POST['productname'];
$subDesc = $_POST['description'];
$subPrice = intval($_POST['price']);
$subMonths = intval($_POST['months']);
//retrieved from hidden field
$packId = intval($_POST['pid']);

var_dump($packId);

$user = $_SESSION['user'];

if (isLoggedIn()) {
    /** TODO: Connect the user pressing the button to the subscription package */
    $sql_sub = "INSERT INTO Subscription(userId, vegetablePackageId, subscriptionInMonths) 
    VALUES('$user', '$packId', '$subMonths')";

    // Used to insert all the variables from the form into the database!
    if ($con->query($sql_sub) === TRUE) {
        header('location:confirmedSubscription.php');

    }
    else {
        echo "<br>Error connecting user with package: " . $con->error;
        var_dump("user from process-sub " . $user);
    }
    // Close the connection to the mysql server
    $con -> close();
} else {
    header("location:index.php");   // Re-direct to the Login form script
}

?>


</body>
</html>