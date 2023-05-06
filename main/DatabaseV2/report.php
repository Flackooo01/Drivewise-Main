<?php
include 'config.php';
if(!empty($_POST['Vehicle_Violation']) || ($_POST['Vehicle_Plate_No']) || ($_POST['Vehicle_Type']) || empty($_POST['Vehicle_Color']) || ($_POST['Report_Image']) || ($_POST['Remark'])){
    $Vehicle_Violation = $_POST['Vehicle_Violation'];
    $Vehicle_Plate_No = $_POST['Vehicle_Plate_No'];
    $Vehicle_Type = $_POST['Vehicle_Type'];
    $Vehicle_Color = $_POST['Vehicle_Color'];
    $Report_Image = $_POST['Report_Image']['name'];
    $Report_Image_tmp_name = $_FILES['Report_Image']['tmp_name'];
    $Report_Image_Folder = 'uploaded_img/' .$Report_Image;
    $Remark = $_POST['Remark'];


    $sql = "INSERT INTO lto_report (Vehicle_Violation, Vehicle_Plate_No, Vehicle_Type, Vehicle_Color, Report_Image, Remark)
    VALUES ('$Vehicle_Violation', '$Vehicle_Plate_No', '$Vehicle_Type', '$Vehicle_Color', '$Report_Image', '$Remark')";
    $result = mysqli_query($conn, $sql);
    if($result){
        move_uploaded_file($Report_Image_tmp_name, $Report_Image_Folder);
        echo "report Successfully";
    }else{
        echo "Report Failed";
    }
}else{
    echo "PLease Fill Out All!";
}



