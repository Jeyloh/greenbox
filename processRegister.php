<head>
<title>Process Register</title>
</head>
<body>
<?php
// Connect to the server and DB
session_start();
include_once('connect.php');
include('functions.php');
$con = new mysqli($servername, $username, $password, $db);


$username = protectData($_POST['registerusername']);
$password = protectData($_POST['registerpassword']);
$confpass = protectData($_POST['confirmpassword']);
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
	if(isset($_POST[$field]))
	{
		$errors[] = "Please fill in $field";
	}
}

// Checks that passwords match
if($password != $confpass)
{
	$errors[] = "Passwords doesn't match.";
}
// Checks password length
else if(strlen($password) < 8)
{
	$errors[] = "Password must be more than 8 characters long.";
}
// Encrypts the password with md5 and stores it in a variable
else 
{
	$encryptedPassword = encryptPassword($password);
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
	   		$errors[] = "Mail address $mail was registered";	
	   		
	   		$result->close();
	   	} 
	} else {
	    echo "<br>Error checking email: " . $con->error;
	}

	
}


// Check the error array for any errors, if none then append to the database!
if(count($errors) > 0) 
{
	echo "Ran into errors:<br> ";
	foreach ($errors as $errorMessage) {
    	echo " - $errorMessage <br>";
	}
} 
else 
{	
	// All data is checked and OK, starting session and registering data
	var_dump("$username");
	$sql_register_user = insertIntoUser("$username", "$encryptedPassword", "$isAdmin", "$fname", "$lname","$phone","$mail","$address","$country","$zip");
	// Used to insert all the variables from the form into the database!
	if ($con->query($sql_register_user) === TRUE) {
	    echo "<br>User $username registered successfully";
	    if(isAdmin()) {
	    	header("location:adminpage.php"); 
	    } else {
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