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
$subPrice = $_POST['price'];
$subMonths = $_POST['months'];
//retrieved from hidden field
$packId = $_POST['id'];

$user = $_SESSION['user'];
var_dump("user from process-sub " . $user);

if (isLoggedIn()) {
    /** TODO: Connect the user pressing the button to the subscription package */
    $sql_sub = "INSERT INTO Subscription(userId, vegetablePackageId, subscriptionInMonths) 
    VALUES('$user', '$packId', '$subMonths')";

    // Used to insert all the variables from the form into the database!
    if ($con->query($sql_sub) === TRUE) {
        header("location:userpage.php");
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

/**
$checkUser = "SELECT * FROM Subscription WHERE userId='$username' AND password='$password'";
//$isAdmin = "SELECT * FROM User WHERE userId='$_SESSION['user']";

$result = $con->query($checkUser);

echo('<br><br>');
if ($result->num_rows == 1) {
    echo('found a user');
    // User was found, now set session variables
    $_SESSION['user'] = $myusername;
    $_SESSION['loggedin'] = true;


    $row=mysqli_fetch_assoc($result);
    // Decide if the user is admin or not and redirect to appropriate page
    // TODO: Replace if condition with isAdmin() - Currently it returns NULL so look into that
    if ($row['adminStatus'] == true) {
        $_SESSION['admin'] = true;
        header("location:adminpage.php");
        echo('redirecting to adminpage.php');
    } 
    else {
        $_SESSION['admin'] = false;
        header("location:userpage.php");
        echo('redirecting to userpage.php');
    }
	$result->close();
}
else {
    ?>

    <?php
    header("location:index.php");   // Re-direct to the Login form script
    //TODO: Add function to redirect into the modal
    echo "<br>Error logging in: " . $con->error;
	$result->close();
}
*/

?>


</body>
</html>