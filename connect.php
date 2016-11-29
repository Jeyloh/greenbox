<?php
$servername = "localhost";
$username = "root";
$password = "usbw";
$db = "greenbox";


$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);

$db['default']['hostname'] = $cleardb_server;
$db['default']['username'] = $cleardb_username;
$db['default']['password'] = $cleardb_password;
$db['default']['database'] = $cleardb_db;


// Create the connection
$con = new mysqli($servername, $username, $password, $db);
// Check if successfully connected
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>