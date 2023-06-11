<?php
include 'config.php';

if(isset($_GET['code'])){
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    //get prokfile information

    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $userinfo = [
        'email' => $google_account_info['email'],
        'first_name' => $google_account_info['first_name'],
        'last_name' => $google_account_info['last_name'],
        'gender' => $google_account_info['gender'],
        'full_name' => $google_account_info['full_name'],
        'picture' => $google_account_info['picture'],
        'verifiedEmail' => $google_account_info['verifiedEmail'],
        'token' => $google_account_info['id'],
    ];

    //checking if user is already exist in database
    $sql = "SELECT * FROM lto_google_account_users WHERE email = '{$userinfo['email']}'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0){
        //user exist
        $userinfo = mysqli_fetch_assoc($result);
        $token = $userinfo['token'];
    }else{
        $sql = "INSERT INTO lto_google_account_users (email, first_name, last_name, gender, full_name, picture, verifiedEmail, token)
                VALUES('{$userinfo['email']}', '{$userinfo['first_name']}', '{$userinfo['last_name']}', 
                '{$userinfo['gender']}', '{$userinfo['full_name']}', '{$userinfo['picture']}', '{$userinfo['verifiedEmail']}', '{$userinfo['token']}')";
        $result = mysqli_query($con, $sql);
        if ($result){
            echo "User Create";
            $token = $userinfo['token'];
        }else{
            echo "User is not Created";
            die();
        }
    }
}

    if (!empty($_POST['Username']) && ($_POST['Password'])) {
        $Username = $_POST['Username'];
        $Password = md5($_POST['Password']);
        $res = array();

        $sql = "SELECT * FROM lto_userlist WHERE Username = '$Username' AND Password = '$Password'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($Username == $row['Username'] && md5($Password, $row['Password'])) {
            try {
                $ApiKey = bin2hex(random_bytes(23));
            } catch (Exception $e) {
                $ApiKey = bin2hex(uniqid($Username, true));
            }
            $sqlUpdate = "UPDATE lto_userlist SET ApiKey = '" . $ApiKey . "' WHERE Username = '" . $Username . "'";
            $connect = mysqli_query($con, $sqlUpdate);
            if ($connect) {
                $res = array(
                    "status" => "success",
                    "message" => "login successful",
                    "Fullname" => $row['Fullname'],
                    "Email" => $row['Email'],
                    "ApiKey" => $ApiKey
                );
            } else
                $res = array(
                    "status" => "failed",
                    "message" => "Login failed try again"
                );
        } else
            echo "Something Went Wrong";
    } else{
        echo "All Fields are required";
    }
        
echo json_encode($res, JSON_PRETTY_PRINT);