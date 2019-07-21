<?php
require_once "config.php";
// sql to delete a record
$joblisting = $_GET['joblisting'];

$sql = "DELETE FROM joblisting WHERE joblisting='$joblisting'";

if ($link->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $link->error;
}
header("location: job-listings.php?page=1");
exit;
?>
