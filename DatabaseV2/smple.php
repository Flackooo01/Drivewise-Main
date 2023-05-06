<?php
    // Establish a database connection
    $connection = mysqli_connect("localhost", "u481604282_dwise", "eRlPN[8Z>8vF", "u481604282_drivewise");

    // Execute a SELECT query to retrieve the video data
    $query = "SELECT Report_Video FROM lto_report WHERE Report_ID = 1"; // replace 1 with the ID of the video you want to retrieve
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);

    // Output the video data
    header("Content-Type: video/mp4"); // set the MIME type of the video
    echo $row['Report_Video'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Video Player</title>
</head>
<body>
    <video controls>
        <source src="<?php echo $row['Report_Video']; ?>" type="video/mp4">
    </video>
</body>
</html>
