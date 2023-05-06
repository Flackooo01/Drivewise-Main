<?php
require_once("include/initialize.php");
require_once("DatabaseV2/config.php");

if(isset($_SESSION['User_ID'])) {
    
    $sql = "SELECT * FROM lto_report WHERE Active = '0' ORDER BY ID ASC";
    $result = mysqli_query($con, $sql);

}

?>
<style>
  #logo {
    width: 50px;
    height: 50px;
  }
  .active:hover{
    -moz-border-radius-topleft: 10px;
  -moz-border-radius-topright: 10px;
  -moz-border-radius-bottomright: 10px;
  -moz-border-radius-bottomleft: 10px;
  -webkit-border-radius: 10px 10px 10px 1;
  border-radius: 10px 10px 10px 10px;
    background-color:rgb(255,255,255);
  }
</style>


<nav class="navbar fixed-top navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand " href="index.php?q=home">
      <img src="img\images\logo.png" id="logo">
        Drive Wise
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?q=home"><span class="bi-house-fill"></span> Home</a>
        </li>

        <?php
        if (isset($_SESSION['UserID'])) {
        ?>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?q=dashboard"><span class="bi-palette"></span> Dashboard</a>
          </li>
          <!--\
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?q=userreport"><span class="bi-save"></span> Report</a>
          </li>
        -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span class="bi-gear-fill"></span> Admin</a>
            <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
              <!--
              <li><a class="nav-item dropdown-item" href="index.php?q=violationlist">Violation</a></li>
              <li><a class="nav-item dropdown-item" href="index.php?q=vehicletypelist">Vehicle Type</a></li>
        -->
              <li><a class="nav-item dropdown-item" href="index.php?q=reportlist">Reported Case</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="nav-item dropdown-item" href="index.php?q=userlist">User List</a></li>
              
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome, <?php echo $_SESSION['Firstname'] . ' ' . $_SESSION['Lastname'] ?> !
            </a>
            <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
              <li>
                <a class="nav-item dropdown-item"  href="index.php?q=myprofile"><span class="bi-person-circle"></span> My Profile</a>
              </li>
              <!-- <li><a class="nav-item dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop1"><span class="fa fa-user"></span> My Profile</a></li>-->
              <li><a class="nav-item dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span class="fa fa-sign-out"></span> Log Out</a></li>
            </ul>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="login.php"><span class="fa fa-sign-in"></span> Login</a>
          </li>
        <?php } ?>
        
        <li class="nav-item">
            <a class="right nav-link active" onclick="toggleNotifi()" ><span>Inbox</span><span class="badge"></span></a>
            <div class="notifi-box" id="box" >
            <h2>Notifications<span></h2>

              <a class="notifi-item" id="notifications" href="index.php?q=reportlist">
              <img src="img/images/avatar1.png" alt="img">
                  <div class="text" >
                  <h4></h4>
                  <p></p>
                  </div>
          </a>
        </li>
        
      </ul>

    </div>
  </div>
</nav>


<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><span class="fa fa-sign-out"></span> Sign out</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to sign out?</span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-success" onClick="location.href='logout.php'">
          <span class="bi-check-circle-fill"></span> Yes
        </button>
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
          <span class="bi-x-circle-fill"></span> Cancel
        </button>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
  function triggerClick(e) {
    document.querySelector('#profileImage').click();
  }

  function displayImage(e) {
    if (e.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
      }
      reader.readAsDataURL(e.files[0]);
    }
  }

  $("img#light-on").click(function() {
    $.ajax({
      type: "POST",
      url: "light-on.php",
      data: {
        lighton: "true"
      },
      success: function() {
        $("p.status").html("The light is on!");
      }
    });
  });

  $(document).ready(function() {
    $('#insert').click(function() {
      var image_name = $('#profileImage').val();
      if (image_name == '') {
        alert("Please select image first!");
        return false;
      } else {
        var extension = $('#profileImage').val().split('.').pop().toLowerCase();
        if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
          alert('Invalid Image File');
          $('#profileImage').val('');
          return false;
        }
      }
    });
  });
  
  //notification
  
  var box  = document.getElementById('box');
  var down = false;

function toggleNotifi(){
	if (down) {
		box.style.height  = '0px';
		box.style.opacity = 0;
		down = false;
	}else {
		box.style.height  = '510px';
		box.style.opacity = 1;
		down = true;
	}
}

$(document).ready(function() {
      $("#notifications").on("click", function() {
        $.ajax({
          url: "readnotifications.php",
          success: function(result) {
            console.log(result);
          }
        });
      });
    });
    
</script>