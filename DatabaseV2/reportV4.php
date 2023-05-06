<?php
include 'config.php';

if(isset($_POST['Vehicle_Violation']) && isset($_POST['Vehicle_Plate_No']) && isset($_POST['Vehicle_Type']) && isset($_POST['Vehicle_Color']) && isset($_POST['Remark'])){
    $Vehicle_Violation = $_POST['Vehicle_Violation'];
    $Vehicle_Plate_No = $_POST['Vehicle_Plate_No'];
    $Vehicle_Type = $_POST['Vehicle_Type'];
    $Vehicle_Color = $_POST['Vehicle_Color'];
    $Remark = $_POST['Remark'];
    $Report_Image = $_POST['image'];

    // Check if all required fields are not empty
    if(empty($Vehicle_Violation) || empty($Vehicle_Plate_No) || empty($Vehicle_Type) || empty($Vehicle_Color) || empty($Remark)){
        http_response_code(400); // Bad Request
        echo "Please fill in all required fields";
        exit();
    }
    
    if(isset($_POST['video'])) {
    $video = $_POST['video'];
    if(!empty($video)){
        $target_dir = "Videos/";
        $videoName = "video_" . uniqid() . ".mp4";
        $target_file = $target_dir . $videoName;
        $uploadOk = 1;
        $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check file size
        if (strlen($video) > 50000000) { // 50MB
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($videoFileType != "mp4") {
            echo "Sorry, only MP4 files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (file_put_contents($target_file, base64_decode($video))) {
                $Report_Video = $videoName;
                //echo "The video file ". $videoName. " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}



    if(isset($_POST['image'])){
        $image = $_POST['image'];
        if(!empty($image)){
            $target_dir = "Images/";
            $imageStore = rand(). "_" .time(). ".jpeg";
            $target_dir = $target_dir."/".$imageStore;

            file_put_contents($target_dir, base64_decode($image));
            $Report_Image = $imageStore;
        }
    }

    $sql = "INSERT INTO lto_report (Vehicle_Violation, Vehicle_Plate_No, Vehicle_Type, Vehicle_Color, Report_Image, Report_Video, Remark) 
        VALUES ('$Vehicle_Violation', '$Vehicle_Plate_No', '$Vehicle_Type', '$Vehicle_Color', '$Report_Image', '$Report_Video', '$Remark')";

    $result = mysqli_query($con, $sql);
    if($result){   
        http_response_code(200);
        echo "Report Successful";
    }else{
        echo "Report Failed";
    }
} else {
    http_response_code(400); // Bad Request
    echo "Please include all required fields";
}
?>
