<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "testing";

$con = mysqli_connect($server, $user, $pass, $database);

if(!$con){
    echo "Connection failed";
}
