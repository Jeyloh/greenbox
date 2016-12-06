<head>
<title>Process Register</title>
</head>
<body>

<?php
include_once("connect.php");




// Create database
$deleteDB = "DROP DATABASE $db";
if ($con->query($deleteDB) === TRUE) {
    echo "<br>Database deleted successfully";
} else {
    echo "<br>Error deleting database: " . $con->error;
}

// Create database
$createDB = "CREATE DATABASE IF NOT EXISTS $db";
if ($con->query($createDB) === TRUE) {
    echo "<br>Database created successfully";
} else {
    echo "<br>Error creating database: " . $con->error;
}
$con = new mysqli($servername, $username, $password, $db);

// Invoked for every table
function createTable($table_name, $connection) {
    if ($connection->query($table_name) === TRUE) {
        //echo "<br>Table $table_name created successfully";
    } else {
        echo "<br>Error creating table: " . $connection->error;
    }
}

// Invoked for every test record added to the table
function insertRecord($record, $connection) {
    if ($connection->query($record) === TRUE) {
        //echo "<br>New record created successfully";
    } else {
        echo "<br>Error: " . $record . "<br>" . $connection->error;
    }
}

/* CREATE TABLE subscription AND ADD TEST DATA */
$subscription_table = "CREATE TABLE IF NOT EXISTS Subscription(
subscriptionId INT NOT NULL AUTO_INCREMENT,
userId NOT NULL VARCHAR(255),
vegetablePackageId NOT NULL INT,
subscriptionInMonths NOT NULL INT(2),
PRIMARY KEY (subscriptionId))";

$subscription_records = "INSERT INTO Subscription ('userId', 'vegetablePackageId', 'subscriptionInMonths')
VALUES('JH001', 001, 12)";


/* CREATE TABLE USER AND ADD TEST DATA */
$user_table = "CREATE TABLE IF NOT EXISTS User (
userId VARCHAR(255),
password VARCHAR(255),
adminStatus BOOL,
firstName VARCHAR(255),
lastName VARCHAR(255),
phone INT,
email VARCHAR(255),
address VARCHAR(255),
country VARCHAR(255),
zip INT(6),
PRIMARY KEY (userId))";
// FOREIGN KEY (subscriptionId) REFERENCES mysubscription(subscriptionId)

$user_records = "INSERT INTO User ('userId', 'password', 'adminStatus', 'firstName', 'lastName', 'phone', 'email', 'address', 'country', 'zip')
VALUES('JH001','encryptedpw', TRUE,'Joergen','Hansen', 98823376, 'something@mail.com', 'Superstreet 85c', 'Norway', 4617)";



/* CREATE TABLE VEGETABLEPACKAGES AND ADD TEST DATA */
$vegetablePackage_table = "CREATE TABLE IF NOT EXISTS VegetablePackage(
vegetablePackageId INT NOT NULL AUTO_INCREMENT,
packageSalesName VARCHAR(255),
description VARCHAR(255),
imageLink VARCHAR(255),
price INT(12),
vegetable1 VARCHAR(255),
vegetable2 VARCHAR(255),
vegetable3 VARCHAR(255),
vegetable4 VARCHAR(255),
vegetable5 VARCHAR(255),
PRIMARY KEY (vegetablePackageId))";
//FOREIGN KEY (vegList) REFERENCES VegetablePackage(vegListId),
//FOREIGN KEY (subscriptionId) REFERENCES mysubscription(subscriptionId)

$vegetablePackage_records = "INSERT INTO VegetablePackage ('packageSalesName', 'price', 'vegetable1', 'vegetable2', 
'vegetable3', 'vegetable4', 'vegetable5') VALUES('Back to the Roots', 29, 'Potato', 'Sweetpotato', 'Carrot', 'Pear', 'Lemon')";


// Run functions to create all these.
createTable($subscription_table, $con);
//insertRecord($subscription_records, $con);
createTable($user_table, $con);
//insertRecord($user_records, $con);
createTable($vegetablePackage_table, $con);
//insertRecord($vegetablePackage_records, $con);


$con -> close();

?>


</body>
</html>