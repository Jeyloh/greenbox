<?php
$servername = "localhost";
$username = "root";
$password = "usbw";
$db = "greenbox";

// Create the connection
$con = new mysqli($servername, $username, $password, $db);
// Check if successfully connected
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>