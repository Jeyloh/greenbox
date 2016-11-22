
<?php


function protectData($protectVar){
	echo ("$protectVar protected to = ");
	stripslashes($protectVar);
 	mysql_real_escape_string($protectVar);
 	htmlspecialchars($protectVar);
 	echo ("$protectVar<br>");

 	$protectedVar = $protectVar;
 	return $protectedVar;
}

/**
	Add salting and MD5 encryption
*/
function encryptPassword($pwToEncrypt) {
	
	$encryptedpw = md5($pwToEncrypt);
	//return $encryptedpw;
	return $pwToEncrypt;
}

function isAdmin() {
    include('connect.php');
    $con = new mysqli("localhost", "root", "usbw", "greenbox");

    $username = $_SESSION['user'];
    $adminStatus = "SELECT adminStatus FROM User WHERE userId='$username'";
    $result = $con->query($adminStatus);
    $row=mysqli_fetch_object($result);

    var_dump($username);
    var_dump($row);

    if ($row == true) {
    	return true;
    } else {
    	return false;
    }
}

function isLoggedIn() {

	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		return true;
	} else {
		return false;
	}
}

function getUserName() {
	$username = $con->query("SELECT adminStatus FROM User WHERE userId = '$username'");
}

function checkUserLogin($myusername, $mypassword) {
	$query = "SELECT * FROM User WHERE userId='$myusername' AND password='$mypassword'";
}

function insertIntoUser($username, $encryptedPassword, $isAdmin, $fname, $lname, $phone, $mail, $address, $country, $zip){
	$query = "INSERT INTO User(userId, password, adminStatus, firstName, lastName, phone, email, address, country, zip) 
VALUES('$username', '$encryptedPassword', '$isAdmin', '$fname', '$lname','$phone', '$mail', '$address', '$country', '$zip')";
	return $query;
}


?>