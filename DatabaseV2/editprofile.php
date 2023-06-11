<?php
require_once 'config.php';


$ID = $_POST['ID'];
$Username = $_POST['Username'];
$Password = md5($_POST['Password']);
$Confirm_Password = md5($_POST['Confirm_Password']);


$sql = "SELECT * FROM lto_userlist WHERE ID = '$ID'";
$res = mysqli_query($con,$sql);

if(mysqli_num_rows($res) > 0){
    $result = "UPDATE lto_userlist SET Username = '$Username', Password = '$Password', Confirm_Password = '$Confirm_Password' WHERE ID =  '$ID'";
    if(mysqli_query($con,$result)){
        echo "Profile Update Successfully ";
    }else{
        echo "Failed To Update";
    }
}else{
    echo "UnAuthorize User ";
}

?>