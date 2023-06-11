<?php
require_once("include/initialize.php");

$userid = $_SESSION['UserID'];
$ItemID = $_POST['ItemID'];

/*
$sql = "SELECT * From cart WHERE ItemID = '$ItemID' ";
$mydb->setQuery($sql);
$row = $mydb->executeQuery();
$maxrow = $mydb->num_rows($row);

if ($maxrow > 0) {
    echo "Item already in cart!";
} else {

}
*/
$sql = "UPDATE lto_report SET `Status`='ONGOING' WHERE Report_ID='$ItemID'";
$mydb->setQuery($sql);
$mydb->executeQuery();
