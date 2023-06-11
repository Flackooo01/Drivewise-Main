<?php
    require_once 'config.php';

if ($_SERVER['REQUEST_METHOD']=='POST') {

    $Username = $_POST['Username'];
    $Password = md5($_POST['Password']);

    $sql = "SELECT * FROM lto_userlist WHERE Username = '$Username' AND Password = '$Password'";

    $response = mysqli_query($con, $sql);

    $result = array();
    $result['login'] = array();
    
    if ( mysqli_num_rows($response) === 1 ) {
        $row = mysqli_fetch_assoc($response);
        

        if ( md5($Password, $row['Password']) ) {

            $index['Id'] = $row['Id'];
            $index['Fullname'] = $row['Fullname'];
            $index['Email'] = $row['Email'];
            $index['Username'] = $row['Username'];

            array_push($result['login'], $index);

            $result['success'] = "1";
            $result['message'] = "success";
            echo json_encode($result);

            mysqli_close($con);

        } else {

            $result['success'] = "0";
            $result['message'] = "error";
            echo json_encode($result);

            mysqli_close($con);

        }
    }

}

?>