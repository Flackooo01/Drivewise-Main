<?php 
 
 /*
 * Created by Belal Khan
 * website: www.simplifiedcoding.net 
 * Retrieve Data From MySQL Database in Android
 */
 
 //database constants
 define('DB_HOST', 'localhost');
 define('DB_USER', 'u481604282_dwise');
 define('DB_PASS', 'eRlPN[8Z>8vF');
 define('DB_NAME', 'u481604282_drivewise');
 
 //connecting to database and getting the connection object
 $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
 
 //Checking if any error occured while connecting
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 
 //creating a query
 $stmt = $conn->prepare("SELECT Report_ID, Vehicle_Plate_No, Vehicle_Violation, Report_Image, Status, Date_Report FROM lto_report;");
 
 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($id, $title, $shortdesc, $image, $status, $Date);
 
 $products = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
 $temp = array();
 $temp['id'] = $id; 
 $temp['title'] = $title; 
 $temp['shortdesc'] = $shortdesc; 
 $temp['status'] = $status; 
 $temp['image'] = $image; 
 $temp['time'] = $Date;
 array_push($products, $temp);
 }
 
 //displaying the result in json format 
 echo json_encode($products);