<?php
require_once("include/initialize.php");
if (isset($_SESSION['UserID'])) {
  # code...
  redirect('index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>CAS | Register</title>
  <link rel="icon" type="image/x-icon" href="img/CAS.ico">
  <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
      integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
    />

    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      rel="stylesheet"
    />
    <!-- MDB -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css"
      rel="stylesheet"
    />
</head>

<section class="" style="background-color: #f8b61c;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-12 col-lg-12 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
                <form method="post" autocomplete="off" >
                  <div class="align-items-center mb-3 pb-1 text-center">
                  <img src="img/CAS.png"
                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; width:150px;" />
                  </div>

                  <h5 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;">Account Registration</h5>


                <div class="row g-2">
                    <div class="col-md-6">
                        <div class="form-outline mb-2">
                            <input type="text" id="form2Example17" name="StudentNumber" class="form-control form-control-lg" required/>
                            <label class="form-label" for="form2Example17">Student Number</label>
                        </div>
                        <div class="form-outline mb-2">
                            <input type="text" id="form2Example17" name="Firstname" class="form-control form-control-lg" required/>
                            <label class="form-label" for="form2Example17">Firstname</label>
                        </div>
                        <div class="form-outline mb-2">
                            <input type="text" id="form2Example27" name="Middlename" class="form-control form-control-lg" />
                            <label class="form-label" for="form2Example27">Middlename</label>
                        </div>
                        <div class="form-outline mb-2">
                            <input type="text" id="form2Example27" name="Lastname" class="form-control form-control-lg" required/>
                            <label class="form-label" for="form2Example27">Lastname</label>
                        </div>
                        <div class="form-outline mb-2">
                            <input type="date" id="form2Example27" name="Birthdate" class="form-control form-control-lg" required/>
                            <label class="form-label" for="form2Example27">Birthdate</label>
                        </div>
                        <div class="form-outline mb-2">
                            <input type="text" id="form2Example17" name="Address" class="form-control form-control-lg" required/>
                            <label class="form-label" for="form2Example17">Address</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <select name="Course" id="form2Example17" class="form-select form-control-lg mb-2" required>
                          <option value="">Select Course</option>
                          <?php 
                                  $sql = "SELECT * FROM `courses`";
                                  $mydb->setQuery($sql);
                                  $cur = $mydb->loadResultList();
                                  foreach ($cur as $res) {
                                    # code...
                                    echo '<option value='.$res->CourseID.'>'.$res->Course.'</option>';
                                  } 
                          ?>
                        </select>

                        <div class="row">
                          <div class="col-md-6">
                            <select name="Year" id="form2Example17" class="form-select form-control-lg mb-2" required>
                              <option value="">Select Year</option>
                              <?php 
                                  $sql = "SELECT * FROM `years`";
                                  $mydb->setQuery($sql);
                                  $cur = $mydb->loadResultList();
                                  foreach ($cur as $res) {
                                    # code...
                                    echo '<option value='.$res->Years.'>'.$res->Years.'</option>';
                                  } 
                              ?>
                            </select>
                          </div>

                          <div class="col-md-6">
                            <div class="form-outline mb-2">
                                <input type="text" id="form2Example27" name="Section" class="form-control form-control-lg" required/>
                                <label class="form-label" for="form2Example27">Section</label>
                            </div>
                          </div>

                        </div>

                        <div class="form-outline mb-2">
                            <input type="text" id="form2Example27" name="Mobile"  onkeypress="return onlyNumberKey(event)"  maxlength="11" class="form-control form-control-lg" required/>
                            <label class="form-label" for="form2Example27">Mobile #</label>
                        </div>

                        <div class="form-outline mb-2">
                            <input type="email" id="form2Example27" name="Email" class="form-control form-control-lg" required/>
                            <label class="form-label" for="form2Example27">Email Address</label>
                        </div>
                        <div class="form-outline mb-2">
                            <input type="password" id="form2Example27" name="Password" class="form-control form-control-lg" required/>
                            <label class="form-label" for="form2Example27">Password</label>
                        </div>

                        <div class="form-outline mb-2">
                            <input type="password" id="form2Example27" name="ConfirmPassword" class="form-control form-control-lg" required/>
                            <label class="form-label" for="form2Example27">Confirm Password</label>
                        </div>
                    </div>
                </div>

                <div class="row g-2">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-2">
                        <div class="pt-1">
                            <button type="submit" name="btnRegister" class="btn btn-success btn-lg btn-block">Register</button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="pt-1">
                            <button type="button" name="back" class="btn btn-warning btn-lg btn-block" onclick="location.href='login.php'">Back</button>
                        </div>
                    </div>   
                    <div class="col-md-4">
                    </div>
                </div>



                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js"
      integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d"
      crossorigin="anonymous"
    ></script>
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
    ></script>
  <script>
function ShowPass() {
  var x = document.getElementById("Password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }

  var y = document.getElementById("ConfirmPassword");
  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }
}


</script>

  <?php



  if (isset($_POST['btnRegister'])) {
    $uname = $_POST['Email'];

    $sql = "SELECT * From `user_access` WHERE Email ==  '$uname' ";

    $mydb->setQuery($sql);
    $row = $mydb->executeQuery();
    $maxrow = $mydb->num_rows($row);  

    if ($maxrow > 0) {
      echo '<script>alert("Account already exist!")</script>';
      exit;
    } 


    # code...  
    $CurrentDate = date("Y-m-d");

    if ($_POST['Password'] !== $_POST['ConfirmPassword']) {
      echo '<script>alert("Password not match!")</script>';
    } 
    elseif($_POST['Birthdate']>$CurrentDate) {
      echo '<script>alert("Invalid birth date!")</script>';
    }
    else {
      $Users = new Users();
      $Users->Firstname         = $_POST['Firstname'];
      $Users->Middlename         = $_POST['Middlename'];
      $Users->Lastname         = $_POST['Lastname'];
      $Users->Birthdate       = $_POST['Birthdate'];
      $Users->Course         = $_POST['Course'];
      $Users->Address         = $_POST['Address'];
      $Users->Contact         = $_POST['Mobile'];
      $Users->Year         = $_POST['Year'];
      $Users->Section         = $_POST['Section'];
      $Users->Email      = $_POST['Email'];
      $Users->StudentNumber      = $_POST['StudentNumber'];
      $Users->Password      = sha1($_POST['Password']);
      $Users->UserType      = "Student";
      $Users->create();

      //message("Your now succefully registered. You can login now!", "success");
      echo '<script>alert("Account Created! You may now Login.")</script>';
      redirect("login.php");
     
    }
  }

  ?>
  <script>
        function onlyNumberKey(evt) {
              
            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }

  $(function() {
  $( "#Birthdate" ).datepicker({  maxDate: 0 });
});
    </script>