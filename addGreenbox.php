<head>
    <title>Add Greenbox</title>
</head>
<body>
<?php
// Connect to the server and DB
session_start();
include_once('connect.php');
include('functions.php');


$name = $_POST['packageSalesName'];
$price = intval($_POST['price']);
$desc = $_POST['description'];
$veg1 = $_POST['veg1'];
$veg2 = $_POST['veg2'];
$veg3 = $_POST['veg3'];
$veg4 = $_POST['veg4'];
$veg5 = $_POST['veg5'];
$image = "resources/serverimage/" . $_POST['image'];

// Array with all Registration fields
$requiredInput = array($name, $price, $desc);
// Error handling array
$errors = array();

// check if each field in fields isset() or empty
foreach($requiredInput AS $field)
{
    if(isset($_POST[$field]))
    {
        $errors[] = "Please fill in $field";
    }
}

// Checks that the email is not in the DB
if($name){

    $sql_name = "SELECT * FROM VegetablePackage WHERE packageSalesName='$name'";
    if ($result = $con->query($sql_name) === TRUE) {
        if($result->num_rows == 1) {
            $errors[] = "Success: Package does not exist.";

            $result->close();
        } else {
            $errors[] = "Package name is already registered in DB";
            $result->close();
        }
    } else {
        echo "<br>Error checking box name: " . $con->error;
        var_dump($result);
        var_dump($sql_name);
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
    $sql_register_box = insertIntoVegetablePackage("$name", "$price", "$desc", "$veg1", "$veg2","$veg3","$veg4","$veg5","$image");
    // Used to insert all the variables from the form into the database!
    if ($con->query($sql_register_box) === TRUE) {
        echo "<br>Greenbox successfully registererd!";
        header("location:adminpage.php");
    } else {
        echo "<br>Error registering Greenbox: " . $con->error;
    }
    // Close the connection to the mysql server
    $con -> close();
}

?>

</body>
</html>
