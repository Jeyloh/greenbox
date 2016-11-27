<?php
require('connect.php');

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    $packId = $_POST['packId'];
    switch($action) {
        case 'remove' : removeBox($packId);break;
        case 'edit' : editBox();break;
    }
}

function removeBox($deleteId) {
    require('connect.php');
    global $con, $db;

    $sql_delete = "DELETE FROM VegetablePackage WHERE vegetablePackageId = $deleteId";

    if ($con->query($sql_delete) === TRUE) {
        echo "<br>Greenbox deleted successfully";
        header("Refresh:0");
    } else {
        echo "<br>Error deleting box: " . $con->error;
    }
    // Close the connection to the mysql server
    $con -> close();

}

function editBox($editId) {

}







?>