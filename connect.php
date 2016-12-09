<?php
$servername = "localhost";
$username = "root";
$password = "usbw";
$db = "greenbox";



// Create the connection
$con = new mysqli($servername, $username, $password);
// Check if successfully connected
if ($con->connect_error) {

    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	$cleardb_server = $cleardb_url["host"];
    $cleardb_username = $cleardb_url["user"];
    $cleardb_password = $cleardb_url["pass"];
	$cleardb_db = substr($cleardb_url["path"], 1);
    $con = new mysqli($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

    if ($con->connect_error) {
    	die("Connection to heroku server failed: " . $con->connect_error);
    }

}

// Create database
$createDB = "CREATE DATABASE IF NOT EXISTS $db";
if ($con->query($createDB) === TRUE) {
	if($_SERVER['REQUEST_URI'] == "greenbox/database-setup.php") {
		echo "<br>Database created successfully";
	}
} else {
    echo "<br>Error creating database: " . $con->error;
}

$con = new mysqli($servername, $username, $password, $db);

?>