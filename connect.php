<?php

$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"], 1);


// Create the connection
$con = new mysqli($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
// Check if successfully connected
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>