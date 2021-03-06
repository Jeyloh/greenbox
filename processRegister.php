<head>
<title>Process Register</title>
</head>
<body>
<?php
// Connect to the server and DB
session_start();
require('connect.php');
include('functions.php');



$username = protectData($_POST['registerusername']);
$password = $_POST['registerpassword'];
$confpass = $_POST['confirmpassword'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$phone = $_POST['phone'];
$mail = $_POST['email'];
$address = $_POST['address'];
$country = $_POST['country'];
$zip = $_POST['zip'];
$isAdmin = (isset($_POST['admin']) ? true : false);


// Array with all Registration fields
$allFields = array($username, $password, $fname, $lname, $phone, $mail, $address, $country, $zip, $isAdmin);
// Error handling array
$errors = array();

$_SESSION["user"] = $username;


// check if each field in fields isset() or empty
foreach($allFields AS $field) 
{
    if (isset($_POST[$field]) && !empty($_POST[$field]))
	{
        $errors[] = "Please fill in $field";
        //
	} else {
        echo "$field was filled in correctly!";
    }
}

// Checks that passwords match
if($password != $confpass)
{
	$errors[] = "Passwords doesn't match.";
}
// Checks password length
else if(strlen($password) < 4)
{
	$errors[] = "Password must be more than 8 characters long.";
}
// Encrypts the password with md5 and stores it in a variable
else 
{
	$encryptedPassword = md5($password);
}

// Checks the email format
if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
  $errors[] = "Please use the correct email format.";
}

// Checks that the email is not in the DB
if($mail){
	$sql_mail = "SELECT * FROM User WHERE email='$mail'";
	if ($result = $con->query($sql_mail) === TRUE) {
		if($result->num_rows == 1) {
            echo "<br>Error checking email: " . $con->error;
            $errors[] = "Mail address $mail was registered";
	   		
	   		$result->close();
	   	} 
	}
}


// Check the error array for any errors, if none then append to the database!
if(count($errors) > 0) 
{
	echo "<h2>Ran into errors:</h2> ";
	foreach ($errors as $errorMessage) {
    	echo " - $errorMessage <br>";
	}
} 
else 
{	
	// All data is checked and OK, starting session and registering data
	$sql_register_user = insertIntoUser("$username", "$encryptedPassword", "$isAdmin", "$fname", "$lname","$phone","$mail","$address","$country","$zip");
	// Used to insert all the variables from the form into the database!
	if ($con->query($sql_register_user) === TRUE) {
	    echo "<br>User $username registered successfully";
	    $_SESSION['loggedin'] = true;
	    if($isAdmin == true) {
	    	$_SESSION['admin'] = true;
	    	header("location:adminpage.php"); 
	    } else {
	    	$_SESSION['admin'] = false;
	    	header("location:userpage.php"); 
	    }
	} else {
	    echo "<br>Error registering user: " . $con->error;
	}
	// Close the connection to the mysql server
	$con -> close();     
}

?>


</body>
</html>