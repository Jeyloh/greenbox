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

$_SESSION["user"] = $myusername;
$_SESSION["admin"] = isAdmin();

$checkUser = "SELECT * FROM User WHERE userId='$myusername' AND password='$mypassword'";
$isAdmin = "SELECT * FROM User WHERE adminStatus=TRUE";

$result = $con->query($checkUser);

echo('<br><br>');
if ($result->num_rows == 1) {
    echo('found a user');
    // Decide if the user is admin or not and redirect to appropriate page
    if ($result = $con->query($isAdmin) === TRUE) {
        header("location:php/adminpage.php");
        echo('redirecting to adminpage.php');
    } 
    else {
        header("location:php/userpage.php");
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