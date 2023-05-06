<?php
include 'config.php';

if(isset($_POST['image'])){
    $target_dir = "Images/";
    $Vehicle_Violation = $_POST['Vehicle_Violation'];
    $Vehicle_Plate_No = $_POST['Vehicle_Plate_No'];
    $Vehicle_Type = $_POST['Vehicle_Type'];
    $Vehicle_Color = $_POST['Vehicle_Color'];
    $image = $_POST['image'];
    $imageStore = rand(). "_" .time(). ".jpeg";
    $target_dir = $target_dir."/".$imageStore;
    $Remark = $_POST['Remark'];

    if(!empty($_POST['Vehicle_Violation']) && ($_POST['Vehicle_Plate_No']) && ($_POST['Vehicle_Type']) && ($_POST['Vehicle_Color']) && ($_POST['Remark'])){
        $sql = "INSERT INTO lto_report (Vehicle_Violation, Vehicle_Plate_No, Vehicle_Type, Vehicle_Color, Report_Image, Remark)
        VALUES ('$Vehicle_Violation', '$Vehicle_Plate_No', '$Vehicle_Type', '$Vehicle_Color', '$imageStore','$Remark')";
        $result = mysqli_query($con, $sql);
        if($result){   
            file_put_contents($target_dir, base64_decode($image));
            echo "Report Successfull";
        }else{
            echo "report Failed";
        }
    }else{
        echo "Please Fill out All!";
    }
}   

