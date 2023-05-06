<?php
include 'config.php';
    $Fullname = $_POST['Fullname'];
    $Active = $_POST['Active'];
    if ($con) {
        $sql = "SELECT * FROM lto_userlist WHERE Fullname = '" . $Fullname . "' AND Active = '" . $Active . "'";
        $res = mysqli_query($con, $sql);
        if (mysqli_num_rows($res) != 0) {
            $row = mysqli_fetch_assoc($res);
            $sqlUpdate = "UPDATE lto_userlist SET Active = '0' WHERE Fullname = '" . $Fullname . "'";
            if (mysqli_query($con, $sqlUpdate)) {
                echo "success";
            } else echo "Logout Failed";
        } else echo "Unauthorised to access";
    } else echo "Database connection failed";
