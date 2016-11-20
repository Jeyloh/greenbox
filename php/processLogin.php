<head>
<title>Process Login</title>
</head>
<body>

<?php
session_start();
include_once('connect.php');
include('functions.php');
$con = new mysqli($servername, $username, $password, $db);

$myusername=protectData($_POST['loginusername']);
$mypassword=protectData($_POST['loginpassword']);


$checkUser = "SELECT * FROM User WHERE userId='$myusername' AND password='$mypassword'";
$isAdmin = "SELECT * FROM User WHERE adminStatus=TRUE";

$result = $con->query($checkUser);

echo('<br><br>');
if ($result->num_rows == 1) {
    echo('found a user');
    // User was found, now set session variables
    $_SESSION['loggedin'] = true;
    $_SESSION["user"] = $myusername;
    // Decide if the user is admin or not and redirect to appropriate page
    if ($result = $con->query($isAdmin) === TRUE) {
        header("location:adminpage.php");
        echo('redirecting to adminpage.php');
    } 
    else {
        header("location:userpage.php");
        echo('redirecting to userpage.php');
    }
	$result->close();
}
else {
	echo "Wrong Username or Password";
    echo "<br>Error logging in: " . $con->error;
	header("location:login.php");   // Re-direct to the Login form script
	$result->close();
}

?>

</body>
</html>