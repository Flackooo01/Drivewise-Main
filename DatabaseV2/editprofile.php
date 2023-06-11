<?php
    require_once 'config.php';

$UserId = $_POST['Id'];
$Email = $_POST['Email'];
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$Confirm_Password = $_POST['Confirm_Password'];

$sql = "UPDATE `lto_userlist` SET `Id`='$Id',`Email`='$Email',`Username`='$Username',`Password`='$Password',`Confirm_Password`='$Confirm_Password' WHERE Id = $Id";
$result = mysqli_query($con, $sql);

if($result){
    echo "Data Updated";
}else{
    echo "Error Update";
}








?>