<?php
require_once "config.php";
// sql to delete a record
$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id='$id'";

if ($link->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $link->error;
}
header("location: admin_home.php");
exit;
?>
