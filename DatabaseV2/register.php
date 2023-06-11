<?php
require_once 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if (!empty($_POST['Fullname']) && ($_POST['Email']) && ($_POST['Username']) && ($_POST['Password']) && ($_POST['Confirm_Password'])) {

        $Fullname = $_POST['Fullname'];
        $Email = $_POST['Email'];
        $Username = $_POST['Username'];
        $Password = md5($_POST['Password']);
        $Confirm_Password = md5($_POST['Confirm_Password']);

        if ($Password == $Confirm_Password) {
            $sql = "SELECT * FROM lto_userlist WHERE Username = '$Username'";
            $result = mysqli_query($con, $sql);
            if (!$result->num_rows > 0) {
                $sql = "INSERT INTO lto_userlist (Fullname,Email,Username,Password,Confirm_Password) 
                VALUES('$Fullname',' $Email','$Username ','$Password','$Confirm_Password')";
                if (mysqli_query($con, $sql)) {
                    $res["success"] = "1";
                    $res["message"] = "success";

                    echo json_encode($res);
                    mysqli_close($con);
                } else {
                    $res["success"] = "0";
                    $res["message"] = "error";

                    echo json_encode($res);
                    mysqli_close($con);
                }
            } else {
                echo "Username and Email is Already Exist";
            }
        } else {
            echo "password not match";
        }
    } else {
        echo "all fields are required";
    }
}
?>