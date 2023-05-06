<?php
require_once("include/initialize.php");
$id = $_GET['id'];

$query = "SELECT 
Vehicle_Violation,
Vehicle_Plate_No,
Vehicle_Type,
Vehicle_Color,
Remark,
Report_Image,
Report_Video,
a.ID,
b.Fullname
 FROM lto_report a
 JOIN `lto_userlist` b ON b.ID = b.ID
 where a.ID=$id";

$mydb->setQuery($query);
$cur = $mydb->loadResultList();
foreach ($cur as $res) {
  $Vehicle_Violation = $res->Vehicle_Violation;
  $Vehicle_Plate_No = $res->Vehicle_Plate_No;
  $Vehicle_Type = $res->Vehicle_Type;
  $Vehicle_Color = $res->Vehicle_Color;
  $Remark = $res->Remark;
  $Report_Image = $res->Report_Image;
  $Report_Video = $res->Report_Video;
  $Fullname = $res->Fullname;
}
?>

<div class="row">
  <div class="col-md-6">
    <div class="mb-1" style="margin: 50px;">
        <video controls width="640" height="360">
            <source src="DatabaseV2/Videos/<?php echo $Report_Video; ?>" type="video/mp4">
        </video>
      
    </div>

    <div class="text-center mb-1" style="margin: 50px;">
      <img src="DatabaseV2/Images/<?php echo $Report_Image?>" class="img-fluid"> 
    </div>
  </div>
  <div class="col-md-6">
    <div class="mb-1">
      <input type="file" name="ReportImage" onChange="displayReportImage(this)" id="ReportImage" class="form-control form-control-lg" accept=".png,.jpg,.gif,.jpeg"  hidden>
    </div>
    <div class="form-floating mb-1">
      <input type="text" class="form-control" id="floatingInput" name="Fullname" placeholder="Fullname" value="<?php echo $Fullname ?>">
      <label for="floatingPassword">Reported By</label>
    </div>
    <div class="form-floating mb-1">
      <input type="text" class="form-control" id="floatingInput" name="Violation" placeholder="Violation" value="<?php echo $Vehicle_Violation ?>">
      <label for="floatingPassword">Violation</label>
    </div>
    <div class="form-floating mb-1">
      <input type="text" class="form-control" id="floatingInput" name="Vehicle_Type" placeholder="Vehicle Type" value="<?php echo $Vehicle_Type ?>" >
      <label for="floatingPassword">Vehicle Type</label>
    </div>
    <div class="form-floating mb-1">
      <input type="text" class="form-control" id="floatingInput" name="Vehicle_Plate_No" placeholder="Vehicle Plate No"  value="<?php echo $Vehicle_Plate_No ?>">
      <label for="floatingPassword">Vehicle PlateNo</label>
    </div>
    <div class="form-floating mb-1">
      <input type="text" class="form-control" id="floatingInput" name="Vehicle_Color" placeholder="Vehicle Color"  value="<?php echo $Vehicle_Color ?>">
      <label for="floatingPassword">Vehicle Color</label>
    </div>
    <div class="row g-1 mb-1">
      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" placeholder="Remark" name="Remark" value="<?php echo $Remark ?>" >
        <label for="floatingPassword">Remark</label>
      </div>
    </div>
    <div class="text-center mb-1">
      <!--<button type="submit" name="insert" id="insert" class="btn btn-success">Submit</button>-->
      <a href="index.php?q=reportlist" ><button type="button" class="btn btn-outline-danger btn-sm"><span class="bi-arrow-left"></span> Back</button></a>
    </div>
  </div>
</div>


<script type="text/javascript">
  function triggerClickReportImage(e) {
    document.querySelector('#ReportImage').click();
  }

  function displayReportImage(e) {
    if (e.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        document.querySelector('#ReportImageDisplay').setAttribute('src', e.target.result);
      }
      reader.readAsDataURL(e.files[0]);
    }
  }


  $(document).ready(function() {
    $('#insert').click(function() {
      var image_name = $('#ReportImage').val();
      if (image_name == '') {
        alert("Please select image first!");
        return false;
      } else {
        var extension = $('#ReportImage').val().split('.').pop().toLowerCase();
        if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
          alert('Invalid Image File');
          $('#ReportImage').val('');
          return false;
        }
      }
    });
  });
</script>


<?php 
$ID = (isset($_SESSION['UserID']) && $_SESSION['UserID'] != '') ? $_SESSION['UserID'] : 0;
$db = new Database();
if (isset($_POST["insert"])) {
    $DriverName =$_POST['DriverName'];
    $IncidentLocation =$_POST['IncidentLocation'];
    $VehicleType =$_POST['VehicleType'];
    $PlateNo =$_POST['PlateNo'];
    $Violation =$_POST['Violation'];
    $Remarks =$_POST['Remarks'];

    $file = addslashes(file_get_contents($_FILES["ReportImage"]["tmp_name"]));

  if ($file=="")
  {
    echo '<script type="text/javascript">
            alert("You are required to add supporting image.");
          </script>';
  }
  else
  {
    $query = "INSERT INTO user_report
    (DriverName,
    IncidentLocation,
    VehicleTypeID,
    PlateNo,
    ViolationID,
    Remarks,
    UserID,
    ReportImage,
    DateReported) 
    VALUES 
    ('$DriverName',
    '$IncidentLocation',
    '$VehicleType',
    '$PlateNo',
    '$Violation',
    '$Remarks',
    '$ID',
    '$file',
    NOW())";
    if (mysqli_query($db->conn, $query)) {
      echo '<script type="text/javascript">
              alert("Report Successfully Submitted!");
            </script>';
    }
  }

}
?>