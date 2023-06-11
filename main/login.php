<?php
require_once("include/initialize.php");
$_SESSION['attempt']=0;

// login confirmation
if (isset($_SESSION['UserID'])) {
  redirect(web_root . "index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive Wise | Login</title>
    <link rel="icon" type="image/x-icon" href="img/CAS.ico">
    <!-- Font Awesome -->
<!-- bootstrap 5 css -->
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
<body>
<!-- Section: Design Block -->
<section class="vh-100" style="background-color: #2c3333;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-5">
        <div class="card" style="border-radius: 1rem;  border: 5px solid #0adb36;background-color: #2c3333;">
          <div class="row g-0">
            <div class="col-md-12 col-lg-12 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
                <form method="post" autocomplete="off" >
                  <div class="align-items-center mb-3 pb-1 text-center">
                  <img src="img/images/logo.png"
                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; width:150px;" />
                  </div>
                  <h5 class="fw-normal mb-3 pb-3 text-center text-light" style="letter-spacing: 1px;">Sign into your account</h5>
                  <div class="form-outline mb-4">
                    <input type="email" id="Email" name="Email" class="form-control form-control-lg text-light" />
                    <label class="form-label text-light" for="form2Example17">Email</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="Password" name="Password" class="form-control form-control-lg text-light" />
                    <label class="form-label text-light" for="form2Example27">Password</label>
                  </div>
                  <div class="pt-1 mb-4">
                    <div class="row">
                      <div class="col-md-6">
                        <button class="btn btn-success btn-lg btn-block" type="submit" name="btnLogin" id="btnLogin">Login</button>
                      </div>
                      <div class="col-md-6">
                        <button type="button" name="back" class="btn btn-danger btn-lg btn-block" onclick="location.href='index.php'">Back</button>
                      </div>
                    </div>
                    
                  </div>
                  <!--
                  <a class="small" href="#!">Forgot password?</a>
                  <p class="mb-1 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="register.php"
                      style="color: #393f81;">Register here</a></p>
                  -->
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
  var x = document.getElementById("pword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>

<?php

if (isset($_POST['btnLogin'])) {
  $email = trim($_POST['Email']);
  $upass  = trim($_POST['Password']);
  $h_upass = sha1($upass);
  $_SESSION['last_time'] = time();

  
    //it creates a new objects of member
    $Users = new Users();
    //make use of the static function, and we passed to parameters
    $res = $Users::UserAuthentication($email, $h_upass);
    if ($res == true) {
      $_SESSION['attempts'] = 3;
  
      redirect("index.php");
      echo $_SESSION['UserID'];
      }
      else {
        echo '<script>alert("Invalid Credentials!")</script>';
      }

    }
  
?>

