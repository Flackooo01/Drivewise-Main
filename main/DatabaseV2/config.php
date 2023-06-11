<?php
session_start();

require_once 'vendor/autoload.php';

// init configuration
$clientID = '532347594783-tu8kpkpnkrtkpt4b6s1e5jc2dnjtk2g7.apps.googleusercontent.com';
$redirectUri = 'http://localhost/DatabaseV2/login.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

$server = "localhost";
$user = "root";
$pass = "";
$database = "lto_db";

$con = mysqli_connect($server, $user, $pass, $database);

if(!$con){
    echo "Connection failed";
}
