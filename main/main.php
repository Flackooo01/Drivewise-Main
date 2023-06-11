<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Drive Wise</title>
  <link rel="icon" type="image/x-icon" href="img/images/logo.png">
  <div class="header">
    <?php include 'CSS.php'; ?>
  </div>
</head>
<header>
  <style>
    html {
      scroll-behavior: smooth;
    }

    .navbar-nav>li>a:hover,
    .navbar-nav>li>a:active {
      color: black !important;
    }

 
  

    #content:after {
      clear: both;
    }

    .carousel-item {
      height: 35rem;
      background: #000;
      color: white;
      position: relative;
    }
    

    .containerForSlide {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding-bottom: 50px;
    }

    .overlay-image {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      top: 0;
      background-repeat: no-repeat;
      background-position: center;
      object-fit: cover;
      height: 100%;
      width: 100%;
     /* opacity: 0.9;*/
    }

    @media screen and (min-width: 720px) {
      body {
        padding-top: 137px;
        padding-bottom: 25px;
        background-color: white;

      }

    }

    .embed-responsive .card-img-top {
      /*
      height: 40vh;
      object-fit: cover;
      */
      width: 100%;
    height: 100%;
    object-fit: cover;
    }

  
    #mesul{
  list-style: none;
  margin: 0;
  padding: 0;
  padding-bottom:20;

}

#mesul li{
  display:inline-block;
  clear: both;
  padding: 20px;
  border-radius: 30px;
  margin-bottom: 2px;
  font-family: Helvetica, Arial, sans-serif;
}

.him{
  background: #eee;
  float: left;
}

.me{
  float: right;
  background: #0084ff;
  color: #fff;
}

.him + .me{
  border-bottom-right-radius: 5px;
}

.me + .me{
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
}

.me:last-of-type {
  border-bottom-right-radius: 30px;
}



@media only screen and (max-width: 600px) {
  .datess>* {
            flex: 0 0 auto;
            width: 50%;
        }
        .carousel-item {
      height: 20rem;
      background: #000;
      color: white;
      position: relative;
    }
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
  .datess>* {
            flex: 0 0 auto;
            width: 33.3333333333%;
        }
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
  .datess>* {
            flex: 0 0 auto;
            width: 25%;
        }
} 

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {
  .datess>* {
            flex: 0 0 auto;
            width: 20%;
        }
} 

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {
  .datess>* {
            flex: 0 0 auto;
            width: 16.6666666667%;
        }
}
@media only screen and (max-width: 480px) {
      .carousel-item {
      height: 20rem;
      background: #000;
      color: white;
      position: relative;
    }
    .buttoncenter{
      
    }

    }
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
  </style>

</header>

<body style=" padding-top: 77px; padding-bottom: 25px;">

  <div class="navtop">
    <?php include 'navtop.php'; ?>
  </div>

 
  <?php require_once $content; ?>


  <div class="footer">
    <?php include 'footer.php'; ?>
  </div>
<!--
  <button class="btn rounded-pill btn-md btnfloat" style="background-color:	#006AFF;" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <h5><span class="bi-chat-dots-fill"></span></h5>
  </button>
-->
  <div class="JavaScript">
    <?php include 'JavaScript.php'; ?>
  </div>

</body>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <span class="bi-question-circle-fill"> Submit this schedule?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="Fullname" name="Fullname" value="<?php echo $_SESSION['Firstname'] . ' ' . $_SESSION['Lastname'] ?>" readonly>
          <label for="floatingInput">Guardian Name</label>
        </div>
        <div class="row">
          <div class="col-md-8">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="Children" name="Children" required>
              <label for="floatingInput">Children Name</label>
            </div>
          </div>
          <button class="add_form_field">Add New Field &nbsp; 
            <span style="font-size:16px; font-weight:bold;">+ </span>
          </button>
          <div><input type="text" name="mytext[]"></div>

          <div class="col-md-4">
            <div class="form-floating mb-3">
              <select class="form-select" name="VaccineID" id="VaccineID" aria-label=".form-select-sm example">
                  <option value="">--</option>
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
                <label for="floatingSelect">Age (Month/s)</label>
            </div>
          </div>
        </div>

        <div class="row">

          <div class="col-md-7">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="Barangay" name="Barangay" required>
              <label for="floatingInput">Barangay</label>
            </div>
          </div>

          <div class="col-md-5">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="SelectedDate" name="SelectedDate" readonly>
              <label for="floatingInput">Your Selected Date</label>
            </div>
          </div>
        </div>

        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="Code" name="Code" value="<?php $code = rand(999999, 111111); echo date("Y").'-'.$code ?>" readonly>
          <label for="floatingInput">Your code</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-success submitschedule">
          <span class="bi-check-circle-fill"></span> Yes
        </button>
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
          <span class="bi-x-circle-fill"></span> Cancel
        </button>
      </div>
      </div>
    </div>

  </div>
</div>

</html>