<?php
require('connect.php');

// Check if action was defined from AJAX script
if(isset($_POST['action']) && !empty($_POST['action'])) {
    // Define which call was sent in the $action
    $action = $_POST['action'];
    // Define different kinds of variables from the sent ajax functions
    $pid = $_POST['pid'];
    $uid = $_POST['uid'];
    $unsubPackageId = $_POST['unsubId'];

    // Call different PHP functions for different actions
    switch($action) {
        case 'removepack' : removeBox($pid);break;
        case 'edit' : editBox();break;
        case 'removeuser' : removeUser($uid);break;
        case 'unsub' : unsubscribePackage($unsubPackageId);break;
    }
}

/**
 * This function is called with AJAX from adminpage.php when an admin clicks the 'X' button in the display list.
 * @param $deleteId the ID of the box to delete
 */
function removeBox($deleteId)
{
    require('connect.php');
    global $con;
    $sql_delete_package = "DELETE FROM VegetablePackage WHERE vegetablePackageId = $deleteId";

    if ($con->query($sql_delete_package) === TRUE) {
        echo "<br>Greenbox deleted successfully";
    } else {
        echo "<br>Error deleting box: " . $con->error;
    }
    // Close the connection to the mysql server
    $con -> close();
}

function removeUser($deleteId)
{
    require('connect.php');
    global $con;

    $sql_delete_user = "DELETE FROM User WHERE userId = $deleteId";

    if ($con->query($sql_delete_user) === TRUE) {
        echo "<br>User deleted successfully";
    } else {
        echo "<br>Error deleting user: " . $con->error;
    }
    // Close the connection to the mysql server
    $con -> close();
}

// TODO Implement another page where admin can modify the items
function editBox($editId) {

}

function unsubscribePackage($removeFromUser) {
    global $con;
    echo ("inside unsubscribePackage");
    $sql_delete = "DELETE * FROM Subscription WHERE userId = '$removeFromUser'";
    $con->query($sql_delete);
}





?>