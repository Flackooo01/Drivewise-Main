
<div class="container">
  <div class="row mt-3">
    <h4><span class="bi-save"></span> Report Incident</h4>
    <div class="col-md-3">
      <!--SPACE-->
    </div>

    <div class="card" style=" border: 1px solid black;">
      <!--FORM-->
      <form method="post" enctype="multipart/form-data">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="text-center mb-1">
              <img src="img/images/UPLOADIMAGE.jpeg" class="img-fluid" onClick="triggerClickReportImage()" id="ReportImageDisplay">  
            </div>
          </div>
          <div class="col-md-6">
              <div class="mb-1">
                <input type="file" name="ReportImage" onChange="displayReportImage(this)" id="ReportImage" class="form-control form-control-lg" accept=".png,.jpg,.gif,.jpeg"  required>
              </div>
              <div class="form-floating mb-1">
                <input type="text" class="form-control" id="floatingInput" name="DriverName" placeholder="Driver's Name" hidden>
                <label for="floatingPassword">Driver's Name</label>
              </div>
              <div class="form-floating mb-1">
                <input type="text" class="form-control" id="floatingInput" name="IncidentLocation" placeholder="Incident Address" required>
                <label for="floatingPassword">Incident Address</label>
              </div>
              <div class="row g-1 mb-1">
                <div class="form-floating col-md-6">
                  <select class="form-select" name="VehicleType" id="VehicleType" aria-label=".form-select-sm example" value="" required>
                        <option value="">Select Vehicle Type</option>
                        <?php 
                                  $sql = "SELECT * FROM `vehicletype`";
                                  $mydb->setQuery($sql);
                                  $cur = $mydb->loadResultList();
                                  foreach ($cur as $res) {
                                    # code...
                                    echo '<option value='.$res->VehicleTypeID.'>'.$res->VehicleType.'</option>';
                                  } 
                        ?>
                    </select>
                    <label for="floatingSelect"> Vehicle Type</label>
                </div>

                <div class="form-floating col-md-6">
                  <input type="text" class="form-control" id="floatingInput" name="PlateNo" placeholder="Plate No." >
                  <label for="floatingPassword" style="padding-left:100;">Plate No.</label>
                </div>
              </div>
              <div class="form-floating mb-1">
                    <select class="form-select" name="Violation" id="Violation" aria-label=".form-select-sm example" value="" required>
                        <option value="">Select Violation</option>
                        <?php 
                                  $sql = "SELECT * FROM `violation`";
                                  $mydb->setQuery($sql);
                                  $cur = $mydb->loadResultList();
                                  foreach ($cur as $res) {
                                    # code...
                                    echo '<option value='.$res->ViolationID.'>'.$res->Violation.'</option>';
                                  } 
                        ?>
                    </select>
                    <label for="floatingSelect">Violation</label>
              </div>
              <div class="row g-1 mb-1">
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingInput" placeholder="Remarks" name="Remarks" value="" >
                  <label for="floatingPassword">Remarks</label>
                </div>
              </div>
              <div class="text-center mb-1">
                <button type="submit" name="insert" id="insert" class="btn btn-success">Submit</button>
              </div>
            
          </div>
        </div>
      </div>
      </form>
            <!--END FORM-->
    </div>
  
    <div class="col-md-3">
      <!--SPACE-->
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