
<?php


function protectData($protectVar){
	stripslashes($protectVar);
 	mysql_real_escape_string($protectVar);
 	htmlspecialchars($protectVar);
 	$protectedVar = $protectVar;
 	return $protectedVar;
}


/**
 * @return boolChecks if the user is an admin by querying the database.
 */
function isAdmin() {
    include('connect.php');
    global $con;

    $username = $_SESSION['user'];
    $adminStatus = "SELECT adminStatus FROM User WHERE userId='$username'";
    $result = $con->query($adminStatus);
    $row=mysqli_fetch_object($result);

    if ($row == true) {
    	return true;
    } else {
    	return false;
    }
}

/**
 * Reuseable function to check if the user is logged in with sessions
 * @return bool
 */
function isLoggedIn() {

	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		return true;
	} else {
		return false;
	}
}

/**
 * Retrieves the username of the current session
 * @return mixed
 */
function getUserName() {
    global $con;
    $username = var_dump($_SESSION["user"]);
    return $username;
}


/**
 * Query the database with an insert function. Used for registering a user
 */
function insertIntoUser($username, $encryptedPassword, $isAdmin, $fname, $lname, $phone, $mail, $address, $country, $zip){
	$query = "INSERT INTO User(userId, password, adminStatus, firstName, lastName, phone, email, address, country, zip) 
VALUES('$username', '$encryptedPassword', '$isAdmin', '$fname', '$lname','$phone', '$mail', '$address', '$country', '$zip')";
	return $query;
}

function insertIntoVegetablePackage($name, $price, $desc, $veg1, $veg2, $veg3, $veg4, $veg5, $img){
	$query = "INSERT INTO VegetablePackage(packageSalesName, price, description, vegetable1, vegetable2, vegetable3, vegetable4, vegetable5, imageLink) 
VALUES('$name', '$price', '$desc', '$veg1','$veg2', '$veg3', '$veg4', '$veg5', '$img')";
	return $query;
}


function getPackageWithUserId() {
    global $con;
	$userdata = $con->query("SELECT * FROM User");

}

function deleteUser($userId){
    global $con;
    $sql_delete_user = "DELETE FROM User WHERE userId = $userId";

        if ($con->query($sql_delete_user) === TRUE) {
            echo "<br>User deleted successfully";
        } else {
            echo "<br>Error deleting user: " . $con->error;
        }
}
?>