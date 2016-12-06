<head>
<title>Process Login</title>
</head>
<body>

<?php
session_start();
require('connect.php');
include('functions.php');
global $con;

$username=protectData($_POST['loginusername']);
$password=protectData($_POST['loginpassword']);


$checkUser = "SELECT * FROM User WHERE userId='$username' AND password='$password'";
//$isAdmin = "SELECT * FROM User WHERE adminStatus=TRUE";

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

?>

<script>
    function loginFalse {

    }
</script>

</body>
</html>